<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/services/imageOptimizer.php');

class Track
{
    function __construct($title, $released_time, $released_time_unix, $playback_count, $like_count, $image_source, $data_source, $stream_source)
    {
        if ($image_source != '') {
            $image_file = cacheImage($image_source, $data_source);

            if ($image_file) {
                // Optimize image
                $local_original_image_source = '/cache/images/src/' . $data_source . '/' . $image_file;
                $optimized_image_destination = '/cache/images/optimized/' . $data_source;
                $image_dimensions = optimizeImage($local_original_image_source, $optimized_image_destination, $image_file, false);
                $this->images = $image_dimensions;
            }
        }

        $this->title = htmlentities($title);
        $this->released_time = $released_time;
        $this->released_time_unix = $released_time_unix;
        $this->playback_count = $playback_count;
        $this->like_count = $like_count;
        $this->stream_source = $stream_source;
        $this->source = $data_source;

    }
}

;