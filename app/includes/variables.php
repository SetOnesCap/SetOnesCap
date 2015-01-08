<?php
$db = new DataBase();
$siteName = "Set One's Cap";
$pageTitle = isset($_GET['pageTitle']) ? $_GET['pageTitle'] : 'home';
$pageTitle = str_replace('-', ' ', $pageTitle);
if($pageTitle == 'photos'){
    $photoAlbum = ($_GET['photoAlbum']);
    $photoAlbumDate = ($_GET['photoAlbumDate']);
    $photoNo = ($_GET['photoNo']);
    $photographer = ($_GET['photographer']);
}
$pageId = __getSingleValue($db::PAGE_IDCOL, $db::PAGE_TABLENAME, $db::PAGE_TITLECOL, $pageTitle);
$pageFile = __getPageFile($pageId);
?>

