<div class="col-12 bg-white fg-black text-center">
    <div class="col-8 center" id='introduction'>
        <p><?php __getContent($pageId); ?></p>
    </div>
</div>
<form>
    <div class="col-12 bg-white fg-black">
        <div class="line-through">
            <span></span>
            <h2>Photoalbums</h2>
        </div>

        <div class="no-padding" id="photoalbums">
        <?php __getPhotoAlbums('setonescap') ?>
        </div>
        <div class='clear'></div>
    </div>
</form>
<div class='clear'></div>
<div id="photoalbum" class="photoalbumDialog">
    <div id="preview">
        <a href='#close' title='Close' class='close'>X</a>
    </div>
</div>
<div class="col-12 bg-white">
<?php include_once('./services/instagramphotos.php'); ?>
</div>

<script>
    $(window).load(function () {
        var $container = $('#photoalbums').masonry();
        $container.imagesLoaded(function () {
            $container.masonry();
        });
    });
</script>