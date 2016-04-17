<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/environment.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/models/posts/facebook.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/models/posts/instagram.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/models/posts/twitter.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/models/posts/google.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/models/tracks/soundcloud.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/services/imageCacher.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/services/jsonCacher.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/tmhOAuth/tmhOAuth.php');


/* --Get posts:-- */
$postsArray = array();

// Get Facebook posts
$facebook_post_api_url = $_ENV["FACEBOOK_API_URL"] . $_ENV["FACEBOOK_PAGE_ID"]  . "/promotable_posts?access_token=" . $_ENV["FACEBOOK_ACCESS_TOKEN"];
$json = file_get_contents($facebook_post_api_url);
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

// Get GooglePlus posts
$google_post_api_url = $_ENV["GOOGLE_API_URL"] . $_ENV["GOOGLE_PAGE_ID"] . "/activities/public?key=" . $_ENV["GOOGLE_KEY"];
$json = file_get_contents($google_post_api_url);
$posts = json_decode($json);
foreach ($posts->items as $post) {
    $content = new GooglePost($post);
    array_push($postsArray, $content);
};

// Get Twitter posts
$connection = new tmhOAuth(array(
    'consumer_key' => $_ENV["TWITTER_CONSUMER_KEY"],
    'consumer_secret' => $_ENV["TWITTER_CONSUMER_SECRET"],
    'user_token' => $_ENV["TWITTER_ACCESS_TOKEN"],
    'user_secret' => $_ENV["TWITTER_ACCES_TOKEN_SECRET"]
));

$parameters = array();
$parameters['screen_name'] = $_ENV["TWITTER_SCREEN_NAME"];
$parameters['exclude_replies'] = true;
$parameters['include_rts'] = false;
$parameters['trim_user'] = true;

$twitter_path = '1.1/statuses/user_timeline.json';

$http_code = $connection->request('GET', $connection->url($twitter_path), $parameters);

if ($http_code === 200) {
    $response = strip_tags($connection->response['response']);
    $posts = json_decode($response);
    foreach ($posts as $post) {
        $content = new TwitterPost($post);
        array_push($postsArray, $content);
    };
}

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