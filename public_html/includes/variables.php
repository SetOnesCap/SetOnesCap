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

$headerNo = rand(1,10);




if($pageTitle == 'photos'){
    $photoAlbum = (isset($_GET['photoAlbum']) ? $_GET['photoAlbum'] : '');
    $photoAlbumString = ucwords(str_replace('-', ' ', $photoAlbum));
    $photoAlbumDate = (isset($_GET['photoAlbumDate'])) ? $_GET['photoAlbumDate'] : '';
    $photoNo = (isset($_GET['photoNo'])) ? $_GET['photoNo'] : '';
    $photographer = (isset($_GET['photographer'])) ? $_GET['photographer'] : '';
    $photographerString = __getPhotographer($photoAlbumString, $photoAlbumDate, $photographer);


    if($photoAlbum != '' AND $photoAlbum != null) {
        $photoAlbumId = __getPhotoalbumId($photoAlbumString, $photoAlbumDate, $photographer);
        $photoAlbumSize = __getPhotoAlbumSize($photoAlbumString, $photoAlbumDate, $photographer);
        if($photoNo != null && $photoNo != '') {
            $pageTitleString = $photoAlbumString . " - " . $photoAlbumDate . " - " . $photographerString . " - " . ltrim($photoNo, '0') . " of " . ltrim($photoAlbumSize, '0');
            $pageDescriptionTemp = __getPhotoAlbumMetaDescription($photoAlbumString, $photoAlbumDate, $photographer);
            $pageDescription = $pageDescriptionTemp . ", photo " . ltrim($photoNo, '0') . " of " . ltrim($photoAlbumSize, '0') . " by " . $photographerString;
        }else{
            $pageTitleString = $photoAlbumString . " - " . $photoAlbumDate . " - " . $photographerString;
            $pageDescriptionTemp = __getPhotoAlbumMetaDescription($photoAlbumString, $photoAlbumDate, $photographer);
            $pageDescription = $pageDescriptionTemp . ", photos by " . $photographerString;
        }
    }
}

