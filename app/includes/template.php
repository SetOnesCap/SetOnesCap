<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta name="description" content="The norwegian pop-rock band Set One's Cap's Official Website">
    <meta name="keywords" content="band, norwegian, pop, rock, pop-rock, music, concerts, photos, videos, info, biography">
    <meta name="author" content="Benjamin Dehli">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?php
        if($pageTitle == 'Home' || $pageTitle == '' || $pageTitle == null){
            echo $siteName;
        }
        else {
            echo $pageTitle . " - " . $siteName;
        }
        ?>
    </title>

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="images/touch/chrome-touch-icon-192x192.png">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Web Starter Kit">
    <link rel="apple-touch-icon-precomposed" href="apple-touch-icon-precomposed.png">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#3372DF">

    <!-- Stylesheets -->
    <link rel="stylesheet" type="text/css" href="<?php echo $rootURL; ?>/font-awesome-4.2.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $rootURL; ?>/styles/standard.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $rootURL; ?>/styles/custom.css">

    <base target="_self" />
    <link rel="canonical" href="http://www.setonescap.com/$pageTitle">
</head>
<body class="bg-white">

<script>
    window.fbAsyncInit = function() {
        FB.init({
            appId      : '1526040134335346',
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
<!-- <div
    class="fb-like"
    data-share="true"
    data-width="450"
    data-show-faces="true">
</div> -->



<div class="content">
    <header>
        <nav class="fg-black bg-white fixed">
            <img src="/images/template/bird-nav.png"/>
            <ul class="float-right">
                <?php
                __getLinkList($rootURL);
                ?>
            </ul>
        </nav>
    </header>
    <section class="col-12 fg-black header <?php echo $pageTitle; ?>" data-speed="1.4" data-type="background">
        <div class="header-text bg-white">
            <h1><?php __getTitle($pageId); ?></h1>

        </div>
        <!--    <h1>Set One's Cap<span> Official Website</span></h1>-->


    </section>
    <main>
        <?php include("content/" . $pageFile); ?>
    </main>
    <div class="col-12 bg-noise bg-black fg-white bottom-col">
        <div class="col-12 text-center">
            <h2>Get in touch</h2>
            <a href="https://www.facebook.com/setonescap" class="facebook" title="Check out Set One's Cap at Facebook">
                <span class="fa-stack fa-2x">
                    <i class="fa fa-square-o fa-stack-2x"></i>
                    <i class="fa fa-facebook fa-stack-1x"></i>
                </span>
            </a>
            <a href="https://twitter.com/setonescap" class="twitter" title="Check out Set One's Cap at Twitter">
                <span class="fa-stack fa-2x">
                    <i class="fa fa-square-o fa-stack-2x"></i>
                    <i class="fa fa-twitter fa-stack-1x"></i>
                </span>
            </a>
            <a href="http://instagram.com/setonescap" class="instagram" title="Check out Set One's Cap at Instagram">
                <span class="fa-stack fa-2x">
                    <i class="fa fa-square-o fa-stack-2x"></i>
                    <i class="fa fa-instagram fa-stack-1x"></i>
                </span>
            </a>
            <a href="https://www.youtube.com/user/setonescap" class="youtube" title="Check out Set One's Cap at YouTube">
                <span class="fa-stack fa-2x">
                    <i class="fa fa-square-o fa-stack-2x"></i>
                    <i class="fa fa-youtube fa-stack-1x"></i>
                </span>
            </a>
            <a href="https://soundcloud.com/setonescap" class="soundcloud" title="Check out Set One's Cap at SoundCloud">
                <span class="fa-stack fa-2x">
                    <i class="fa fa-square-o fa-stack-2x"></i>
                    <i class="fa fa-soundcloud fa-stack-1x"></i>
                </span>
            </a>
            <a href="https://plus.google.com/111095056778547378720" rel="publisher" class="google-plus" title="Check out Set One's Cap at Google Plus">
                <span class="fa-stack fa-2x">
                    <i class="fa fa-square-o fa-stack-2x"></i>
                    <i class="fa fa-google-plus fa-stack-1x"></i>
                </span>
            </a>

        </div>
        <div itemscope itemtype="http://data-vocabulary.org/Person" class="col-6">
            <h3>Web:</h3>
            <p><span itemprop="name">Benjamin Dehli</span></p>
            <span itemprop="address" itemscope itemtype="http://data-vocabulary.org/Address">
                <p><span itemprop="street-address">Nustadringen 3</span></p>
                <p><span itemprop="postal-code">3970</span> <span itemprop="locality">Langesund</span></p>
                <p><span itemprop="country-name">Norway</span></p>
            </span>
            <p>Phone: +47 92 29 27 19</p>
            <p>E-mail: post@confusion-band.com</p>
        </div>
        <div itemscope itemtype="http://data-vocabulary.org/Person" class="col-6">
            <h3>Booking:</h3>
            <p><span itemprop="name">Carl-Viktor Guttormsen</span></p>
            <p>Parkveien 1</p>
            <p>3970 Langesund</p>
            <p>Norway</p>
            <p>Phone: +47 90 26 21 60</p>
            <p>E-mail: ConfusionNorway@gmail.com</p>
        </div>


    </div>
    <footer class="fixed-bottom bg-white fg-black">
        <div class="col-4">Copyright © 2014 <a href="http://www.setonescap.com" target="_blank">Set One's Cap</a></div>
        <div class="col-4 text-center">
            Website by: Benjamin Dehli
        </div>
        <div class="col-4 text-right">
            <a href="https://www.facebook.com/setonescap" class="facebook" title="Check out Set One's Cap at Facebook">
                <span class="fa-stack fa-1x">
                    <i class="fa fa-square-o fa-stack-2x"></i>
                    <i class="fa fa-facebook fa-stack-1x"></i>
                </span>
            </a>
            <a href="https://twitter.com/setonescap" class="twitter" title="Check out Set One's Cap at Twitter">
                <span class="fa-stack fa-1x">
                    <i class="fa fa-square-o fa-stack-2x"></i>
                    <i class="fa fa-twitter fa-stack-1x"></i>
                </span>
            </a>
            <a href="http://instagram.com/setonescap" class="instagram" title="Check out Set One's Cap at Instagram">
                <span class="fa-stack fa-1x">
                    <i class="fa fa-square-o fa-stack-2x"></i>
                    <i class="fa fa-instagram fa-stack-1x"></i>
                </span>
            </a>
            <a href="https://www.youtube.com/user/setonescap" class="youtube" title="Check out Set One's Cap at YouTube">
                <span class="fa-stack fa-1x">
                    <i class="fa fa-square-o fa-stack-2x"></i>
                    <i class="fa fa-youtube fa-stack-1x"></i>
                </span>
            </a>
            <a href="https://soundcloud.com/setonescap" class="soundcloud" title="Check out Set One's Cap at SoundCloud">
                <span class="fa-stack fa-1x">
                    <i class="fa fa-square-o fa-stack-2x"></i>
                    <i class="fa fa-soundcloud fa-stack-1x"></i>
                </span>
            </a>
            <a href="https://plus.google.com/111095056778547378720" rel="publisher" class="google-plus" title="Check out Set One's Cap at Google Plus">
                <span class="fa-stack fa-1x">
                    <i class="fa fa-square-o fa-stack-2x"></i>
                    <i class="fa fa-google-plus fa-stack-1x"></i>
                </span>
            </a>

        </div>
    </footer>


    <div class="clearfix"></div>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="/scripts/showPhoto.js"></script>
<script type="text/javascript" src="/scripts/parallax.js"></script>
<script type="text/javascript" src="/scripts/activeLinks.js"></script>
</body>
</html>

