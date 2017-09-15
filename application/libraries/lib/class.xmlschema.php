<?php




/**
* parses an XML Schema, allows access to it's data, other utility methods.
* imperfect, no validation... yet, but quite functional.
*
* @author   Dietrich Ayala <dietrich@ganx4.com>
* @author   Scott Nichol <snichol@users.sourceforge.net>
* @version  $Id: class.xmlschema.php,v 1.53 2010/04/26 20:15:08 snichol Exp $
* @access   public
*/
class nusoap_xmlschema extends nusoap_base  {
	
	// files
	var $schema = '';
	var $xml = '';
	// namespaces
	var $enclosingNamespaces;
	// schema info
	var $schemaInfo = array();
	var $schemaTargetNamespace = '';
	// types, elements, attributes defined by the schema
	var $attributes = array();
	var $complexTypes = array();
	var $complexTypeStack = array();
	var $currentComplexType = null;
	var $elements = array();
	var $elementStack = array();
	var $currentElement = null;
	var $simpleTypes = array();
	var $simpleTypeStack = array();
	var $currentSimpleType = null;
	// imports
	var $imports = array();
	// parser vars
	var $parser;
	var $position = 0;
	var $depth = 0;
	var $depth_array = array();
	var $message = array();
	var $defaultNamespace = array();
    
	/**
	* constructor
	*
	* @param    string $schema schema document URI
	* @param    string $xml xml document URI
	* @param	string $namespaces namespaces defined in enclosing XML
	* @access   public
	*/
	function nusoap_xmlschema($schema='',$xml='',$namespaces=array()){
		parent::nusoap_base();
		$this->debug('nusoap_xmlschema class instantiated, inside constructor');
		// files
		$this->schema = $schema;
		$this->xml = $xml;

		// namespaces
		$this->enclosingNamespaces = $namespaces;
		$this->namespaces = array_merge($this->namespaces, $namespaces);

		// parse schema file
		if($schema != ''){
			$this->debug('initial schema file: '.$schema);
			$this->parseFile($schema, 'schema');
		}

		// parse xml file
		if($xml != ''){
			$this->debug('initial xml file: '.$xml);
			$this->parseFile($xml, 'xml');
		}

	}

    /**
    * parse an XML file
    *
    * @param string $xml path/URL to XML file
    * @param string $type (schema | xml)
	* @return boolean
    * @access public
    */
	function parseFile($xml,$type){
		// parse xml file
		if($xml != ""){
			$xmlStr = @join("",@file($xml));
			if($xmlStr == ""){
				$msg = 'Error reading XML from '.$xml;
				$this->setError($msg);
				$this->debug($msg);
			return false;
			} else {
				$this->debug("parsing $xml");
				$this->parseString($xmlStr,$type);
				$this->debug("done parsing $xml");
			return true;
			}
		}
		return false;
	}

	/**
	* parse an XML string
	*
	* @param    string $xml path or URL
    * @param	string $type (schema|xml)
	* @access   private
	*/
	function parseString($xml,$type){
		// parse xml string
		if($xml != ""){

	    	// Create an XML parser.
	    	$this->parser = xml_parser_create();
	    	// Set the options for parsing the XML data.
	    	xml_parser_set_option($this->parser, XML_OPTION_CASE_FOLDING, 0);

	    	// Set the object for the parser.
	    	xml_set_object($this->parser, $this);

	    	// Set the element handlers for the parser.
			if($type == "schema"){
		    	xml_set_element_handler($this->parser, 'schemaStartElement','schemaEndElement');
		    	xml_set_character_data_handler($this->parser,'schemaCharacterData');
			} elseif($type == "xml"){
				xml_set_element_handler($this->parser, 'xmlStartElement','xmlEndElement');
		    	xml_set_character_data_handler($this->parser,'xmlCharacterData');
			}

		    // Parse the XML file.
		    if(!xml_parse($this->parser,$xml,true)){
			// Display an error message.
				$errstr = sprintf('XML error parsing XML schema on line %d: %s',
				xml_get_current_line_number($this->parser),
				xml_error_string(xml_get_error_code($this->parser))
				);
				$this->debug($errstr);
				$this->debug("XML payload:\n" . $xml);
				$this->setError($errstr);
	    	}
            
			xml_parser_free($this->parser);
		} else{
			$this->debug('no xml passed to parseString()!!');
			$this->setError('no xml passed to parseString()!!');
		}
	}

