<?php

include_once ( 'mp3scraper.class.php' );

$mp3 = new mp3scraper('club', 'http://www.radiorecord.ru/radio/top100/detail.php?station=4901');

$mp3->download();