<?php


$id = $bandsintownId;
$appId = $bandsintownAppId;


$bandsintown_url = "http://api.bandsintown.com/artists/" . $id . "/events.json?api_version=2.0&app_id=" . $appId;

$events_json = file_get_contents($bandsintown_url);
$events = json_decode($events_json);

?>

<?php

foreach ($events as $event) {
    echo "<div itemscope itemtype='http://schema.org/Event' class='col-12 bg-noise bg-white fg-black event-item panel'>";
    echo "<h2><span itemprop='summary'>" . $event->title . "</span></h2>";
    echo "<div class='col-4 no-padding'><h3>Date:</h3><time itemprop='startDate' datetime='" . $event->datetime . "'>" . $event->formatted_datetime . "</time></div>";
    echo "​<span itemprop='location' itemscope itemtype='http://schema.org/Organization'>";
        echo "<div class='col-3 no-padding'><h3>Venue:</h3><span itemprop='name'>" . $event->venue->name . "</span></div>";
        echo "<span itemprop='address' itemscope itemtype='http://schema.org/Address'>";
            echo "<div class='col-3 no-padding'><h3>Location:</h3><span itemprop='locality'>" . $event->venue->city . "</span>, <span itemprop='country-name'>" . $event->venue->country . "</span></div>";
        echo "</span>";
    echo "</span>";
    echo "<div class='col-2 no-padding'><a href='" . $event->ticket_url . "' class='button bg-setonescap-red fg-white' target='_blank'>See event</a></div>";
    echo "<div class='clearfix'></div>";
    echo "</div>";
}

$event->datetime

?>