<?php


/**



*/
class AdminDashboardController extends controller
{



	public function __construct(){
		$this->middleware('administrator')->mustbe_loggedin();

	}
	
	public function index()
	{
		
			$this->view('admin/admin-dashboard');  
	}







}























?>