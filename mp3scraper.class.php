<?php
	class mp3scraper
	{
		var $urls = array();

		public function __construct()
		{
		}

		public function add( $name = '', $url = '')
		{
			$this->urls[] = array( $name, $url );
		}

		public function get ()
		{
			return $this->urls;
		}

	}