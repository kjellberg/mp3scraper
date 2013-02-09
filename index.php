<?php

include_once ( 'mp3scraper.class.php' );

$mp3 = new mp3scraper;

$mp3->add('club', 'http://www.radiorecord.ru/radio/top100/detail.php?station=4901');


print_r($mp3->get()); 