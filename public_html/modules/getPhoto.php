

<?php
$albumId = intval($_GET['albumId']);
$photoNo = intval($_GET['photoNo']);
$photoCount = intval($_GET['photoCount']);
$previous = $photoNo-1;
$next = $photoNo+1;


//include("../dbconf.php");
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
__getPhoto($albumId, $photoNo);
echo "<div class='photodescription'>";
echo  $photoDescription;
echo "</div>";
echo "<div class='clear'></div>";
echo "</div>";

echo "<div class='col-3 bg-noise bg-white'>";
echo "<a href='#close' title='Close' class='close float-left'><span class='fa fa-close'></span></a>";

echo "<div class='col-12 no-padding'>";
    echo "<h2>" . $albumTitle . "</h2>";
    echo "<p class='album-date'>" . $albumDateStr . "</p>";
    echo "<p>" . $albumDescription . "</p>";
echo "</div>";





echo "<div class='col-12 no-padding'>";
    echo "<p> Photo by " . $photographer . "</p>";
    echo "<p>" . $photoNo . " of " . $photoCount . "</p>";
echo "</div>";

//echo "<p>" . __getPhotoDescription($albumId, $photoNo) . "</p>";


echo "<div class='navigation'>";

if ($photoNo>1) {
    $previous = $photoNo - 1;
}else {
    $previous = $photoCount;
}
echo "<button id='prevButton' value='" . $previous . "' onclick='showPhoto($albumId, $photoCount, this.value)' class='button col-6 bg-setonescap-red fg-white'><i class='fa fa-step-backward'></i> Prev</button>";


if ($photoNo<$photoCount) {
    $next = $photoNo + 1;
}else {
    $next = 1;
}
    echo "<button id='nextButton' value='" . $next . "' onclick='showPhoto($albumId, $photoCount, this.value)' class='button col-6 bg-setonescap-red fg-white'>Next <i class='fa fa-step-forward'></i></button>";




if ($photoNo<10) {
    echo "<a href='/photos/" . $albumTitleStripped . "/" . $albumDate . "/" . $photographerStripped . "/0" . $photoNo . "/ ' target='_blank' class='button col-12 bg-setonescap-red fg-white'><i class='fa fa-expand'></i> Watch full screen</a>";
}else {
    echo "<a href='/photos/" . $albumTitleStripped . "/" . $albumDate . "/" . $photographerStripped . "/" . $photoNo . "/' target='_blank' class='button col-12 bg-setonescap-red fg-white'><i class='fa fa-expand'></i> Watch full screen</a>";
}
echo "</div>";
echo "</div>";
?>