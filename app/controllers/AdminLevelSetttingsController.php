<?php
// session_start();

/**



*/
class AdminLevelSetttingsController extends controller
{



	public function __construct(){
		$this->middleware('administrator')->mustbe_loggedin()->mustbe_super_admin();

	}
	





	public function updateLevelSettings(){


echo "<pre>";

			print_r(Input::get('level')[1]['percent_roi']);




if (Input::exists() ) {



	$this->validator()->check(Input::all() , array(



));

		foreach (Input::get('level') as $level => $properties) {


			foreach ($properties as $property) {
			if ( ! ctype_digit($property)) {
					$this->validator()->addError('Level_Settings' , "All Values must be numeric");
				}
		}

		}



// print_r($this->validator()->passed());

 if($this->validator()->passed()){


 				foreach (Input::get('level') as $level => $properties) {

 					 print_r($properties);



 					UserLevel::find($level)->update([
 														'percent_roi'=> $properties['percent_roi'],
 														'min_ph'=> $properties['min_ph'],
 														'max_ph'=> $properties['max_ph'],
 														'investment_duration_in_days'=> $properties['investment_duration_in_days'],
 													]);
 				}






			Session::putFlash('Info', 'Level Settings Updated successfully');


 }else{
			Session::putFlash('Info', 'Level Settings Not Updated ');

print_r($this->validator()->errors());

 }

		
		


	}









					$this->redirect()->to($this->domain.'/admin-level-settings')->go();









	}
	











	public function index()
	{
		
	
		$this->view('admin/level-settings');  
	}







}























?>