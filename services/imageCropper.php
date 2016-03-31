<?php

function cropImage($image_url){
//load the image
$img = imagecreatefromjpeg($image_url);

//find the size of the borders
$b_top = 0;
$b_btm = 0;
$b_lft = 0;
$b_rt = 0;
$treshold = 0xF5;
$extra_crop = 5;

//top
for(; $b_top < imagesy($img); ++$b_top) {
  for($x = 0; $x < imagesx($img); ++$x) {
    $color = imagecolorat($img, $x, $b_top);
    $color = array(
    'red'   => ($color >> 16) & 0xFF,
    'green' => ($color >>  8) & 0xFF,
    'blue'  => ($color >>  0) & 0xFF,
    );
    if ($color['red'] <= $treshold && $color['green'] <= $treshold && $color['blue']  <= $treshold) {
      break 2;
    }
  }
}

//bottom
for(; $b_btm < imagesy($img); ++$b_btm) {
  for($x = 0; $x < imagesx($img); ++$x) {
    $color = imagecolorat($img, $x, imagesy($img) - $b_btm-1);
    $color = array(
    'red'   => ($color >> 16) & 0xFF,
    'green' => ($color >>  8) & 0xFF,
    'blue'  => ($color >>  0) & 0xFF,
    );
    if ($color['red'] <= $treshold && $color['green'] <= $treshold && $color['blue']  <= $treshold) {
      break 2;
    }
  }
}

//left
for(; $b_lft < imagesx($img); ++$b_lft) {
  for($y = 0; $y < imagesy($img); ++$y) {
    $color = imagecolorat($img, $b_lft, $y);
    $color = array(
    'red'   => ($color >> 16) & 0xFF,
    'green' => ($color >>  8) & 0xFF,
    'blue'  => ($color >>  0) & 0xFF,
    );
    if ($color['red'] <= $treshold && $color['green'] <= $treshold && $color['blue']  <= $treshold) {
      break 2;
    }
  }
}

//right
for(; $b_rt < imagesx($img); ++$b_rt) {
  for($y = 0; $y < imagesy($img); ++$y) {
    $color = imagecolorat($img, imagesx($img) - $b_rt-1, $y);
    $color = array(
    'red'   => ($color >> 16) & 0xFF,
    'green' => ($color >>  8) & 0xFF,
    'blue'  => ($color >>  0) & 0xFF,
    );
    if ($color['red'] <= $treshold && $color['green'] <= $treshold && $color['blue']  <= $treshold) {
      break 2;
    }
  }
}

// Add extra crop
$b_top += $extra_crop;
$b_btm += $extra_crop;
$b_lft += $extra_crop;
$b_rt += $extra_crop;

//copy the contents, excluding the border
$newimg = imagecreatetruecolor(
    imagesx($img)-($b_lft+$b_rt), imagesy($img)-($b_top+$b_btm));

imagecopy($newimg, $img, 0, 0, $b_lft, $b_top, imagesx($newimg), imagesy($newimg));

//finally, output the image
$stripped_image_url = strtok($image_url, '?'); 
$imagename= basename($stripped_image_url);
$image_directory = $_SERVER['DOCUMENT_ROOT'] . '/src/images/cropped/' . $imagename;
$cropped_image_url= '/src/images/cropped/' . $imagename;

imagejpeg($newimg, $image_directory);
return $cropped_image_url;
}
