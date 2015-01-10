<?php

$maxResults = "10";
$playlistId = $youtTubePlaylistId;
$key = $youTubeKey;



$youtube_url = "https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&maxResults=" . $maxResults . "&playlistId=" . $playlistId . "&key=" . $key . "";

$videos_json = file_get_contents($youtube_url);
$videos = json_decode($videos_json);


foreach ($videos->items as $video) {
    $publishedDate = strtotime($video->snippet->publishedAt);
    $postDate = date("M j. Y", $publishedDate);
    echo "<div class='col-4 photoalbum-link'>";
        echo "<div class='panel bg-noise bg-white fg-black no-padding'>";
            echo "<div class='no-padding album-thumb video-container'>";
   echo" <iframe width='560'
            height='315'
            frameborder='0'
            allowfullscreen
            name='" . $video->snippet->resourceId->videoId ."'
            id='".$video->snippet->resourceId->videoId."'>

    </iframe>";
                echo "<img src='" . $video->snippet->thumbnails->high->url ."'/>";
            echo "</div>";
            echo "<div>";
                echo "<h3>" . $video->snippet->title . "</h3>";
                echo "<p class='album-date'>" . $postDate . "</p>";
               // echo "<p>" . $video->snippet->description . "</p>";
                echo "<a href='//www.youtube.com/embed/" . $video->snippet->resourceId->videoId . "?modestbranding=1&theme=light&rel=0&showinfo=0' target='" . $video->snippet->resourceId->videoId ."' class='button bg-setonescap-red'>Watch video</a>";
            echo "</div>";
        echo "</div>";
    echo "</div>";
}
?>



