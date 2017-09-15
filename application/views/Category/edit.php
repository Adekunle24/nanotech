<script src="js/angular.js"></script>
<!-- Main content -->
<section class="content">

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
                            <h3 class="box-title">Edit Category</h3>
                        </div><!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="category/editcategory" method="post">
                            <div class="box-body">
                                <?=(isset($response)?$response:"")?>
                                <p style="color: red"><?=validation_errors()?></p>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Category Name</label>
                                    <input type="text" class="form-control" required="required" name="category_name" value="<?=$category_name?>" placeholder="Enter category name">
                                    <input type="hidden" name="id" value="<?=$guid?>">
                                </div>
                                 <div class="form-group" >
                    <label>Service name</label>
                    <select name="icons" class="form-control" >
                        <option value="<?=$icons?>" selected="<?=$icons?>">icon-newspaper</option>
                        <option value="icon-newspaper">icon-newspaper</option>
                        <option value="icon-music">icon-music</option>
                        <option value="icon-camera-2">icon-camera-2</option>
                        <option value="icon-book">icon-book</option>
                        <option value="icon-credit-card">icon-credit-card</option>
                        <option value="icon-smiley">icon-smiley</option>
                        <option value="icon-discout">icon-discout</option>
                        <option value="icon-cart">icon-cart</option>
                        <option value="icon-help">icon-help</option>
                    </select>
                </div>
                                <div class="form-group">
                                    <label>Category Description</label>
                                    <textarea class="form-control" rows="3" required="required" name="category_description" placeholder="Enter ..."><?=$category_description?></textarea>
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
                                <h3 class="box-title">Category</h3>
                            </div><!-- /.box-header -->

                            <div class="box-body" ng-app="" ng-controller="customersController">
                                <table class="table table-bordered">
                                    <tbody>
                                    <tr>
                                        <th>Category</th>
                                        <th>Action</th>
                                    </tr>
                                    <tr ng-repeat="x in names">
                                        <td>{{ x.category_name }}</td>
                                        <td><a href="" target="_blank">View</a>|<a href="" target="_blank">Edit</a>|<a href="" target="_blank">Del</a></td>

                                    </tr>
                                    </tbody>
                                </table>

                            </div>
                            <script>
                                function customersController($scope,$http) {
                                    $http.get("http://127.0.0.1/cloud_mobile/category/categorylist")
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