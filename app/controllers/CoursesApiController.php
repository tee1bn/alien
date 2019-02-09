<?php


/**
 * this class is the default controller of our application,
 * 
*/
class CoursesApiController extends controller
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



	public function fetch_course($course_id)
		{
		
		header("Content-type: application/json");
		echo Course::find($course_id);
				}	


}























?>