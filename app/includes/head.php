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
        if($pageTitle == 'home' || $pageTitle == '' || $pageTitle == null){
            echo ucfirst($siteName);
        }
        else {
            echo ucfirst($pageTitle) . " - " . $siteName;
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
    <link rel="stylesheet" href="<?php echo $rootURL; ?>/styles/slicknav.css">


    <base target="_self" />
    <link rel="canonical" href="http://www.setonescap.com/$pageTitle">


    <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js"></script>
</head>