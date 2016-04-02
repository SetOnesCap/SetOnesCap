<?php
function cacheAudio($url, $file_type)
{
    set_time_limit(300);
    $cache_directory = $_SERVER['DOCUMENT_ROOT'] . '/cache/audio/';
    if (!file_exists($cache_directory)) {
        mkdir($cache_directory, 0777, true);
    }
    $cacheFile = $cache_directory . md5($url) . '.' . $file_type;
    $file_directory = 'http://' . $_SERVER['SERVER_NAME'] . '/cache/audio/' . md5($url) . '.' . $file_type;

    if (file_exists($cacheFile)) {
        return $file_directory;
    }

    $audio = file_get_contents($url);

    $fh = fopen($cacheFile, 'w');
    fwrite($fh, $audio);
    fclose($fh);


    return $file_directory;
}