<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/models/image.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/services/imageCropper.php');

function optimizeImage($url, $destination, $image_crop) {
	if ($image_crop){
		$url = cropImage($url);
	}
	$max_width = 589;
	$max_height = 589;
	$destination = $destination;
	$quality = 60;
	$source_pic = ''.$url.'';
	$src = imagecreatefromjpeg($source_pic);
	list($width,$height)=getimagesize($source_pic);

	$x_ratio = $max_width / $width;
	$y_ratio = $max_height / $height;

	if( ($width <= $max_width) && ($height <= $max_height) ){
	$tn_width = $width;
	$tn_height = $height;
	} elseif (($x_ratio * $height) < $max_height){
	$tn_height = ceil($x_ratio * $height);
	$tn_width = $max_width;
	} else {
	$tn_width = ceil($y_ratio * $width);
	$tn_height = $max_height;
	}

	$tmp=imagecreatetruecolor($tn_width,$tn_height);
	imagecopyresampled($tmp,$src,0,0,0,0,$tn_width, $tn_height,$width,$height);
	$destination_pic = ''.$destination;
	imagejpeg($tmp,$destination_pic,$quality);
	imagedestroy($src);
	imagedestroy($tmp);
	return new Image($tn_width, $tn_height);
}