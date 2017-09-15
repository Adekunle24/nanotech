<!-- slider featured post -->
<div class="slider">

    <ul class="slides">

        <?php for($x = 0; $x < count($grids); $x++){?>
        <li>
            <img src="<?=$this->config->item('image_url').$grids[$x]->picture_path?>" alt="">
            <div class="caption slider-content  left-align">
                <h2><a href="<?=$this->config->item('base_url').'adbsdydgh/adfgehstj'.'/'.$grids[$x]->service_name.'/'.$grids[$x]->content_guid?>"><?=$grids[$x]->topic?></a></h2>
                <div class="label"><span><?=ucfirst($grids[$x]->service_name)?></span></div>
            </div>
        </li>
        <?php }?>
        <!--
        <li>
            <img src="img/slide2.jpg" alt="">
            <div class="caption slider-content  left-align">
                <h2><a href="index.html">Lorem Ipsum Dolor Sit Amet</a></h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                <div class="label"><span>FASHION</span></div>
            </div>
        </li>
        <li>
            <img src="img/slide3.jpg" alt="">
            <div class="caption slider-content  left-align">
                <h2><a href="index.html">Lorem Ipsum Dolor Sit Amet</a></h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                <div class="label"><span>LIFESTYLE</span></div>
            </div>
        </li>
        <li>
            <img src="img/slide4.jpg" alt="">
            <div class="caption slider-content  left-align">
                <h2><a href="index.html">Lorem Ipsum Dolor Sit Amet</a></h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                <div class="label"><span>POLITIC</span></div>
            </div>
        </li>
        <li>
            <img src="img/slide5.jpg" alt="">
            <div class="caption slider-content  left-align">
                <h2><a href="index.html">Lorem Ipsum Dolor Sit Amet</a></h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                <div class="label"><span>FOOD</span></div>
            </div>
        </li>
        -->
    </ul>

