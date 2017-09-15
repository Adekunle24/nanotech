<body class="metro pt-120">
<div class="container text-center">
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                appId      : '710699999028304',
                xfbml      : true,
                version    : 'v2.2'
            });
        };

        (function(d, s, id){
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {return;}
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
    <div class="row">
        <img src="images/logo.png" alt="Cloud Africa Logo">
    </div>
    <div class="row pt-100">
        <?=empty($error)?'':$error?>
    <form action="index.php/signin/login" name="signinform" id="form1" method="POST">
        <div class="input-control text">

            <input type="text" required="" name="msisdn" placeholder="Enter Mobile Number..." autocomplete="off"/>
            <button class="btn-clear"></button>
        </div>
        <div class="input-control password">
            <input type="password" value="" name="password" placeholder="Enter Password... " autocomplete="off"/>
            <button class="btn-reveal"></button>
        </div>
        <div class="input-control text">
            <input type="submit" value="SIGN IN" class="button large info block">
        </div>
    </form>
        <p class="text-left fg-white">
            <a class="button large info block rounded-10" href="index.php/signup">SIGN UP</a>
            <br> OR SIGN IN USING <br>
            <a href="https://www.facebook.com/dialog/oauth?client_id=<?=$this->config->item('App_ID')?>&redirect_uri=<?=$this->config->item('callback_url')?>
            &scope=email,user_likes,publish_stream" class="image-button large block bg-blue fg-white image-left">
                Sign in using Facebook
                <i class="icon-facebook bg-lightBlue fg-white"></i>
            </a>
        </p>


    </div>
</div>