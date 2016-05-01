<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/templates/header.php');
?>
<div class="container">
    <h1>Music</h1>
    <div class='row masonry-row'>
        <div class='col-xs-12 col-sm-6 col-md-4 col-lg-3 masonry-item grid-sizer'></div>
        <?php
        foreach ($tracks as $track) {
            getTrack($track);
        }
        ?>
    </div>
</div>
<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php');