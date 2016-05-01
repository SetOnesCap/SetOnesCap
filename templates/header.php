<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/environment.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/templates/post.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/templates/track.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/helpers/api.php');

$posts = get_api_content('posts');
usort($posts, function ($a, $b) {
    return -1 * strcmp($a->created_time_unix, $b->created_time_unix);
});

$tracks = get_api_content('tracks');
usort($tracks, function ($a, $b) {
    return -1 * strcmp($a->released_time_unix, $b->released_time_unix);
});


function asset_path($filename)
{
    $manifest_path = $_SERVER['DOCUMENT_ROOT'] . '/rev-manifest.json';

    if (file_exists($manifest_path)) {
        $manifest = json_decode(file_get_contents($manifest_path), TRUE);
    } else {
        $manifest = array();
    }

    if (array_key_exists($filename, $manifest)) {
        return $manifest[$filename];
    }

    return $filename;
}


function sanitize_output($buffer)
{
    $search = array('/\>[^\S ]+/s',  // strip whitespaces after tags, except space
        '/[^\S ]+\</s',  // strip whitespaces before tags, except space
        '/(\s)+/s'       // shorten multiple whitespace sequences
    );
    $replace = array('>', '<', '\\1');
    $buffer = preg_replace($search, $replace, $buffer);
    return $buffer;
}

ob_start("sanitize_output");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Set One's Cap</title>
    <!-- <link rel="stylesheet" type="text/css" href="/assets/css/<?php // echo asset_path('main.css');?>"/>  -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="amphtml" href="http://localhost/amp-page.html">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Lato, Helvetica, Arial, sans-serif;
            -webkit-font-smoothing: antialiased;
            font-size: 12pt;
        }

        .hidden {
            display: none;
            opacity: 0;
        }

        .navbar {
            position: fixed;
            background-color: #be2791;
            width: 100%;
            z-index: 1;
        }

        .navbar ul {
            margin: 0;
        }

        .navbar .logo img {
            height: 40px;
            width: auto;
        }

        .navbar ul li, .navbar ul li a {
            display: inline-block;
        }

        .navbar ul li a {
            color: #fff;
            text-decoration: none;
            text-transform: uppercase;
            margin: 0 -2px;
            font-size: 20px;
            line-height: 58px;
            border-bottom: 6px solid rgba(0, 0, 0, 0);
            padding: 0 16px;
        }

        .left-menu {
            width: 0;
        }

        .left-menu > div {
            overflow: hidden;
        }

        .float-right {
            float: right;
        }

        .z-2 {
            box-shadow: 0 2px 5px rgba(0, 0, 0, .26);
        }

        @media only screen and (min-width: 1160px) {
            .navbar {
                padding: 0 25px;
            }
        }

        .action-button {
            -webkit-border-radius: 50%;
            border-radius: 50%;
            -webkit-box-shadow: 0 6px 10px 0 rgba(0, 0, 0, 0.3);
            box-shadow: 0 6px 10px 0 rgba(0, 0, 0, 0.3);
            cursor: pointer;
            position: fixed;
            width: 56px;
            height: 56px;
            bottom: 16px;
            right: 16px;
            background-color: #be2791;
            z-index: 20;
        }

        .action-menu {
            position: fixed;
            width: 100%;
            bottom: 0;
            right: 58px;
            background-color: #be2791;
            color: #FFF;
            height: 60px;
            bottom: 30px;
            -webkit-box-shadow: 0 6px 10px 0 rgba(0, 0, 0, 0.3);
            box-shadow: 0 6px 10px 0 rgba(0, 0, 0, 0.3);
            width: 0;
            -webkit-transition: all .2s;
            transition: all .2s;
        }

        .action-menu.active{
            width: 100%;
            right: 0;
        }

        .action-menu .toggle-action-button,
        .action-menu .toggle-action-button.active{
            color: transparent;
            background-color: transparent;
        }

        @media (min-width: 768px) {
            .action-button {
                bottom: 32px;
                right: 32px;
            }
        }

        button {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            background: none;
            border: none;
        }

        button:active, button:focus {
            box-shadow: none;
            outline: none;
        }
        .toggle-action-button{
            padding: 0;
            margin-right: -3px;
        }
        .toggle-action-button .icon{
            font-size: 28pt;
            line-height: 60px;
            width: 60px;
        }
        .action-menu.active .toggle-action-button .icon::after {
            color: #FFF;
            opacity: .8;
            -webkit-transition: all .2s;
            transition: all .2s;
        }

        .action-menu.active .toggle-action-button:hover .icon::after,
        .action-menu.active .toggle-action-button.active .icon::after{
            opacity: 1;
        }

        .toggle-action-button.facebook .icon::after {
            content: "\f230";
        }
        .action-menu.active .toggle-action-button.active.facebook {
            background-color: #3b5998;
        }
        .toggle-action-button.twitter .icon::after {
            content: "\f099";
        }
        .action-menu.active .toggle-action-button.active.twitter{
            background-color: #55acee;
        }
        .toggle-action-button.instagram .icon::after {
            content: "\f16d";
        }
        .action-menu.active .toggle-action-button.active.instagram{
            background-color: #125688;
        }
        .toggle-action-button.google .icon::after {
            content: "\f0d5";
        }
        .action-menu.active .toggle-action-button.active.google{
            background-color: #db4437;
        }
    </style>
</head>
<body>

<nav class="navbar z-2">
    <a class="sidenav-toggle hide-big"><i class="fa fa-bars"></i></a>
    <a class="logo"><img src="/assets/images/logo/logo-white.svg"/></a>
    <span class="menu-divider hide-xsmall"></span>
    <span class="hide-big hide-xsmall"></span>
    <div class="main-menu hide-medium hide-small hide-xsmall float-right">
        <div class="menu-link">
            <ul class="">
                <li><a href="?page=index">Home</a></li>
                <li><a href="?page=news">News</a></li>
                <li><a href="?page=concerts">Concerts</a></li>
                <li><a href="?page=music">Music</a></li>
                <li><a href="?page=photos">Photos</a></li>
                <li><a href="?page=videos">Videos</a></li>
                <li><a href="?page=about">About</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="left-menu no-padding">
    <div>
        <div class="sidenav-logo">
            <a class="sidenav-toggle">
                <img src="/assets/images/logo/logo-horizontal.png"/>
                <i class="fa fa-angle-left float-right"></i>
            </a>
        </div>
        <ul class="">
            <li><a href="?page=index">Home</a></li>
            <li><a href="?page=news">News</a></li>
            <li><a href="?page=concerts">Concerts</a></li>
            <li><a href="?page=music">Music</a></li>
            <li><a href="?page=photos">Photos</a></li>
            <li><a href="?page=videos">Videos</a></li>
            <li><a href="?page=about">About</a></li>
        </ul>
    </div>
</div>
<div class="clearfix"></div>
<div class="main-content">