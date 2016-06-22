<?php
include("./modules/apicacher.php");

$clientid = $soundCloudClientid; // Your API Client ID
$userid = $soundCloudUserid; // ID of the user you are fetching the information for

$soundcloud_url = "http://api.soundcloud.com/users/" . $userid . "/tracks.json?client_id=" . $clientid . "";

$tracks_json = getJson($soundcloud_url);
$tracks = json_decode($tracks_json);

function getDurationContent($trackDuration){
    $input = $trackDuration;

    $input = floor($input / 1000);

    $seconds = $input % 60;
    $input = floor($input / 60);

    $minutes = $input % 60;

    return "PT" . $minutes . "M" . $seconds . "S";
}

foreach ($tracks as $track) {
    $trackTitle = $track->title;
    $trackDuration = $track->duration;
    $trackDurationContent = getDurationContent($trackDuration);
    $trackDurationSeconds = floor($trackDuration / 1000);
    $artworkUrl = $track->artwork_url;
    $artworkUrl = str_replace('large.jpg', 't500x500.jpg', $artworkUrl);
    $playbackCount = $track->playback_count;
    $likeCount = $track->favoritings_count;
    $permalinkUrl = $track->permalink_url;
    $streamUrl = $track->stream_url . '?client_id=' . $clientid;
    $stream_json = get_headers($streamUrl, 1);
    $streamLocation = $stream_json["Location"];

    ?>
    <div class="col-4 soundcloud-feed" style="">
        <div class="panel bg-white fg-black no-padding" itemscope itemtype="http://schema.org/MusicGroup">
            <span style="display: none" itemprop="name">Set One's Cap</span>
            <div class="artwork-thumb">

                <img src="<?php echo $artworkUrl; ?>" alt="Album cover for Set One's Cap - <?php echo $trackTitle; ?> " class="">

            </div>
            <div class="trackinfo" itemprop="tracks" itemscope itemtype="http://schema.org/MusicRecording">
                <h3 itemprop="name"><?php echo $trackTitle; ?>  </h3>
                <meta itemprop="duration" content="<?php echo $trackDurationContent ?>"/>
                <audio controls>
                    <source src='<?php echo $streamLocation; ?>' type='audio/mp3'>
                    Your browser does not support the audio element.
                </audio>

                <div class="col-12">
                    <small><span class="fa fa-play"> </span> <?php echo $playbackCount; ?> plays</small>
                    <small><span class="fa fa-heart"> </span> <?php echo $likeCount; ?> likes</small>
                </div>
                <meta itemprop="interactionCount" content="UserPlays:<?php echo $playbackCount; ?>"/>
                <div class="col-12">
                    <a href="<?php echo $permalinkUrl; ?>" target="_blank" itemprop="url" title="Listen to <?php echo $trackTitle; ?> at SoundCloud" class="button bg-setonescap-red"><span class="fa fa-soundcloud"></span> SoundCloud</a>
                    <a href="http://soundcloud.com/setonescap/dont-you-wanna-know" itemprop="inAlbum" style="display: none"><?php echo $trackTitle; ?></a>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <?php
}
?>

