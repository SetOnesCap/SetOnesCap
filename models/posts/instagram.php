<?php

class InstagramPost extends Post
{
    function __construct($data)
    {
        $message = $data->caption->text;
        $created_time = date('M j, Y', $data->created_time);
        $created_time_unix = $data->created_time;
        $image_source = $data->images->standard_resolution->url;
        $data_source = 'instagram';
        parent::__construct($message, $created_time, $created_time_unix, $image_source, $data_source);

    }
}

;