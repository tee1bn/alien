<?php


/**
 * this class is the default controller of our application,
 * 
*/
class home extends controller
{


	public function __construct(){

	}



	/**
	 * this is the default landing point for all request to our application base domain
	 * @return a view from the current active template use: Config::views_template()
	 * to find out current template
	 */
	public function index()
	{
		$url = Config::domain().'/cms_api/fetch_page_content/sliders';
		$sliders = json_decode( file_get_contents($url), true);
/*
		echo "<pre>";
		print_r($sliders);*/
		$this->view('guest/index', [ 'sliders' => $sliders]);
	}



	public function flash_notification()
	{
		header("Content-type: application/json");

		if (isset($_SESSION['flash'])) {
		echo json_encode($_SESSION['flash']);
		}else{
			echo "[]";
		}


		unset($_SESSION['flash']);

	}


	public function add_to_new_letters()
	{


		if (!filter_var(Input::get('newsletter') , FILTER_VALIDATE_EMAIL)) {
			Session::putFlash('danger', "Invalid email!");
			return;
		}

		try {
			
			Newsletter::create(['email'=> Input::get('newsletter')]);
			Session::putFlash('success', "Subscribed successfully!");
		} catch (Exception $e) {
			Session::putFlash('info', "Already subscribed successfully!");
		}
	}

}























?>