<?php
$posts = get_api_content('posts');
$tracks = get_api_content('tracks');
?>
<script>
    var tracks = <?php echo json_encode($tracks) ?>;
    var posts = <?php echo json_encode($posts) ?>;
</script>
<script type="text/javascript" src="/admin/assets/js/<?php echo asset_path('main.js', 'admin'); ?>"></script>
</body>
</html>