<?php
function getPost($post){
	if (isset($post->message) && $post->message != ''){
		ob_start();?>
		<div class='col col-xs-12 col-sm-6 col-md-4 col-lg-3'>
			<div class='box z-1 <?php echo $post->source ?>'>
				<?php if (isset($post->images) && $post->images != ''){
					$images = $post->images;
				?>
				<div class='thumbnail'>
					<img src='<?php echo $images->medium->source; ?>'
                         height='<?php echo $images->medium->height; ?>'
                         width='<?php echo $images->medium->width; ?>'
						 srcset='<?php echo $images->small->source; ?> 240w, <?php echo $images->medium->source; ?> 320w, <?php echo $images->large->source; ?> 480w, <?php echo $images->full->source; ?> 590w'
                         sizes='(min-width: 1200px) 25vw, (min-width: 992px) 33.3vw, (min-width: 768px) 50vw, 100vw'
                    />
				</div>
				<?php } ?>
				<div class='content'>
					<p><?php echo $post->message; ?></p>
					<p><?php echo $post->created_time; ?></p>
				</div>
			</div>
		</div>
	<?php return ob_get_contents();
	}
}