	/**
	 * gets a type name for an unnamed type
	 *
	 * @param	string	Element name
	 * @return	string	A type name for an unnamed type
	 * @access	private
	 */
	function CreateTypeName($ename) {
		$scope = '';
		for ($i = 0; $i < count($this->complexTypeStack); $i++) {
			$scope .= $this->complexTypeStack[$i] . '_';
		}
		return $scope . $ename . '_ContainedType';
	}
	
	/**
	* start-element handler
	*
	* @param    string $parser XML parser object
	* @param    string $name element name
	* @param    string $attrs associative array of attributes
	* @access   private
	*/
	function schemaStartElement($parser, $name, $attrs) {
		
		// position in the total number of elements, starting from 0
		$pos = $this->position++;
		$depth = $this->depth++;
		// set self as current value for this depth
		$this->depth_array[$depth] = $pos;
		$this->message[$pos] = array('cdata' => ''); 
		if ($depth > 0) {
			$this->defaultNamespace[$pos] = $this->defaultNamespace[$this->depth_array[$depth - 1]];
		} else {
			$this->defaultNamespace[$pos] = false;
		}

		// get element prefix
		if($prefix = $this->getPrefix($name)){
			// get unqualified name
			$name = $this->getLocalPart($name);
		} else {
        	$prefix = '';
        }
		
        // loop thru attributes, expanding, and registering namespace declarations
        if(count($attrs) > 0){
        	foreach($attrs as $k => $v){
                // if ns declarations, add to class level array of valid namespaces
				if(preg_match('/^xmlns/',$k)){
                	//$this->xdebug("$k: $v");
                	//$this->xdebug('ns_prefix: '.$this->getPrefix($k));
                	if($ns_prefix = substr(strrchr($k,':'),1)){
                		//$this->xdebug("Add namespace[$ns_prefix] = $v");
						$this->namespaces[$ns_prefix] = $v;
					} else {
						$this->defaultNamespace[$pos] = $v;
						if (! $this->getPrefixFromNamespace($v)) {
							$this->namespaces['ns'.(count($this->namespaces)+1)] = $v;
						}
					}
					if($v == 'http://www.w3.org/2001/XMLSchema' || $v == 'http://www.w3.org/1999/XMLSchema' || $v == 'http://www.w3.org/2000/10/XMLSchema'){
						$this->XMLSchemaVersion = $v;
						$this->namespaces['xsi'] = $v.'-instance';
					}
				}
        	}
        	foreach($attrs as $k => $v){
                // expand each attribute
                $k = strpos($k,':') ? $this->expandQname($k) : $k;
                $v = strpos($v,':') ? $this->expandQname($v) : $v;
        		$eAttrs[$k] = $v;
        	}
        	$attrs = $eAttrs;
        } else {
        	$attrs = array();
        }
		// find status, register data
		switch($name){
			case 'all':			// (optional) compositor content for a complexType
			case 'choice':
			case 'group':
			case 'sequence':
				//$this->xdebug("compositor $name for currentComplexType: $this->currentComplexType and currentElement: $this->currentElement");
				$this->complexTypes[$this->currentComplexType]['compositor'] = $name;
				//if($name == 'all' || $name == 'sequence'){
				//	$this->complexTypes[$this->currentComplexType]['phpType'] = 'struct';
				//}
			break;
			case 'attribute':	// complexType attribute
            	//$this->xdebug("parsing attribute $attrs[name] $attrs[ref] of value: ".$attrs['http://schemas.xmlsoap.org/wsdl/:arrayType']);
            	$this->xdebug("parsing attribute:");
            	$this->appendDebug($this->varDump($attrs));
				if (!isset($attrs['form'])) {
					// TODO: handle globals
					$attrs['form'] = $this->schemaInfo['attributeFormDefault'];
				}
            	if (isset($attrs['http://schemas.xmlsoap.org/wsdl/:arrayType'])) {
					$v = $attrs['http://schemas.xmlsoap.org/wsdl/:arrayType'];
					if (!strpos($v, ':')) {
						// no namespace in arrayType attribute value...
						if ($this->defaultNamespace[$pos]) {
							// ...so use the default
							$attrs['http://schemas.xmlsoap.org/wsdl/:arrayType'] = $this->defaultNamespace[$pos] . ':' . $attrs['http://schemas.xmlsoap.org/wsdl/:arrayType'];
						}
					}
            	}
                if(isset($attrs['name'])){
					$this->attributes[$attrs['name']] = $attrs;
					$aname = $attrs['name'];
				} elseif(isset($attrs['ref']) && $attrs['ref'] == 'http://schemas.xmlsoap.org/soap/encoding/:arrayType'){
					if (isset($attrs['http://schemas.xmlsoap.org/wsdl/:arrayType'])) {
	                	$aname = $attrs['http://schemas.xmlsoap.org/wsdl/:arrayType'];
	                } else {
	                	$aname = '';
	                }
				} elseif(isset($attrs['ref'])){
					$aname = $attrs['ref'];
                    $this->attributes[$attrs['ref']] = $attrs;
				}
                
				if($this->currentComplexType){	// This should *always* be
					$this->complexTypes[$this->currentComplexType]['attrs'][$aname] = $attrs;
				}
				// arrayType attribute
				if(isset($attrs['http://schemas.xmlsoap.org/wsdl/:arrayType']) || $this->getLocalPart($aname) == 'arrayType'){
					$this->complexTypes[$this->currentComplexType]['phpType'] = 'array';
                	$prefix = $this->getPrefix($aname);
					if(isset($attrs['http://schemas.xmlsoap.org/wsdl/:arrayType'])){
						$v = $attrs['http://schemas.xmlsoap.org/wsdl/:arrayType'];
					} else {
						$v = '';
					}
                    if(strpos($v,'[,]')){
                        $this->complexTypes[$this->currentComplexType]['multidimensional'] = true;
                    }
                    $v = substr($v,0,strpos($v,'[')); // clip the []
                    if(!strpos($v,':') && isset($this->typemap[$this->XMLSchemaVersion][$v])){
                        $v = $this->XMLSchemaVersion.':'.$v;
                    }
                    $this->complexTypes[$this->currentComplexType]['arrayType'] = $v;
				}
			break;
			case 'complexContent':	// (optional) content for a complexType
				$this->xdebug("do nothing for element $name");
			break;
			case 'complexType':
				array_push($this->complexTypeStack, $this->currentComplexType);
				if(isset($attrs['name'])){
					// TODO: what is the scope of named complexTypes that appear
					//       nested within other c complexTypes?
					$this->xdebug('processing named complexType '.$attrs['name']);
					//$this->currentElement = false;
					$this->currentComplexType = $attrs['name'];
					$this->complexTypes[$this->currentComplexType] = $attrs;
					$this->complexTypes[$this->currentComplexType]['typeClass'] = 'complexType';
					// This is for constructs like
					//           <complexType name="ListOfString" base="soap:Array">
					//                <sequence>
					//                    <element name="string" type="xsd:string"
					//                        minOccurs="0" maxOccurs="unbounded" />
					//                </sequence>
					//            </complexType>
					if(isset($attrs['base']) && preg_match('/:Array$/',$attrs['base'])){
						$this->xdebug('complexType is unusual array');
						$this->complexTypes[$this->currentComplexType]['phpType'] = 'array';
					} else {
						$this->complexTypes[$this->currentComplexType]['phpType'] = 'struct';
					}
				} else {
					$name = $this->CreateTypeName($this->currentElement);
					$this->xdebug('processing unnamed complexType for element ' . $this->currentElement . ' named ' . $name);
					$this->currentComplexType = $name;
					//$this->currentElement = false;
					$this->complexTypes[$this->currentComplexType] = $attrs;
					$this->complexTypes[$this->currentComplexType]['typeClass'] = 'complexType';
					// This is for constructs like
					//           <complexType name="ListOfString" base="soap:Array">
					//                <sequence>
					//                    <element name="string" type="xsd:string"
					//                        minOccurs="0" maxOccurs="unbounded" />
					//                </sequence>
					//            </complexType>
					if(isset($attrs['base']) && preg_match('/:Array$/',$attrs['base'])){
						$this->xdebug('complexType is unusual array');
						$this->complexTypes[$this->currentComplexType]['phpType'] = 'array';
					} else {
						$this->complexTypes[$this->currentComplexType]['phpType'] = 'struct';
					}
				}
				$this->complexTypes[$this->currentComplexType]['simpleContent'] = 'false';
			break;
			case 'element':
				array_push($this->elementStack, $this->currentElement);
				if (!isset($attrs['form'])) {
					if ($this->currentComplexType) {
						$attrs['form'] = $this->schemaInfo['elementFormDefault'];
					} else {
						// global
						$attrs['form'] = 'qualified';
					}
				}
				if(isset($attrs['type'])){
					$this->xdebug("processing typed element ".$attrs['name']." of type ".$attrs['type']);
					if (! $this->getPrefix($attrs['type'])) {
						if ($this->defaultNamespace[$pos]) {
							$attrs['type'] = $this->defaultNamespace[$pos] . ':' . $attrs['type'];
							$this->xdebug('used default namespace to make type ' . $attrs['type']);
						}
					}
					// This is for constructs like
					//           <complexType name="ListOfString" base="soap:Array">
					//                <sequence>
					//                    <element name="string" type="xsd:string"
					//                        minOccurs="0" maxOccurs="unbounded" />
					//                </sequence>
					//            </complexType>
					if ($this->currentComplexType && $this->complexTypes[$this->currentComplexType]['phpType'] == 'array') {
						$this->xdebug('arrayType for unusual array is ' . $attrs['type']);
						$this->complexTypes[$this->currentComplexType]['arrayType'] = $attrs['type'];
					}
					$this->currentElement = $attrs['name'];
					$ename = $attrs['name'];
				} elseif(isset($attrs['ref'])){
					$this->xdebug("processing element as ref to ".$attrs['ref']);
					$this->currentElement = "ref to ".$attrs['ref'];
					$ename = $this->getLocalPart($attrs['ref']);
				} else {
					$type = $this->CreateTypeName($this->currentComplexType . '_' . $attrs['name']);
					$this->xdebug("processing untyped element " . $attrs['name'] . ' type ' . $type);
					$this->currentElement = $attrs['name'];
					$attrs['type'] = $this->schemaTargetNamespace . ':' . $type;
					$ename = $attrs['name'];
				}
				if (isset($ename) && $this->currentComplexType) {
					$this->xdebug("add element $ename to complexType $this->currentComplexType");
					$this->complexTypes[$this->currentComplexType]['elements'][$ename] = $attrs;
				} elseif (!isset($attrs['ref'])) {
					$this->xdebug("add element $ename to elements array");
					$this->elements[ $attrs['name'] ] = $attrs;
					$this->elements[ $attrs['name'] ]['typeClass'] = 'element';
				}
			break;
			case 'enumeration':	//	restriction value list member
				$this->xdebug('enumeration ' . $attrs['value']);
				if ($this->currentSimpleType) {
					$this->simpleTypes[$this->currentSimpleType]['enumeration'][] = $attrs['value'];
				} elseif ($this->currentComplexType) {
					$this->complexTypes[$this->currentComplexType]['enumeration'][] = $attrs['value'];
				}
			break;
			case 'extension':	// simpleContent or complexContent type extension
				$this->xdebug('extension ' . $attrs['base']);
				if ($this->currentComplexType) {
					$ns = $this->getPrefix($attrs['base']);
					if ($ns == '') {
						$this->complexTypes[$this->currentComplexType]['extensionBase'] = $this->schemaTargetNamespace . ':' . $attrs['base'];
					} else {
						$this->complexTypes[$this->currentComplexType]['extensionBase'] = $attrs['base'];
					}
				} else {
					$this->xdebug('no current complexType to set extensionBase');
				}
			break;
			case 'import':
			    if (isset($attrs['schemaLocation'])) {
					$this->xdebug('import namespace ' . $attrs['namespace'] . ' from ' . $attrs['schemaLocation']);
                    $this->imports[$attrs['namespace']][] = array('location' => $attrs['schemaLocation'], 'loaded' => false);
				} else {
					$this->xdebug('import namespace ' . $attrs['namespace']);
                    $this->imports[$attrs['namespace']][] = array('location' => '', 'loaded' => true);
					if (! $this->getPrefixFromNamespace($attrs['namespace'])) {
						$this->namespaces['ns'.(count($this->namespaces)+1)] = $attrs['namespace'];
					}
				}
			break;
			case 'include':
			    if (isset($attrs['schemaLocation'])) {
					$this->xdebug('include into namespace ' . $this->schemaTargetNamespace . ' from ' . $attrs['schemaLocation']);
                    $this->imports[$this->schemaTargetNamespace][] = array('location' => $attrs['schemaLocation'], 'loaded' => false);
				} else {
					$this->xdebug('ignoring invalid XML Schema construct: include without schemaLocation attribute');
				}
			break;
			case 'list':	// simpleType value list
				$this->xdebug("do nothing for element $name");
			break;
			case 'restriction':	// simpleType, simpleContent or complexContent value restriction
				$this->xdebug('restriction ' . $attrs['base']);
				if($this->currentSimpleType){
					$this->simpleTypes[$this->currentSimpleType]['type'] = $attrs['base'];
				} elseif($this->currentComplexType){
					$this->complexTypes[$this->currentComplexType]['restrictionBase'] = $attrs['base'];
					if(strstr($attrs['base'],':') == ':Array'){
						$this->complexTypes[$this->currentComplexType]['phpType'] = 'array';
					}
				}
			break;
			case 'schema':
				$this->schemaInfo = $attrs;
				$this->schemaInfo['schemaVersion'] = $this->getNamespaceFromPrefix($prefix);
				if (isset($attrs['targetNamespace'])) {
					$this->schemaTargetNamespace = $attrs['targetNamespace'];
				}
				if (!isset($attrs['elementFormDefault'])) {
					$this->schemaInfo['elementFormDefault'] = 'unqualified';
				}
				if (!isset($attrs['attributeFormDefault'])) {
					$this->schemaInfo['attributeFormDefault'] = 'unqualified';
				}
			break;
			case 'simpleContent':	// (optional) content for a complexType
				if ($this->currentComplexType) {	// This should *always* be
					$this->complexTypes[$this->currentComplexType]['simpleContent'] = 'true';
				} else {
					$this->xdebug("do nothing for element $name because there is no current complexType");
				}
			break;
			case 'simpleType':
				array_push($this->simpleTypeStack, $this->currentSimpleType);
				if(isset($attrs['name'])){
					$this->xdebug("processing simpleType for name " . $attrs['name']);
					$this->currentSimpleType = $attrs['name'];
					$this->simpleTypes[ $attrs['name'] ] = $attrs;
					$this->simpleTypes[ $attrs['name'] ]['typeClass'] = 'simpleType';
					$this->simpleTypes[ $attrs['name'] ]['phpType'] = 'scalar';
				} else {
					$name = $this->CreateTypeName($this->currentComplexType . '_' . $this->currentElement);
					$this->xdebug('processing unnamed simpleType for element ' . $this->currentElement . ' named ' . $name);
					$this->currentSimpleType = $name;
					//$this->currentElement = false;
					$this->simpleTypes[$this->currentSimpleType] = $attrs;
					$this->simpleTypes[$this->currentSimpleType]['phpType'] = 'scalar';
				}
			break;
			case 'union':	// simpleType type list
				$this->xdebug("do nothing for element $name");
			break;
			default:
				$this->xdebug("do not have any logic to process element $name");
		}
	}

