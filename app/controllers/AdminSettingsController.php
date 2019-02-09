<?php


/**



*/
class AdminSettingsController extends controller
{



	public function __construct(){
		$this->middleware('administrator')->mustbe_loggedin()->mustbe_super_admin();
	//	$this->middleware('administrator')->mustbe_super_admin();

	}
	





	public function update_notification_email()
	{


		$prepared_db = json_encode(['notification_email'=> Input::get('notification_email')]);
		print_r($prepared_db);
	$record=  	CmsPages::where('page_unique_name', 'notification' )->first();

		$record->update(['page_content'=>$prepared_db]);
		Session::putFlash('info', 'Updated successfully!');

		Redirect::to('admin-settings');
	}




	public function index()
	{
			$notification_email=  	CmsPages::where('page_unique_name', 'notification' )->first()->page_content;
			$notification_email = json_decode($notification_email , true);

		$this->view('admin/settings', ['notification_email'=>$notification_email]);  
	}







}























?>