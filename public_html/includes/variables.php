<?php
//mysql_query('SET NAMES utf8');
$db = new DataBase();
$siteName = "Set One's Cap";
$pageTitle = isset($_GET['pageTitle']) ? $_GET['pageTitle'] : 'home';
$pageTitle = str_replace('-', ' ', $pageTitle);
$pageTitleString = ucwords($pageTitle);

$pageId = __getSingleValue($db::PAGE_IDCOL, $db::PAGE_TABLENAME, $db::PAGE_TITLECOL, $pageTitle);
$pageDescription = __getSingleValue($db::PAGE_DESCRIPTIONCOL, $db::PAGE_TABLENAME, $db::PAGE_TITLECOL, $pageTitle);
$pageFile = __getPageFile($pageId);




if($pageTitle == 'photos'){
    $photoAlbum = ($_GET['photoAlbum']);
    $photoAlbumString = ucwords(str_replace('-', ' ', $photoAlbum));
    $photoAlbumDate = ($_GET['photoAlbumDate']);
    $photoNo = ($_GET['photoNo']);
    $photographer = ($_GET['photographer']);
    $photographerString = __getPhotographer($photoAlbumString, $photoAlbumDate, $photographer);

    if($photoAlbum != '' AND $photoAlbum != null) {
        $pageTitleString = ucwords($photoAlbum) . " - " . $photoAlbumDate . " - " . $photographerString . " - " . $photoNo;
    }
}





?>