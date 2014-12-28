<?php

$maxResults = "10";
$playlistId = $youtTubePlaylistId;
$key = $youTubeKey;



$youtube_url = "https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&maxResults=" . $maxResults . "&playlistId=" . $playlistId . "&key=" . $key . "";
//echo $youtube_url;
$videos_json = file_get_contents($youtube_url);
$videos = json_decode($videos_json);

foreach ($videos->items as $video) {
    echo "<p>" . $video->snippet->title . "</p>";
    echo "<iframe width='560' height='315' src='//www.youtube.com/embed/" . $video->snippet->resourceId->videoId . "?rel=0&amp;showinfo=0' frameborder='0' allowfullscreen></iframe>";
}

?>


