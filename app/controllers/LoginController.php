<?php
@session_start();
/**



*/
class LoginController extends controller
{

	public function __construct(){
	      // print_r($_SESSION);
	}



	public function adminLogindfghjkioiuy3hj8()
	{
	/*	
	if($this->admin() ){
		Redirect::to('admin-dashboard');
	}*/
	$this->view('admin/login', []);

	}



	// authenticateing admnistrators
	public function authenticateAdmin()
	{

	if(Input::exists('admin_login')){


		$trial = Admin::where('email', Input::get('user'))->first();

		if ($trial == null) {

			$trial = Admin::where('username', Input::get('user'))->first();
		}


		$email = $trial->email;





	$admin = Admin::where('email', $email)->first();
	$password = Input::get('password') ;
 	$hash = $admin->password;
			if(password_verify($password, $hash)){



			Session::put($this->admin_user(), $admin->id);

			echo $this->admin();

			Session::putFlash('success',"Welcome Admin $admin->firstname");
			Redirect::to('admin-products');

}else{
			$this->validator()->addError('credentials' , "<i class='fa fa-exclamation-triangle'></i> Invalid Credentials.");

			Redirect::to(''.Config::admin_url());
}




}




	}


	
	public function index()
	{
	
	if($this->auth()){
		// Redirect::to();
	}
	$this->view('guest/register', []);

	}



	/**
	 * this function handles user authenticationn
	 * @return instance of eloquent object of the authenticated User model
	 */
	public function authenticate()
	{
		// echo "<pre>";

		if(Input::exists("user_login") || true){
			print_r(Input::all());

		$trial = User::where('email', Input::get('user'))->first();

		if ($trial == null) {


			$trial = User::where('username', Input::get('user'))->first();
		}

		$email = $trial->email;


		 $result = $this->authenticate_with($email , Input::get('password') );

		if ($result) {

			Redirect::to("user/my-account");

		}else{

				Session::putFlash('danger','Invalid Credentials');
				$this->validator()->addError('credentials' , "<i class='fa fa-exclamation-triangle'></i> Invalid Credentials.");

				}
			}

			Redirect::to("login");
		// print_r($this->validator()->errors());
	}



	public function logout($user=''){

		if($user == 'admin'){

			unset($_SESSION[$this->admin_user()]);
					// Redirect::to('login/adminLogin');
			Redirect::to(Config::admin_url());
	
		}else{

			unset($_SESSION[$this->auth_user()]);
			Redirect::to('login');
		}




	}






}























?>