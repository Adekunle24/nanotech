
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<base href="<?=$this->config->item('base_url')?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>FootballBlitz</title>
<link href="images/bootstrap.css" rel="stylesheet" type="text/css">
<link href="images/customize.css" rel="stylesheet" type="text/css">
<link href="css/flag-icon.min.css" rel="stylesheet" type="text/css">
<link href="css/main.css" rel="stylesheet" type="text/css">

<style>

.nav-tabs > li > a:hover {
  position: relative;
  overflow: hidden;
  color: #fff;
  background-color:#ababab;
  /*font-size: 19px;
  line-height: 20px;*/
  margin: 0px;
  /*padding: 8px 2px;*/
  font-weight: bold;
}

.nav-tabs li.active label {
  background-color: #fff;
  color: #505050;
}
.app-color-bg{
    color:#fff;
    background-color:#a80d1f;
}
.app-color-bg:hover{
    color:#a80d1f;
    background-color:#fff;
    border: 1px solid #a80d1f;
   
}
.app-color{
     color:#a80d1f;
    background-color:#fff;
    border: 1px solid #a80d1f !important;
}
.round{
 border-radius:34px !important;
}
</style>
</head>

<body data-ng-app="myApp" data-ng-controller="myController">

<div style="right: 0px; transition: right 300ms ease 0s;" class="page-content wrap push">

  <!-- Navigation and search starts here 1. -->
  <div class="header clearfix">
    <table border=0 cellspacing=0 cellpadding=0 width="100%">
	<tr>
		<td width="50%"><img width="50%" style="height:80px !important;" src="images/football.png"></a>
			<a href="#menu" class="menu-btn menu-link"> <img src="images/menu-btn.png"> </a>
    <nav style="position: fixed; top: 0px; bottom: 0px; height: 100%; right: -200px; width: 200px; transition: right 300ms ease 0s;" id="menu" class="panel" role="navigation"> <a href="#menu" class="menu-link"> <h5>X</h5> </a>
      <div id="accordion2" class="accordion"><p>&nbsp;</p>
        <div class="accordion-heading"><a href="myaccount.php" class="accordion-toggle"><h5>My Account</h5></a></div>       
        <!--<div class="accordion-heading"><a href="main.php" class="accordion-toggle">Celeb Gist</a></div>-->
        <?php for($x=0; $x < count($category_value); $x++){ ?>
    <div class="accordion-heading"><a href="<?=site_url('dashboard/index')."?category=".$category_value[$x]->id?>" style="<?php if($active_category==$category_value[$x]->id){ echo 'color:white';}?>" class="accordion-toggle"><?=$category_value[$x]->category_name?></a></div>     
        <?php } ?>      
      </div>
    </nav>
    <div class="search"> <a role="button" > </a> </div>
    <div class="clearfix"> </div>
    <div class="search-field">
      <form action="<?=site_url('search/view')?>" method="GET">
      <input class="input-block-level" placeholder="What are you looking for?" name="keyword" type="text">
      <input class="input-block-level search-btn" value="Search" type="submit"></form>
    </div>
		
	</td>
	</tr>
    </table>
    
  </div>

<div class="clearfix">
</div


<!-- Navigation and search ends here 1.-->  
  <div class="clearfix"> </div>
  <ul class="nav nav-tabs" id="myTab">
        <li style="color:black;width:<?= 100/count($category_value)?>%" class="<?php if($active_category==2){ echo 'active white';}?>"><a  style="color:black;" href="<?=site_url('dashboard')?>">    <span style="padding-bottom:31px;" class="flag-icon flag-icon-gb"></span> <br><?=$category_value[0]->category_name?></a></li>
        <li style="color:black !important;width:<?=100/count($category_value)?>%"   class="<?php if($active_category==3){ echo 'active white';}?>"><a  style="color:black;" href="<?=site_url('dashboard/index')."?category=".$category_value[1]->id?>"><span style="padding-bottom:31px;" class="flag-icon flag-icon-es "></span><br><?=$category_value[1]->category_name?></a></li>
    <li style="color:black !important;width:<?=100/count($category_value)?>%"  class="<?php if($active_category==4){ echo 'active white';}?>"><a  style="color:black;" href="<?=site_url('dashboard/index')."?category=".$category_value[2]->id?>"><span style="padding-bottom:31px;" class="flag-icon flag-icon-us "></span><br><?=$category_value[2]->category_name?></a></li>
   <li style="color:black !important;width:<?=100/count($category_value)?>%"  class="<?php if($active_category==5){ echo 'active white';}?>"><a  style="color:black;" href="<?=site_url('dashboard/index')."?category=".$category_value[3]->id?>"><span style="padding-bottom:31px;" class="flag-icon flag-icon-de "></span><br><?=$category_value[3]->category_name?></a></li>
   <li style="color:black !important;width:<?=100/count($category_value)?>%"  class="<?php if($active_category==10){ echo 'active white';}?>"><a  style="color:black;" href="<?=site_url('dashboard/index')."?category=".$category_value[4]->id?>"><span style="padding-bottom:31px;" class="flag-icon flag-icon-fk "></span><br><?=$category_value[4]->category_name?></a></li>
  <li style="color:black !important;width:<?=100/count($category_value)?>%"  class="<?php if($active_category==11){ echo 'active white';}?>"><a  style="color:black;" href="<?=site_url('dashboard/index')."?category=".$category_value[5]->id?>"><span style="padding-bottom:31px;" class="flag-icon flag-icon-it "></span><br><?=$category_value[5]->category_name?></a></li>
