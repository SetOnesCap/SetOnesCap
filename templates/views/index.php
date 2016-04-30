<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/templates/header.php');
?>
    <div class="container">
        <div class='row'>
            <?php
            foreach ($tracks as $track) {
                getTrack($track);
            }
            foreach ($posts as $post) {
                getPost($post);
            } ?>
        </div>
    </div>
<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php');