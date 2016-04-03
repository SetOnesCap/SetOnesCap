<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/services/imageOptimizer.php');

class Post
{
    function __construct($message, $created_time, $created_time_unix, $image_source, $data_source)
    {
        if ($image_source != '') {
            $image_file = cacheImage($image_source, $data_source);

            if ($image_file) {
                // Optimize image
                $local_original_image_source = '/cache/images/src/' . $data_source . '/' . $image_file;
                $optimized_image_destination = '/cache/images/optimized/' . $data_source;
                $image_dimensions = optimizeImage($local_original_image_source, $optimized_image_destination, $image_file, true);
                $this->images = $image_dimensions;
            }
        }

        $regex = "@(https?://([-\w\.]+[-\w])+(:\d+)?(/([\w/_\.#-]*(\?\S+)?[^\.\s])?).*$)@";
        $message = preg_replace($regex, ' ', $message);

        $this->message = htmlentities($message);
        $this->source = $data_source;
        $this->created_time = $created_time;
        $this->created_time_unix = $created_time_unix;

    }
}

;

