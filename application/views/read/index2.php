
    <!-- Video Player Section Start -->
    <div class="videoplayersec">
        <div class="vidcontainer">
            <div class="row">
                <!-- Video Player Start -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 playershadow">
                    <div class="playeriframe">
                        <video controls preload="none"  width="100%"  poster="<?=$this->config->item('image_url').$value[0]->picture_path?>">
                            <source src="<?=$this->config->item('load_video_url').$value[0]->video_path?>" type="video/mp4">
                            <source src="parrots.webm" type="video/webm">
                        </video></iframe>
                    </div>
                </div>
                <!-- Video Player End -->
                <!-- Video Stats and Sharing Start -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 videoinfo">
                    <div class="row">
                        <!-- Uploader Start -->
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 uploader">
                            <figure> <a href="video-list.html"><img src="images/avatar2.jpg" alt="" /></a> </figure>
                            <div class="aboutuploader">
                                <time datetime="25-12-2014">Uploaded : <?= date('Y:m:d', strtotime($value[0]->date_created));?></time>
                                <br />
                                <a class="btn btn-primary btn-xs backcolor" href="#">Watch All Videos</a> </div>
                        </div>
                        <!-- Uploader End -->
                        <!-- Video Stats Start -->
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 stats">
                            <hr class="visible-xs" />
                            <ul>
                                <li class="likes">
                                    <h5>Likes</h5>
                                    <h2>250</h2>
                                </li>
                                <li class="views">
                                    <h5>Views</h5>
                                    <h2>70K</h2>
                                </li>
                            </ul>
                        </div>
                        <!-- Video Stats End -->
                        <!-- Video Share Start -->
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 videoshare">
                            <ul>
                                <li class="facebook">
                                    <i class="fa fa-facebook"></i>
                                    <div class="shaingstats">
                                        <h5>36K</h5>
                                        <p>Shares</p>
                                    </div>
                                    <a href="http://www.facebook.com" class="link" target="_blank"></a>
                                </li>
                                <li class="twitter">
                                    <i class="fa fa-twitter"></i>
                                    <div class="shaingstats">
                                        <h5>15K</h5>
                                        <p>Tweets</p>
                                    </div>
                                    <a href="http://www.twitter.com" class="link" target="_blank"></a>
                                </li>
                                <li class="gplus">
                                    <i class="fa fa-google-plus"></i>
                                    <div class="shaingstats">
                                        <h5>7K</h5>
                                        <p>Shares</p>
                                    </div>
                                    <a href="https://plus.google.com" class="link" target="_blank"></a>
                                </li>
                            </ul>
                        </div>
                        <!-- Video Share End -->
                    </div>
                </div>
                <!-- Video Stats and Sharing End -->
                <!-- Like This Video Start -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 likeit">
                    <hr />
                    <a class="btn btn-primary backcolor" href="#">Like This Video</a>
                </div>
                <!-- Like This Video Enb -->
            </div>
        </div>
    </div>
    <!-- Video Player Section End -->
    <!-- Contents Start -->
    <div class="contents">
        <div class="custom-container">
            <div class="row">
                <!-- Bread Crumb Start -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Related videos</li>
                    </ol>
                </div>
                <!-- Bread Crumb End -->
                <!-- Content Column Start -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 equalcol conentsection">
                    <!-- Video Detail Started -->
                    <div class="blogdetail videodetail sections">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            </div>
                        </div>
                    </div>
                    <!-- Video Detail End -->
                    <div class="clearfix"></div>
                    <!-- Contents Section Started -->
                    <div class="sections">
                        <h2 class="heading">Related Videos</h2>
                        <div class="clearfix"></div>

                        <div class="row">
                            <?php for($x = 0; $x < count($grids); $x++){?>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <!-- Video Box Start -->
                                    <div class="videobox2">
                                        <figure>
                                            <!-- Video Thumbnail Start -->
                                            <a href="<?=$this->config->item('base_url').'adbsdydgh/adfgehstj'.'/'.$grids[$x]->service_name.'/'.$grids[$x]->content_guid?>">
                                                <img src="<?=$this->config->item('image_url').$grids[$x]->picture_path?>" class="img-responsive hovereffect" alt="" />
                                            </a>
                                            <!-- Video Thumbnail End -->
                                            <!-- Video Info Start -->
                                            <div class="vidopts">
                                                <ul>
                                                    <li><i class="fa fa-heart"></i>1056</li>
                                                    <li><i class="fa fa-clock-o"></i><?=$grids[$x]->video_duration?></li>
                                                </ul>
                                                <div class="clearfix"></div>
                                            </div>
                                            <!-- Video Info End -->
                                        </figure>
                                        <!-- Video Title Start -->
                                        <h4><a href="<?=$this->config->item('base_url').'adbsdydgh/adfgehstj'.'/'.$grids[$x]->service_name.'/'.$grids[$x]->content_guid?>">
                                                <?=$grids[$x]->topic?></a></h4>
                                        <!-- Video Title End -->
                                    </div>
                                    <!-- Video Box End -->
                                </div>
                            <?php  } ?>
                        </div>


                        </div>
                    </div>
                    <!-- Contents Section End -->
                    <div class="clearfix"></div>
                    <!-- Contents Section Started -->
                    <div class="sections">
                        <div class="clearfix"></div>
                        <div id="comments">
                            <div class="post-comment">
                                <div class="comment-content">
                                    <div class="row">
                                        <script id="dsq-count-scr" src="//http-groove-ablogistics-com-ng.disqus.com/count.js" async></script>
                                    </div>
                                </div>
                                <div class="comment-form">
                                    <div id="disqus_thread"></div>
                                    <script>

                                        /**
                                         *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                                         *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
                                        /*
                                         var disqus_config = function () {
                                         this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                                         this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                                         };
                                         */
                                        (function() { // DON'T EDIT BELOW THIS LINE
                                            var d = document, s = d.createElement('script');
                                            s.src = '//http-groove-ablogistics-com-ng.disqus.com/embed.js';
                                            s.setAttribute('data-timestamp', +new Date());
                                            (d.head || d.body).appendChild(s);
                                        })();
                                    </script>
                                    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- Contents Section End -->
                    <div class="clearfix"></div>
                    <!-- Contents Section Started -->
                    <div class="sections">
                        <div class="clearfix"></div>
                        <div id="leavereply">
                            <form action="send.php">
                            </form>
                        </div>
                    </div>
                    <!-- Contents Section End -->
                    <div class="clearfix"></div>
                </div>
                <!-- Content Column End -->
            </div>
        </div>
    </div>
