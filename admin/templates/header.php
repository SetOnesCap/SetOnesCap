<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/environment.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/templates/post.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/templates/track.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/helpers/api.php');
function asset_path($filename, $directory)
{
    $manifest_path = $_SERVER['DOCUMENT_ROOT'] . $directory . '/rev-manifest.json';
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
?>

<!DOCTYPE html>
<html>
<head>
    <title>ApiTest</title>
    <link rel="stylesheet" type="text/css" href="/admin/assets/css/<?php echo asset_path('main.css', '/admin');?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>

    </style>
</head>
<body class="admin" id="admin">
<nav class="navbar navbar-dark z-2">
    <a class="sidenav-toggle hide-big"><i class="fa fa-bars"></i></a>
    <a class="logo"><img src="/admin/assets/images/logo/svg/logo-horizontal-white.svg"/>backend</a>
    <span class="menu-divider"></span>
    <span class="hide-xsmall">{{ activePage }}</span>
    <div class="main-menu hide-medium hide-small hide-xsmall float-right">
        <div class="menu-link">
            <ul class="">
                <li v-for="page in pages">
                    <input type="radio" id="{{ page.id }}" value="{{ page.id }}" v-model="activePage">
                    <label for="{{ page.id }}">{{ page.title }}</label>
                </li>
                <li><a href="?page=index">Home</a></li>
                <li><a href="?page=news">News</a></li>

            </ul>
        </div>
    </div>

</nav>
<div class="left-menu no-padding">
    <div>
        <div v-for="page in pages" class="menu-item">
            <input type="radio" id="{{ page.id }}" value="{{ page.id }}" v-model="activePage">
            <label for="{{ page.id }}">{{ page.title }}</label>
        </div>
    </div>
</div>
<div class="clearfix"></div>