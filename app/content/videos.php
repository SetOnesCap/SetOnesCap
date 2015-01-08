

<div class="col-12 bg-white fg-black">
    <p><?php __getContent($pageId); ?></p>
</div>
<div class="col-12 bg-white">
    <?php include_once('./services/youtube.php'); ?>
</div>







<div class="panel video-container col-12">

    <iframe width='560'
            height='315'
            frameborder='0'
            allowfullscreen
            name="videoPreview"
            id="videoPreview">

    </iframe>

</div>

<script>
    $(document).ready(function(){
        $("a").click(function(e) {
            e.preventDefault();

            $("#videoPreview").attr("src", $(this).attr("href"));
        })
    });
</script>