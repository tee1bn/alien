<?php
// session_start();

/**



*/
class AdminReferralMatrixController extends controller
{



	public function __construct(){
		$this->middleware('administrator')->mustbe_loggedin()->mustbe_super_admin();

	}
	





	public function updateReferralMatrixSettings(){

echo' <pre>';
print_r(Input::all());

if (Input::exists() ) {



	$this->validator()->check(Input::all() , array(



));

		foreach (Input::get('referral_matrix') as $level => $properties) {


			foreach ($properties as $property) {
			if ( ! ctype_digit($property)) {
					$this->validator()->addError('referral_matrix' , "All Values must be numeric");
				}
		}

		}


 if($this->validator()->passed()){


 				foreach (Input::get('referral_matrix') as $level => $properties) {

 			echo		ReferralMatrix::find($level)->update($properties);
 				}






			Session::putFlash('Info', 'Referral Matrix Updated successfully');


 }else{
			Session::putFlash('Info', 'Referral Matrix Not Updated ');

print_r($this->validator()->errors());

 }

		
		


	}









					$this->redirect()->to($this->domain.'/admin-referral-matrix')->go();









	}
	











	public function index()
	{
		
	
		$this->view('admin/referral-matrix');  
	}







}























?>