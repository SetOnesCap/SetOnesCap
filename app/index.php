<?php
header('Content-Type: text/html; charset=UTF-8');



include("./service-variables.php");
include("./modules/functions.php");
include("./includes/variables.php");
include("./includes/head.php");

if($pageTitle == 'admin'){
    header("Location: admin/index.php");
    die();
   // include("admin/includes/admin-template.php");
}else if($pageTitle == 'photos' && $photoAlbum != ''){
    include("includes/photo-template.php");
}else {
    include("includes/template.php");
}
?>