<?php


/**
 * this class is the default controller of our application,
 * 
*/
class Galleryontroller extends controller
{


	public function __construct(){

	}




	/**
	 * this is the default landing point for all request to our application base domain
	 * @return a view from the current active template use: Config::views_template()
	 * to find out current template
	 */
	public function index()
	{

		$this->view('guest/gallery');
	}


}























?>