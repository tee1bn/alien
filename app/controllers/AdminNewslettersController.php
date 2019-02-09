<?php


/**
 * this class is the default controller of our application,
 * 
*/
class AdminNewslettersController extends controller
{


	public function __construct(){
		$this->middleware('administrator')->mustbe_loggedin();

	}



public function message_all_subscribers()
{
	print_r(Input::all());
	foreach (Newsletter::all() as $subscriber) {

		//send mail to
		$recipient = $subscriber->email;
	}

	Session::putFlash('info','Messages sent Successfully!');

Redirect::to('admin-newsletter');



}




public function delete_newsletter()
{
	$newsletter_id = Input::get('newsletter_id');
	try {
		
		$newsletter = Newsletter::find($newsletter_id) ;
		if ($newsletter !==null) {
		$newsletter->delete();
		echo ("Email deleted Successfully!");
		}else{
		echo ("Record not found!");

		}

	} catch (Exception $e) {
		
	}


}


	/**
	 * this is the default landing point for all request to our application base domain
	 * @return a view from the current active template use: Config::views_template()
	 * to find out current template
	 */
	public function index()
	{

		$this->view('admin/newsletter');
	}


}























?>