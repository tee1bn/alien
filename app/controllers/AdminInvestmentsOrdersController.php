<?php


/**
*/



class AdminInvestmentsOrdersController extends controller
{



	public function __construct(){
		$this->middleware('administrator')->mustbe_loggedin();

	}
	
	






public function deleteOrder($ph_id)
{
	$order = PH::find($ph_id);
	if ($order !==null) {


try {
			if (($order->matched->count()== 0) && ($order->fufilled_at !==null )  ) {
					
					// echo "delete";
					//delete gh
					//delete matured

		echo	$matured_ph = $order->maturedPhs;

			$gh = GH::where('matured_ph_id', $matured_ph->id)->first();

				if ($gh !== null) {
						$gh->delete();

						}

				if ($matured_ph !== null) {
						$matured_ph->delete();

						}

			}


					$order->delete();

					Session::putFlash('Info', 'succesfully deleted!');



				} catch (Exception $e) {
					
					print_r($e->getMessage());
					Session::putFlash('Info', 'This PH cannot be deleted, pls try again');


				}




	}

		$this->redirect()->to($this->domain.'/admin-orders')->go();






}









	public function createOrder()
	{	

		if (Input::exists()) {


				if(   User::find(Input::get('user_id')) === null  ){


Session::putFlash('Info', 'User does not exist');

$this->redirect()->to($this->domain.'/admin-orders')->go();

exit();
				}









if((User::find(Input::get('user_id'))->hasPendingOrder()  )      

		||

		(User::find(Input::get('user_id'))->isBlocked()  )

 ){

Session::putFlash('Info', 'Selected User is either Blocked or has a Pending Order');

$this->redirect()->to($this->domain.'/admin-orders')->go();

exit();
}





				OrderedProduct::create([
				'user_id' => Input::get('user_id'),
				'product_id' => Input::get('product_id'),
			]);

		

			print_r(Input::all());

			}

Session::putFlash('Info', 'Order created successsfully');
		$this->redirect()->to($this->domain.'/admin-orders')->go();


	}

	
	public function openOrder($order_id)
	{	
		$this->view('admin/open-order');  
	}





public function index()
	{	


		$this->view('admin/investment');  
	}







}























?>