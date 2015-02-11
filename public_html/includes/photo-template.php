<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-57441525-1', 'auto');
  ga('send', 'pageview');

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



    <div class="col-12 photo-fullscreen">

        <h1><?php echo $photoAlbumString . " - " . $photoAlbumDate ?></h1>
        <p> Photo by <?php echo $photographerString ?></p>
        <div class="col-12 breadcrumbs">
            <div itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
                <a href="http://www.setonescap.com" itemprop="url">
                    <span itemprop="title">Set One's Cap</span>
                </a>
                &rsaquo;
            </div>
            <div itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
                <a href="http://www.setonescap.com/photos/" itemprop="url">
                    <span itemprop="title"><?php echo ucfirst($pageTitle); ?></span>
                </a>
                &rsaquo;
            </div>
            <div itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
                <a href="http://www.setonescap.com/photos/<?php echo $photoAlbum; ?>/<?php echo $photoAlbumDate; ?>/<?php echo $photographer; ?>/<?php echo $photoNo; ?>/" itemprop="url">
                    <span itemprop="title"><?php echo $photoAlbumString . " - " . $photoAlbumDate . " by " . $photographerString . ", photo " . ltrim($photoNo, '0') . " of " . ltrim($photoAlbumSize, '0'); ?></span>
                </a>
            </div>
        </div>
        <?php

        $albumYear = substr($photoAlbumDate, 0, 4);
        $albumMonth = substr($photoAlbumDate, 5, 2);
        $band = "setonescap";
        if($albumYear < 2015 && $albumMonth < 10){
            $band = "confusion";
        }

        echo "<img src='/images/photos/big/" . $photographer . "/" . $band . "-" . strtolower($photoAlbum) . "-" . $photoAlbumDate . "-" . $photoNo . ".jpg'/>";
        ?>


    </div>
    <div
        class="fb-like col-12"
        data-share="true"
        data-width="450"
        data-show-faces="false">
    </div>
    <footer class="fixed-bottom bg-white fg-black">
        <div class="col-6">© 2014 <a href="https://plus.google.com/+Setonescap" target="_blank">Set One's Cap</a></div>
        <div class="col-6 text-right">
            Website by: <a href="https://plus.google.com/+BenjaminDehli1/" target="_blank">Benjamin Dehli</a>
        </div>
    </footer>
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

</body>
</html>