<?php
$nyheter = array("Concerts","Info","Videos","Photos","Booking","Music");
$farge = array("red", "yellow", "blue", "cyan", "magenta", "green");
$i = 0;

?>


<section class="col-12 fg-black header-home" data-speed="1.7" data-type="background">
    <h1>Set One's Cap<span> Official Website</span></h1>
    <?php __getTitle($pageId); ?>

</section>
<div class="col-12 bg-black bg-noise fg-white border">
    <div class="col-8 center text-center" id="introduction">

        <p><?php __getContent($pageId); ?></p>




    </div>
</div>
<main>
    <div>
        <?php
        echo "<h4> SoundCloud:</h4>";
        include_once('./services/soundcloud.php');
        echo "<h4>YouTube</h4>";
        include_once('./services/youtube.php');
       ?>
    </div>
    <script src="http://connect.soundcloud.com/sdk.js"></script>

    <div class="col-12 bg-noise bg-black fg-white box-nav">
        <?php foreach ($nyheter as $n => $nyhet) {

            ?>
            <a href="#">
                <div class="col-4 bg-noise bg-<?php echo $farge[$i]; ?> box-nav-item" id="<?php echo $nyhet; ?>">
                    <div class="box-nav-link">
                        <h2><?php echo $nyhet; ?></h2>
                        <span>read more about <?php echo $nyhet; ?> here</span></div>
                    <div class="box-nav-hover"></div>
                </div>
            </a>

            <?php $i+=1; } ?>
    </div>
</main>