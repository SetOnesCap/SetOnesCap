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

    function getTagsFromString($message)
    {
        preg_match_all('/(?<!\w)#\w+/', $message, $matches);
        return json_encode($matches);
    }

    function __construct($data)
    {
        $message = $data->text;
        $created_time = date('M j, Y', strtotime($data->created_at));
        $created_time_unix = strtotime($data->created_at);
        $created_time_iso = date('c', $created_time_unix);
        $updated_time_iso = $created_time_iso;
        $image_source = $this->getImage($data->entities);
        $crop_image = true;
        $data_source = 'twitter';
        $tags = $this->getTagsFromString($message);
        parent::__construct($message, $created_time, $created_time_unix, $created_time_iso, $updated_time_iso, $image_source, $crop_image, $tags, $data_source);

    }
}

;