<?php

class GooglePost extends Post
{
    function convertSafeimageUrl($string, $start, $end)
    {
        $string = " " . $string;
        $ini = strpos($string, $start);
        if ($ini == 0) return "";
        $ini += strlen($start);
        $len = strpos($string, $end, $ini) - $ini;
        return urldecode(substr($string, $ini, $len));
    }

    function getImage($data)
    {
        if (isset($data->attachments)) {
            if (isset($data->attachments[0]->fullImage)) {
                $image_url = $data->attachments[0]->fullImage->url;
                if (strpos($image_url, 'safe_image.php') !== false) {
                    return $this->convertSafeimageUrl($image_url, "&url=", "&cfs=");
                } elseif ($data->attachments[0]->fullImage->type == "image/jpeg") {
                    $stripped_image_url = strtok($image_url, '?');
                    return $stripped_image_url;
                } else {
                    return '';
                }
            } else {
                return '';
            }
        } else {
            return '';
        }
    }


    function __construct($data)
    {
        $message = strip_tags($data->object->content);
        $created_time = date('M j, Y', strtotime($data->published));
        $created_time_unix = strtotime($data->published);
        $created_time_iso = $data->published;
        $updated_time_iso = $data->updated;
        $image_source = $this->getImage($data->object);
        $crop_image = false;
        $data_source = 'google';
        $tags = '';
        parent::__construct($message, $created_time, $created_time_unix, $created_time_iso, $updated_time_iso, $image_source, $crop_image, $tags, $data_source);

    }
}