	/**
	* end-element handler
	*
	* @param    string $parser XML parser object
	* @param    string $name element name
	* @access   private
	*/
	function schemaEndElement($parser, $name) {
		// bring depth down a notch
		$this->depth--;
		// position of current element is equal to the last value left in depth_array for my depth
		if(isset($this->depth_array[$this->depth])){
        	$pos = $this->depth_array[$this->depth];
        }
		// get element prefix
		if ($prefix = $this->getPrefix($name)){
			// get unqualified name
			$name = $this->getLocalPart($name);
		} else {
        	$prefix = '';
        }
		// move on...
		if($name == 'complexType'){
			$this->xdebug('done processing complexType ' . ($this->currentComplexType ? $this->currentComplexType : '(unknown)'));
			$this->xdebug($this->varDump($this->complexTypes[$this->currentComplexType]));
			$this->currentComplexType = array_pop($this->complexTypeStack);
			//$this->currentElement = false;
		}
		if($name == 'element'){
			$this->xdebug('done processing element ' . ($this->currentElement ? $this->currentElement : '(unknown)'));
			$this->currentElement = array_pop($this->elementStack);
		}
		if($name == 'simpleType'){
			$this->xdebug('done processing simpleType ' . ($this->currentSimpleType ? $this->currentSimpleType : '(unknown)'));
			$this->xdebug($this->varDump($this->simpleTypes[$this->currentSimpleType]));
			$this->currentSimpleType = array_pop($this->simpleTypeStack);
		}
	}

