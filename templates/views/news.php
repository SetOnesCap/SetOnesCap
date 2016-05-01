<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/templates/header.php');
?>

    <div class="container">

        <h1 class="sr-only">News</h1>
        <div class='row masonry-row'>
            <div class='col-xs-12 col-sm-6 col-md-4 col-lg-3 masonry-item grid-sizer'></div>
            <?php
            foreach ($posts as $post) {
                getPost($post);
            } ?>
        </div>
    </div>
<div class="action-button"></div>
<div class="action-menu">
    <button class="toggle-action-button facebook" value="facebook"><span class="icon"></span></button>
    <button class="toggle-action-button twitter" value="twitter"><span class="icon"></span></button>
    <button class="toggle-action-button instagram" value="instagram"><span class="icon"></span></button>
    <button class="toggle-action-button google" value="google"><span class="icon"></span></button>
</div>

<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php');