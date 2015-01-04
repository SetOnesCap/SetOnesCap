<?php
$nyheter = array("Concerts","Info","Videos","Photos","Booking","Music");
$farge = array("red", "yellow", "blue", "cyan", "magenta", "green");
$i = 0;

?>

<div class="col-12 bg-white fg-black">
    <p><?php __getContent($pageId); ?></p>
</div>
<div class="col-12 bg-white">
    <?php include_once('./services/facebook.php'); ?>
</div>
<!--
<div class="col-12 bg-noise bg-black fg-white box-nav">
    <?php foreach ($nyheter as $n => $nyhet) {
        ?>
        <a href="#">
            <div class="col-4 bg-noise bg-<?php echo "setonescap-red" ?> box-nav-item" id="<?php echo $nyhet; ?>">
                <div class="box-nav-link">
                    <h2><?php echo $nyhet; ?></h2>
                    <span>read more about <?php echo $nyhet; ?> here</span></div>
                <div class="box-nav-hover"></div>
            </div>
        </a>

        <?php $i+=1; } ?>
</div>-->
