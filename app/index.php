<?php



include("service-variables.php");
include("modules/functions.php");
include("includes/variables.php");
include("includes/head.php");

if($pageTitle == 'photos' && $photoAlbum != ''){
    include("includes/photo-template.php");
}else {
    include("includes/template.php");
}
?>