<li style="color:black !important;width:<?=100/count($category_value)?>%"  class="<?php if($active_category==15){ echo 'active white';}?>"><a  style="color:black;" href="<?=site_url('dashboard/index')."?category=".$category_value[6]->id?>"><span style="padding-bottom:31px;" class="flag-icon flag-icon-ck "></span><br><?=$category_value[6]->category_name?></a></li>
 
</ul>
  
  <div align="center" class="bgc" style="background-color: #45b649;color:#fff!important;font-size:13px;">
  	<table width="100%" border=0 cellspacing=0 cellpadding=5>
		<tr>
            <?php for($x=0;$x < count($services); $x++){ ?>
		<td width="20%" style="height:45px" valign="middle" align="center" ><a style="color:white;" href="<?=site_url('dashboard/view')."?service=".$services[$x]->id?>"><?=$services[$x]->service_name?></a></td>
		<td width="5%" valign="middle" style="display:<?=($x<count($services)-1)?"":"none"?>" align="center" ><a style="color:white;" href="#"><img src="images/line_wht.png" border=0></a></td>
		  <?php } ?>
		</tr>
	</table>
  </div>


  <!-- Slider starts here 2. 
  <div class="banner-slider">
    <div style="max-width: 100%;" class="bx-wrapper">
    	
    	<div style="width: 100%; overflow: hidden; position: relative; height: auto;" class="bx-viewport">
    	<ul style="width: 715%; position: relative; transition-duration: 0s; transform: translate3d(-400px, 0px, 0px);" class="bxslider">
    	   <li class="bx-clone" style="float: left; list-style: outside none none; position: relative; width: 400px;"><img src="images/b2.jpg"> </li>
	   <li class="bx-clone" style="float: left; list-style: outside none none; position: relative; width: 400px;"><img src="images/b1.jpg"> </li>
	   <li style="float: left; list-style: outside none none; position: relative; width: 400px;"><img src="images/banner-img1.jpg"> </li>      
        </ul>
    	</div>    
    </div>  
  </div>
  <!-- Slider ends here 2. -->
  
   
  <div class="clearfix"> 
	<!--<table cellspacing=0 cellpadding=0 width="100%" border=0>
	<tr>	
		<td bgcolor="grey" align="left" height="30">Tranding</td>
		<td bgcolor="grey" align="left" height="30">Latest Music</td>
	</tr>
	</table>-->
  </div>
    
  <div class="tab-content" id="myTabContent">
  		
      		
  
    <!-- Video Music ends here  -->
    <div id="music"  class="tab-pane fade in active">
      <div class="divider2"> </div>
      	
    <?php for($x=0; $x < count($recent);$x++){ ?>
		<div class="videos-list clearfix">
		<div class="video-thumb"> <a href="<?=site_url('info/view/')."/".$recent[$x]->content_guid?>"><i class="fa fa-play-circle-o"></i> <img  src="<?=$this->config->item('image_url').$recent[$x]->picture_path ?>" width="350" height="180"> </a> </div>
		<div class="video-name"><br><a href="<?=site_url('info/view')."/".$recent[$x]->content_guid?>"><font size="2px" color="#000"><?=$recent[$x]->service_name?></font></a><p><font size="2px" ><i><?=$recent[$x]->caption?></i></font></p>
		  <p><font size="2px" ><?=$recent[$x]->date_played?></font></p>
		
		</div>
	      	</div>
    <?php } ?>
   
    <!-- Video Music ends here  -->
    <!--Begin Ajax Load More -->
    <div data-ng-repeat="tray in VideoTray" >
      
      <div data-ng-repeat="service in tray">
<div data-ng-repeat="product in service" class="videos-list clearfix">
		<div class="video-thumb"> <a href="<?=site_url('info/view')?>/{{product.content_guid}}"><i class="fa fa-play-circle-o"></i> <img  src="<?=$this->config->item('image_url')?>{{product.picture_path}}" width="350" height="180"> </a> </div>
		<div class="video-name"><br><a href="<?=site_url('info/view')?>/{{product.content_guid}}"><font size="2px" color="#000"> {{product.service_name}}    </font></a><p><font size="2px" ><i> {{product.caption}} </i></font></p>
		  <p><font size="2px" > {{product.date_played}}     </font></p>
		</div>
          </div>
          </div>
