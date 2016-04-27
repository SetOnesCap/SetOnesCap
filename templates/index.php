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
    <title>ApiTest</title>
    <!-- <link rel="stylesheet" type="text/css" href="/assets/css/<?php // echo asset_path('main.css');?>"/>  -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="amphtml" href="http://localhost/amp-page.html">
    <style>
        .hidden {
            display: none;
            opacity: 0;
        }
    </style>
</head>
<body>

<nav class="navbar z-2">
    <a class="sidenav-toggle hide-big"><i class="fa fa-bars"></i></a>
    <a class="logo"><img src="/assets/images/logo/logo-horizontal.png"/></a>
    <span class="menu-divider"></span>
    <span class="hide-big">{{ activePage }}</span>
    <div class="main-menu hide-medium hide-small hide-xsmall float-right">
        <div class="menu-link">
            <ul class="">
                <li><a href="#">Home</a></li>
                <li><a href="#">News</a></li>
                <li><a href="#">Concerts</a></li>
                <li><a href="#">Music</a></li>
                <li><a href="#">Photos</a></li>
                <li><a href="#">Videos</a></li>
                <li><a href="#">About</a></li>
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
        <div v-for="page in pages">
            <input type="radio" id="{{ page.url }}" value="{{ page.url }}" v-model="activePage">
            <label for="{{ page.url }}">{{ page.title }}</label>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<div class="main-content">
    <div class="container">
        <div class='row'>
            <?php
            foreach ($tracks as $track) {
                getTrack($track);
            }
            foreach ($posts as $post) {
                getPost($post);
            } ?>
        </div>
    </div>
</div>
<script>
    var cb = function () {
        var l = document.createElement('link');
        l.rel = 'stylesheet';
        l.href = '/assets/css/<?php echo asset_path('main.css');?>';
        var h = document.getElementsByTagName('head')[0];
        h.parentNode.insertBefore(l, h);
    };
    var raf = requestAnimationFrame || mozRequestAnimationFrame ||
        webkitRequestAnimationFrame || msRequestAnimationFrame;
    if (raf) raf(cb);
    else window.addEventListener('load', cb);
</script>
<script type="text/javascript" src="/assets/js/<?php echo asset_path('main.js'); ?>"></script>

</body>
</html>