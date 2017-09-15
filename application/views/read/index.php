<div class="cp_inner-banner">
    <div class="container">
        <div class="cp-inner-banner-holder">
            <h2>Category: <strong><?=$value[0]->service_name?></strong></h2>
            <!--Breadcrumb Start-->
            <ul class="breadcrumb">
                <li><span>Sort:</span><a href="index.html">Home</a></li>
                <li class="active">Video Page</li>
            </ul><!--Breadcrumb End-->
        </div>
    </div>
</div><!--Banner End-->

<!--Main Content Start-->
<div id="cp-main-content">
    <section class="cp-blog-section pd-tb60">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <!--Video Detail Outer Start-->
                    <div class="cp-video-detail-outer">
                        <div class="cp-video-outer2">
                            <div class="playeriframe">
                                <video controls preload="none"  width="100%"  poster="<?=$this->config->item('image_url').$value[0]->picture_path?>">
                                   <source src="<?=$this->config->item('load_video_url').$value[0]->video_path?>" type="video/mp4">
                                    <source src="parrots.webm" type="video/webm">
                                </video></iframe>
                            </div>
                        </div>
                        <div class="cp-text-holder">
                            <div class="cp-top">
                                <h4><?=$value[0]->topic?></h4>
                                <span class="viewer">30, 160 Views</span>
                            </div>
                            <div class="cp-watch-holer">
                                <ul class="cp-meta-list">
                                    <li>Monday, Jan 26, 2016</li>
                                    <li>by Jiana Smith, <span>160 Views</span></li>
                                </ul>
                            </div>
                        </div>
                    </div><!--Video Detail Outer End-->

                </div>
                <div class="col-md-3">
                    <aside class="cp_sidebar-outer">
                        <!--Widget Item Start-->
                        <div class="widget widget-recent-post">
                            <div class="cp-heading-outer">
                                <h2>Up Next</h2>
                            </div>
                            <ul>
                                <?php for($x = 1; $x < 6; $x++){?>
                                <li>
                                    <div class="cp-holder">
                                        <div class="cp-thumb2">
                                            <a href="<?=$this->config->item('base_url').'adbsdydgh/adfgehstj'.'/'.$grids[$x]->service_name.'/'.$grids[$x]->content_guid?>">
                                                <img src="<?=$this->config->item('image_url').$grids[$x]->picture_path?>" alt=""></a>
                                        </div>
                                        <div class="cp-text">
                                            <h5><a href="<?=$this->config->item('base_url').'adbsdydgh/adfgehstj'.'/'.$grids[$x]->service_name.'/'.$grids[$x]->content_guid?>"><?=$grids[$x]->caption?> </a></h5>
                                            <ul class="cp-meta-list">
                                                <li><?=$grids[$x]->video_duration?></li></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <?php  } ?>
                            <div class="cp-show-more-outer">
                                <a href="<?=$this->config->item('base_url')?>showmore/view/<?=strtolower($value[0]->service_name)?>">Show More</a>

                            </div>
                        </div><!--Widget Item End-->

                    </aside>
                </div>
            </div>
        </div>
    </section>
</div><!--Main Content End-->