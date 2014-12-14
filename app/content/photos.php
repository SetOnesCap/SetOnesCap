<?php
$nyheter = array("Concerts","Info","Videos","Photos","Booking","Music");
$farge = array("red", "yellow", "blue", "cyan", "magenta", "green");
$i = 0;


?>


<section class="col-12 fg-black header-home" data-speed="1.7" data-type="background">
    <h1>Set One's Cap<span> Official Website</span></h1>
    <?php __getTitle($pageId); ?>

</section>
<div class="col-12 bg-blue bg-noise fg-white border">
    <div class="col-8 center text-center" id="introduction">
        <h1>Photoalbums:</h1>
        <p><?php __getContent($pageId); ?></p>


        <form>
            <?php __getPhotoAlbums() ?>



        </form>


    </div>
</div>
<main>


    <div class="bg-noise bg-black fg-white border">


        <div id="picturebox">

        </div>



        <div class='clear'></div>


    </div>



</main>