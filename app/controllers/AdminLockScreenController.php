<?php

/**



*/
class AdminLockScreenController extends controller
{

	public function __construct(){
	$this->middleware('administrator')->mustbe_loggedin();

	}


public function open_screen()
{


 	$hash = $this->admin()->password;
			if(password_verify(Input::get('password'), $hash)){

		Config::unlock_screen();


	}else{

	$this->validator()->addError('' , "<i class='fa fa-exclamation-triangle'></i> Credential do not match our records.");

		}

		$this->redirect()->to($this->domain.'/admin-dashboard')->go();


}







	
	public function lockscreen()
	{

		Config::lock_screen();

		// print_r($_SESSION);

				$this->view('admin/lockscreen');  


	}





}























?>