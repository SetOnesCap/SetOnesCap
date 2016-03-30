<?php
function cacheAudio($url, $file_type) {
    $cacheFile = $_SERVER['DOCUMENT_ROOT'] . '/cache/audio/' . md5($url). '.' . $file_type;
    $file_directory = 'http://' . $_SERVER['SERVER_NAME'] . '/cache/audio/' . md5($url). '.' . $file_type;
    
    if (file_exists($cacheFile)) {
        return $file_directory;
    }

    $audio = file_get_contents($url);

    $fh = fopen($cacheFile, 'w');
    fwrite($fh, $audio);
    fclose($fh);



    return $file_directory;
}