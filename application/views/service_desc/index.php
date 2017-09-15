<body class="metro">
<header class="bg-blue" data-load="header.html"><div class="navigation-bar bg-blue">
        <div class="navigation-bar-content container">

            <a href="javascript:history.go(-1)" class="element">
                <i class="icon-arrow-left-2 fg-white place-left"></i> &nbsp; &nbsp;
                <span class="icon-newspaper"></span> <?=strtoupper($category_name)?>  </a>
            <span class="element-divider"></span>
            <a class="element1 pull-menu" href="#"></a>
            <ul class="element-menu">
                <?php
                $icons = array("icon-file","icon-user-3","icon-plus-2","icon-sun","icon-broadcast");
                for ($x = 1; $x < $service_no; $x++) { ?>
                    <li class="<?=$this->utility_model->check($x)?>">
                        <a href="#"><i class="<?=$icons[$x]?>"></i>  <?=$value[$x]->service_name?> </a>
                    </li>
                <?php }?>
                <li class="bg-lightBlue button-dropdown">
                    <a href="#" class="dropdown-toggle"><i class="icon-user"></i> <?=$this->session->userdata("msisdn")?> </a>
                    <ul class="dropdown-menu dark" data-role="dropdown">
                       <!--<li><a href="#"><i class="icon-user-2"></i> My Profile</a></li>-->
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
        <br>
        <div class="page-header">
            <h3 class="fg-white"><i class="icon-newspaper"></i><?=strtoupper($category_name)?> </h3>
            <p class="fg-white"><?php
                $desc =empty($value[0]->category_description)?'No service yet under this category! pls check later':$value[0]->category_description;
                print $desc;
                ?>
            </p>
            <br>
        </div>
        <div class="page-header">
            <p class="fg-white">
                <?=empty($message)?'':$message?>
            </p>
            <br>
        </div>
        <div class="accordion" data-role="accordion">
            <?php
            $color = array("heading bg-indigo fg-white","heading bg-red fg-white","heading bg-lightGreen fg-white","heading bg-blue fg-white",
                              "heading bg-indigo fg-white","heading bg-violet");
            $icons = array("icon-broadcast","icon-file","icon-user-3","icon-plus-2","icon-sun","icon-broadcast");
            for ($x = 0; $x < $service_no; $x++) { ?>
                <div class="accordion-frame">
                    <a href="#" class="<?=$color[$x]?>"><i class="<?=$icons[$x]?>"></i><?=$value[$x]->service_name?></a>
                    <div class="content"><?=$value[$x]->service_description?>
                        <br><br>
                        <form method="post"  action="" autocomplete="off">
                            <input type="hidden" name="service_name" value="<?=$value[$x]->service_name?>">
                            <div class="input-control text">
                                <input type="text" required="" name="msisdn" placeholder="Enter Mobile Number..." autocomplete="off"/>
                                <button class="btn-clear"></button>
                            </div>
                            <div class="input-control text">
                                <input type="submit" value="SUBSCRIBE NOW" class="button large info block">
                            </div>
                        </form>
                        <br>
                        <p>Available to etisalat subscribers only</p>
                    </div>
                </div>
            <?php }?>

            <!--
            <div class="accordion-frame">
                <a href="#" class="heading bg-orange fg-white"><i class="icon-file"></i> GENERAL NEWS</a>
                <div class="content">Short description comes here...</div>
            </div>
            <div class="accordion-frame">
                <a href="#" class="heading bg-lightGreen fg-white"><i class="icon-user-3"></i> FASHION</a>
                <div class="content">Short description comes here...</div>
            </div>
            <div class="accordion-frame">
                <a href="#" class="heading bg-blue fg-white"><i class="icon-plus-2"></i> RELIGIOUS</a>
                <div class="content">Short description comes here...</div>
            </div>
            <div class="accordion-frame">
                <a href="#" class="heading bg-indigo fg-white"><i class="icon-sun"></i> FOOTBALL NEWS</a>
                <div class="content">Short description comes here...</div>
            </div>
            <div class="accordion-frame">
                <a href="#" class="heading bg-violet fg-white"><i class="icon-broadcast"></i> ENTERTAINMENT</a>
                <div class="content">Short description comes here...</div>
            </div>
            -->

        </div>
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
