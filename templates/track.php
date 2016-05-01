<?php
function getTrack($track){
	ob_start();?>
	<div class='col-xs-12 col-sm-6 col-md-4 col-lg-3'>
		<div class='box z-1 <?php echo $track->source ?>'>
            <div class="box-header">
                <div class="content">
                    <span><?php echo $track->released_time; ?></span>
                    <a href="#" class="float-right"><span class="icon"></span></a>
                </div>
            </div>
			<?php if (isset($track->images) && $track->images != ''){
				$images = $track->images;
				?>
				<div class='thumbnail'>
					<img src='<?php echo $images->w340->source; ?>'
						 alt='Image from <?php echo $track->source ?>'
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
			<audio controls preload="none">
				<source src="<?php echo $track->stream_source ?>" type="audio/mpeg">
				Your browser does not support the audio element.
			</audio>
			<div class='content'>

				<p><?php echo $track->title; ?></p>
                <p><?php echo $track->like_count; ?></p>

			</div>
		</div>
	</div>
<?php return ob_get_contents();
}