<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta name="description" content="<?php echo $pageDescription; ?>">
    <meta name="keywords" content="band, norwegian, pop, rock, pop-rock, music, concerts, photos, videos, info, biography">
    <meta name="author" content="Benjamin Dehli">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="icon" type="image/x-icon" href="/favicon.ico" />


    <title>
        <?php
        if($pageTitleString == 'Home' || $pageTitleString == '' || $pageTitleString == null){
            echo $siteName;
        }
        else {
            echo $pageTitleString . " - " . $siteName;
        }
        ?>
    </title>

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="/images/touch/chrome-touch-icon-192x192.png">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Web Starter Kit">
    <link rel="apple-touch-icon-precomposed" href="apple-touch-icon-precomposed.png">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="/images/touch/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#3372DF">

    <!-- Stylesheets -->
    <link rel="stylesheet" type="text/css" href="/font-awesome-4.2.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/styles/standard.css">
    <link rel="stylesheet" type="text/css" href="/styles/custom.css">
    <link rel="stylesheet" href="/styles/slicknav.css">


    <base target="_self" />

    <link rel="canonical" href="http://www.setonescap.com/<?php echo $pageTitle; ?>">

    <meta property="og:site_name" content="Set One's Cap"/>
    <meta property="og:title" content="The norwegian pop-rock band Set One's Cap's Official Website" />
    <meta property="og:url" content="http://www.setonescap.com" />
    <meta property="og:description" content="The norwegian pop-rock band Set One's Cap's Official Website. Visit setonescap.com to view photos, watch videos, get the latest news and see upcoming concerts." />
    <meta property="og:image" content="http://www.setonescap.com/images/template/fb-card.jpg" />

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@setonescap">
    <meta name="twitter:creator" content="@BenjaminDehli">
    <meta name="twitter:title" content="Set One's Cap Official Website">
    <meta name="twitter:description" content="The norwegian pop-rock band Set One's Cap's Official Website. Visit setonescap.com to view photos, watch videos, get the latest news and see upcoming concerts.">
    <meta name="twitter:image:src" content="http://www.setonescap.com/images/photos/big/marceli-szelag/setonescap-Rockefeller-2014-10-30-20.jpg">


    <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js"></script>
</head>
<body class="bg-white">