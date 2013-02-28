<?php
class mp3scraper
{ 
	var $url;
	var $urlcontent;
	var $downloadlinks = array();
	var $inc;
	var $regexp = 'href=\"http:\/\/(.*)\.mp3';
	var $directory = 'downloads/';

	public function __construct( $url = false, $clear = false )
	{
		if ( $clear )
			$this->clear();
		
		$this->inc = 0;

		if (!is_dir('downloads'))
			mkdir('downloads');

		if ( empty( $url ) )
			die("Usage: mp3scrape(\$directory = 'random', \$url = false) \n");

		else 
			$this->url = $url; 
	}

	public function getlist( )
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

	public function regexp ( $input )
	{
		$this->regexp = $input;
	}

	public function directory ( $dir )
	{
		$this->directory = $dir;

		if ( !is_dir( $this->directory ) )
			mkdir( $this->directory );
	}

	public function download ()
	{

		$downloads = $this->getlist();	

		if ( !empty($downloads)):

			foreach ($downloads as $link):

				$file = $this->directory  . $this->parse_name ($link) ;

				if ( !file_exists( $file ) )
				{
					echo "Downloading file: $file \n";
					file_put_contents( $file , $this->get_file_by_curl( $link ) );
				}

			endforeach;

		endif;

		if ($this->inc == 0)
			echo "No new songs to download. \n";
		else
			echo "Downloaded $this->inc files \n";
	}

	public function get_file_by_curl ($url)
	{
		$ch = curl_init() or die("ERROR|<b>Error:</b> cURL Error");
		$timeout = 5;

		curl_setopt( $ch, CURLOPT_URL, $url );
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
		curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT, $timeout 	);

		$data = curl_exec( $ch );

		curl_close($ch);

		$this->inc++;
		return $data;
	}

	public function parse_name ( $string )
	{
		$name = end( explode("/", $string ) );
		$name = urldecode( $name );
		return $name;
	}

	public function clear()
	{
		system("clear");
	}
}




