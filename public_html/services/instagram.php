<script src="../scripts/masonry.pkgd.min.js"></script>

<script>
    var container = document.querySelector('#news-posts');
    var msnry = new Masonry( container, {
        // options
        itemSelector: '.news-post'
    });
</script>
<?php include("./service-variables.php"); ?>

<?php

$accessToken = $instagramAccessToken; // Your API Client ID
$userId = $instagramUserId; // ID of the user you are fetching the information for


$instagram_url = "https://api.instagram.com/v1/users/" . $userId . "/media/recent?access_token=" . $accessToken . "";

$images_json = file_get_contents($instagram_url);
$images = json_decode($images_json);
?>

<h2>Latest instagram photos</h2>
<div id='news-posts' class='js-masonry' data-masonry-options='{ "itemSelector": ".news-post" }'>

<?php
foreach ($images->data as $image) {
 /*   String x = "1414678736"; // created_time tag value goes here.
long foo = **Long.parseLong(x)*1000;**
Date date = new Date(foo);
DateFormat formatter = new SimpleDateFormat("MMMM dd,yyyy");
    */
   // $latest_post_date = strtotime($image->created_time);
        $postDate = date("F j, Y", $image->created_time);
   // echo "<img src='" . $image->images->standard_resolution->url . "'/>";?>

<div class="col-3 news-post" itemscope itemtype="http://schema.org/Article">
                <div class="panel bg-noise bg-white fg-black no-padding">

                <?php
                echo "<div class='no-padding fb-thumb' style='max-height: 640px;'>";
                echo "<span itemprop='thumbnail'>";

if($image->type == "image") {
    echo "<img src='" . $image->images->standard_resolution->url . "' alt='" . $image->caption->text . "'/>";
}
                elseif($image->type == "video"){
                    echo "<video controls>";
                    echo "<source src='" . $image->videos->standard_resolution->url . "' type='video/mp4'/>";
                    echo "</video>";
                }
                echo "</span>";
                echo "</div>";
                ?>
    <div class=''>
        <p class="fb-date"><span itemprop="datePublished"><?php echo "$postDate"; ?></span></p>
        <p><span itemprop="articleBody"><?php echo $image->caption->text ?></span></p>

    </div>
    <div class="clearfix"></div>
</div>
</div>
    <?php
}
?>
    </div>