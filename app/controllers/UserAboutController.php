<?php


/**
 * this class is the default controller of our application,
 * 
*/
class UserAboutController extends controller
{	
	/**
	 * [$user the current user whose username we are using to access this coontroller]
	 * @var [User model instance]
	 */
	protected $user ;

	public function __construct($user){
		$this->user =  $user;
		$this->middleware('current_user')->mustbe_loggedin()->must_have_complete_profile();

	}



	/**
	 * @return a view from the current active template use: Config::views_template()
	 * to find out current template
	 */
	public function index()
	{


			$this->view('auth/about', ['user'=>$this->user]);


	}

public function tellme_name($value='')
{
echo "say my name";
}








}













?>