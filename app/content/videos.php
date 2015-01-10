

<div class="col-12 bg-white fg-black">
    <p><?php __getContent($pageId); ?></p>
</div>
<div class="col-12 bg-white">
    <?php include_once('./services/youtube.php'); ?>
</div>




<script>
    $(document).ready(function(){
        $("a").click(function(e) {
            e.preventDefault();

            $("#videoPreview").attr("src", $(this).attr("href"));
        })
    });
</script>