	/**
	* element content handler
	*
	* @param    string $parser XML parser object
	* @param    string $data element content
	* @access   private
	*/
	function schemaCharacterData($parser, $data){
		$pos = $this->depth_array[$this->depth - 1];
		$this->message[$pos]['cdata'] .= $data;
	}

	/**
	* serialize the schema
	*
	* @access   public
	*/
	function serializeSchema(){

		$schemaPrefix = $this->getPrefixFromNamespace($this->XMLSchemaVersion);
		$xml = '';
		// imports
		if (sizeof($this->imports) > 0) {
			foreach($this->imports as $ns => $list) {
				foreach ($list as $ii) {
					if ($ii['location'] != '') {
						$xml .= " <$schemaPrefix:import location=\"" . $ii['location'] . '" namespace="' . $ns . "\" />\n";
					} else {
						$xml .= " <$schemaPrefix:import namespace=\"" . $ns . "\" />\n";
					}
				}
			} 
		} 
		// complex types
		foreach($this->complexTypes as $typeName => $attrs){
			$contentStr = '';
			// serialize child elements
			if(isset($attrs['elements']) && (count($attrs['elements']) > 0)){
				foreach($attrs['elements'] as $element => $eParts){
					if(isset($eParts['ref'])){
						$contentStr .= "   <$schemaPrefix:element ref=\"$element\"/>\n";
					} else {
						$contentStr .= "   <$schemaPrefix:element name=\"$element\" type=\"" . $this->contractQNam