<?php
class mp3scraper
{
	var $url;
	var $urlcontent;
	var $directory;
	var $downloadlinks = array();

	var $regexp = 'href=\"http:\/\/(.*)\.mp3';
	var $rootdir = 'downloads/';

	public function __construct( $url = false )
	{
		$this->directory = $directory;


		if (!is_dir('downloads'))
			mkdir('downloads');

		if ( empty( $url ) )
			die("Usage: mp3scrape(\$directory = 'random', \$url = false) \n");

		else 
			$this->url = $url; 
	}

	public function getlist()
	{
	  	$this->urlcontent = @file_get_contents( $this->url ) or die("Could not access URL:". $this->url );
	  	echo "Fetching mp3s.. \n";

		if ( preg_match_all ( "/$this->regexp/siU", $this->urlcontent, $output, PREG_SET_ORDER ) ) 
		
		foreach ( $output as $tmpurlarray ):

			// Remove href=" and whitespaces.
			$tmpurl = str_replace(' ', '%20', $tmpurlarray[0] );
			$tmpurl = str_replace('href="', '', $tmpurl );

			$downloadlinks[] = $tmpurl;
		endforeach;

		return $downloadlinks;
	}

	public function directory ( $dir )
	{
		$this->directory = $dir;
		if (!is_dir($this->rootdir . $this->directory))
			mkdir($this->rootdir . $this->directory);
	}

	public function download ( )
	{
		$downloads = $this->getlist();	
		foreach ($downloads as $download):
			echo "$download\n";
		endforeach;
	}
}




