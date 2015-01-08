<?php

$maxResults = "10";
$playlistId = $youtTubePlaylistId;
$key = $youTubeKey;



$youtube_url = "https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&maxResults=" . $maxResults . "&playlistId=" . $playlistId . "&key=" . $key . "";

$videos_json = file_get_contents($youtube_url);
$videos = json_decode($videos_json);


foreach ($videos->items as $video) {
    echo "<div class='col-4 photoalbum-link'>";
        echo "<div class='panel bg-noise bg-white fg-black no-padding'>";
            echo "<div class='no-padding album-thumb'>";
                echo "<img src='" . $video->snippet->thumbnails->high->url ."'/>";
            echo "</div>";
            echo "<div>";
                echo "<h3>" . $video->snippet->title . "</h3>";
                echo "<p class='album-date'> dato her </p>";
                echo "<p> beskrivelse </p>";
                echo "<a href='//www.youtube.com/embed/" . $video->snippet->resourceId->videoId . "?modestbranding=1&theme=light&rel=0&showinfo=0' target='videoPreview' class='button bg-setonescap-red'>Watch video</a>";
            echo "</div>";
        echo "</div>";
    echo "</div>";
}
?>



