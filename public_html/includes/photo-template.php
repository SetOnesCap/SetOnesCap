
<body class="bg-white">
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
    <h1><?php echo $photoAlbum . " - " . $photoAlbumDate ?></h1>
<?php

$albumYear = substr($photoAlbumDate, 0, 4);
$albumMonth = substr($photoAlbumDate, 5, 2);
$band = "setonescap";
if($albumYear < 2015 && $albumMonth < 10){
    $band = "confusion";
}

echo "<img src='/images/photos/big/" . $photographer . "/" . $band . "-" . $photoAlbum . "-" . $photoAlbumDate . "-" . $photoNo . ".jpg'/>";
?>

    <p> Photo by <?php echo $photographerString ?></p>
</div>
    <div
        class="fb-like col-12"
        data-share="true"
        data-width="450"
        data-show-faces="false">
    </div>
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