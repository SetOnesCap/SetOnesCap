<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/models/image.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/services/imageCropper.php');


function createOptimizedImage($max_width, $source_file, $destination, $image_file)
{
    $max_height = 1000;
    $quality = 60;
    $source_pic = 'http://' . $_SERVER['SERVER_NAME'] . $source_file . '';
    $src = imagecreatefromjpeg($source_pic);
    list($width, $height) = getimagesize($source_pic);

    $x_ratio = $max_width / $width;
    $y_ratio = $max_height / $height;

    if (($width <= $max_width) && ($height <= $max_height)) {
        $tn_width = $width;
        $tn_height = $height;
    } elseif (($x_ratio * $height) < $max_height) {
        $tn_height = ceil($x_ratio * $height);
        $tn_width = $max_width;
    } else {
        $tn_width = ceil($y_ratio * $width);
        $tn_height = $max_height;
    }

   /* $profiles = $src->getImageProfiles("icc", true);
    $src->stripImage();
    if(!empty($profiles)) $src->profileImage("icc", $profiles['icc']);*/


    $tmp = imagecreatetruecolor($tn_width, $tn_height);
    imagecopyresampled($tmp, $src, 0, 0, 0, 0, $tn_width, $tn_height, $width, $height);
    $destination_directory = $_SERVER['DOCUMENT_ROOT'] . $destination . '/w' . $max_width . '/';
    if (!file_exists($destination_directory)) {
        mkdir($destination_directory, 0777, true);
    }
    
    $destination_pic_directory = $destination_directory . $image_file;
    $destination_pic_url = 'http://' . $_SERVER['SERVER_NAME'] . $destination . '/w' . $max_width . '/' . $image_file;
    imagejpeg($tmp, $destination_pic_directory, $quality);
    imagedestroy($src);
    imagedestroy($tmp);

    return array("source" => $destination_pic_url, "width" => $tn_width, "height" => $tn_height);
}

function optimizeImage($source_file, $destination, $image_file, $image_crop)
{
    if ($image_crop) {
        $source_file = cropImage($_SERVER['DOCUMENT_ROOT'] . $source_file);
    }
    $images = array();
    $images['w590'] = createOptimizedImage(590, $source_file, $destination, $image_file);
    $images['w540'] = createOptimizedImage(540, $source_file, $destination, $image_file);
    $images['w490'] = createOptimizedImage(490, $source_file, $destination, $image_file);
    $images['w440'] = createOptimizedImage(440, $source_file, $destination, $image_file);
    $images['w390'] = createOptimizedImage(390, $source_file, $destination, $image_file);
    $images['w340'] = createOptimizedImage(340, $source_file, $destination, $image_file);
    $images['w290'] = createOptimizedImage(290, $source_file, $destination, $image_file);
    $images['w240'] = createOptimizedImage(240, $source_file, $destination, $image_file);


    return $images;
}