<?php
function getTrack($track){
	ob_start();?>
	<div class='col col-xs-12 col-sm-6 col-md-4 col-lg-3'>
		<div class='box <?php echo $track->source ?>'>
			<?php if (isset($track->images) && $track->images != ''){
				$images = $track->images;
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
				<audio controls preload="none">
					<source src="<?php echo $track->stream_source ?>" type="audio/mpeg">
					Your browser does not support the audio element.
				</audio>
				<p><?php echo $track->title; ?></p>
				<p><?php echo $track->released_time; ?></p>
			</div>
		</div>
	</div>
<?php return ob_get_contents();
}