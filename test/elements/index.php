<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/environment.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/templates/post.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/templates/track.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/helpers/api.php');
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

?>

<!DOCTYPE html>
<html>
<head>
    <title>Elements</title>
    <link rel="stylesheet" type="text/css" href="/assets/css/<?php echo asset_path('main.css'); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .input-group.inline label {
            margin-right: 1em;
        }
        .main-menu{
            display: inline-block;
        }
        .main-menu .menu-link{
            display: inline-block;
        }
        .main-menu .menu-link label{
            display: inline-block;
            line-height: 58px;
            vertical-align: bottom;
            border-bottom: 6px solid transparent;
            padding: 0 10px;
        }
        .main-menu input[type="radio"]{
            display: none;
        }
        .main-menu input[type="radio"]:checked + label{
            border-bottom: 6px solid #be2791;
        }


    </style>

</head>
<body id="elements">
<nav class="navbar z-2">
    <a class="sidenav-toggle hide-big"><i class="fa fa-bars"></i></a>
    <a class="logo"><img src="/assets/images/logo/logo-horizontal.png"/></a>
    <span class="menu-divider"></span>
    <span class="hide-big">{{ activePage }}</span>
    <div class="main-menu hide-medium hide-small hide-xsmall float-right">
        <div v-for="page in pages" class="menu-link">
            <input type="radio" id="{{ page.url }}" value="{{ page.url }}" v-model="activePage">
            <label for="{{ page.url }}">{{ page.title }}</label>
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
        <div v-for="page in pages">
            <input type="radio" id="{{ page.url }}" value="{{ page.url }}" v-model="activePage">
            <label for="{{ page.url }}">{{ page.title }}</label>
        </div>
    </div>
</div>
<div class="clearfix"></div>

<div class="main-content">
    <div class="container">
        <div v-show="activePage == 'form-elements'">
            <?php include_once("elements/form-elements.php"); ?>
        </div>
        <div v-show="activePage == 'buttons'">
            <?php include_once("elements/buttons.php"); ?>
        </div>
        <div v-show="activePage == 'boxes'">
            <?php include_once("elements/boxes.php"); ?>
        </div>
    </div>
</div>
<script type="text/javascript" src="/assets/js/<?php echo asset_path('main.js'); ?>"></script>
<script type="text/javascript" src="/bower_components/vue/dist/vue.min.js"></script>
<script type="text/javascript" src="/test/elements/elements.js"></script>
<script>
    $(".input-group input").change(function () {
        console.log("change");
        $(this).removeClass("is-not-empty");
        if ($(this).val() == "") {
        } else {
            $(this).addClass("is-not-empty");
        }
    });
    /*$(".sidenav-toggle").click(function () {
        if ($("body").hasClass("sidebar-active")) {
            $("body").removeClass("sidebar-active");
        } else {
            $("body").addClass("sidebar-active");
        }
    });*/
</script>
</body>
</html>