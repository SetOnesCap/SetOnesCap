<?php include("./service-variables.php"); ?>
<?php
/* gets the data from a URL */

function get_data($url) {
    $ch = curl_init();
    $timeout = 5;
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}

$accessToken = $facebookAccessToken;
$pageId = $facebookPageId;

$data = get_data("https://graph.facebook.com/" . $pageId . "/promotable_posts?access_token=" . $accessToken);

$result = json_decode($data);



echo "<div id='masonryContainer'>";
	for ($i=0; $i < 30; $i++) {

        $latest_post =  $result->data[$i];
        $latest_post_text = $latest_post->message;

        $latest_post_linktitle = (strlen($latest_post_text) > 83) ? substr($latest_post_text,0,80).'...' : $latest_post_text;
        //$latest_post_title = (strlen($latest_post_text) > 53) ? substr($latest_post_text,0,50).'...' : $latest_post_text;
        preg_match('/^([^.!?]*[\.!?]+){0,1}/', strip_tags($latest_post_text), $tittel);


        $latest_post_link = $latest_post->link;
        $latest_post_picture = $latest_post->picture;

        $latest_post_date = strtotime($latest_post->created_time);
        $postDate = date("j M", $latest_post_date);


        if($latest_post_text !='' && ($latest_post->name != 'Live Photos')){

            ?>

            <div class="col-3 masonry-brick">
                <div class="panel bg-noise bg-white fg-black no-padding">

                <?php
                echo "<div class='no-padding fb-thumb'>";
                if($latest_post_picture !='' &$latest_post->type == 'photo') {
                    $photodata = get_data("https://graph.facebook.com/" . $latest_post->object_id);
                    $photoresult = json_decode($photodata);
                    echo "<img src='" . $photoresult->images[4]->source . "' alt='" . $latest_post_title . "' class='' />";
                }else if($latest_post_picture !=''){
                    echo "<img src='" . $latest_post_picture . "'/>";
                }
                echo "</div>";
                ?>
                <div class=''>
                    <p class="fb-date"><?php echo $postDate; ?></p>
                    <p><?php echo $tittel[0] ?>

                        <a href="#" onclick="return false" class='prettydate' title='<?php echo $latest_post_date ?>'></a>
                    </p>
                    <?php
                    if ($latest_post_link != '' && $latest_post_link != null) {
                        echo "<a href='" . $latest_post_link . "' class='button bg-setonescap-red fg-white'>Read more...</a>";
                    }
                    ?>
                </div>




                <div class="clearfix"></div>
                </div>
            </div>


            <?php
             }
    }

echo "</div>";
?>

<script src="/scripts/masonry.pkgd.js"></script>


<script>
$(window).load(function(){
$('#masonryContainer').masonry({
itemSelector: '.masonry-brick',
columnWidth: 247
});
});
</script>