</div>
<!-- end slider featured post -->
<!-- recent post -->
<div class="recent-post section">
    <div class="container">
        <div class="title-label">
            <h2>Latest-Videos</h2>
        </div>

        <?php for($x = 0; $x < count($grids); $x++){?>
        <div class="home-content">
            <div class="row">
                <div class="col s5">
                    <div class="home-content-post post">
                        <a href="<?=$this->config->item('base_url').'adbsdydgh/adfgehstj'.'/'.$grids[$x]->service_name.'/'.$grids[$x]->content_guid?>">
                            <img src="<?=$this->config->item('image_url').$grids[$x]->picture_path?>" alt="">
                        </a>
                    </div>
                </div>
                <div class="col s7">
                    <div class="home-content-post post">
                        <h3><a href="<?=$this->config->item('base_url').'adbsdydgh/adfgehstj'.'/'.$grids[$x]->service_name.'/'.$grids[$x]->content_guid?>">
                                <?=$grids[$x]->topic?></a>
                        </h3>
                        <span><i class="fa fa-tag"></i> Category:<a href=""><?=ucfirst($grids[$x]->service_name)?></a></span>
                        <p><span><?=$grids[$x]->video_duration?></span></p>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>

<!-- sport -->
<div class="sport">
    <div class="container">
        <div class="title-label">
            <h2>Popular Videos</h2>
        </div>
        <?php for($x = 0; $x < count($recent); $x++){?>
        <div class="home-content">
            <div class="row">
                <div class="col s5">
                    <div class="home-content-post post">
                        <img src="<?=$this->config->item('image_url').$recent[$x]->picture_path ?>" alt="">
                    </div>
                </div>
                <div class="col s7">
                    <div class="home-content-post post">
                        <a href="<?=$this->config->item('base_url').'adbsdydgh/adfgehstj'.'/'.$recent[$x]->service_name.'/'.$recent[$x]->content_guid?>">
                            <?=$recent[$x]->topic?></a></h3>
                        <span><i class="fa fa-tag"></i> Category:<a href=""><?=ucfirst($recent[$x]->service_name)?></a></span>
                        <span><i class="fa fa-clock-o"></i> <?=$recent[$x]->video_duration?></span>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
        <!--
        <div class="row">
            <div class="col s12 txt-center">
                <a href="#" class="btn btn-block">View all</a>
            </div>
        </div>
        -->

    </div>
</div>
<!-- end sport -->


<!----start-wrap---->
<!--	<div class="wrap">-->
<!--		<div class="clear"> </div>-->
<!--		<div class="content">-->
<!--			<div class="left-content">-->
<!--				<div class="searchbar">-->
<!--					<div class="search-left">-->
<!--						<p>Latest-Videos</p>-->
<!--					</div>-->
<!--					<div class="search-right">-->
<!--						<form>-->
<!--							<input type="text"><input type="submit" value="" />-->
<!--						</form>-->
<!--					</div>-->
<!--					<div class="clear"> </div>-->
<!--				</div>-->
<!--				<div class="box">-->
<!---->
<!---->
<!--				--><?php //for($x = 0; $x < count($grids); $x++){?>
<!--				<div class="grids">-->
<!--					<div class="grid">-->
<!--						<h3>--><?//=$grids[$x]->topic?><!--</h3>-->
<!--						<a href="--><?//=$this->config->item('base_url').'adbsdydgh/adfgehstj'.'/'.$grids[$x]->service_name.'/'.$grids[$x]->content_guid?><!--"><img src="--><?//=$this->config->item('image_url').$grids[$x]->picture_path?><!--" title="video-name" /></a>-->
<!--						<div class="time">-->
<!--							<span>00:10</span>-->
<!--						</div>-->
<!--						<div class="grid-info">-->
<!--							<div class="video-share">-->
<!--								<ul>-->
<!--									<li><a href="#"><img src="images/likes.png" title="links" /></a></li>-->
<!--									<li><a href="#"><img src="images/link.png" title="Link" /></a></li>-->
<!--									<li><a href="#"><img src="images/views.png" title="Views" /></a></li>-->
<!--								</ul>-->
<!--							</div>-->
<!--							<div class="video-watch">-->
<!--								<a href="single.html">Watch Now</a>-->
<!--							</div>-->
<!--							<div class="clear"> </div>-->
<!--							<div class="lables">-->
<!--								<p>Labels:<a href="categories.html">--><?//=ucfirst($grids[$x]->service_name)?><!--</a></p>-->
<!--							</div>-->
<!--						</div>-->
<!--					</div>-->
<!---->
<!--				</div>-->
<!--				<div class="clear"> </div>-->
<!--				--><?php //} ?>
<!--			</div>-->
<!--			<div class="clear"> </div>-->
<!--						<div class="clear"> </div>-->
<!--		</div>-->
<!--		<div class="right-content">-->
<!--			<div class="popular">-->
<!--				<h3>Popular Videos</h3>-->
<!--				<p><img src="images/l1.png" title="likes" /> 10,000</p>-->
<!--				<div class="clear"> </div>-->
<!--			</div>-->
<!--			<div class="grid1">-->
<!--						<h3>Consectetur adipisicing elit</h3>-->
<!--						<a href="#"><img src="images/g7.jpg" title="video-name" /></a>-->
<!--						<div class="time1">-->
<!--							<span>2:50</span>-->
<!--						</div>-->
<!---->
<!--						<div class="grid-info">-->
<!--							<div class="video-share">-->
<!--								<ul>-->
<!--									<li><a href="#"><img src="images/likes.png" title="links" /></a></li>-->
<!--									<li><a href="#"><img src="images/link.png" title="Link" /></a></li>-->
<!--									<li><a href="#"><img src="images/views.png" title="Views" /></a></li>-->
<!--								</ul>-->
<!--							</div>-->
<!--							<div class="video-watch">-->
<!--								<a href="#">Watch Now</a>-->
<!--							</div>-->
<!--							<div class="clear"> </div>-->
<!--							<div class="lables">-->
<!--								<p>Labels:<a href="#">Lorem</a></p>-->
<!--							</div>-->
<!--						</div>-->
<!--					</div>-->
<!--					<div class="clear"> </div>-->
<!--					<div class="Recent-Vodeos">-->
<!--						<h3>Recent-Videos</h3>-->
<!--						<div class="video1 video2">-->
<!--							<img src="--><?//=$this->config->item('image_url').$recent[0]->picture_path ?><!--" title="video2" />-->
<!--							<span>--><?//=$recent[0]->topic?><!--</span>-->
<!--							<p>s consectetur adipisicing elit, sed do eiusmod . </p>-->
<!--							<div class="clear"> </div>-->
<!--						</div>-->
<!--						<div class="r-all">-->
<!--							<a href="#">View All</a>-->
<!--						</div>-->
<!--					</div>-->
<!--		</div>-->
<!--		<div class="clear"> </div>-->
<!--		</div>-->
<!--		<div class="clear"> </div>-->
<!--		</div>-->


