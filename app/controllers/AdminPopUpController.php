<?php


/**



*/
class AdminPopUpController extends controller
{



	public function __construct(){

	}
	


	public function switch(){

		if (PopSetting::first()->status ==1) {
				
				PopSetting::first()->update(['status'=> 0]);
			}else{

				PopSetting::first()->update(['status'=> 1]);

			}
		$this->redirect()->to($this->domain.'/admin-popup')->go();

	}
	



	public function shufflePopupMessages(){

echo		$message =  PopUp::all(['pop_up_message'])->random();
/*
		$key = random_int(1, (count($message)-1));
		print_r(json_encode(
					 array('message' => $message, 'key' => $key) ));
*/
	}
	



	public function deletePopup($pop_up_id){

		$popup = PopUp::find($pop_up_id);

		if($popup){

			$popup->delete();
		}


		$this->redirect()->to($this->domain.'/admin-popup')->go();

	}
	




	public function createPopup(){


		if (Input::exists()) {


			PopUp::create(['pop_up_message'  => Input::get('pop_up_message')]);



		$this->redirect()->to($this->domain.'/admin-popup')->go();








		}










	}
	



	public function index()
	{
		
	
		$this->view('admin/pop-up');  
	}







}























?>