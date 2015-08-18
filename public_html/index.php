<?php
//$rootURL = 'http://setonescap.local'; // For localhost only

include("./service-variables.php");
include("./modules/functions.php");
include("./includes/variables.php");
include("./includes/head.php");

if($pageTitle == 'admin'){
    header("Location: admin/index.php");
    die();
   // include("admin/includes/admin-template.php");
}else if($pageTitle == 'photos' && $photoAlbum != ''){
    if ($photoNo != '' && $photoNo != null){
        include("includes/photo-template.php");
    }else{
        include("includes/photo-gallery.php");
    }
}else {
    include("includes/template.php");
}