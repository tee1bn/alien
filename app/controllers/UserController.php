<?php


/**
 * this class is the default controller of our application,
 * 
*/
class UserController extends controller
{


	public function __construct(){
		$this->middleware('current_user')->mustbe_loggedin();
	}



	public function profile()
	{
		$this->view('auth/profile');
	}

	

	public function my_account()
	{
		$this->view('guest/auth/my-account');

	}





	public function index()
	{
		$this->view('auth/index');

	}








}























?>