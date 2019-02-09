<?php
// session_start();

/**



*/
class AdminInvestmentPackController extends controller
{



	public function __construct(){
		$this->middleware('administrator')->mustbe_loggedin()->mustbe_super_admin();

	}
	





	public function updateInvestmentPackSettings(){

echo' <pre>';
print_r(Input::all());

if (Input::exists('investmentpacks') ) {



	$this->validator()->check(Input::all() , array(



));

		/*foreach (Input::get('referral_matrix') as $level => $properties) {


			foreach ($properties as $property) {
			if ( ! ctype_digit($property)) {
					$this->validator()->addError('referral_matrix' , "All Values must be numeric");
				}
		}

		}
*/

 if($this->validator()->passed()){


 				foreach (Input::get('investmentpack') as $level => $properties) {

 					 print_r($properties['any_payment_percentage']);



 			echo		InvestmentPacks::find($level)->update([
 														'pack_name'=> $properties['pack_name'],
 														'capital_in_usd'=> $properties['capital_in_usd'],
 														'duration_in_days'=> $properties['duration_in_days'],
 														'roi_percent'=> $properties['roi_percent'],
 														'availability'=> $properties['availability'],
 													]);
 				}






			Session::putFlash('Info', 'Investment Packs Updated successfully');


 }else{
			Session::putFlash('Info', 'Investment Packs Not Updated ');

print_r($this->validator()->errors());

 }

		
		


	}









					$this->redirect()->to($this->domain.'/admin-investment-pack')->go();









	}
	











	public function index()
	{
		
	
		$this->view('admin/investment-pack');  
	}







}























?>