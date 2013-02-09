<?php
	class mp3scraper
	{
		var $url;
		var $regexp;
		var $directory;
		var $data;

		public function __construct( $directory = 'random', $url = false )
		{
			$this->directory = $directory;

			if ( empty( $url ) )
				die("Usage: mp3scrape(\$directory = 'random', \$url = false) \n");

			else 
				$this->url = $url; 
		}

		public function download()
		{
		  	$this->data = @file_get_contents( $this->url ) or die("Could not access URL:". $this->url );
		  	echo "Fetching mp3s.. \n";

		}
	}