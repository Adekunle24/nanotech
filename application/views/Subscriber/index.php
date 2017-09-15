<link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
<script src="js/angular.js"></script>
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

<section class="content" ng-app="">

    <?=(isset($response)?$response:"")?>
    <p style="color: red"><?=validation_errors()?></p>
    <script>
        http://127.0.0.1/cloud_mobile/topic/topiclist
            function serviceController($scope,$http) {
                $http.get("http://127.0.0.1/cloud_mobile/service/servicelist")
                    .success(function(response) {$scope.names = response;});
            }
    </script>
    <?php if(empty($records)) echo "<div class=\"alert-box error\"><span>Error: </span>No record found.</div>"; ?>
    <?php if (isset($records)){?>
    <div>
        <div id="example2_wrapper" class="dataTables_wrapper form-inline" role="grid"><div class="row"><div class="col-xs-6"></div><div class="col-xs-6"></div></div><table id="example2" class="table table-bordered table-hover dataTable" aria-describedby="example2_info">
                <thead>
                <tr role="row"><th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1"
                                   colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                        MSISDN</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="example2"
                                      rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">
                        SERVICE</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1"
                                             colspan="1" aria-label="Platform(s): activate to sort column ascending">SUBSCRIPTION CREATED
                    </th>
                </tr>
                </thead>
                <?php foreach($records as $record):?>
                <tr>
                    <td class=" sorting_1"><?=$record['msisdn']?></td>
                    <td class=" "><?=$record['service_name']?></td>
                    <td class=" "><?=$record['subscriptionDate']?></td>
                </tr>
                <?php endforeach;?>
                </tbody>

            </table><div class="row"><div class="col-xs-6"><div class="dataTables_info" id="example2_info">Showing 1 to <?=$per_page?> of <?=$total_rows?> entries</div></div><div class="col-xs-6"></div></div></div>
        <?php
        $config['next_link'] = 'Next &gt;';
        $config['prev_link'] = '&lt; previous'; ?>
        <?php echo $this->pagination->create_links($config); ?>
        <script type="text/javascript" charset="utf-8">
            $('tr:odd').css('background', '#339999');
        </script>
    </div>
    <?php  } ?>
    </div>
 </section>



<!-- jQuery 2.0.2 -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
