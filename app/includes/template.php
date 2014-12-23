<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
<body>

<div class="content">
    <header>
        <nav class="fg-white">
            <ul>
                <?php
                __getLinkList($rootURL);
                ?>
            </ul>
        </nav>
    </header>



<?php include("content/" . $pageFile); ?>


    <div class="col-12 bg-noise bg-white fg-black">
        <div class="col-3">
            <h2>Booking:</h2>
        </div>
        <div class="col-3">
            <h2>Booking:</h2>
        </div>
        <div class="col-3">
            <h2>Booking:</h2>
        </div>
        <div class="col-3">
            <img src="/images/template/logo-bird.jpg" alt="Set One's Cap Logo" class="center text-center" />
        </div>
    </div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="/scripts/showPhoto.js"></script>
    <script type="text/javascript" src="/scripts/parallax.js"></script>
    <div class="clearfix"></div>
</div>
</body>
</html>

