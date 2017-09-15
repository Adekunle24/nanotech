<body class="metro">
<header class="bg-blue" data-load="header.html"><div class="navigation-bar bg-blue">
        <div class="navigation-bar-content container">

            <a href="javascript:history.go(-1)" class="element">
                <i class="icon-arrow-left-2 fg-white place-left"></i> &nbsp; &nbsp;
                <span class="icon-newspaper"></span> Go back  </a>
            <span class="element-divider"></span>
            <a class="element1 pull-menu" href="#"></a>
            <ul class="element-menu">
                <li class="bg-lightBlue button-dropdown">
                    <a href="#" class="dropdown-toggle"><i class="icon-user"></i> <?=$this->session->userdata("msisdn")?> </a>
                    <ul class="dropdown-menu dark" data-role="dropdown">
                        <li><a href="dashboard"><i class="icon-user-2"></i>Dashboard</a></li>
                        <li class="divider"></li>
                        <li><a href="subscriptions"><i class="icon-support"></i> My Subscriptions</a></li>
                        <li class="divider"></li>
                        <!-- <li><a href="pageComing.html"><i class="icon-cog"></i> Settings</a></li>-->
                        <li><a href="logout"><i class="icon-exit"></i> Logout</a></li>
                    </ul>
                </li>

            </ul>

        </div>
    </div>
</header>

<div class="container text-center">
    <div class="row text-justify">

        <h2 class="fg-white"> MY SUBSCRIPTIONS</h2>
        <br>
        <div class="notice bg-lightGreen marker-on-left">
            <div class="listview-outlook" data-role="listview">
                <?php
                if ($notfound=='DB00'){?>
                    <div class="page-header">
                        <p class="fg-white">
                           No subcription found for this mobile
                        </p>
                        <br>
                    </div>

                <?php }else{
                $icons = array("","icon-credit-card","icon-coin","icon-plus-2","icon-book","icon-broadcast","icon-smiley");
                for ($x = 0; $x < $service_no; $x++) { ?>
                <a class="list marked" href="#">
                    <div class="list-content fg-white">
                        <span class="list-title"><i class="icon-newspaper"></i> <?=$value[$x]->service?></span>
                        <span class="list-subtitle">Subscribed on <?=$value[$x]->subscriptionDate?></span>
                        <span class="list-subtitle">Next subscription date <?=$value[$x]->nextSubscriptionDate?></span>
                    </div>
                </a>
                <?php }}?>
                <!--
                <a class="list marked" href="#">
                    <div class="list-content fg-white">
                        <span class="list-title"><i class="icon-music"></i> MUSIC</span>
                        <span class="list-subtitle">Subscribed on 26/11/2014</span>
                    </div>
                </a>
                <a class="list marked" href="#">
                    <div class="list-content fg-white">
                        <span class="list-title"><i class="icon-coins"></i> MICRO INSURANCE</span>
                        <span class="list-subtitle">Subscribed on 27/11/2014</span>
                    </div>
                </a>
                <a class="list marked" href="#">
                    <div class="list-content fg-white">
                        <span class="list-title"><i class="icon-credit-card"></i> SMS SUB</span>
                        <span class="list-subtitle">Subscribed on 29/11/2014</span>
                    </div>
                </a>
                <a class="list marked" href="#">
                    <div class="list-content fg-white">
                        <span class="list-title"><i class="icon-book"></i> E-LEARNING</span>
                        <span class="list-subtitle">Subscribed on 29/11/2014</span>
                    </div>
                </a>-->
            </div>
        </div>

        <br>
        <!--
        <h2 class="fg-white"> PENDING SUBSCRIPTIONS</h2>
        <div class="notice bg-yellow marker-on-left">

            <br>
            <div class="listview-outlook" data-role="listview">
                <a class="list marked" href="#">
                    <div class="list-content fg-white">
                        <span class="list-title"><i class="icon-camera-2"></i> VIDEO</span>
                        <span class="list-subtitle">Please subscribe soon...</span>
                    </div>
                </a>
                <a class="list marked" href="#">
                    <div class="list-content fg-white">
                        <span class="list-title"><i class="icon-coins"></i> COUPON / DISCOUNT</span>
                        <span class="list-subtitle">Please subscribe soon...</span>
                    </div>
                </a>
                <a class="list marked" href="#">
                    <div class="list-content fg-white">
                        <span class="list-title"><i class="icon-smiley"></i> RBT</span>
                        <span class="list-subtitle">Please subscribe soon...</span>
                    </div>
                </a>
                <a class="list marked" href="#">
                    <div class="list-content fg-white">
                        <span class="list-title"><i class="icon-credit-card"></i> BIDDING</span>
                        <span class="list-subtitle">Please subscribe soon...</span>
                    </div>
                </a>

        </div>

            </div>-->
        <br>
        <!-- <p> Thanks! You have subscribed already... </p>

         <br>
         <a class="button large primary block" href="newsRead.html">PROCEED</a>
            -->

        <br>
        <br>
        <br>


        <p class="text-center">powered by <span class="fg-lighterBlue"><small>  CLOUD AFRICA VAS mobile portal</small> </span></p>
    </div>



</div>
