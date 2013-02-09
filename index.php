<?php

	include_once ( 'config.php' );

	foreach( $urls as $url ) {
	  	$input = @file_get_contents($url[1]) or die("Could not access file:". $url[1]);
		$regexp = "audio.radiorecord.ru(.*)\.mp3";

		echo "Searching for mp3s: " . $url[1] . "\n\r";

		$cat = $url[0];

		if ( preg_match_all ( "/$regexp/siU", $input, $matches, PREG_SET_ORDER ) ) {
			foreach($matches as $match) {
				$mp3s[] = array( $cat , 'http://' . $match[0] );
			}
		}
	}
	
	foreach ($mp3s as $t):
		if (!is_dir('downloads'))
			mkdir('downloads');

		$dir = 'downloads/' . $t[0];
		if (!is_dir($dir))
			mkdir($dir);

		$name = explode("/", $t[1]);
		$name = $name[5];

		$out = trim($dir . '/' . $name);

		$url = str_replace(' ', '%20', $t[1] );

		if (!file_exists($out))
		{
			echo "Downloading file: " . $url . "\n\r";
			// $data = get_data($url);
			// file_put_contents($out, $data);
			echo "Saved to: " . $out . "\n\r";
		} else 
		{
			echo "Found file " . $out . ". Skipping.." . "\n\r";
		}


	endforeach;

	$source = "http://audio.radiorecord.ru/top100/tm/FERRY%20TAYLE%20&%20RAY,%20HANNAH%20-%20Memory%20Of%20Me.mp3";

	function get_data($url) {
	  $ch = curl_init();
	  $timeout = 5;
	  curl_setopt($ch, CURLOPT_URL, $url);
	  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
	  $data = curl_exec($ch);
	  curl_close($ch);
	  return $data;
	}

