<?php


/**



*/
class AdminProfileController extends controller
{



	public function __construct(){


		
$this->middleware('administrator')->mustbe_loggedin();
		$this->middleware('administrator')->mustbe_super_admin();




	}
	




	public function updatePassword()
	{
		
	


print_r(Input::all());
		if (Input::exists('admin_update_password')) {





	$this->validator()->check(Input::all() , array(


		'current_password' => [

								'required'=> true,
								'equals'=> $this->admin()->password,
						],
		'new_password' => [

								'required'=> true,
								'min'=> 3,
								'max'=> 32,
						],

	'confirm_new_password' => [

								'required'=> true,
								'min'=> 3,
								'max'=> 32,
								'matches'=> 'new_password',
						]




		));

 if($this->validator->passed()){


	

 	$admin  = $this->admin()->update([
 				'password' => Input::get('new_password') ,
 				
 				]);
 	if($admin){


 		Session::putFlash('Info', "Password updated succesfully.");


 	}

 





 }else{


print_r ($this->validator->errors());

 	Session::putFlash('Info', "Please try again. See inputs ");


 }

		
	




		




}




	Redirect::to($this->domain.'/admin-profile')->go();



	


	}

	



	public function index()
	{
		
	
		$this->view('admin/profile');  
	}

	



	public function updateAdminProfile($admin_id){


print_r(Input::all());
		if (Input::exists('update_admin_profile')) {





	$this->validator()->check(Input::all() , array(

			'firstname' =>[

				'required'=> true,
				'min'=> 2,
				'max'=> 20,
					],
	'lastname' =>[

				'required'=> true,
				'min'=> 2,
				'max'=> 20,
					],

		'email' => [

						'required'=> true,
						'email'=> true,
						'replaceable'=> 'Admin|'.$this->admin()->id,
					],
		'phone' => [

						'required'=> true,
						'min'=> 9,
						'max'=> 14,
						'replaceable'=>'Admin|'.$this->admin()->id,

					],

		/*'password' => [

								'required'=> true,
								'min'=> 3,
								'max'=> 32,
						]
*/



		));

 if($this->validator->passed()){


	

 	$admin  =  Admin::find($admin_id)->update([
 				'firstname' => Input::get('firstname') ,
 				'lastname' => Input::get('lastname') ,
 				'email' => Input::get('email') ,
 				'phone' => Input::get('phone') ,
 				
 				]);
 	if($admin){


 		Session::putFlash('Info', "Updated succesfully.");


 	}

 

	Redirect::to($this->domain.'/admin-profile')->go();




 }else{


print_r ($this->validator->errors());

 	Session::putFlash('Info', "Please try again. See inputs ");


 }

		
	




		




}




	Redirect::to($this->domain.'/admin-profile')->go();



	}



}























?>