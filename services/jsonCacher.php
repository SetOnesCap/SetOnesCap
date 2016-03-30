<?php
function cacheJson($json_data, $file_name) {
    $cacheFile = $_SERVER['DOCUMENT_ROOT'] . '/cache/json/' . $file_name  . '.json';
    $fh = fopen($cacheFile, 'w');
    fwrite($fh, $json_data);
    fclose($fh);
}

function cacheJsonFromUrl($url, $file_name) {
    $cacheFile = $_SERVER['DOCUMENT_ROOT'] . '/cache/json/' . $file_name  . '.json';
    $json = file_get_contents($url);
    $fh = fopen($cacheFile, 'w');
    fwrite($fh, $json);
    fclose($fh);

    return $json;
}

function getJson($file_name) {
    $cacheFile = $_SERVER['DOCUMENT_ROOT'] . '/cache/json/' . $file_name . '.json';
    if (file_exists($cacheFile)) {
        $fh = fopen($cacheFile, 'r');
        return fread($fh, filesize($cacheFile));
    }
    else {
        return "No data available";
    }
}