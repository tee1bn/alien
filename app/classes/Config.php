<?php

/**
 * this class contains all configurations for our project
 * some values are fetched from database while others are hardcoded
 */
class Config
{
	
	public function __construct()
	{
		
	}

	/**
	 * returns the url to access admin panel.
	 * @return string
	 */
	public  static function admin_url()
	{
		return	 'admin_url';
	}


	/**
	 * returns the domain of this project
	 * @return string
	 */
	public  static function domain()
	{
		return	self::host()."/alien";

	}

	/**
	 * returns the domain of this project
	 * @return string
	 */
	public  static function host()
	{
		return	"http://".$_SERVER['HTTP_HOST'];

	}

	/**
	 * this returns the name of this project
	 * @return string
	 */
	public  static function project_name()
	{
		return	 "Alien";

	}

		
	/**
	*returns the current template for the views
	*@return string
	*/
	public  static function views_template()
	{
		return	'default';

	}





	}

	

