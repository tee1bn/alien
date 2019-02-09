<?php


/**
 * this class is the default controller of our application,
 * 
*/
class Error404Controller extends controller
{


	public function __construct(){

	}



	public function index()
	{

		$this->view('guest/404');
	}


}























?>