<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/templates/header.php');
?>
<div class="container">
    <h1>Music</h1>
    <div class='row'>
        <?php
        foreach ($tracks as $track) {
            getTrack($track);
        }
        ?>
    </div>
</div>
<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php');