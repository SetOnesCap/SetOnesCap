<?php
function getPost($post)
{
    if (isset($post->message) && $post->message != '') {
        ob_start(); ?>
        <div class='col col-xs-12 col-sm-6 col-md-4 col-lg-3'>
            <div class='box z-1 <?php echo $post->source ?>'>
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
                        <img src='<?php echo $images->w340->source; ?>'
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
                    </div>
                <?php } ?>
                <div class='content'>
                    <p><?php echo html_entity_decode($post->message); ?></p>

                </div>

            </div>
        </div>
        <?php return ob_get_contents();
    }
}