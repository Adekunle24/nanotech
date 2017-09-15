<link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
<script src="js/angular.js"></script>
<script src="js/jquery.min.js" type="text/javascript"></script>
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script src="js/ajaxupload.js" type="text/javascript"></script>
<!-- Main content -->
<section class="content" ng-app="">

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
                            <h3 class="box-title">Add Content</h3>
                        </div><!-- /.box-header -->
                        <!-- form start -->
                        <?=(isset($response)?$response:"")?>
                        <p style="color: red"><?=validation_errors()?></p>
                        <form role="form" action="content/editcontent" method="post">
                            <div class="form-group" ng-controller="topicController">
                                <label>Topic</label>
                                <select name="topic_name_id" class="form-control" >
                                <option id="greet" value="<?=$id?>" ng-selected="selected"><?=$topic?></option>
                                    <option  value="{{x.id}}" ng-repeat="x in names">{{ x.topic  }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Day</label>
                                <select class="form-control" name="day" required="required">
                                    <?php for($i=1; $i< 31 ;$i++)
                                    { if ($i==$day){?>

                                    <?php }else{?>

                                        <option value="<?=$i?>"><?=$i?></option>
                                    <?php }} ?>

                                </select>
                            </div>
                            <script>
                                function topicController($scope,$http) {
                                    $http.get("<?=$this->config->item('base_url')?>topic/topiclist")
                                        .success(function(response) {$scope.names = response;});
                                }
                            </script>

                            <!--<label><span>Upload Picture/logo/flyers (gif|jpg|png|jpeg) (1mb)</span>   <br />
                                <script>
                                    $(document).ready(function(){
                                        new AjaxUpload('#uploadFile', {
                                            action: '<?=$this->config->item("base_url")?>content/do_upload',
                                            name: 'userfile',
                                            responseType : "json",
                                            onSubmit: function (file, ext) {
                                                if (!(ext && /^(jpg|jpeg|png)$/i.test(ext))) {
                                                    alert('Invalid File Format. Please select a valid format.');
                                                    return false;
                                                }
                                                var img="<img src=\"img/loader2.gif\"/>";
                                                $('#uploadStatus').html(img);
                                            },
                                            onComplete: function (file , response){
                                                $('#uploadStatus').html(response.success);
                                            }
                                        });

                                    });
                                </script>
                                <p>
                                <div class="form-group">
                                    <input type="button" id="uploadFile" value="Upload" class="upload" />
        <span id="uploadStatus" style="color: green; font-size: medium; font-weight: bolder">
       </span>
                                    <span id="picture"></span>
                                </div>
                            </label>-->
                            <div class="form-group">
                                <div class='box-header'>
                                    <label></label>
                                    <h3 class='box-title'>Content <small>Advanced and full of features</small></h3>
                                    <!-- tools box -->
                                    <div class="pull-right box-tools">
                                        <button class="btn btn-info btn-sm" data-widget='collapse' data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn btn-info btn-sm" data-widget='remove' data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                                    </div><!-- /. tools -->
                                </div><!-- /.box-header -->
                                <div class='box-body pad'>

                                        <textarea id="editor1" name="content" rows="10" cols="80">
<?=$content_view?>
                                        </textarea>

                                </div>

                                <div class='box-body pad'>
                                <input type="submit" value="Submit" class="btn-sm btn-primary">
                                    </div>

                            </div>
                        </form>
                    </div><!-- /.box -->
                    <!-- Input addon -->
                </div><!--/.col (left) -->
                <!-- right column -->
             
 <!-- /.row -->
        </section>


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="js/AdminLTE/demo.js" type="text/javascript"></script>
        <!-- CK Editor -->
        <script src="js/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(function() {
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace('editor1');
                //bootstrap WYSIHTML5 - text editor
                $(".textarea").wysihtml5();
            });
        </script>
