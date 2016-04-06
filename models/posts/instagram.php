<?php

class InstagramPost extends Post
{
    function __construct($data)
    {
        $message = $data->caption->text;
        $created_time = date('M j, Y', $data->created_time);
        $created_time_unix = $data->created_time;
        $created_time_iso = date('c', $data->created_time);
        $updated__time_iso = $created_time_iso;
        $image_source = $data->images->standard_resolution->url;
        $crop_image = true;
        $data_source = 'instagram';
        parent::__construct($message, $created_time, $created_time_unix, $created_time_iso, $updated__time_iso, $image_source, $crop_image, $data_source);

    }
}