<?php 
header('Content-Type: application/json');
include($_SERVER['DOCUMENT_ROOT'] . '/services/jsonCacher.php');
$jsonData = getJson('posts.json');
echo $jsonData;