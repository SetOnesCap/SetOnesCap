<?php 
header('Content-Type: application/json');
include($_SERVER['DOCUMENT_ROOT'] . '/services/jsonCacher.php');
$jsonData = getJson('tracks.json');
echo $jsonData;