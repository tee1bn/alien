<?php


/**
 * this class is the default controller of our application,
 * 
*/
class CategoriesApiController extends controller
{


	public function __construct(){

	}




	public function all_categories($page=1)
	{
		header("Content-type: application/json");
		// $per_page = 100;
		echo ProductsCategory::all();
		// ->forPage($page , $per_page);
	}




	/**
	 * this is the default landing point for all request to our application base domain
	 * @return a view from the current active template use: Config::views_template()
	 * to find out current template
	 */
	public function index()
		{
			# code...
		}	


}























?>