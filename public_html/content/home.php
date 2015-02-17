<?php
$nyheter = array("Concerts","Info","Videos","Photos","Booking","Music");
$farge = array("red", "yellow", "blue", "cyan", "magenta", "green");
$i = 0;

?>

<div class="col-12 bg-white fg-black text-center">
    <div class="col-8 center" id='introduction'>
    <p><?php __getContent($pageId); ?></p>
    </div>
</div>
<div class="col-12 bg-white">
    <?php include_once('./services/facebook.php'); ?>
   <?php// include_once('./services/instagram.php'); ?>
</div>

