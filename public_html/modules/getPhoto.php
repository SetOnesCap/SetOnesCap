<?php
$albumId = intval($_GET['albumId']);
$photoNo = intval($_GET['photoNo']);
$photoCount = intval($_GET['photoCount']);
$previous = $photoNo - 1;
$next = $photoNo + 1;


include("functions.php");
$db = new DataBase();
$albumTitle = __getSingleValue($db::PHOTOALBUMS_TITLECOL, $db::PHOTOALBUMS_TABLENAME, $db::PHOTOALBUMS_IDCOL, $albumId);
$albumTitleStripped = strtolower(str_replace(array('  ', ' '), '-', preg_replace('/[^a-zA-Z0-9 s]/', '', trim($albumTitle))));
$albumDescription = __getSingleValue($db::PHOTOALBUMS_DESCRIPTIONCOL, $db::PHOTOALBUMS_TABLENAME, $db::PHOTOALBUMS_IDCOL, $albumId);
$albumDate = __getSingleValue($db::PHOTOALBUMS_DATECOL, $db::PHOTOALBUMS_TABLENAME, $db::PHOTOALBUMS_IDCOL, $albumId);
$photographer = __getSingleValue($db::PHOTOALBUMS_PHOTOGRAPHERCOL, $db::PHOTOALBUMS_TABLENAME, $db::PHOTOALBUMS_IDCOL, $albumId);
$photographerStripped = strtolower(str_replace(array('  ', ' '), '-', preg_replace('/[^a-zA-Z0-9 s]/', '', trim($photographer))));

$photoDescription = __getPhotoDescription($albumId, $photoNo);

$albumDateStrTemp = strtotime($albumDate);
$albumDateStr = date("F j, Y", $albumDateStrTemp);


echo "<div class='col-9 text-center bg-noise bg-black no-padding'>";
echo "<div class='toggle-fullscreen'>";
if ($photoNo < 10) {
    echo "<a href='/photos/" . $albumTitleStripped . "/" . $albumDate . "/" . $photographerStripped . "/0" . $photoNo . "/ ' target='_blank' class='button'><i class='fa fa-expand'></i></a>";
} else {
    echo "<a href='/photos/" . $albumTitleStripped . "/" . $albumDate . "/" . $photographerStripped . "/" . $photoNo . "/' target='_blank' class='button'><i class='fa fa-expand'></i></a>";
}
echo "</div>";

    __getPhoto($albumId, $photoNo);

echo "<div class='navigation'>";

    echo "<span>" . $albumTitle . "</span>";

    echo "<div class='actions'>";
        if ($photoNo > 1) {
            $previous = $photoNo - 1;
        } else {
            $previous = $photoCount;
        }
        echo "<button id='prevButton' value='" . $previous . "' onclick='showPhoto($albumId, $photoCount, this.value)' class='button'><i class='fa fa-arrow-left'></i></button>";


        if ($photoNo < $photoCount) {
            $next = $photoNo + 1;
        } else {
            $next = 1;
        }
        echo "<button id='nextButton' value='" . $next . "' onclick='showPhoto($albumId, $photoCount, this.value)' class='button'><i class='fa fa-arrow-right'></i></button>";


        echo "<span>" . $photoNo . " of " . $photoCount . "</span>";
    echo "</div>";



echo "</div>";

    echo "<div class='clear'></div>";
echo "</div>";

echo "<div class='col-3 bg-noise bg-white'>";
    echo "<a href='#close' title='Close' class='close float-left'><span class='fa fa-close'></span></a>";

    echo "<div class='col-12 no-padding'>";
        echo "<h2>" . $albumTitle . "</h2>";
        echo "<p class='album-date'>" . $albumDateStr . "</p>";
        echo "<p>" . $photoDescription; "</p>";
        echo "<p> Photo by " . $photographer . "</p>";
    echo "</div>";

echo "</div>";
?>