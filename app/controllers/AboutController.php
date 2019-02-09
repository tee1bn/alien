<?php


/**
 * this class is the default controller of our application,
 * 
*/
class AboutController extends controller
{


	public function __construct(){

	}


public function our_brand()
{
		$this->view('guest/our-brand');

}


public function our_core_values()
{
		$this->view('guest/our-core-values');

}



public function meet_the_ceo()
{
		$this->view('guest/meet-the-ceo');


}

	/**
	 * this is the default landing point for all request to our application base domain
	 * @return a view from the current active template use: Config::views_template()
	 * to find out current template
	 */
	public function index()
	{

		$this->view('guest/about');
	}


}























?>