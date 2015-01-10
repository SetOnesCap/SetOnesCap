<?php
$albumId = intval($_GET['albumId']);
$photoNo = intval($_GET['photoNo']);

$photoCount = intval($_GET['photoCount']);


$previous = $photoNo-1;
$next = $photoNo+1;


include("../dbconf.php");
include("functions.php");
$db = new DataBase();
$albumTitle = __getSingleValue($db::PHOTOALBUMS_TITLECOL, $db::PHOTOALBUMS_TABLENAME, $db::PHOTOALBUMS_IDCOL, $albumId);
$albumDescription = __getSingleValue($db::PHOTOALBUMS_DESCRIPTIONCOL, $db::PHOTOALBUMS_TABLENAME, $db::PHOTOALBUMS_IDCOL, $albumId);
$albumDate = __getSingleValue($db::PHOTOALBUMS_DATECOL, $db::PHOTOALBUMS_TABLENAME, $db::PHOTOALBUMS_IDCOL, $albumId);
$photographer = __getSingleValue($db::PHOTOALBUMS_PHOTOGRAPHERCOL, $db::PHOTOALBUMS_TABLENAME, $db::PHOTOALBUMS_IDCOL, $albumId);
$photographerStripped = strtolower(str_replace(array('  ', ' '), '-', preg_replace('/[^a-zA-Z0-9 s]/', '', trim($photographer))));


echo "<div class='col-9 text-center bg-noise bg-black no-padding'>";
__getPhoto($albumId, $photoNo);
echo "<div class='clear'></div>";
echo "</div>";

echo "<div class='col-3'>";
echo "<a href='#close' title='Close' class='close float-left'>X</a>";
echo "<h2>" . $albumTitle . "</h2>";
echo "<p>" . $photographer . "</p>";
echo "<p>" . $albumDescription . "</p>";
echo "<p>" . $albumDate . "</p>";
echo $photoNo . " of " . $photoCount;
//echo "<p>" . __getPhotoDescription($albumId, $photoNo) . "</p>";
if ($photoNo<10) {
    echo "<a href='/photos/" . $albumTitle . "/" . $albumDate . "/" . $photographerStripped . "/0" . $photoNo . "/'> Watch full screen</a>";
}else {
    echo "<a href='/photos/" . $albumTitle . "/" . $albumDate . "/" . $photographerStripped . "/" . $photoNo . "/'> Watch full screen</a>";
}

echo "<div class='buttons'>";


if ($photoNo>1) {
    $previous = $photoNo - 1;
}else {
    $previous = $photoCount;
}
echo "<button value='" . $previous . "' onclick='showPhoto($albumId, $photoCount, this.value)' class='button bg-setonescap-red fg-white'>Previous</button>";


if ($photoNo<$photoCount) {
    $next = $photoNo + 1;
}else {
    $next = 1;
}
    echo "<button value='" . $next . "' onclick='showPhoto($albumId, $photoCount, this.value)' class='button bg-setonescap-red fg-white'>Next</button>";

echo "</div>";

echo "</div>";


?>

