<div class="cp_inner-banner">
    <div class="container">
        <div class="cp-inner-banner-holder">
            <h2>Category: <strong><?=$title?></strong></h2>
            <!--Breadcrumb Start-->
            <ul class="breadcrumb">
                <li><span>Sort:</span><a href="index.html">Home</a></li>
                <li class="active">Date</li>
            </ul><!--Breadcrumb End-->
        </div>
    </div>
</div><!--Banner End-->

<div id="cp-main-content" class="cp-main-v7">
    <section class="cp-section pd-tb60">
        <div class="container">
            <!--Outer Holder Start-->
            <div class="cp-outer-holder">
                <div class="row">
                    <div class="col-md-9">
                        <!--Categpries Outer Start-->
                        <ul class="cp-categories-listed">
                            <?php for($x = 0; $x < count($value); $x++){?>
                          
                            <li>
                                <figure class="cp-thumb" style="width:422px !important; height:237px!important;">
                                    <img src="<?=$this->config->item('image_url').$value[$x]->picture_path?>" alt="">
                                    <figcaption class="cp-caption">
                                        <a href="<?=$this->config->item('base_url').'adbsdydgh/adfgehstj'.'/'.$value[$x]->service_name.'/'.$value[$x]->content_guid?>" class="play-video">Play</a>
                                        <div class="cp-text">
                                            <h4><?=$value[$x]->caption?> </h4>
                                            <ul class="cp-meta-list">
                                                <li>Monday, Feb 26, 2016</li>
                                                <li>by Jiana Smith, <span>344 Views</span></li>
                                            </ul>
                                        </div>
                                    </figcaption>
                                </figure>
                            </li>
                            <?php } ?>
                        </ul>
						   <div class="pagination-container">
               <div class="pagination"><?=$pagination?> </div> 
                 </div>
                    </div>
                    <div class="col-md-3">
                        <aside class="cp_sidebar-outer">
                            <!--Widget Item Start-->
                            <div class="widget widget-recent-post">
                                <div class="cp-heading-outer">
                                    <h2>Most Popular</h2>
                                    <ul class="cp-listed">
                                        <li><a href="#">Show:</a> <span>This Month</span></li>
                                    </ul>
                                </div>
                                <ul>
								   <?php for($x = 0;$x < count($value); $x++){?>
                                     <li>
                                        <div class="cp-holder">
                                            <div class="cp-thumb2">
                                                <a href="<?=$this->config->item('base_url').'adbsdydgh/adfgehstj'.'/'.$most_popular[$x]->service_name.'/'.$most_popular[$x]->content_guid?>"><img src="<?=$this->config->item('image_url').$most_popular[$x]->picture_path ?>" width="65" height="75" alt=""/></a>
                                            </div>
                                            <div class="cp-text">
                                                <h5><a href="<?=$this->config->item('base_url').'adbsdydgh/adfgehstj'.'/'.$most_popular[$x]->service_name.'/'.$most_popular[$x]->content_guid?>"><?= $most_popular[$x]->caption ?></a></h5>
                                                <ul class="cp-meta-list">
                                                    <li><?php
                                                     $dateValue =  $most_popular[$x]->date_created; 
                                                     echo date('F',strtotime($dateValue)).',';
                                                  echo date('Y',strtotime($dateValue));
                                                  
                                                    ?></li>
                                                    <li><?= $most_popular[$x]->user_firstname ?>, <span>123 Views</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
										   <?php } ?>
								</ul>
                                <!-- <a href="#" class="recent-more-listed">More popular content »</a> -->
                            </div><!--Widget Item End-->

                            <!--Widget Item Start-->


                        </aside>
                    </div>
                </div>
            </div><!--Outer Holder End-->

        </div>
    </section>
</div>