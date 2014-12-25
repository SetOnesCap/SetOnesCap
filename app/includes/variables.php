<?php
$db = new DataBase();
$siteName = "Set One's Cap";
$pageTitle = isset($_GET['pageTitle']) ? $_GET['pageTitle'] : 'Home';
$pageTitle = str_replace('-', ' ', $pageTitle);
$pageId = __getSingleValue($db::PAGE_IDCOL, $db::PAGE_TABLENAME, $db::PAGE_TITLECOL, $pageTitle);
$pageFile = __getPageFile($pageId);

