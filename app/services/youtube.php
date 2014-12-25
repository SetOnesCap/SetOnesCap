<?php

$maxResults = "10";
$playlistId = "UUcJrQBmA6Z2-CkSPHkgF9Ww";
$key = "AIzaSyCM1ItcVlL-yFpDjU6q1ImyLLZ7Qx87bGI";



$youtube_url = "https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&maxResults=" . $maxResults . "&playlistId=" . $playlistId . "&key=" . $key . "";
//echo $youtube_url;
$videos_json = file_get_contents($youtube_url);
$videos = json_decode($videos_json);

foreach ($videos->items as $video) {
    echo $video->snippet->title;
    echo $video->snippet->resourceId->videoId;
    echo "<iframe width='560' height='315' src='//www.youtube.com/embed/" . $video->snippet->resourceId->videoId . "?rel=0&amp;showinfo=0' frameborder='0' allowfullscreen></iframe>";
}

?>


