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
$description = __getSingleValue($db::PHOTOALBUMS_DESCRIPTIONCOL, $db::PHOTOALBUMS_TABLENAME, $db::PHOTOALBUMS_IDCOL, $albumId);


echo "<h2>" . $albumTitle . "</h2>";
echo "<h3>" . $description . "</h3>";

__getPhoto($albumId, $photoNo);

echo "<div class='buttons'>";


if ($photoNo>1){
    $previous = $photoNo-1;
    echo "<button value='" . $previous . "' onclick='showPhoto($albumId, $photoCount, this.value)' class='button bg-white'>Previous</button>";
}

if ($photoNo<$photoCount){

    echo "<button value='" . $next . "' onclick='showPhoto($albumId, $photoCount, this.value)' class='button bg-white'>Next</button>";
}


echo "</div>";

?>

