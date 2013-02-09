<?php

include_once ( 'mp3scraper.class.php' );

// Fetch a new URL.
$mp3 = new mp3scraper('http://www.radiorecord.ru/radio/top100/detail.php?station=4901');

// Set string to match when searching for mp3s.
$mp3->regexp 	= "audio.radiorecord.ru(.*)\.mp3";

// Set download directory.
$mp3->directory('radiorecord');

// Do it..
$mp3->download();