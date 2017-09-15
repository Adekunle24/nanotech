
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<base href="<?=$this->config->item('base_url')?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>FootballBlitz</title>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<!--<link href="images/customize.css" rel="stylesheet" type="text/css">-->
<!--<link href="images/bootstrap.css" rel="stylesheet" type="text/css">-->
<link href="css/flag-icon.min.css" rel="stylesheet" type="text/css">
<link href="css/custom.css" rel="stylesheet" type="text/css">

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
</style>
</head>

<body>

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
      <input class=" search-btn" value="Search" type="submit"></form>
    </div>
		
	</td>
	</tr>
    </table>
  </div>

<div class="clearfix">
	<table cellspacing=0 cellpadding=0 width="100%" border=0>
	<tr>	
		<td bgcolor="#fff" align="right"><font size="1" color="#000">* No Browsing Charges</font></td><td bgcolor="#fff" width="10%"></td>
	</tr>
	</table>
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
  

         <h5> My Account : <?=isset($number)? $number:""?></h5> 
      <div class="divider"> </div>
	
  	<div class="videos-list clearfix">		
		<div class="video-name3"> 
		<div class="videos-list clearfix">		
	<div class="video-name3"> 
	</div>
   	</div>	
		<div class="videos-list clearfix">		
	<div class="video-name3"> 
		<table border=0 style="border:0px solid #000;" bgcolor="#eee" align="center" cellspacing=2 cellpadding=5 width="95%">
		  <tr>
			<td  colspan=5 align="center"><h4>Streaming Packs</h4></td>
		  </tr>
		  <tr>
	  		<td>
			<table border=0 style="border:0px solid #eee;" bgcolor="#eee" align="center" cellspacing=2 cellpadding=5 width="100%">
			 
			  <tr>
				<td bgcolor="red" colspan=2 align="center"><a style="cursor:pointer;" <?=isset($number)? "data-toggle='modal' data-target='#modalSignIn'" :""?> ><font size="2px" color="white">₦ 10</font></a></td>
			  </tr>
			  <tr>
				<td bgcolor="#dbd7d7" colspan=2 align="center"><a href=""><font size="2px" color="#000">24hrs <br>Daily</font></a></td>
			  </tr>
			</table>
		</td>
		
		

			<td>
			<table border=0 style="border:0px solid #eee;" bgcolor="#eee" align="center" cellspacing=2 cellpadding=5 width="100%">
			  <tr>
				<td bgcolor="red" colspan=2 align="center"><a href="cg.php?pid=15"><font size="2px" color="white">₦ 50</font></a></td>
			  </tr>
			  <tr>
				<td bgcolor="#dbd7d7" colspan=2 align="center"><a href="cg.php?pid=15"><font size="2px" color="#000">7<br>Days</font></a></td>
			  </tr>
			</table>
		</td>
		<tr>
		</table>
	</div>
   	</div>
	
	
		</div>
	</div>

 <div class="modal fade modal-rotate-from-left" id="modalSignIn" aria-hidden="false" aria-labelledby="modalSignIn"
                  role="dialog" tabindex="-1">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title font-size-16" id="modalSignUpTitle">Welcome!</h4>
                        </div>
                        <div class="modal-body">
    <img class="media-object" width="80" height="50" style="border-radius:50%;margin-left:calc(40%);margin-bottom:5px;" src="images/avatar3.jpg" alt="...">          
            <!-- Form -->
            <form method="post" action="signin/login" class="login">                
              <div class="form-group">
                <label for="username">Username or email address <span class="required">*</span></label>
                <input class="form-control" data-ng-model="loginUsername" required name="user_identity" id="signin-username" type="text">
              </div>
              <div class="form-group">
                <label for="password">Password <span class="required">*</span></label>
                <input class="form-control" required name="password" id="password" type="password">
              </div>              
              <div class="form-group">
                <label for="rememberme" class="inline">
                <input name="rememberme" id="rememberme" type="checkbox">Remember me</label>
                <a href="#">Lost your password?</a>
              </div>
              <button type="submit" id="submit" class="btn btn-common">Login</button>    
            </form>
               </div>
                          <div class="modal-footer">
                          <button type="button" class="btn btn-success margin-0" data-dismiss="modal">Close</button>
                        </div>
                        </div></div></div>	
	
<!-- sports-stars ends here  -->  
  </div>
   <div align="center" style="background-color:#505050; color: #fff; font-size:10px;font-family: 'Lato', sans-serif;  padding:5px; ">T&C &nbsp;&nbsp;|&nbsp;&nbsp; Privacy Policy &nbsp;&nbsp;| &nbsp;&nbsp; FAQ<p></p>Copyright 2016   
  </div> 
   
</div>
<script type="text/javascript" src="images/jquery.js"></script> 
<script type="text/javascript">
           // document.getElementById("asd").onclick = function () {
             //   document.getElementById("beraks-popup").style.display = "none";
               // document.getElementById("black-bg").style.display = "none";
				//document.getElementById("youtubead").src = "";
//	};
</script> 
<script type="text/javascript" src="images/bigSlide.js"></script> 
<script type="text/javascript" src="images/jquery_002.js"> </script> 
<script type="text/javascript" src="images/owl.js"> </script> 
<script type="text/javascript" src="images/commen.js"> </script> 
<script type="text/javascript" src="images/bootstrap.js"> </script>
<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,document,'script','https://connect.facebook.net/en_US/fbevents.js');fbq('init', '1334360433270518');fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"src="https://www.facebook.com/tr?id=1334360433270518&ev=PageView&noscript=1"/></noscript>
<!-- DO NOT MODIFY -->
<!-- End Facebook Pixel Code -->

<!-- Google Analytics -->
</body></html>
 
