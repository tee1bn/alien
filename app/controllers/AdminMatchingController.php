<?php


/**



*/
class AdminMatchingController extends controller
{

	protected $systemMatchController ;
	

	protected $valid_phs ;
	protected $valid_ghs ;



	public function __construct(){
		$this->middleware('administrator')->mustbe_loggedin();

 	require_once 'AutoMatchingController.php';
			



$this->systemMatchController = new AutoMatchingController;
		



 $this->valid_phs  =  $this->systemMatchController->fetch_all_valid_phs();
 $this->valid_ghs  =  $this->systemMatchController->fetch_all_valid_ghs();

/*
print_r($this->valid_ghs);
print_r($this->valid_phs);*/

	}
	








public function deleteMatch($match_id )
{
	$match = Match::find($match_id);
	if ($match !==null) {


		$this->systemMatchController->deleteMatch($match_id , 'admin');

		Session::putFlash('info', 'Match successfully deleted');
	}

		$this->redirect()->to($this->domain.'/admin-matching')->go();






}











	public function createMatch()
	{

		// echo "<pre>";

foreach (Input::get('phs') as $ph_id ) {
	
	$phs[] = PH::find($ph_id)->toArray();
}



foreach (Input::get('ghs') as $gh_id ) {
	
	$ghs[] = GH::find($gh_id)->toArray();
}



$this->systemMatchController->match_ghs_and_phs('manual' , $phs, $ghs);



		$this->redirect()->to($this->domain.'/admin-matching')->go();


}










	public function openMatch($sale_id)
	{	
		$this->view('admin/open-order');  
	}





public function index()
	{	
		$this->view('admin/open-match');  
	}







}























?>