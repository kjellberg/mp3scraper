<?php

include_once ( 'mp3scraper.class.php' );

// Fetch a new URL.
$mp3 = new mp3scraper('http://www.radiorecord.ru/radio/top100/detail.php?station=4901', true);

// Set download directory with trailing slash. (default: downloads/)
$mp3->directory('downloads/');

// Do it..
$mp3->download();