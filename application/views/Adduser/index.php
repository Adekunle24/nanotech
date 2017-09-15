<link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
<script src="js/angular.js"></script>
<section class="content" ng-app="">

    <?=(isset($response)?$response:"")?>
    <p style="color: red"><?=validation_errors()?></p>
    <form action="adduser/create" method="post">    <div>
            <div class="form-group">
                <label for="exampleInputEmail1">First Name</label>
                <input type="text" class="form-control" required="required" name="user_firstname" id="exampleInputEmail1" placeholder="Enter first name">
            </div>
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" class="form-control" required="required" name="user_lastname" id="exampleInputEmail1" placeholder="Enter last name">
            </div>
            <div class="form-group">
                <div class="form-group">
                    <label>Role</label>
                    <select name="service_name_id" class="form-control" >
                        <option  value="Admin" >Admin</option>
                        <option  value="SAdmin">Super Admin</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="form-group" ng-controller="serviceController">
                    <label>Email</label>
                    <input type="email" class="form-control" required="required" name="user_email" id="exampleInputEmail1" placeholder="Enter email">
                </div>
            </div>
            <div class="form-group">
                <div class="form-group" ng-controller="serviceController">
                    <label>Phone</label>
                    <input type="number" class="form-control" required="required" name="user_phone" id="exampleInputEmail1" placeholder="Enter phone">
                </div>
            </div>
            <div class="form-group">
                <div class="form-group" ng-controller="serviceController">
                    <label>Password</label>
                    <input type="password" class="form-control" required="required" name="password" id="exampleInputEmail1">
                </div>
            </div>
            <div class="form-group">
                <div class="form-group" ng-controller="serviceController">
                    <label>Confirm Password</label>

                    <input type="password" class="form-control" required="required" name="cpassword" id="exampleInputEmail1">
                </div>
            </div>

            <div class='row'>
                <div class='col-md-12'>
                    <input type="submit" value="Submit" class="btn-sm btn-primary">
                    <hr>
                </div>
    </form>
    
    <div ng-controller="topicController">
        <div id="example2_wrapper" class="dataTables_wrapper form-inline" role="grid"><div class="row"><div class="col-xs-6"></div><div class="col-xs-6"></div></div><table id="example2" class="table table-bordered table-hover dataTable" aria-describedby="example2_info">
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
                <tr class="even" ng-repeat="x in names">
                    <td class=" sorting_1">{{ x.topic }}</td>
                    <td class=" ">{{ x.service_name }}</td>
                    <td class=" ">{{ x.date_created }}</td>
                    <td><a href="" target="_blank">View</a>|<a href="" target="_blank">Edit</a>|<a href="" target="_blank">Del</a></td>

                </tr>
                </tbody></table><div class="row"><div class="col-xs-6"><div class="dataTables_info" id="example2_info">Showing 1 to 10 of 57 entries</div></div><div class="col-xs-6"><div class="dataTables_paginate paging_bootstrap"><ul class="pagination"><li class="prev disabled"><a href="#">← Previous</a></li><li class="active"><a href="#">1</a></li><li><a href="#">2</a></li><li><a href="#">3</a></li><li><a href="#">4</a></li><li><a href="#">5</a></li><li class="next"><a href="#">Next → </a></li></ul></div></div></div></div>
    </div>
    <script>

        function topicController($scope,$http) {
            $http.get(" http://127.0.0.1/cloud_mobile/topic/topiclist")
                .success(function(response) {$scope.names = response;});
        }
    </script>

</section>



<!-- jQuery 2.0.2 -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
