<section id="portfolio" class="section">

    <div id="portfolio-list">
        <div class="container">
            <div class="row">
                <?php for($x = 0; $x < count($grids); $x++){?>
                    <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12 mix buildings interior">
                        <div class="portfolio-item">
                            <img src="<?=$this->config->item('image_url').$grids[$x]->picture_path?>" title="video-name" height="450"/>
                            <div class="overlay">
                                <div class="icon">
                                    <a href="single-project.html"><i class="fa fa-thumbs-up left"></i></a>
                                    <a href="<?=$this->config->item('image_url').$grids[$x]->picture_path?>" class="lightbox"><i class="fa fa-play-circle right"></i></a>
                                </div>
                            </div>
                            <div class="content">
                                <h3><a href="#"><?=$grids[$x]->topic?></a></h3>
                                <p><?=ucfirst($grids[$x]->service_name)?></p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>