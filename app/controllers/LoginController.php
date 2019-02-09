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
		
	/*if($this->auth() ){
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

			Session::putFlash('Info',"Welcome Admin $admin->firstname");
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
		Redirect::to("account-dashboard/index/{$this->auth()->username}");
	}
	$this->view('guest/login', []);

	}



	/**
	 * this function handles user authenticationn
	 * @return instance of eloquent object of the authenticated User model
	 */
	public function authenticate()
	{
echo "<pre>";

		if(Input::exists("user_login")){
			print_r(Input::all());

		$trial = User::where('email', Input::get('user'))->first();

		if ($trial == null) {


			$trial = User::where('username', Input::get('user'))->first();
		}

		$email = $trial->email;


		 $result = $this->authenticate_with($email , Input::get('password') );

		if ($result) {

// echo "wole ";

		Session::putFlash('Info',"Welcome ".$result->firstname);

		Redirect::to("");

	}else{

			Session::putFlash('Info','Invalid Credentials');
			$this->validator()->addError('credentials' , "<i class='fa fa-exclamation-triangle'></i> Invalid Credentials.");


				}


			}

		Redirect::to("");
print_r($this->validator()->errors()
);
}



	public function logout($user=''){

		session_destroy();
		Session::putFlash('Info',"Hope to see you again.");



		if($user == 'admin'){

					// Redirect::to('login/adminLogin');
					$this->adminLogindfghjkioiuy3hj8();
	
		}



		Redirect::to('');

	}






}























?>