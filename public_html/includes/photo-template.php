<body class="bg-white">
<div class="content">
    <header>
        <nav class="fg-black bg-white fixed">
            <img src="/images/template/bird-nav.png"/>
            <ul class="float-right">
                <?php
                __getLinkList($rootURL);
                ?>
            </ul>
        </nav>
    </header>


<div class="col-12 photo-fullscreen">
<?php

$albumYear = substr($photoAlbumDate, 0, 4);
$albumMonth = substr($photoAlbumDate, 5, 2);
$band = "setonescap";
if($albumYear < 2015 && $albumMonth < 10){
    $band = "confusion";
}

echo "<img src='/images/photos/big/" . $photographer . "/" . $band . "-" . $photoAlbum . "-" . $photoAlbumDate . "-" . $photoNo . ".jpg'/>";
echo "<p>";
echo $photoAlbum;
echo " --- ";
echo $photoAlbumDate;
echo " --- ";
echo $photoNo;
echo " --- ";
echo "</p>";
?>
</div>
</div>
</body>
</html>