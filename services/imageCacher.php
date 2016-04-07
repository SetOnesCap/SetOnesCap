<?php
set_time_limit(300);
function getimg($url)
{
    $headers[] = 'Accept: image/gif, image/x-bitmap, image/jpeg, image/pjpeg';
    $headers[] = 'Connection: Keep-Alive';
    $headers[] = 'Content-type: application/x-www-form-urlencoded;charset=UTF-8';
    $user_agent = 'php';
    $process = curl_init($url);
    curl_setopt($process, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($process, CURLOPT_HEADER, 0);
    curl_setopt($process, CURLOPT_USERAGENT, $user_agent);
    curl_setopt($process, CURLOPT_TIMEOUT, 30);
    curl_setopt($process, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($process, CURLOPT_FOLLOWLOCATION, 1);

    $return = curl_exec($process);
    $http_code = curl_getinfo($process, CURLINFO_HTTP_CODE);
    if ($http_code !== 404 && $http_code !== 400) {
        curl_close($process);
        return $return;
    } else {
        return false;
    }
}

function cacheImage($image_url, $data_source)
{
    $stripped_image_url = strtok($image_url, '?');
    $image_name = basename($stripped_image_url);
    $image_directory = $_SERVER['DOCUMENT_ROOT'] . '/cache/images/src/' . $data_source . '/';
    if (!file_exists($image_directory)) {
        mkdir($image_directory, 0777, true);
    }
    if (!file_exists($image_directory . $image_name)) {
        $image = getimg($image_url);
        if ($image) {
            file_put_contents($image_directory . md5($image_name) . '.jpg', $image);
            return md5($image_name) . '.jpg';
        } else {
            return false;
        }
    }

}