</div>
    <!-- End Ajax Load More -->
     </div> 
    <div class="row">
      <div class="col-md-12" style="text-align:center;">
        <h4 style="" class="label label-info input-block-level" data-ng-show="ajax_error">An error occurred</h4>
       <div>  <h3 style="padding:10px;" class="label input-block-level app-color" data-ng-show="ajax_empty">No more Videos to display <span data-ng-click="closeAjaxEmpty()" style="float:right;margin-top:-10px;cursor:pointer;"><i class="fa fa-close"></i></span></h3> </div>
      <button data-ng-click="loadMore()" style="width:65%;padding:15px;margin:10px;" class="app-color-bg round">   Load More   </button>
      <img width="40" data-ng-show="ajax_loader" height="40" src="images/bx_loader.gif"/>
      </div>
      </div>
    
  </div>
  <footer >
   <div align="center" style="background-color:#505050; color: #fff; font-size:10px;font-family: 'Lato', sans-serif;  padding:10px; "><a style="cursor:pointer;color:white;" data-toggle="modal" data-target="#modalTermsAndConditions">T&C &nbsp;&nbsp;</a>| &nbsp;&nbsp; FAQ <p></p>Copyright 2017   
  </div> 
   </footer>
   <!--Terms and Conditions -->
    <div class="modal fade modal-rotate-from-left" id="modalTermsAndConditions" aria-hidden="false" aria-labelledby="modalSignIn"
                  role="dialog" tabindex="-1">
                    <div class="modal-dialog" >
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title font-size-16" id="modalSignUpTitle">Terms & Conditions</h4>
                        </div>
                        <div class="modal-body">
            <!-- Form -->
           By using Footballblitz services you are agreeing to be bound by the following terms and conditions (“Terms of Service”). 
           Footballblitz reserves the right to update and change the Terms of Service by posting updates and changes to this website.
            You are advised to check the Terms of Service from time to time for any updates or changes that may impact you.
            <div><h6>1. Account Terms</h6></div>
            <div>1. To access and use this Service, you are required to browse the website via a data-enabled MTN sim. 
              Footballblitz may restrict your access to the content of this website, for any reason, in our sole discretion.</div>
              <div>
                2. No account registration is required as your MTN sim is used as a means of identification
              </div>
              <div><h6>2. Subscription Payment</h6></div>
<div>1. You acknowledge that Footballblitz will use your MTN sim through you're browsing the website as the primary method for Payment if you wish to subscribe.</div>
<div>2. An equivalent of NGN 10 will be charged on your MTN sim for daily subscription </div>
<div>2. An equivalent of NGN 50 will be charged on your MTN sim for weekly subscription </div>
<div><h6>3. Footballblitz Rights</h6></div>
<div>We reserve the right to modify or terminate the Service for any reason, without notice at any time.</div>
<div>We reserve the right to refuse service to anyone for any reason at any time</div>
               </div>
                          <div class="modal-footer">
                          <button type="button" class="btn btn-success margin-0" data-dismiss="modal">Close</button>
                        </div>
                        </div></div></div>
                        <!--End Terms and Conditions -->
</div>
<script type="text/javascript" src="images/jquery.js"></script> 
<script type="text/javascript" src="images/bigSlide.js"></script> 
<script type="text/javascript" src="images/jquery_002.js"> </script> 
<script type="text/javascript" src="images/owl.js"> </script> 
<script type="text/javascript" src="images/commen.js"> </script> 
<script type="text/javascript" src="images/bootstrap.js"> </script>
<script type="text/javascript" src="js/angular.js"> </script>

<script type="text/javascript" >
var app = angular.module("myApp",[]);
app.controller("myController",function($http,$scope,$timeout)
{
$scope.ajax_loader = false;
$scope.VideoTray = [];
$scope.ajax_error = false;
$scope.page = 10;
$scope.ajax_empty = false;
$scope.category = <?=$active_category?>;
$scope.closeAjaxEmpty = function(){$scope.ajax_empty = false;
  };
$scope.loadMore = function(){
  if($scope.category==0)
  {
     $scope.categoryRequest = "<?=site_url('dashboard/ajax_default_feed')?>"+"/"+$scope.category+"/"+$scope.page; 
  }
  else{
if(<?=$view_mode?> == 1)//request made on category view
{
  $scope.categoryRequest = "<?=site_url('dashboard/ajax_category_feed')?>"+"/"+$scope.category+"/"+$scope.page;
}
else if(<?=$view_mode?>==2)
{
  $scope.service = <?=$active_service?>;
  $scope.categoryRequest = "<?=site_url('dashboard/ajax_service_feed')?>"+"/"+$scope.service+"/"+$scope.page;
}
  }
  $scope.ajax_loader = true;
  $http.get($scope.categoryRequest).success(
function(response){
if(response!=0)
{
  $scope.VideoTray.push(response);
$scope.page = $scope.page +5;
}
else{
  $scope.ajax_empty = true;
}
$scope.ajax_loader = false;
}).error(
  function(response){

$scope.ajax_error = true;
$scope.ajax_loader = false;
$timeout(function(){$scope.ajax_error = false;},5000);
  });
};
});


</script>
<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,document,'script','https://connect.facebook.net/en_US/fbevents.js');fbq('init', '1334360433270518');fbq('track', 'PageView');
</script>
<!-- DO NOT MODIFY -->
<!-- End Facebook Pixel Code -->

<!-- Google Analytics -->

</body></html>
 
