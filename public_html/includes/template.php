<body class="bg-white">

<script>
    window.fbAsyncInit = function() {
        FB.init({
            appId      : '1526040134335346',
            xfbml      : true,
            version    : 'v2.2'
        });
    };

    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>



<div class="content">
    <header>
        <nav id="menu" class="fg-black bg-white fixed">
            <img src="/images/template/bird-nav.png" alt="Set Ones Cap logo, drawing of a bird with a hat"/>
            <ul class="float-right">
                <?php
                __getLinkList($rootURL);
                ?>
            </ul>

        </nav>
    </header>
    <section class="col-12 fg-black header <?php echo $pageTitle; ?>" data-speed="1.4" data-type="background">
        <div class="header-text bg-white fg-setonescap-red">
            <h1><?php __getTitle($pageId); ?></h1>
        <p class="credit-text"></p>
        </div>
        <!--    <h1>Set One's Cap<span> Official Website</span></h1>-->


    </section>
    <main>
        <?php include("content/" . $pageFile); ?>
    </main>
    <div
        class="fb-like col-12"
        data-share="true"
        data-width="450"
        data-show-faces="false">
    </div>
    <div class="col-12 bg-noise bg-black fg-white bottom-col">
        <div class="col-12 text-center sociallinks">
            <h2>Get in touch</h2>
            <a href="https://www.facebook.com/setonescap" class="facebook" title="Check out Set One's Cap at Facebook">
                <span class="fa-stack fa-2x">
                    <i class="fa fa-square-o fa-stack-2x"></i>
                    <i class="fa fa-facebook fa-stack-1x"></i>
                </span>
                <p>Facebook</p>
            </a>
            <a href="https://twitter.com/setonescap" class="twitter" title="Check out Set One's Cap at Twitter">
                <span class="fa-stack fa-2x">
                    <i class="fa fa-square-o fa-stack-2x"></i>
                    <i class="fa fa-twitter fa-stack-1x"></i>
                </span>
                <p>Twitter</p>
            </a>
            <a href="http://instagram.com/setonescap" class="instagram" title="Check out Set One's Cap at Instagram">
                <span class="fa-stack fa-2x">
                    <i class="fa fa-square-o fa-stack-2x"></i>
                    <i class="fa fa-instagram fa-stack-1x"></i>
                </span>
                <p>Instagram</p>
            </a>
            <a href="https://www.youtube.com/user/setonescap" class="youtube" title="Check out Set One's Cap at YouTube">
                <span class="fa-stack fa-2x">
                    <i class="fa fa-square-o fa-stack-2x"></i>
                    <i class="fa fa-youtube fa-stack-1x"></i>
                </span>
                <p>YouTube</p>
            </a>
            <a href="https://soundcloud.com/setonescap" class="soundcloud" title="Check out Set One's Cap at SoundCloud">
                <span class="fa-stack fa-2x">
                    <i class="fa fa-square-o fa-stack-2x"></i>
                    <i class="fa fa-soundcloud fa-stack-1x"></i>
                </span>
                <p>Soundcloud</p>
            </a>
            <a href="https://plus.google.com/111095056778547378720" rel="publisher" class="google-plus" title="Check out Set One's Cap at Google Plus">
                <span class="fa-stack fa-2x">
                    <i class="fa fa-square-o fa-stack-2x"></i>
                    <i class="fa fa-google-plus fa-stack-1x"></i>
                </span>
                <p>Google+</p>
            </a>

        </div>
        <div itemscope itemtype="http://data-vocabulary.org/Person" class="col-6">
            <h3>Web:</h3>
            <p><span itemprop="name">Benjamin Dehli</span></p>
            <div itemprop="address" itemscope itemtype="http://data-vocabulary.org/Address" class="no-padding">
                <p><span itemprop="street-address">Margretes veg 15</span></p>
                <p><span itemprop="postal-code">3804</span> <span itemprop="locality">B&oslash; i Telemark</span></p>
                <p><span itemprop="country-name">Norway</span></p>
            </div>
            <p>Phone: +47 92 29 27 19</p>
            <p>E-mail: post@setonescap.com</p>
        </div>
        <div itemscope itemtype="http://data-vocabulary.org/Person" class="col-6">
            <h3>Booking:</h3>
            <p><span itemprop="name">Carl-Viktor Guttormsen</span></p>
            <p>Parkveien 1</p>
            <p>3970 Langesund</p>
            <p>Norway</p>
            <p>Phone: +47 90 26 21 60</p>
            <p>E-mail: booking@setonescap.com</p>
        </div>


    </div>
    <footer class="fixed-bottom bg-white fg-black">
        <div class="col-6">Copyright © 2014 <a href="http://www.setonescap.com" target="_blank">Set One's Cap</a></div>
        <div class="col-6 text-right">
            Website by: <a href="https://plus.google.com/+BenjaminDehli1/" target="_blank">Benjamin Dehli</a>
        </div>
    </footer>


    <div class="clearfix"></div>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.10.2.min.js"></script>

<script type="text/javascript" src="/scripts/jquery.slicknav.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#menu').slicknav();
    });
</script>

<script type="text/javascript" src="/scripts/showPhoto.js"></script>
<script type="text/javascript" src="/scripts/parallax.js"></script>
<script type="text/javascript" src="/scripts/activeLinks.js"></script>

</body>
</html>
