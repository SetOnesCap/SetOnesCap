<div class="clearfix"></div>
<footer class="bg-white fg-black">
    <div class="row">
        <div itemscope="" itemtype="http://data-vocabulary.org/Person" class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
            <h3>Web:</h3>
            <p><span itemprop="name">Benjamin Dehli</span></p>
            <div itemprop="address" itemscope="" itemtype="http://data-vocabulary.org/Address" class="no-padding">
                <p><span itemprop="street-address">Margretes veg 15</span></p>

                <p><span itemprop="postal-code">3804</span> <span itemprop="locality">Bø i Telemark</span></p>

                <p><span itemprop="country-name">Norway</span></p>
            </div>
            <p>Phone: +47 92 29 27 19</p>
            <p>E-mail: web@setonescap.com</p>
        </div>
        <div itemscope="" itemtype="http://data-vocabulary.org/Person" class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
            <h3>Management / Booking:</h3>

            <p><span itemprop="name">Jon F. Leiulfsrud</span></p>

            <div itemprop="address" itemscope="" itemtype="http://data-vocabulary.org/Address" class="no-padding">
                <p><span itemprop="street-address">Smalvollveien 44</span></p>

                <p><span itemprop="postal-code">0667 Oslo</span></p>

                <p><span itemprop="country-name">Norway</span></p>
            </div>
            <p>Phone: +47 90 10 92 84</p>

            <p>E-mail: jon@compro.no</p>
        </div>
        <div class='col-xs-12 col-sm-6 col-md-4 col-lg-4'>
            <h3>For verything else:</h3>
        </div>

    </div>

    <div class="row">
    <div class="col-xs-12 col-sm-6">© 2014
        <a href="https://plus.google.com/+Setonescap" target="_blank" rel="publisher">Set One's Cap</a></div>
    <div class="col-xs-12 col-sm-6 text-right">
        Website by:
        <a href="https://plus.google.com/+BenjaminDehli1/" target="_blank" rel="author">Benjamin Dehli</a>
    </div>
    </div>

    <div class="clearfix"></div>
</footer>
</div>
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