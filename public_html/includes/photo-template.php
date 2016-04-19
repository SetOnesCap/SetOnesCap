<header>
    <nav id="menu" class="fg-black bg-white fixed">
        <div class="content">
            <a href="http://www.setonescap.com/"><img src="/images/template/logo-horizontal.png" width="226" height="60" alt="Set Ones Cap logo, drawing of a bird with a hat" class="logo-horizontal"/></a>
            <a href="http://www.setonescap.com/"><img src="/images/template/logo-vertical.png" width="31" height="60" alt="Set Ones Cap logo, drawing of a bird with a hat" class="logo-vertical"/></a>
            <ul class="float-right">
                <?php
                __getLinkList($rootURL);
                ?>
            </ul>
        </div>
    </nav>
</header>
<div class="content">
    <section class="col-12 fg-black header" data-speed="1.4" data-type="background">
        <div class="header-text bg-white fg-setonescap-red">
            <h1><?php __getTitle($pageId); ?></h1>

            <p class="credit-text"></p>
        </div>
    </section>
    <main>
        <div class="col-12 photo-fullscreen">
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
                    <a href="http://www.setonescap.com/photos/<?php echo $photoAlbum; ?>/<?php echo $photoAlbumDate; ?>/<?php echo $photographer; ?>/" itemprop="url">
                        <span itemprop="title"><?php echo $photoAlbumString . " - " . $photoAlbumDate . " by " . $photographerString; ?></span>
                    </a>
                    &rsaquo;
                </div>
                <div itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
                    <a href="http://www.setonescap.com/photos/<?php echo $photoAlbum; ?>/<?php echo $photoAlbumDate; ?>/<?php echo $photographer; ?>/<?php echo $photoNo; ?>/" itemprop="url">
                        <span itemprop="title"><?php echo " photo " . ltrim($photoNo, '0') . " of " . ltrim($photoAlbumSize, '0'); ?></span>
                    </a>
                </div>
            </div>
            <div class="col-12">
                <div class="line-through">
                    <span></span>

                    <h2><?php echo $photoAlbumString; ?></h2>
                </div>
                <p class="text-center photo-fullscreen-description"><?php echo "Photo by: " . $photographerString . " (" . $photoAlbumDate . ")"; ?></p>
            </div>
            <?php

            $albumYear = substr($photoAlbumDate, 0, 4);
            $albumMonth = substr($photoAlbumDate, 5, 2);
            $photoDescription = __getPhotoDescription($photoAlbumId, $photoNo);
            $band = "setonescap";
            if ($albumYear < 2015 && $albumMonth < 10) {
                $band = "confusion";
            }

            if ($photoDescription == '' || $photoDescription == null) {
                $altText = "Set One&#39;s Cap at " . $photoAlbumString;
            } else {
                $altText = "Picture of " . $photoDescription;
            }

            echo "<img src='/images/photos/big/" . $photographer . "/" . $band . "-" . strtolower($photoAlbum) . "-" . $photoAlbumDate . "-" . $photoNo . ".jpg' alt='" . $altText . "'/>";
            ?>


        </div>
        <div class="col-12 text-center">
            <p><?php echo $photoDescription ?></p>
        </div>
    </main>
    <footer class="bg-white border fg-black">
        <div class="col-6">© 2014 <a href="https://plus.google.com/+Setonescap" target="_blank">Set One's Cap</a></div>
        <div class="col-6 text-right">
            Website by: <a href="https://plus.google.com/+BenjaminDehli1/" target="_blank">Benjamin Dehli</a>
        </div>
    </footer>
</div>


<script type="text/javascript" src="https://code.jquery.com/jquery-1.10.2.min.js"></script>

<script type="text/javascript" src="/scripts/jquery.slicknav.min.js"></script>
<script>
    $(document).ready(function(){
        resizeDiv();
    });

    window.onresize = function(event) {
        resizeDiv();
    }

    function resizeDiv() {
        var vpw = $(window).width();
        var vph = $(window).height();
        $('.header').css({'height': vpw/2.8 + 'px'});
    }
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#menu').slicknav();
    });
</script>

<script type="text/javascript" src="/scripts/showPhoto.min.js"></script>
<script type="text/javascript" src="/scripts/parallax.min.js"></script>
<script type="text/javascript" src="/scripts/activeLinks.min.js"></script>

</body>
</html>