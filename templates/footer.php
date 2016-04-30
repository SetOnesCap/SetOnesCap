</div>
<script>
    var cb = function () {
        var l = document.createElement('link');
        l.rel = 'stylesheet';
        l.href = '/assets/css/<?php echo asset_path('main.css');?>';
        var h = document.getElementsByTagName('head')[0];
        h.parentNode.insertBefore(l, h);
    };
    var raf = requestAnimationFrame || mozRequestAnimationFrame ||
        webkitRequestAnimationFrame || msRequestAnimationFrame;
    if (raf) raf(cb);
    else window.addEventListener('load', cb);
</script>
<script type="text/javascript" src="/assets/js/<?php echo asset_path('main.js'); ?>"></script>

</body>
</html>