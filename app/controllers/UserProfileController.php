<?php


/**
 * this class is the default controller of our application,
 * 
*/
class UserProfileController extends controller
{


	public function __construct(){

	}


	public function update_shipping_details()
	{
		

		if(Input::exists('change_password') || true){

			$this->validator()->check(Input::all() , UserShipping::$shipping_detail_rules );
			if ($this->validator->passed()) {

				$this->auth()->shipping_details->update($_POST);
				Session::putFlash('success', "Updated Successfully.");

			}else{

				Session::putFlash('danger', $this->inputErrors());
			}

		}

		Redirect::back();
	}


	public function update_billing_details()
	{
		if(Input::exists('change_password') || true){

			$this->validator()->check(Input::all() , UserBilling::$billing_detail_rules );
			if ($this->validator->passed()) {

				$this->auth()->billing_details->update($_POST);
				Session::putFlash('success', "Updated Successfully.");

			}else{

				Session::putFlash('danger', $this->inputErrors());
			}

		}

		Redirect::back();
	}



public function change_password()
{

		if(Input::exists('change_password') || true){

	$this->validator()->check(Input::all() , array(

		'current_password' =>[
				'required'=> true,
				'min'=> 3,
				'max'=> 32,					
					],

		'new_password' =>[

				'required'=> true,
				'min'=> 3,
				'max'=> 32,					
					],

		'confirm_password' => [
						 'required'=> true,
					     'matches'=> 'new_password',
						]

		));



	if (! password_verify(Input::get('current_password'), $this->auth()->password)){
		$this->validator()->addError('current_password' , "current password do not match");

	}

 if($this->validator->passed()){

 		User::find($this->auth()->id)->update(['password' => Input::get('new_password')]);

 		$user = User::where('id' , $this->auth()->id)->first();

 		 	Session::putFlash('success', "Password changed successfully!");

 }else{

 	Session::putFlash('info', $this->inputErrors());

 }


	
		}
		Redirect::back();

	}



	public function update_profile()
	{

		echo "<pre>";
		if (Input::exists('update_user_profile') || true) {



			$this->validator()->check(Input::all() , array(

					'firstname' =>[

						'required'=> true,
						'max'=> '32',
						'min'=> '2',
							],

					'lastname' =>[

						'required'=> true,
						'max'=> '32',
						'min'=> '2',
							],

				'email' => [
								'required'=> true,
								'email'=> true,
								'replaceable'=> 'User|'.$this->auth()->id,
							],

				));

		 if($this->validator->passed()){


				try {
					
					$this->auth()->update(Input::all());
					Session::putFlash('success', 'Updated successfully!');

				} catch (Exception $e) {
					
				}

			}else{
					Session::putFlash('danger', $this->inputErrors());

			}




/*
	if ($_FILES['profile_pix']['error']!=4) {
		$profile_pictures =	$this->update_user_profile($_FILES);
	}
*/

		}

	


			Redirect::back();

	

	}




public function update_user_profile($file)
{




	$directory = 'uploads/images/users/profile_pictures';
	$handle = new Upload($file['profile_pix']);

                //if it is image, generate thumbnail
                if (explode('/', $handle->file_src_mime)[0] == 'image') {
			$handle->Process($directory);
	 		$original_file  = $directory.'/'.$handle->file_dst_name;

                         // we now process the image a second time, with some other settings
                $handle->image_resize            = true;
                $handle->image_ratio_y           = true;
                $handle->image_x                 = 50;

                $handle->Process($directory);

                $resize_file    = $directory.'/'.$handle->file_dst_name;


                }


$profile_pictures = ['original_file' =>$original_file , 'resize_file'=>$resize_file];

if ($this->auth()->profile_pix != Config::default_profile_pix()) {

(new Upload($this->auth()->profile_pix))->clean();
	(new Upload($this->auth()->resized_profile_pix))->clean();
}



	$this->auth()->update([
				'profile_pix' => $profile_pictures['original_file'],
				'resized_profile_pix' => $profile_pictures['resize_file']
				]);



return $profile_pictures;
}

}























?>