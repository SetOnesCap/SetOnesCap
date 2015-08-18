<header>
    <nav id="menu" class="fg-black bg-white fixed">
        <div class="content">
            <img src="/images/template/bird-nav.png" width="50" height="60" alt="Set Ones Cap logo, drawing of a bird with a hat"/>
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
        <div class="col-12 ">
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
                </div>
            </div>
            <div class="col-12">
                <div class="line-through">
                    <span></span>

                    <h2><?php echo $photoAlbumString; ?></h2>
                </div>
                <p class="text-center photo-fullscreen-description"><?php echo "Photos by: " . $photographerString . " (" . $photoAlbumDate . ")"; ?></p>
            </div>
            <div class="clearfix"></div>

            <div id='photos' class='js-masonry photo-fullscreen' data-masonry-options='{ "itemSelector": ".photo" }'>
                <?php

                $albumYear = substr($photoAlbumDate, 0, 4);
                $albumMonth = substr($photoAlbumDate, 5, 2);


                $band = "setonescap";
                if ($albumYear < 2015 && $albumMonth < 10) {
                    $band = "confusion";
                }

                for ($i = 1; $i <= $photoAlbumSize; $i++) {
                    $photoNo = $i;
                    if ($photoNo < 10) $photoNo = '0' . $photoNo;

                    $photoDescription = __getPhotoDescription($photoAlbumId, $photoNo);
                    if ($photoDescription == '' || $photoDescription == null) {
                        $altText = "Set One&#39;s Cap at " . $photoAlbumString;
                    } else {
                        $altText = "Picture of " . $photoDescription;
                    }


                    echo "<div class='col-3 photo'>";
                    echo "<a href='http://www.setonescap.com/photos/$photoAlbum/$photoAlbumDate/$photographer/$photoNo/'>";
                    echo "<img src='http://setonescap.com/images/photos/thumbs/" . $photographer . "/" . $band . "-" . strtolower($photoAlbum) . "-" . $photoAlbumDate . "-" . $photoNo . ".jpg' width='500' alt='" . $altText . "'/>";
                    echo "</a>";
                    echo "</div>";

                }
                ?>
            </div>

        </div>
        <!-- <div class="col-12 text-center">
            <p><?php //echo $photoDescription ?></p>
        </div>-->

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
<script type="text/javascript">
    $(document).ready(function () {
        $('#menu').slicknav();
    });
</script>
<script src="<?php $rootURL; ?>/scripts/masonry.pkgd.min.js"></script>
<script src="<?php $rootURL; ?>/scripts/imagesloaded.pkgd.min.js"></script>

<script type="text/javascript" src="/scripts/showPhoto.min.js"></script>
<script type="text/javascript" src="/scripts/parallax.min.js"></script>
<script type="text/javascript" src="/scripts/activeLinks.min.js"></script>
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
<script>
    $(window).load(function () {
        var $container = $('#photos').masonry();
        $container.imagesLoaded(function () {
            $container.masonry();
        });
    });
</script>
</body>
</html>