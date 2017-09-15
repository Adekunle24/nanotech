<script src="js/angular.js"></script>
<!-- Main content -->
<section class="content" ng-app>

    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>
                        150
                    </h3>
                    <p>
                        Subscribers
                    </p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>
                        53<sup style="font-size: 20px">%</sup>
                    </h3>
                    <p>
                        VAS Services
                    </p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>
                        44
                    </h3>
                    <p>
                        Monthly Renewal
                    </p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>
                        65
                    </h3>
                    <p>
                        Monthly Opt out
                    </p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div><!-- ./col -->
    </div><!-- /.row -->

    <!-- top row -->
    <div class="row">
        <div class="col-xs-12 connectedSortable">

        </div><!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Main row -->
    <div class="row">
        <!-- Left col -->
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">Edit Service</h3>
                        </div><!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="service/editservice" method="post" name="service">
                            <div class="box-body">
                                <?=(isset($response)?$response:"")?>
                                <p style="color: red"><?=validation_errors()?></p>
                                <div class="form-group" ng-controller="categoryController">
                                    <label>Category name</label>
                                    <select name="category_id" class="form-control" >
                                       <option id="greet" value="<?=$category_name_id?>" ng-selected="selected"><?=$category_name?></option>
                                        <option  value="{{x.id}}" ng ng-repeat="x in names">{{x.category_name}}</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Service Name</label>
                                    <input type="text" class="form-control" required="required" name="service_name" value="<?=$service_name?>" id="exampleInputEmail1" placeholder="Enter service name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Service Cost </label>
                                    <input type="text" class="form-control"  value="<?=$service_cost?>" required="required" name="service_cost" id="exampleInputEmail1" placeholder="Enter service cost">
                                   
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Service Keyword</label>
                                    <input type="text" class="form-control" value="<?=$service_keyword?>" required="required" name="service_keyword" id="exampleInputEmail1" placeholder="Enter service keyword">
                                    <input type="hidden" value="<?=$service_guid?>" name="id">
                                </div>
                                <div class="form-group">
                                    <label>Service Description</label>
                                    <textarea class="form-control" rows="3" required="required" name="service_description" placeholder="Enter ..."><?=$service_description?></textarea>
                                </div>
                            </div><!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div><!-- /.box -->
                    <!-- Input addon -->
                </div><!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-6">
                    <!-- general form elements disabled -->
                    <div class="box box-warning">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Available Service</h3>
                            </div><!-- /.box-header -->
                            <div class="box-body"  ng-controller="serviceController">
                            <div class="form-group">
                            <label for="exampleInputEmail1">Search</label>
                            <input type="text" class="form-control" ng-model="df_service"  placeholder="Enter service">
                        </div>
                                <table class="table table-bordered">
                                    <tbody>
                                    <tr>
                                        <th>Category Name</th>
                                        <th>Service Name</th>
                                        <th>Service Cost</th>
                                        <th>Action</th>
                                    </tr>
                                    <tr ng-repeat="x in names | filter:df_service">
                                        <td>{{ x.category_name | uppercase }}</td>
                                        <td>{{ x.service_name }}</td>
                                        <td>{{ x.service_cost | currency}}</td>
                                        <td><a href="<?=$this->config->item('baseurl')."service/delete/{{x.id}}"?>">Delete</a></td>

                                    </tr>
                                    </tbody>
                                </table>

                            </div>

                            <script>
                                function categoryController($scope,$http) {
                                    $http.get("<?=$this->config->item('base_url')?>category/categorylist")
                                        .success(function(response) {$scope.names = response;});
                                }

                                function serviceController($scope,$http) {
                                    $http.get("<?=$this->config->item('base_url')?>service/servicelist")
                                        .success(function(response) {$scope.names = response;});
                                }
                            </script>
                            <div class="box-footer clearfix">

                            </div>
                        </div>


                        <!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!--/.col (right) -->
            </div>   <!-- /.row -->
        </section>
