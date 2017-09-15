
<link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
<script src="js/angular.js"></script>
<script src="js/dirPagination.js"></script>
<section class="content" ng-app="contentTable">
    <div ng-controller="contentController">
        <h3 class="box-title">CONTENT</h3>
    <div class="form-group">
                            <label for="exampleInputEmail1">Search</label>
                            <input type="text" class="form-control" required="required" ng-model="content" name="category_name" placeholder="Enter category name">
                        </div>
        <div id="example2_wrapper" class="dataTables_wrapper form-inline" role="grid"><div class="row"><div class="col-xs-6"></div><div class="col-xs-6"></div></div><table id="example2" class="table table-bordered table-hover dataTable" aria-describedby="example2_info">
                <thead>
                
                <tr role="row"><th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1"
                                   colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                        CAPTIONS
<span class="glyphicon sort-icon" ng-show="sortKey=='topic'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}">
</th>
 <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1"
                                   colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                        URL</th>                       
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="example2"
                                      rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">
                        SERVICE NAME</th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="example2"
                                      rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">
                        CREATED BY</th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1"
                                             colspan="1" aria-label="Platform(s): activate to sort column ascending">DATE CREATED
                    </th><th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                             aria-label="Engine version: activate to sort column ascending">ACTION</th>
                </tr>
                </thead>
                <tr class="even" dir-paginate="x in names|filter:content|orderBy:sortKey:reverse|itemsPerPage:20">
                    <td class="sorting_1">{{ x.topic }}</td>
                    <td class="">{{ x.url }}</td>
                    <td class="">{{ x.service_name }}</td>
                    <td class="">{{ x.user_email }}</td>
                    <td class="">{{ x.date_created | date:"yyyy-MM-dd" }} </td>
            
                     <td><a href="<?=$this->config->item('baseurl')."content/edit/{{x.content_guid}}"?>" class="btn btn-info btn-xs">Edit</a>  |
                     <a href="<?=$this->config->item('baseurl')."content/delete/{{x.content_guid}}"?>" class="btn btn-danger btn-xs">Delete</a>      
                        
                        </td>
                </tr>
                </tbody></table><div class="row"><div class="col-xs-6">
                <div class="dataTables_info" id="example2_info">
                <dir-pagination-controls
                                    max-size="10"
                                    direction-links="true"
                                    boundary-links="true" >
                                </dir-pagination-controls></div></div><div class="col-xs-6">
                <div class="dataTables_paginate paging_bootstrap">
                <script type="text/javascript" charset="utf-8">
            $('td:odd').css('background', '#339999');
        </script>
                </div></div></div></div>
    </div>

                    
                        <?=(isset($response)?$response:"")?>
   
       <div>
            <div class="form-group" ng-controller="WordController as wordController">
                <label for="exampleInputEmail1">SMS CONTENT</label>
                  <p ng-model="wordController.WordLength" >You have entered 
	<font ng-style="wordController.WordLengthStyle">{{wordController.WordLength}} </font> 
	characters</p>
                <textarea class="form-control" ng-model="wordController.Text"  
	ng-change="wordController.UpdateWordLength()" ng-trim="false" 
	rows=6 cols=50 maxlength="160" required="required" name="smsbuild" placeholder="Enter ..."></textarea>
            </div>
          
 <script>
                    
                        angular.module('contentTable', ['angularUtils.directives.dirPagination']);
                        function contentController($scope,$http) {
                            $http.get("<?=$this->config->item('base_url')?>service/getcontents")
                                .success(function(response) {$scope.names = response;});
                            
                            $scope.sort= function(Keyname){
                            $scope.sortKey = Keyname;
                            $scope.reverse = !$scope.reverse;
                           }
                        }
                        function WordController()
                        {
                                var wordController = this;
          wordController.WordLength = 0;
          wordController.Text = "";
          wordController.WordLengthStyle={'color':'red'}; 

          wordController.UpdateWordLength = function( $event)
          {
            wordController.WordLength = wordController.Text.length;
          };
                        }
                    </script>
     
  

</section>


