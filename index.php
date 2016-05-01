<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/environment.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/services/jsonCacher.php');
$page = isset($_GET["page"]) ? ($_GET["page"]) : "index";

cacheHtmlFromUrl($_ENV["ROOT_URL"] . '/templates/views/' . $page . '.php', $page . '.html');
echo getHtml($page . '.html');