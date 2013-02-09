<?php

include_once ( 'mp3scraper.class.php' );

// Fetch a new URL.
$mp3 = new mp3scraper('http://www.radiorecord.ru/radio/top100/detail.php?station=4901');

// Set download directory. (default: downloads/)
$mp3->directory('radiorecord');

// Do it..
$mp3->download();