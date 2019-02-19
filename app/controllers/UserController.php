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
		$this->view('guest/auth/dashboard');

	}

	public function dashboard()
	{
		$this->view('guest/auth/dashboard');

	}


	public function orders()
	{
		$this->view('guest/auth/orders');

	}


	public function account_details()
	{
		$this->view('guest/auth/account_details');

	}



	public function addresses()
	{
		$this->view('guest/auth/addresses');

	}





	public function index()
	{
		$this->view('auth/index');

	}








}























?>