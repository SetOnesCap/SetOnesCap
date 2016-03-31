<?php
function get_api_content($location){
	$data_url = "http://" . $_SERVER['SERVER_NAME'] . "/api/" . $location;
	$json_data = file_get_contents($data_url);
	$object = json_decode($json_data);
	return $object;
}