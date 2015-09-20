<script async src="./scripts/masonry.pkgd.min.js"></script>
<script async src="./scripts/imagesloaded.pkgd.min.js"></script>

<?php include("./service-variables.php"); ?>
<?php include("./modules/apicacher.php"); ?>
<?php

function convertSafeimageUrl($string, $start, $end)
{
    $string = " " . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return "";
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return urldecode(substr($string, $ini, $len));
}

function removeUrls($string)
{
    $removeUrls = '@(https?://([-\w\.]+[-\w])+(:\d+)?(/([\w/_\.#-]*(\?\S+)?[^\.\s])?)?)@';
    return preg_replace($removeUrls, ' ', $string);
}


function postShouldLoad($latest_post_text, $latest_post_name, $latest_post_story)
{
    if ($latest_post_text != '' && ($latest_post_name != 'Live Photos') && ($latest_post_name != 'Ocean Sound Recordings 2015') && ($latest_post_story != 'Set One\'s Cap updated their profile picture.')){
        return true;
    }else{
        return false;
    };
}

function makeTagLinks($latest_post_text)
{
    return preg_replace('/(?<!\S)#([0-9a-zA-Z]+)/', '<a href="https://www.facebook.com/hashtag/$1" target="_blank">#$1</a>', $latest_post_text);
}

$accessToken = $facebookAccessToken;
$pageId = $facebookPageId;
$data = getJson("https://graph.facebook.com/" . $pageId . "/promotable_posts?access_token=" . $accessToken);
$result = json_decode($data);

$postCount = (isset($result->data)) ? count($result->data) : 0;
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
        $latest_post_link = $latest_post->link;
        $latest_post_picture = $latest_post->picture;
        $latest_post_caption = (isset($latest_post->caption)) ? $latest_post->caption : '';
        $latest_post_date = strtotime($latest_post->created_time);
        $latest_post_date = date("F j, Y", $latest_post_date);
        $latest_post_name = (isset($latest_post->name)) ? $latest_post->name : '';
        $latest_post_story = (isset($latest_post->story)) ? $latest_post->story : '';

        $buttonText = "Read more";
        $postType = 'website';
        $latest_post_title = '';
        $text = $latest_post_text;

        // Set post title
        if ($latest_post_name != '') {
            $latest_post_title = $latest_post_name;
        } elseif ($latest_post_story != '') {
            $latest_post_title = $latest_post_story;
        } else {
            $latest_post_title = preg_replace('/(.*?[?!.](?=\s|$)).*/', '\\1', $text);
        }

        // Remove URLs
        $latest_post_text = removeUrls($latest_post_text);

        // Set button text
        if (strpos($latest_post_link, 'facebook') !== false) {
            $postType = 'facebook';
            if (strpos($latest_post_link, 'events') !== false) {
                $postType = 'facebookEvent';
            }
        } else if (strpos($latest_post_link, 'youtube') !== false) {
            $postType = 'youtube';
        } else if (strpos($latest_post_picture, 'safe_image.php') !== false && strpos($latest_post_picture, 'facebook.com') == false) {
            $postType = 'safeimageWebsite';
        }

        if ($postType == 'facebook') {
            $latest_post_text = makeTagLinks($latest_post_text);
            $buttonText = 'See facebook post';
            if ($postType == 'facebookEvent') {
                $buttonText = "See facebook event";
            }
        }

        if ($postType == 'youtube') {
            $buttonText = "Watch YouTube video";
        }
        if ($latest_post_caption != '' && ($postType == 'website' || $postType == 'safeImageWebsite')) {
            $buttonText = 'Read more at ' . $latest_post_caption;
        }

        if (postShouldLoad($latest_post_text, $latest_post_name, $latest_post_story)) {
            ?>
            <div class="col-4 news-post" itemscope itemtype="http://schema.org/Article">
                <div class="panel bg-white fg-black no-padding">

                    <?php
                    echo "<div class='no-padding fb-thumb'>";
                    echo "<span itemprop='headline' style='display: none'> $latest_post_title </span>";
                    echo "<span>";
                    if ($postType != 'youtube' && $postType != 'website' && $latest_post_picture != '' && $latest_post->type == 'photo') {
                        $photodata = getJson("https://graph.facebook.com/" . $latest_post->object_id . "?fields=images&access_token=" . $accessToken);
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

                        echo "<img src='" . htmlspecialchars($photoSource, ENT_COMPAT) . "' itemprop='image' width='" . $photoWidth . "' height='" . $photoHeight . "' alt='Picture from facebook' />";

                    } else if ($postType == 'youtube') {
                        $youtubeId = str_replace('https://', '', $latest_post_link);
                        $youtubeId = str_replace('http://', '', $youtubeId);
                        $youtubeId = str_replace('www.youtube.com/watch?v=', '', $youtubeId);
                        $photoSource = 'https://i.ytimg.com/vi/' . $youtubeId . '/hqdefault.jpg';
                        echo "<img src='" . $photoSource . "' itemprop='image' alt='Picture from facebook post'/>";

                    } elseif ($postType == 'safeimageWebsite') {
                        $safeImageUrl = $latest_post_picture;
                        $parsedSafeImageUrl = convertSafeimageUrl($safeImageUrl, "&url=", "&cfs=");
                        echo "<img src='" . $parsedSafeImageUrl . "' itemprop='image' alt='Picture from " . $latest_post_caption . "' />";
                    } else if ($latest_post_picture != '') {
                        //echo "<img src='" . htmlspecialchars($latest_post_picture, ENT_COMPAT) . "' itemprop='image' alt='Picture from facebook post'/>";
                    }
                    echo "</span>";
                    echo "</div>";
                    ?>
                    <div class=''>
                        <p class="fb-date"><span itemprop="datePublished"><?php echo $latest_post_date; ?></span></p>

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
    <script async>
        $(window).load(function () {
            var $container = $('#news-posts').masonry();
            $container.imagesLoaded(function () {
                $container.masonry();
            });
        });
    </script>