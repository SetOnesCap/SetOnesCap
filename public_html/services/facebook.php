<script src="./scripts/masonry.pkgd.min.js"></script>
<script src="./scripts/imagesloaded.pkgd.min.js"></script>

<?php include("./service-variables.php"); ?>
<?php
/* gets the data from a URL */

function get_data($url)
{
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

$postCount = count($result->data);
?>
<div class="line-through">
    <span></span>

    <h2>Latest news</h2>
</div>
<div id='news-posts' class='js-masonry' data-masonry-options='{ "itemSelector": ".news-post" }'>
    <?php
    for ($i = 0; $i < $postCount; $i++) {
        $latest_post = $result->data[$i];
        $latest_post_text = (isset($latest_post->message) ? $latest_post->message : '');
        $latest_post_linktitle = (strlen($latest_post_text) > 83) ? substr($latest_post_text, 0, 80) . '...' : $latest_post_text;
        preg_match('/^([^.!?]*[\.!?]+){0,1}/', strip_tags($latest_post_text), $tittel);
        $latest_post_link = $latest_post->link;
        $latest_post_picture = $latest_post->picture;
        $latest_post_date = strtotime($latest_post->created_time);
        $latest_post_name = (isset($latest_post->name)) ? $latest_post->name : '';
        $postDate = date("F j, Y", $latest_post_date);
        $buttonText = "Read more";

        $postType = '';


        // Make hrefs from urls in string
        $latest_post_text = preg_replace('@((https?://)?([-\w]+\.[-\w\.]+)+\w(:\d+)?(/([-\w/_\.]*(\?\S+)?)?)*)@', '<a href="$1" target="blank">$1</a>', $latest_post_text);
        $latest_post_text = str_replace("href=\"www.","href=\"http://www.",$latest_post_text);

        /* Set button text */
        if (strpos($latest_post_link, 'facebook') !== false) {
            $postType = 'facebook';
            if (strpos($latest_post_link, 'events') !== false) {
                $postType = 'facebookEvent';
            }
        } else if (strpos($latest_post_link, 'youtube') !== false) {
            $postType = 'youtube';
        }

        if ($postType == 'facebook') {
            $latest_post_text = preg_replace('/(?<!\S)#([0-9a-zA-Z]+)/', '<a href="https://www.facebook.com/hashtag/$1" target="_blank">#$1</a>', $latest_post_text);
            $buttonText = 'See facebook post';
            if ($postType == 'facebookEvent') {
                $buttonText = "See facebook event";
            }
        }

        if ($postType == 'youtube') {
            $buttonText = "Watch YouTube video";
        }





        if ($latest_post_text != '' && ($latest_post_name != 'Live Photos') && ($latest_post_name != 'Ocean Sound Recordings 2015')) {
            ?>
            <div class="col-4 news-post" itemscope itemtype="http://schema.org/Article">
                <div class="panel bg-white fg-black no-padding">
                    <?php
                    echo "<div class='no-padding fb-thumb'>";
                    echo "<span itemprop='thumbnail'>";
                    if ($postType != 'youtube' && $latest_post_picture != '' && $latest_post->type == 'photo') {
                        $photodata = get_data("https://graph.facebook.com/" . $latest_post->object_id . "?fields=images&access_token=" . $accessToken);
                        $photoresult = json_decode($photodata);
                        $photoCount = count($photoresult->images);
                        for ($index = 0; $index < $photoCount; $index++) {
                            if ($photoresult->images[$index]->width > 400 && $photoresult->images[$index]->width < 700) {
                                $photoSource = $photoresult->images[$index]->source;
                                $photoWidth = $photoresult->images[$index]->width;
                                $photoHeight = $photoresult->images[$index]->height;
                            }
                        }
                        if ($photoSource == '' || $photoSource == null) {
                            $photoSource = $photoSource = $photoresult->images[2]->source;
                        }

                        echo "<img src='" . htmlspecialchars($photoSource, ENT_COMPAT) . "' width='" . $photoWidth . "' height='" . $photoHeight . "' alt='Picture from facebook' />";
                    } else if ($postType == 'youtube') {
                        $youtubeId = str_replace('https://', '', $latest_post_link);
                        $youtubeId = str_replace('http://', '', $youtubeId);
                        $youtubeId = str_replace('www.youtube.com/watch?v=', '', $youtubeId);
                        $photoSource = 'https://i.ytimg.com/vi/' . $youtubeId . '/hqdefault.jpg';
                        echo "<img src='" . $photoSource . "' alt='Picture from facebook post'/>";
                    } else if ($latest_post_picture != '') {
                        echo "<img src='" . htmlspecialchars($latest_post_picture, ENT_COMPAT) . "' alt='Picture from facebook post'/>";
                    }
                    echo "</span>";
                    echo "</div>";
                    ?>
                    <div class=''>
                        <p class="fb-date"><span itemprop="datePublished"><?php echo $postDate; ?></span></p>

                        <p><span itemprop="articleBody"><?php echo $latest_post_text ?></span></p>
                        <?php
                        if ($latest_post_link != '' && $latest_post_link != null && strpos($latest_post_link, 'setonescap.com') == false) {
                            echo "<a target='_blank' href='" . htmlspecialchars($latest_post_link, ENT_COMPAT) . "' class='button bg-setonescap-red fg-white'>" . $buttonText . "</a>";
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
    <script>
        $(window).load(function () {
            var $container = $('#news-posts').masonry();
            $container.imagesLoaded(function () {
                $container.masonry();
            });
        });
    </script>