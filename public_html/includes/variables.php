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
        $photoAlbumId = __getPhotoalbumId($photoAlbumString, $photoAlbumDate, $photographer);

        $photoAlbumSize = __getPhotoAlbumSize($photoAlbumString, $photoAlbumDate, $photographer);
        $pageTitleString = $photoAlbumString . " - " . $photoAlbumDate . " - " . $photographerString . " - " . ltrim($photoNo, '0') . " of " . ltrim($photoAlbumSize, '0');

        $pageDescriptionTemp = __getPhotoAlbumMetaDescription($photoAlbumString, $photoAlbumDate, $photographer);
        $pageDescription = $pageDescriptionTemp . ", photo " . ltrim($photoNo, '0') . " of " . ltrim($photoAlbumSize, '0') . " by " . $photographerString;
    }
}





?>