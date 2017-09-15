<link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />

<section class="content" ng-app="appTopic">

    <?=(isset($response)?$response:"")?>
    <p style="color: red"><?=validation_errors()?></p>
    <form action="topic/addtopic" method="post">    <div>
            <div class="form-group">
                <label for="exampleInputEmail1">Course Topic</label>
                <textarea class="form-control" rows="3" required="required" name="topic" placeholder="Enter ..."></textarea>
            </div>
            <div class="form-group">
                <div class="form-group" ng-controller="serviceController">
                    <label>Service name</label>
                    <select name="service_name_id" class="form-control" >
                        <option  value="{{x.id}}" ng-repeat="x in names">{{x.service_name}}</option>
                    </select>
                </div>
            </div>
            <div class='row'>
                <div class='col-md-12'>
                    <input type="submit" value="Submit" class="btn-sm btn-primary">
                    <hr>
                </div>
    </form>
    <script>
                function serviceController($scope,$http) {
            $http.get("<?=$this->config->item('base_url')?>service/servicelist")
                .success(function(response) {$scope.names = response;});
        }
    </script>
     
<div>
	   <div class="form-group">
                            <label for="exampleInputEmail1">Search</label>
                            <input type="text" class="form-control" ng-model="content" name="category_name" placeholder="Search">
                        </div>
    <div id="example2_wrapper" ng-controller="topicController"class="dataTables_wrapper form-inline" role="grid"><div class="row"><div class="col-xs-6"></div><div class="col-xs-6"></div></div><table id="example2" class="table table-bordered table-hover dataTable" aria-describedby="example2_info">
            <thead>
            <tr role="row"><th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1"
                               colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                    TOPIC</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="example2"
                                             rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">
                    SERVICE NAME</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1"
                                    colspan="1" aria-label="Platform(s): activate to sort column ascending">DATE CREATED
                </th><th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                         aria-label="Engine version: activate to sort column ascending">ACTION</th>
                </tr>
            </thead>
           
            <tr dir-paginate="x in names|filter:content|orderBy:sortKey:reverse|itemsPerPage:20">
                <td class=" sorting_1">{{ x.topic }}</td>
                <td class=" ">{{ x.service_name }}</td>
                <td class=" ">{{ x.date_created }}</td>
                <td><a href="<?=$this->config->item('baseurl')."topic/edit/{{x.topic_guid}}"?>">Edit</a>
                |
                <a href="<?=$this->config->item('baseurl')."topic/delete/{{x.topic_guid}}"?>">Delete</a>
            </tr>
             
            </table><div class="row"><div class="col-xs-6"><div class="dataTables_info" id="example2_info"><dir-pagination-controls
                                    max-size="20"
                                    direction-links="true"
                                    boundary-links="true" >
                                </dir-pagination-controls></div></div><div class="col-xs-6"></div></div></div>
        
            
        <script type="text/javascript" charset="utf-8">
            $('tr:odd').css('background', '#339999');
        </script>

            </div>
     <script>
                    
                        angular.module('appTopic', ['angularUtils.directives.dirPagination']);
                        function topicController($scope,$http) {
                            $http.get("<?=$this->config->item('base_url')?>topic/topiclist")
                                .success(function(response) {$scope.names = response;});
                            
                            $scope.sort= function(Keyname){
                            $scope.sortKey = Keyname;
                            $scope.reverse = !$scope.reverse;
                           }
                        }
                    </script>
   </section>



<!-- jQuery 2.0.2 -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
