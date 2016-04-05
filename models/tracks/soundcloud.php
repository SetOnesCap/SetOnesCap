<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/environment.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/models/track.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/services/audioCacher.php');

class SoundcloudTrack extends Track
{	
	function __construct($data)
	{
		$title = $data->title;
		$released_time_string = $data->release_day . "-" . $data->release_month . "-" . $data->release_year;
		$released_time_unix = strtotime($released_time_string);
		$released_time = date('M j, Y', $released_time_unix);
		$playback_count = $data->playback_count;
		$like_count = $data->favoritings_count;
		$image_source = str_replace('large.jpg', 't500x500.jpg', $data->artwork_url);
		$crop_image = false;
		$data_source = 'soundcloud';

		$client_id = $_ENV["SOUNDCLOUD_CLIENT_ID"];

		$streamUrl = $data->stream_url . '?client_id=' . $client_id;
    	$local_audio_file = cacheAudio($streamUrl, 'mp3');


		parent::__construct($title, $released_time, $released_time_unix, $playback_count, $like_count, $image_source, $crop_image, $data_source, $local_audio_file);
	}	
};