<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by JetBrains PhpStorm.
 * User: USER
 * Date: 21/01/13
 * Time: 16:30
 * To change this template use File | Settings | File Templates.
 */
class Utility_model extends CI_Model

{  
function __construct()
	{
	    parent::__construct();
        $ci =& get_instance();
	}
  function log_query($query)
  {
$this->db->insert("vasservice_queries",array("query"=>$query));
  }
    function search_data()
    {
         $query = $this->db->get("vasservice_queries");
        foreach($query->result() as $row)
        {
            $rows[] = $row->query;
        }
 echo json_encode($rows);
    }
    function getGUID(){

            mt_srand((double)microtime()*10000);
            $charid = strtoupper(md5(uniqid(rand(), true)));
            $hyphen = chr(45);// "-"
            $uuid = chr(123)// "{"
                .substr($charid, 0, 8).$hyphen
                .substr($charid, 8, 4).$hyphen
                .substr($charid,12, 4).$hyphen
                .substr($charid,16, 4).$hyphen
                .substr($charid,20,12)
                .chr(125);// "}"
            return $uuid;

    }

     function is_logged_in($is_logged_in){
            if(!isset ($is_logged_in)|| $is_logged_in!=TRUE){
            redirect("/dashboard","location");
        }

    }
 function sendsms($recipient="", $sender="", $message="")
    {
        global $sentOnce;
        $recipient= urlencode($recipient);
        $sender= urlencode($sender);
        $message= urlencode($message);
        $api="http://www.rainsms.com/components/com_smsreseller/smsapi.php?username=beloved&password=school&sender=$sender&recipient=$recipient&message=$message";
        $result=file_get_contents($api);
        return $result;
    }
      
 function getDate(){
        
        return  date('Y-m-d H:i:s');;
    }
  function getDateTime(){
        
        return  date('Y-m-d H:i:s');;
    }

    function checkUser($role){
        $user=array("Admin");
        if(!in_array($role,$user)){
          redirect("/needs","location",302);
        }
        }

  function send_mail($email,$subject,$string){

      $headers = "MIME-Version: 1.0"."\r\n";
      $headers .= "Content-type:text/html;charset=iso-8859-1"."\r\n";
      $headers .= 'From: <no-reply_csrinaction@csrinaction.org>'."\r\n";
      mail($email,$subject,$string,$headers);

    }

    public function check($number)
    {
        $c=array('bg-darkBlue','bg-lighterBlue');
        if ($number % 2 == 0) {
            return $c[0];
        }
    }

    public function format_msisdn($msisdn)
    {
        return '234'.substr($msisdn,-10);
    }
}
