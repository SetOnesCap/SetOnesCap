<?php

function cacheJson($json_data, $file_name)
{
    $cache_directory = $_SERVER['DOCUMENT_ROOT'] . '/cache/json/';
    if (!file_exists($cache_directory)) {
        mkdir($cache_directory, 0777, true);
    }
    $cacheFile = $cache_directory . $file_name;
    $fh = fopen($cacheFile, 'w');
    fwrite($fh, $json_data);
    fclose($fh);
}

function cacheJsonFromUrl($url, $file_name)
{
    $json_data = file_get_contents($url);
    cacheJson($json_data, $file_name);
    return $json_data;
}

function getJson($file_name)
{
    $cacheFile = $_SERVER['DOCUMENT_ROOT'] . '/cache/json/' . $file_name;
    if (file_exists($cacheFile)) {
        $fh = fopen($cacheFile, 'r');
        return fread($fh, filesize($cacheFile));
    } else {
        return "No data available";
    }
}