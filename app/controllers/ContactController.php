<?php


/**
 * this class is the default controller of our application,
 * 
*/
class ContactController extends controller
{


	public function __construct(){

	}


	public function send_message()
	{
		print_r($_POST);


		$validator = new Validator;

		$validator->check($_POST, [

								'contact_name'=>[
									'required'=>true,
										],

								'contact_email'=>[
									'required'=>true,
									'email'=>true,
										],


								'contact_phone'=>[
									'required'=>true,
										],
								'contact_message'=>[
									'required'=>true,
									'min'=>10,
										],
								]);

		if (! $validator->passed()) {


			Session::putFlash("danger", $this->inputErrors());
			return;
		}



		$mailer = new Mailer();

		$to = CmsPages::fetch_page_content('notification')['notification_email'];
		// $to = 'ds@c.com';
		$subject = "NEW CONTACT MESSAGE";
		$phone = Input::get('contact_phone');
		$email = Input::get('contact_email');
		$name = Input::get('contact_name');
		$message = Input::get('contact_message');


			$body = "$name<br>
					$phone<br>
					$email<br>
					$message";


		$mailer->sendMail($to, $subject, $body);
		Session::putFlash("success","Message sent successfully!");


	}


	/**
	 * this is the default landing point for all request to our application base domain
	 * @return a view from the current active template use: Config::views_template()
	 * to find out current template
	 */
	public function index()
	{

		$this->view('guest/contact-us');
	}


}























?>