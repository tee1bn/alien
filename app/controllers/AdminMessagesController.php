<?php


/**



*/
class AdminMessagesController extends controller
{



	public function __construct(){

	}
	



public function sendMessages()
{

if (Input::exists()) {

print_r(Input::all());

	$this->validator()->check(Input::all() , array(


	'message' =>[

				'required'=> true,
					],


	));


 if($this->validator->passed()){



 			$message = Input::get('message');
 			$subject = 'Message';




foreach (Input::get('users') as $user_id) {
	$users[] =  User::find($user_id);

}



//store in database 	
 	$new_message =	Messages::create([
 						'message'	=> $message,
 						'admin_id'	=> $this->admin()->id,
 					]);



foreach ($users as $user) {

				$recievers = RecipientsOfMessages::create([
						 'message_id'=> $new_message->id,
						 'user_id' 	=> $user->id,
			]);


				if ($recievers) {

						Session::putFlash('Info', 'Message Sent successfully');

				}

}






 		$sms = new SMS();
//send with sms
 		foreach ($users as $user) {

 			$sms->send_sms($user->phone, $message);

 		}



//send with email

 			foreach ($users as $user) {

 		$mail = mail($user->email, $subject, $message);

 		}








}else{

print_r($this->validator->errors());


}







}



			$this->redirect()->to($this->domain.'/admin-messages')->go();

}











	public function index()
	{
		$this->view('admin/messages');  
	}







}























?>