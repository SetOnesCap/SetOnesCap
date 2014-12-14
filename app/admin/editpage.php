<?php

$pageTitle = ($_GET['page']);
$rootURL = "/admin";


include("../modules/functions.php");
include("../variables.php");
include("../includes/top.php");
include("includes/navbar.php");
include("includes/sidebar.php");
include("content/editpage.php");

include("includes/footer.php");
include("../includes/bottom.php");
?>
