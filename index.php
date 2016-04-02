<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/environment.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/services/jsonCacher.php');

cacheJsonFromUrl($_ENV["ROOT_URL"] . '/templates/index.php', 'index.html');

echo getJson('index.html');