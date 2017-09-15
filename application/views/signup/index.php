<body class="metro pt-100">
<div class="container text-center">
    <div class="row">
        <img src="images/logo.png" alt="Cloud Africa Logo">
    </div>
    <div class="row pt-50">
<form action="index.php/signup/create" method="post">
    <!--
        <div class="input-control text">
            <input type="text" value="" placeholder="Enter First Name..."/>
            <button class="btn-clear"></button>
        </div>
        <div class="input-control text">
            <input type="text" value="" placeholder="Enter Last Name..."/>
            <button class="btn-clear"></button>
        </div>
        <div class="input-control text">
            <input type="text" value="" placeholder="Enter Mobile Number..."/>
            <button class="btn-clear"></button>
        </div>
        <div class="input-control text">
            <input type="email" value="" placeholder="Enter Email Address..."/>
            <button class="btn-clear"></button>
        </div>
        <div class="input-control password">
            <input type="password" value="" placeholder="Enter Password..."/>
            <button class="btn-reveal"></button>
        </div>
        <div class="input-control password">
            <input type="password" value="" placeholder="Confirm Password..."/>
            <button class="btn-reveal"></button>
        </div>-->
    <?=empty($error)?'':$error?>
    <p style="color: red"><?=validation_errors()?></p>
    <p style="color: red"><?=empty($message)?'':$message?> </p>
    <div class="input-control text">
        <input type="text" name="msisdn" value="" placeholder="Enter Mobile Number..." />
        <button class="btn-clear"></button>
    </div>
    <div class="input-control text">
        <input type="email" name="email" value="" placeholder="Enter email address..." pattern="^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$" />
        <button class="btn-clear"></button>
    </div>
    <div class="input-control password">
    <input type="password" value="" name="password" placeholder="Enter Password..."/>
    <button class="btn-reveal"></button>
    </div>
    <div class="input-control password">
        <input type="password" value="" name="cpassword" placeholder="Confirm Password..."/>
        <button class="btn-reveal"></button>
    </div>
    <div class="input-control text">
        <input type="submit" value="SIGN UP" class="button large info block">
    </div>

     <!--   <a class="button large info block" href="subscribe.html">SIGN UP</a>-->
</form>
        <p class="text-left fg-white">
            <a class="button large info block rounded-10" href="index.php/signin">SIGN IN</a>
            <br> OR SIGN IN USING <br>
            <a href="https://www.facebook.com/dialog/oauth?client_id=<?=$this->config->item('App_ID')?>&redirect_uri=<?=$this->config->item('callback_url')?>
            &scope=email,user_likes,publish_stream" class="image-button large block bg-blue fg-white image-left">
                Sign in using Facebook
                <i class="icon-facebook bg-lightBlue fg-white"></i>
            </a>
        </p>

    </div>
</div>
