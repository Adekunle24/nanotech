<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <base href="<?=$this->config->item("base_url")?>"/>
    <title><?=$title?> |  FootballBLitz</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!---Custom CSS-->
    <link rel="stylesheet" href="css/custom.css" type="text/css">
    <!---BootStrap CSS-->
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
    <!---Menu CSS-->
    <link rel="stylesheet" href="css/mega-menu.css" type="text/css">
    <!---Theme Color CSS-->
    <link rel="stylesheet" href="css/theme-color.css" type="text/css">
    <!---Responsive CSS-->
    <link rel="stylesheet" href="css/responsive.css" type="text/css">
    <!---Owl Slider CSS-->
    <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
    <!---BxSlider CSS-->
    <link rel="stylesheet" href="css/jquery.bxslider.css" type="text/css">
    <!---Font Awesome CSS-->
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <!---PrettyPhoto CSS-->
    <link rel="stylesheet" href="css/prettyPhoto.css" type="text/css">
    <!---Audio Player CSS-->
    <link rel="stylesheet" href="css/audioplayer.css" type="text/css">

    <!---Font Family Roboto CSS-->
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900' rel='stylesheet' type='text/css'>
</head>
<body>

<!--Wrapper Content Start-->
<div id="wrapper">
    <!--Header Start-->
    <header class="cp_header">
        <!--Navigation Start-->
        <div class="cp-navigation-row">
            <!--Side Bar Menu Start-->
            <div id="cp_side-menu"> <span id="cp-close-btn"><a href="#"><i class="fa fa-times"></i></a></span>
                <div class="cp_side-navigation">
                    <ul class="cp-social-links">
                        <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-heart-o"></i></a></li>
                        <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                        <li><a href="#"><i class="fa fa-rss"></i></a></li>
                    </ul>
                    <div class="cp-right-outer">
                        <ul class="navbar-nav">
                         <li><a href="<?=site_url('dashboard')?>">dashboard</a> </li>
                            <?php for($x = 0; $x < 5; $x++){?>
                                <li><a href="<?=$this->config->item('base_url')?>showmore/view/<?=$category_value[$x]->id."/".$category_value[$x]->service_name?>"><?=$category_value[$x]->service_name?></a> </li>
                            <?php } ?>
                        </ul>
                        <form action="<?=site_url('search/view')?>" method="get" class="cp-search-form-outer">
                            <div class="cp-search-form-outer">
                                <input name = "keyword" type="text" placeholder="Search..." required>
                                <button class="btn-submit" type="submit"><i class="fa fa-search"></i></button>
                            </div>
                            <label>... or choose a category on right.</label>
                        </form>
                    </div>
                </div>
            </div>
            <!--Side Bar Menu End-->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-9 col-sm-8 col-xs-12">
                        <!--Sidebar Menu Button -->
                        <div id="cp_side-menu-btn" class="cp_side-menu"> <a href="#" class=""><i class="fa fa-bars"></i></a> </div>
                        <!--Sidebar Menu Button End-->

                        <!--Logo Start-->
                        <strong class="cp-logo"> <a href="<?=site_url('dashboard')?>"><img src="images/footy.png" alt=""></a> </strong>
                        <!--Logo End-->
                        <!--Nav Holder Start-->
                        <div class="cp-nav-holder">
                            <div class="cp-megamenu">
                                <div class="cp-mega-menu">
                                    <label for="mobile-button"> <img src="images/menu-bar.png" alt=""> </label>
                                    <!-- mobile click button to show menu -->
                                    <input id="mobile-button" type="checkbox">
                                    <ul class="main-menu">
                                        <li><a href="<?=site_url('dashboard')?>">Dashboard</a> </li>
                                        <?php for($x = 0; $x < 7; $x++){?>
                                            <li><a href="<?=$this->config->item('base_url')?>showmore/view/<?=$category_value[$x]->id."/".$category_value[$x]->service_name?>"><?=$category_value[$x]->service_name?></a> </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--Nav Holder End-->
                    </div>
                    <div class="col-md-3 col-sm-4 col-xs-12">
                        <!--Right Holder Start-->
                        <div class="cp-right-holder">
                            <ul class="cp-social-links">
                                <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-heart-o"></i></a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                                <li><a href="#"><i class="fa fa-rss"></i></a></li>
                                <li class="cp-search-holder"><i class="fa fa-search"></i>
                                    <form action="<?=site_url('search/view')?>" method="get" class="cp-search-form-outer">
                                        <input type="text" name = "keyword" placeholder="Search..." required>
                                        <button class="btn-submit" type="submit"><i class="fa fa-search"></i></button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                        <!--Right Holder End-->
                    </div>
                </div>
            </div>
        </div>
        <!--Navigation End-->
    </header>
    <!--Header End-->

