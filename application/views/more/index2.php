
<!-- Header End -->
<!-- Contents Start -->
<div class="contents">
    <div class="custom-container">
        <div class="row">
            <!-- Bread Crumb Start -->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Videos - List</li>
                </ol>
            </div>
            <!-- Bread Crumb End -->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <!-- Contents Section Started -->
                <div class="sections">
                    <h2 class="heading"><?=strtoupper($service)?></h2>
                    <div class="clearfix"></div>
                    <div class="row">
                        <?php for($x = 0; $x < count($value); $x++){?>
                            <div class="col-lg-2 col-md-4 col-sm-4 col-xs-6">
                                <!-- Video Box Start -->
                                <div class="videobox2">
                                    <figure>
                                        <!-- Video Thumbnail Start -->
                                        <a href="<?=$this->config->item('base_url').'adbsdydgh/adfgehstj'.'/'.$grids[$x]->service_name.'/'.$grids[$x]->content_guid?>">
                                            <img src="<?=$this->config->item('image_url').$value[$x]->picture_path?>" class="img-responsive hovereffect" alt="" />
                                        </a>
                                        <!-- Video Thumbnail End -->
                                        <!-- Video Info Start -->
                                        <div class="vidopts">
                                            <ul>
                                                <li><i class="fa fa-heart"></i>1056</li>
                                                <li><i class="fa fa-clock-o"></i><?=$value[$x]->video_duration?></li>
                                            </ul>
                                            <div class="clearfix"></div>
                                        </div>
                                        <!-- Video Info End -->
                                    </figure>
                                    <!-- Video Title Start -->
                                    <h4><a href="<?=$this->config->item('base_url').'adbsdydgh/adfgehstj'.'/'.$value[$x]->service_name.'/'.$value[$x]->content_guid?>">
                                            <?=$value[$x]->topic?></a></h4>
                                    <!-- Video Title End -->
                                </div>
                                <!-- Video Box End -->
                            </div>
                        <?php  } ?>
                    </div>
                </div>
                <!-- Contents Section End -->
                <div class="clearfix"></div>
                <!-- Contents Section Started -->
                <!-- Pagination Start
                <ul class="pagination">
                    <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                    <li><a href="#">1</a></li>
                    <li class="disabled"><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li class="active"><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><
                    a href="#"><i class="fa fa-angle-right"></i></a></li>
                </ul> -->
                <!-- Pagination End -->
            </div>
        </div>
    </div>
</div>
<!-- Contents End -->
<!-- Footer Start -->
