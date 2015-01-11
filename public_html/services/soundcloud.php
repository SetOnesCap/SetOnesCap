<?php

$clientid = $soundCloudClientid; // Your API Client ID
$userid = $soundCloudUserid; // ID of the user you are fetching the information for


$soundcloud_url = "http://api.soundcloud.com/users/" . $userid . "/tracks.json?client_id=" . $clientid . "";

$tracks_json = file_get_contents($soundcloud_url);
$tracks = json_decode($tracks_json);

foreach ($tracks as $track) {
    echo "<p>" . $track->title . "</p>";
    echo "<audio controls>
  <source src='http://api.soundcloud.com/tracks/174988180/stream?client_id=8904a1447d517c7e16851108d76d6386' type='audio/mp3'>
        Your browser does not support the audio element.
</audio>";

}

?>


