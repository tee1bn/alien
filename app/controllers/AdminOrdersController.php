<?php


/**



*/
class AdminOrdersController extends controller
{



	public function __construct(){
		$this->middleware('administrator')->mustbe_loggedin();

	}
	
	public function delete_order($order_id='')
	{

		try {
			
		Orders::find($order_id)->delete();
			Session::putFlash('info', 'Order deleted successfully!');
		} catch (Exception $e) {

		}

		Redirect::to("admin-orders");

	
		}

	public function mark_as_complete($order_id='')
	{
		try {
			
		Orders::find($order_id)->update(['status'=> 'complete']);
			Session::putFlash('success', 'Order marked as complete successfully!');
		} catch (Exception $e) {

		}

		Redirect::to("admin-orders/open_order/$order_id");

	}

	public function open_order($order_id)
	{



			$this->view('admin/open-order', ['order'=> Orders::find($order_id)]);  



	}



	


	public function index()
	{		
			$this->view('admin/orders');  
	}







}























?>