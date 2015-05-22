

<div class="col-12 fg-black text-center">
    <div class="col-8 center" id='introduction'>
        <p><?php __getContent($pageId); ?></p>
    </div>
</div>
<div class="col-12">
    <div class="line-through">
        <span></span>
        <h2>YouTube videos</h2>
    </div>
    <?php include_once('./services/youtube.php'); ?>
</div>
<!--
<div class="col-12 bg-white">
    <?php // include_once('./services/instagramvideos.php'); ?>
</div> -->



<script>
 /*   $(document).ready(function(){
        $("a").click(function(e) {
            e.preventDefault();

            $("#videoPreview").attr("src", $(this).attr("href"));
        })
    });*/
</script>