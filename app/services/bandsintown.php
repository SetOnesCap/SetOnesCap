<?php


$id = $bandsintownId;
$appId = $bandsintownAppId;


$bandsintown_url = "http://api.bandsintown.com/artists/" . $id . "/events.json?api_version=2.0&app_id=" . $appId;

$events_json = file_get_contents($bandsintown_url);
$events = json_decode($events_json);

?>

<?php

foreach ($events as $event) {
    echo "<div class='col-12 bg-noise bg-white fg-black event-item panel'>";
    echo "<h2>" . $event->title . "</h2>";
    echo "<div class='col-4 no-padding'> <h3>Date:</h3>" . $event->formatted_datetime . "</div>";
    echo "<div class='col-3 no-padding'><h3>Venue:</h3>" . $event->venue->name . "</div>";
    echo "<div class='col-3 no-padding'><h3>Location:</h3>" . $event->formatted_location . "</div>";
    echo "<div class='col-2 no-padding'><a href='" . $event->ticket_url . "' class='button bg-setonescap-red fg-white' target='_blank'>See event</a></div>";
    echo "<div class='clearfix'></div>";
    echo "</div>";
}

?>