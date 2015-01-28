<div class="col-12 bg-white fg-black text-center">
    <div class="col-8 center" id='introduction'>
        <p><?php __getContent($pageId); ?></p>
    </div>
</div>
<form>
    <div class="col-12 bg-white fg-black">
        <h2>Photos of Set One's Cap</h2>
        <?php __getPhotoAlbums('setonescap') ?>
        <div class='clear'></div>
    </div>

    <!--<div class="col-12 bg-white fg-black">
        <h2>Photos of Confusion (2011 - 2014)</h2>
        <?php __getPhotoAlbums('confusion') ?>
        <div class='clear'></div>
    </div>-->
</form>
<div class='clear'></div>
<div id="photoalbum" class="photoalbumDialog">
    <div id="preview">
        <a href='#close' title='Close' class='close'>X</a>
    </div>
</div>