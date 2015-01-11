<?php


$id = $bandsintownId;
$appId = $bandsintownAppId;


$bandsintown_url = "http://api.bandsintown.com/artists/" . $id . "/events.json?api_version=2.0&app_id=" . $appId. "&date=all";

$events_json = file_get_contents($bandsintown_url);
$events = json_decode($events_json);

$dateNow = date("Y-m-d");


usort($events, function($a, $b)
{
    return strcmp($a->name, $b->name);
});

echo "<h2> Upcoming events </h2>";
foreach ($events as $event) {
    if (date("Y-m-d", strtotime($event->datetime)) >= $dateNow){
        echo "<div itemscope itemtype='http://schema.org/Event' class='col-12 bg-noise bg-white fg-black event-item panel'>";
        echo "<h3><span itemprop='summary'>" . $event->title . "</span></h3>";
        echo "<div class='col-4'><h4>Date:</h4><time itemprop='startDate' datetime='" . $event->datetime . "'>" . $event->formatted_datetime . "</time></div>";
        echo "​<span itemprop='location' itemscope itemtype='http://schema.org/Organization'>";
        echo "<div class='col-3'><h4>Venue:</h4><span itemprop='name'>" . $event->venue->name . "</span></div>";
        echo "<span itemprop='address' itemscope itemtype='http://schema.org/Address'>";
        echo "<div class='col-3'><h4>Location:</h4><span itemprop='locality'>" . $event->venue->city . "</span>, <span itemprop='country-name'>" . $event->venue->country . "</span></div>";
        echo "</span>";
        echo "</span>";
        echo "<div class='col-2'>";
        if ($event->ticket_url != '' || $event->ticket_url != null) {
            echo "<a href='" . $event->ticket_url . "' class='button bg-setonescap-red fg-white' target='_blank'>See event</a>";
        }
        echo "</div>";
        echo "<div class='clearfix'></div>";
        echo "</div>";
    }
}

echo "<h2> Past events </h2>";
foreach ($events as $event) {
    if (date("Y-m-d", strtotime($event->datetime)) < $dateNow){
        echo "<div itemscope itemtype='http://schema.org/Event' class='col-12 bg-noise bg-white fg-black event-item panel'>";
        echo "<h3><span itemprop='summary'>" . $event->title . "</span></h3>";
        echo "<div class='col-4'><h4>Date:</h4><time itemprop='startDate' datetime='" . $event->datetime . "'>" . $event->formatted_datetime . "</time></div>";
        echo "​<span itemprop='location' itemscope itemtype='http://schema.org/Organization'>";
        echo "<div class='col-3'><h4>Venue:</h4><span itemprop='name'>" . $event->venue->name . "</span></div>";
        echo "<span itemprop='address' itemscope itemtype='http://schema.org/Address'>";
        echo "<div class='col-3'><h4>Location:</h4><span itemprop='locality'>" . $event->venue->city . "</span>, <span itemprop='country-name'>" . $event->venue->country . "</span></div>";
        echo "</span>";
        echo "</span>";
        echo "<div class='col-2'>";
        if ($event->ticket_url != '' || $event->ticket_url != null) {
            echo "<a href='" . $event->ticket_url . "' class='button bg-setonescap-red fg-white' target='_blank'>See event</a>";
        }
        echo "</div>";
        echo "<div class='clearfix'></div>";
        echo "</div>";
    }
}

?>