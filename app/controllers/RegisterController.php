<?php
@session_start();
/**



*/
class RegisterController extends controller
{

	public function __construct(){


		}



	public function confirm_email($email, $email_verification_token)
	{

 $user = User::where('email', $email)
			->where('email_verification', $email_verification_token)
			->first();

	if ($user != null) {

	$update = $user->update(['email_verification'=> 1]);

		if ($update) {

			Session::putFlash('Info', 'Email verified successfully');

		}else{

			Session::putFlash('Info', 'Email verification unsuccesfully');

		}

	}




		if($this->auth()){
			
					Redirect::to('account-dashboard')->go();

		}else{


		Redirect::to('login')->go();

		}

	}



public function 	confirm_phone()
{


if (Input::exists() ) {

	$this->validator()->check(Input::all() , array(

			'phone_code' =>[

				'required'=> true,
				'exist'=> 'User|phone_verification',
					],
	
				));

}
 if($this->validator->passed()){




	if ($this->auth()->phone_verification == Input::get('phone_code')) {

	$update = $this->auth()->update(['phone_verification'=> 1]);

		if ($update) {

			Session::putFlash('Info', 'Phone verified successfully');

		}else{

			Session::putFlash('Info', 'Phone verification unsuccesful.');

		}





		if($this->auth()){
			
					Redirect::to('account-dashboard')->go();

		}else{


		Redirect::to('login')->go();

		}

	}else{

					Session::putFlash('Info', 'Phone verification unsuccesful.');

	}

}
					Redirect::to('account-dashboard')->go();



	}



public function verify_phone()
{
		$message = "Dear ".$this->auth()->firstname.", your code is ".$this->auth()->phone_verification." from $this->name";
		$phone   =  $this->auth()->phone ;





	return (new	SMS)->send_sms($phone, $message);


}

public function verify_email()
{

	ob_start();

$user =  User::where('email', $email)->first();
$name =  $user->firstname;

$subject 	= 'Email Verification';
$body 		= $this->buildView('emails/email-verification', [
																'name' => $name,
																'email' => $email,
																'email_verification_token' => $email_verification_token,
																]);


$to 		= $email;

$email_verification_token = $this->auth()->email_verification ;
$email = $this->auth()->email ;




$link = 'Thank you for signing up at '.$this->name.', \n please click this link to continue '.$this->domain.'/register/confirm_email/'.$email.'/'.$email_verification_token.'';

$status =  mail($email, $subject, $link);




	$response =   (! $status) ? 'false' : 'true';

// ob_end_clean();

echo $response;

}




public function generate_phone_code_for($user_id)
{

 	$remaining_code_length =   6 -	strlen($user_id) ;
 	$min = pow(10, ($remaining_code_length-1));
 	$max = pow(10, ($remaining_code_length)) - 1;
 	
 	$remaining_code = random_int($min, $max);

 	return  $phone_code = $user_id.$remaining_code;


}



	
	public function index()
	{
	}


	/**
	 * handles the first stage of user registration
	 * @return [type]
	 */
	public function register()
	{
		echo "<pre>";

if (Input::exists('user_registration') || true) {

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
						'unique'=> 'User',
					],

		'password' => [

								'required'=> true,
								'min'=> 3,
								'max'=> 32,
					]
		));

 if($this->validator->passed()){



	$username  					=  $this->generate_username_from_email(Input::get('email'));
 	$user_details 				=  Input::all();
 	$user_details['username'] 	=  $username ;
 	$user_details['email_verification'] 	=   	md5(uniqid())  ;
 	
 	$new_user  					=  User::create($user_details);
 	if($new_user){

 		Session::putFlash('success', "Registration Successful!.");
 		$this->directly_authenticate($new_user->id);

			Redirect::to("user/my-account");
 	}

 }else{

 	Session::putFlash('danger', $this->inputErrors());

	// print_r($this->validator->errors());

 }

		
	

	}


 	
	Redirect::to('login');

}

/**
 * directly set the user as authenticated
 * @param  int $user_id
 * @return null
 */
private function directly_authenticate($user_id)
{
 		Session::put($this->auth_user() , $user_id);
}


public function generate_username_from_email($email)
{

 	$username = explode('@', $email)[0];

	$i = 1;
 do{
 	$loop_username = ($i==1)? "$username" :"$username".($i-1);
 	$i++;
 	}while(User::where('username', $loop_username)->get()->isNotEmpty());


	return $loop_username;

 }




public function sendWelcomeEmail($user_id , $password)
{


 $new_user= User::find($user_id);


		$mailer  = new Mailer();
		$subject = $this->name." SUCCESSFUL REGISTRATION!!";

		$body    = $this->buildView('emails/registration-welcome-mail', [
															'firstname' => $new_user->firstname,
															'user_id' 	=> $new_user->username,
															'password' 	=> $password,
																]);

		$to = $new_user->email;
		$recipient_name = $new_user->firstname;

 	if($mailer->sendMail($to, $subject, $body, $reply='', $recipient_name)){
 		return true;
 	}



 }

}




















?>