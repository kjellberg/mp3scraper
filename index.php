<?php

include_once ( 'mp3scraper.class.php' );

// Fetch a new URL.
$mp3 = new mp3scraper('view-source:http://history.radiorecord.ru/?station=club&day=today', true);

// Set download directory with trailing slash. (default: downloads/)
$mp3->directory('downloads/radiorecordhistory/');

// Do it..
$mp3->download();