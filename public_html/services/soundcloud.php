<?php
include("./modules/apicacher.php");

$clientid = $soundCloudClientid; // Your API Client ID
$userid = $soundCloudUserid; // ID of the user you are fetching the information for

$soundcloud_url = "http://api.soundcloud.com/users/" . $userid . "/tracks.json?client_id=" . $clientid . "";

$tracks_json = getJson($soundcloud_url);
$tracks = json_decode($tracks_json);

foreach ($tracks as $track) {
    $trackTitle = $track->title;
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
        <div class="panel bg-white fg-black no-padding">
            <div class="artwork-thumb">

                <img src="<?php echo $artworkUrl; ?>" alt="Ocean Sound Recordings" class="">

            </div>
            <div class="trackinfo">
                <h3><?php echo $trackTitle; ?>  </h3>
                <audio controls>
                    <source src='<?php echo $streamLocation; ?>' type='audio/mp3'>
                    Your browser does not support the audio element.
                </audio>

                <div class="col-12">
                    <small><span class="fa fa-play"> </span> <?php echo $playbackCount; ?> plays</small>
                    <small><span class="fa fa-heart"> </span> <?php echo $likeCount; ?> likes</small>
                </div>
                <div class="col-12">
                    <a href="<?php echo $permalinkUrl; ?>" target="_blank" title="Listen to <?php echo $trackTitle; ?> at SoundCloud" class="button bg-setonescap-red"><span class="fa fa-soundcloud"></span> SoundCloud</a>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <?php
}
?>