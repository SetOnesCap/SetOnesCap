<?php
function getPost($post)
{
    if (isset($post->message) && $post->message != '') {
        ob_start(); ?>
        <div class='col col-xs-12 col-sm-6 col-md-4 col-lg-3'>
            <div itemscope itemtype="http://schema.org/NewsArticle"
                 class='box z-1 <?php echo $post->source ?>'>
                <meta itemscope itemprop="mainEntityOfPage" itemType="https://schema.org/WebPage" itemid="http://www.setonescap.com/news"/>
                <div class="hidden">
                    <h2 itemprop="headline">Article headline</h2>
                    <h3 itemprop="author" itemscope itemtype="https://schema.org/Person">
                        By <span itemprop="name">Benjamin Dehli</span>
                    </h3>
                </div>
                <div class="box-header">
                    <div class="content">
                        <span><?php echo $post->created_time; ?></span>
                        <a href="#" class="float-right"><span class="icon"></span></a>
                    </div>
                </div>
                <?php if (isset($post->images) && $post->images != '') {
                    $images = $post->images;
                    ?>
                    <div class='thumbnail'>
                        <img itemprop="image"
                             itemscope itemtype="https://schema.org/ImageObject"
                             src='<?php echo $images->w340->source; ?>'
                             alt='Image from <?php echo $post->source ?>'
                             height='<?php echo $images->w340->height; ?>'
                             width='<?php echo $images->w340->width; ?>'
                             srcset='<?php echo $images->w240->source; ?> 240w,
						         <?php echo $images->w290->source; ?> 290w,
						         <?php echo $images->w340->source; ?> 340w,
						         <?php echo $images->w390->source; ?> 390w,
                                 <?php echo $images->w440->source; ?> 440w,
                                 <?php echo $images->w490->source; ?> 490w,
                                 <?php echo $images->w540->source; ?> 540w,
                                 <?php echo $images->w590->source; ?> 590w'
                             sizes='(min-width: 1200px) 25vw, (min-width: 992px) 33.3vw, (min-width: 768px) 50vw, 100vw'/>
                        <meta itemprop="url" content="<?php echo $images->w590->source; ?>">
                        <meta itemprop="width" content="<?php echo $images->w590->width; ?>">
                        <meta itemprop="height" content="<?php echo $images->w590->height; ?>">
                    </div>
                <?php } ?>
                <div class='content'>
                    <p><?php echo html_entity_decode($post->message); ?></p>

                </div>
                <div itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
                    <div itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
                        <img src="https://google.com/logo.jpg"/>
                        <meta itemprop="url" content="https://google.com/logo.jpg">
                        <meta itemprop="width" content="600">
                        <meta itemprop="height" content="60">
                    </div>
                    <meta itemprop="name" content="Set One's Cap">
                </div>
                <meta itemprop="datePublished" content="<?php echo $post->created_time_iso ?>"/>
                <meta itemprop="dateModified" content="<?php echo $post->updated_time_iso ?>"/>

            </div>
        </div>
        <?php return ob_get_contents();
    }
}