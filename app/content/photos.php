<?php
$nyheter = array("Concerts","Info","Videos","Photos","Booking","Music");
$farge = array("red", "yellow", "blue", "cyan", "magenta", "green");
$i = 0;


?>



<div class="col-12 bg-white fg-black">

    <p><?php __getContent($pageId); ?></p>


    <form>
        <?php __getPhotoAlbums() ?>



    </form>


</div>
<main>


    <div class="bg-noise bg-black fg-white border">


        <div id="picturebox">

        </div>



        <div class='clear'></div>


    </div>



</main>