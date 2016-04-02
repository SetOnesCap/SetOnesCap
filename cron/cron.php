<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/environment.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/models/posts/facebook.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/models/posts/instagram.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/models/tracks/soundcloud.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/services/imageCacher.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/services/jsonCacher.php');

/* --Get posts:-- */
$postsArray = array();

// Get Facebook posts
$json = file_get_contents($_ENV['FACEBOOK_API_URL']);
$posts = json_decode($json);
foreach ($posts->data as $post) {
    $content = new FacebookPost($post);
    array_push($postsArray, $content);
};

// Get Instagram posts
$json = file_get_contents($_ENV['INSTAGRAM_API_URL']);
$posts = json_decode($json);
foreach ($posts->data as $post) {
    $content = new InstagramPost($post);
    array_push($postsArray, $content);
};

cacheJson(json_encode($postsArray), 'posts.json');


/* --Get music:-- */
$tracksArray = array();

$json = file_get_contents($_ENV['SOUNDCLOUD_API_URL']);
$tracks = json_decode($json);
foreach ($tracks as $track) {
    $content = new SoundcloudTrack($track);
    array_push($tracksArray, $content);
};

cacheJson(json_encode($tracksArray), 'tracks.json');



/* --Get pages:-- */
cacheJsonFromUrl($_ENV["ROOT_URL"] . '/templates/index.php', 'index.html');