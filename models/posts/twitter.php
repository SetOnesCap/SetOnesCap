<?php

class TwitterPost extends Post
{
    function getImage($data)
    {
        if (isset($data->media) && isset($data->media[0]->media_url)) {
            return ($data->media[0]->media_url != '' && $data->media[0]->media_url != null) ? $data->media[0]->media_url : '';
        } else {
            return '';
        }
    }

    function __construct($data)
    {
        $message = $data->text;
        $created_time = date('M j, Y', strtotime($data->created_at));
        $created_time_unix = strtotime($data->created_at);
        $image_source = $this->getImage($data->entities);
        $data_source = 'twitter';
        parent::__construct($message, $created_time, $created_time_unix, $image_source, $data_source);

    }
}

;