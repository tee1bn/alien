<?php


/**
 * this class is the default controller of our application,
 * 
*/
class ContactController extends controller
{


	public function __construct(){

	}


	public function add_to_news_letter()
	{
		

if(! filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL)){
echo 'Email not valid';
return;
}

    try { 
  
    $new_subscribed_email = Newsletter::create(['email' => $_POST['email']]);
    if($new_subscribed_email) {
    echo "Email subscribed succesfully";

  }


    } catch (Exception $e) {

    echo "Email already subscribed succesfully";

        }


  	}

	public function send_message()
	{
		print_r($_POST);

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