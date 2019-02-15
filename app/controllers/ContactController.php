<?php


/**
 * this class is the default controller of our application,
 * 
*/
class ContactController extends controller
{


	public function __construct(){

	}


	public function send_message()
	{
		print_r($_POST);
		Session::putFlash("Message sent successfully!", "success");
	}


	/**
	 * this is the default landing point for all request to our application base domain
	 * @return a view from the current active template use: Config::views_template()
	 * to find out current template
	 */
	public function index()
	{

		$this->view('guest/contact-us');
	}


}























?>