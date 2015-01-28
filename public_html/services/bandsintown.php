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
?>

<div class='col-12'>
    <h2> Upcoming events </h2>
    <?php
    foreach ($events as $event) {
        if (date("Y-m-d", strtotime($event->datetime)) >= $dateNow){
            ?>
            <div itemscope itemtype='http://schema.org/Event' class='col-12 bg-noise bg-white fg-black event-item panel'>
                <h3><span itemprop='name'> <?php echo $event->title ?> </span></h3>
                <div class='col-4'>
                    <h4>Date:</h4>
                    <time itemprop='startDate' datetime='<?php echo $event->datetime; ?>'> <?php echo $event->formatted_datetime; ?> </time>
                </div>
                <div itemprop='location' itemscope itemtype='http://schema.org/Organization' class="no-padding">
                ​<div class='col-3'>
                    <h4>Venue:</h4>
                    <span itemprop='name'> <?php echo $event->venue->name; ?></span>
                </div>
                <div class='col-3'>
                    <h4>Location:</h4>
                    <span itemprop='address'><?php echo $event->venue->city; ?>,
                    <?php echo $event->venue->country; ?></span>
                </div>
                </div>
                <div class='col-2'>
                    <?php if ($event->ticket_url != '' || $event->ticket_url != null) { ?>
                        <a href='<?php echo htmlspecialchars($event->ticket_url, ENT_COMPAT); ?>' class='button bg-setonescap-red fg-white' target='_blank'>See event</a>
                    <?php } ?>
                </div>
                <div class='clearfix'></div>
            </div>
        <?php
        }
    }
    ?>
</div>

<div class='col-12'>
    <h2> Past events </h2>
    <?php
    foreach ($events as $event) {
        if (date("Y-m-d", strtotime($event->datetime)) < $dateNow){
            ?>
            <div itemscope itemtype='http://schema.org/Event' class='col-12 bg-noise bg-white fg-black event-item panel'>
                <h3><span itemprop='name'> <?php echo $event->title ?> </span></h3>
                <div class='col-4'><h4>Date:</h4><time itemprop='startDate' datetime='<?php echo $event->datetime; ?>'> <?php echo $event->formatted_datetime; ?> </time></div>
                <div itemprop='location' itemscope itemtype='http://schema.org/Organization' class="no-padding">
                ​<div class='col-3'>
                    <h4>Venue:</h4>
                    <span itemprop='name'> <?php echo $event->venue->name; ?> </span>
                </div>
                <div class='col-3'>
                    <h4>Location:</h4>
                    <span itemprop='address'><?php echo $event->venue->city; ?>,
                    <?php echo $event->venue->country; ?></span>
                </div>
                    </div>
                <div class='col-2'>
                    <?php if ($event->ticket_url != '' || $event->ticket_url != null) { ?>
                        <a href='<?php echo htmlspecialchars($event->ticket_url, ENT_COMPAT); ?>' class='button bg-setonescap-red fg-white' target='_blank'>See event</a>
                    <?php } ?>
                </div>
                <div class='clearfix'></div>
            </div>
        <?php
        }
    }
    ?>
</div>