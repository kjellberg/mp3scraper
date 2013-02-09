<?php
	class mp3scraper
	{
		var $url;
		var $urlcontent;
		var $regexp;
		var $directory;
		var $downloadlinks = array();

		public function __construct( $directory = 'random', $url = false )
		{
			$this->directory = $directory;

			if ( empty( $url ) )
				die("Usage: mp3scrape(\$directory = 'random', \$url = false) \n");

			else 
				$this->url = $url; 
		}

		public function getlist()
		{
		  	$this->urlcontent = @file_get_contents( $this->url ) or die("Could not access URL:". $this->url );
		  	echo "Fetching mp3s.. \n";

			if ( preg_match_all ( "/$this->regexp/siU", $this->urlcontent, $downloadlinks, PREG_SET_ORDER ) ) 
			
			return $downloadlinks;
		}
	}