<?php

$maxResults = "10";
$playlistId = $youtTubePlaylistId;
$key = $youTubeKey;


$youtube_url = "https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&maxResults=10&playlistId=UUcJrQBmA6Z2-CkSPHkgF9Ww&key=AIzaSyCM1ItcVlL-yFpDjU6q1ImyLLZ7Qx87bGI";
$videos_json = file_get_contents($youtube_url);
$videos = json_decode($videos_json);


foreach ($videos->items as $video) {
    $publishedDate = strtotime($video->snippet->publishedAt);
    $postDate = date("F j, Y", $publishedDate);
    echo "<div class='col-6 photoalbum-link'>";
    echo "<div class='panel bg-white fg-black no-padding'>";
    echo "<div class='no-padding album-thumb video-container'>";
    echo " <iframe width='560'
            height='315'
            allowfullscreen
            name='" . $video->snippet->resourceId->videoId . "'
            id='" . $video->snippet->resourceId->videoId . "'>

    </iframe>";
    echo "<img src='" . $video->snippet->thumbnails->high->url . "' alt='YouTube thumbnail photo of the Set Ones Cap video'/>";
    echo "</div>";
    echo "<div>";
    echo "<h3>" . $video->snippet->title . "</h3>";
    echo "<p class='album-date'>" . $postDate . "</p>";
    echo "<p> Video from Set One&#8217;s Cap YouTube channel</p>";
    echo "<a href='//www.youtube.com/embed/" . $video->snippet->resourceId->videoId . "?modestbranding=1&amp;theme=light&amp;rel=0&amp;showinfo=0' target='" . $video->snippet->resourceId->videoId . "' class='button bg-setonescap-red'>Watch video</a>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
}
?>



<?php
/* Getting Subscription count from the user */
function getYouTubeSubscriberCount($user)
{
    $data = file_get_contents(sprintf('http://gdata.youtube.com/feeds/api/users/%s', $user));
    $matches = array();
    preg_match("~subscriberCount='(?<count>\d+)'~", $data, $matches);
    return isset($matches['count']) ? $matches['count'] : 0;
}

//echo getYouTubeSubscriberCount('setonescap');
?>

<div class="col-12 text-center">
    <a target="_blank" class="button bg-setonescap-red" href="http://www.youtube.com/subscription_center?add_user=setonescap" target="_tab"><span class="fa fa-youtube-play"></span> Subscribe
        <span class="button-addon"><?php echo getYouTubeSubscriberCount('setonescap'); ?></span>
    </a>
</div>



