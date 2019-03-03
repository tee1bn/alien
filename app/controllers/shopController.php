<?php


/**
 * this class is the default controller of our application,
 * 
*/
class shopController extends controller
{

	public	$shipping_rate = '1500.00';


	public function __construct(){

	}




	public function open_order_confirmation($order_id='')
	{
			echo $this->buildView('emails/order_confirmation', ['order'=> Orders::find($order_id)]);
	}

	/**
	 * this is the default landing point for all request to our application base domain
	 * @return a view from the current active template use: Config::views_template()
	 * to find out current template
	 */
	public function index($category=null)
	{

		$this->view('guest/shop', ['default_category'=>$category]);
	}


	public function cart()
	{
		$shipping_rate = '1500.00';
		$this->view('guest/cart', ['shipping_rate'=>$shipping_rate]);
	}

	public function checkout()
	{
		$this->view('guest/checkout');
	}


	public function place_order()
	{

		// echo "<pre>";
		// print_r($_POST['cart']);

		$cart =  json_decode($_POST['cart'], true);
		foreach ($cart['$items'] as $key => $item) {
			unset($cart['$items'][$key]['$$hashKey']);
		}


		;
		$cart['$buyer_detail']['shipping'];

		// print_r($cart['$buyer_detail']['billing']);


		$billing_validator	= new Validator;
		$shipping_validator	= new Validator;
		
		$billing_validator->check($cart['$buyer_detail']['billing'], UserBilling::$billing_detail_rules );
		$error_notes =  $this->inputErrors();
		unset($_SESSION['inputs-errors']); //remove captured errors for first validation

		$shipping_validator->check($cart['$buyer_detail']['shipping'], UserShipping::$shipping_detail_rules );
		$error_notes .=  $this->inputErrors();

		//validate cart
		// print_r($cart['$items']);


		 if($billing_validator->passed() && $shipping_validator->passed() && (Products::validate_cart($cart['$items']))){

				$new_order = Orders::create([
								'user_id'		=> $this->auth()->id,
								'buyer_order'		=> json_encode($cart['$items']),
								'additional_note'		=> ($cart['$buyer_detail']['billing']['order_notes']),
								'shipping_fee'		=> json_encode($cart['$selected_shipping']),
			]);

			$new_order->update($cart['$buyer_detail']['billing']);
			$new_order->update($cart['$buyer_detail']['shipping']);


			// Session::putFlash('success', "Order Created Successfully");

			header("Content-type:application/json");
			$new_order->total_amount = $new_order->total_price();
			$new_order->paystack_total = $new_order->paystack_total();
			echo json_encode($new_order->toArray() , 4);

			// $this->empty_cart_in_session();

 			/*$this->send_order_confirmation_email($order->id);
 				$this->send_order_notification_email($order->id);
			*/

	 }else{

		Session::putFlash('danger', "{$error_notes}");
		echo "error"; //corrupts the json and prevents paystack from loading 
	 }

		// print_r($cart);
	 return;








	return;
 	
	}



	public function delete_stored_order($order_id)
	{
			Orders::delete_order([$order_id]);
			echo "deletededeed";
	}



	public function verify_paystack_payment()
	{

		// Confirm that reference has not already gotten value
		// This would have happened most times if you handle the charge.success event.
		// If it has already gotten value by your records, you may call 
		// perform_success()

		// Get this from https://github.com/yabacon/paystack-class
		// require 'Paystack.php'; 
		// if using https://github.com/yabacon/paystack-php
		// require 'paystack/autoload.php';

		$paystack = new Paystack('sk_test_ba8e834ff7a1002b56b25e7f3a5dbc57b6ab3974');
		// the code below throws an exception if there was a problem completing the request, 
		// else returns an object created from the json response
		$trx = $paystack->transaction->verify(
			[
			 'reference'=>$_GET['reference']
			]
		);
		// status should be true if there was a successful call
		if(!$trx->status){
		    exit($trx->message);
		}
		// full sample verify response is here: https://developers.paystack.co/docs/verifying-transactions
		if('success' == $trx->data->status){
			// use trx info including metadata and session info to confirm that cartid
		  // matches the one for which we accepted payment
		  give_value($reference, $trx);
		  perform_success();
		}

		// functions
		function give_value($reference, $trx){
		  // Be sure to log the reference as having gotten value
		  // write code to give value
		}

		function perform_success(){
		  // inline
		  echo json_encode(['verified'=>true]);
		  // standard
		  header('Location: /success.php');
			exit();
		}
	}

	public function product_detail($product_id=null)
	{
		$product = Products::find($product_id);
		$this->view('guest/product-details', ['product'=>$product]);
	}




	public function add_to_cart($course_id)
	{
		$course = Course::find($course_id);
		$image = $course->image;
		$course->image = $image ;


		foreach ($_SESSION['cart'] as $item) {
				$item = json_decode($item , true);
				if ($item['id'] == $course_id) {
					echo "Item already in cart!";

					return;
				}


		}

		$_SESSION['cart'][] =	$course->toJson();
		echo "Added successfully!";
	}



	public function retrieve_cart_in_session()
	{

		// echo "<pre>";
		header("content-type:application/json");
			$cart = $_SESSION['cart'];

			foreach ($cart as  $item) {

				 $item_array =  json_decode($item, true);
				unset($item_array['$$hashKey']);
				$items[] = $item_array;
			}

		print_r(json_encode($items));
	

	}


	public function update_cart()
	{

		print_r($_POST);
		$_SESSION['cart'] = ($_POST['items']);

	}


	public function all_categories($page=1)
	{
		header("Content-type: application/json");
		// $per_page = 100;
		echo ProductsCategory::all();
		// ->forPage($page , $per_page);
	}

	public function empty_cart_in_session()
	{
		unset($_SESSION['cart']);
	}




	public function send_order_notification_email($order_id)
	{
		$order =  Orders::find($order_id);

			$notification_email=  	CmsPages::where('page_unique_name', 'notification' )->first()->page_content;
			$notification_email = json_decode($notification_email , true);


		$subject = Config::project_name().' NEW ORDER NOTIFICATION';
		 $email_body = $this->buildView('emails/order_notification', ['order'=>$order]);

		$mailer = 	new Mailer();
		$mailer->sendMail($notification_email['notification_email'], $subject, $email_body );
	}


	public function send_order_confirmation_email($order_id)
	{
		$order =  Orders::find($order_id);
		$to = $order->email;
		$subject = Config::project_name().' ORDER CONFIRMATION';
		 $email_body = $this->buildView('emails/order_confirmation', ['order'=>$order]);

		$mailer = 	new Mailer();
		$mailer->sendMail($to, $subject, $email_body );
	}


	public function fetch_products($page=1, $category_id=null)
	{

		$per_page = 20;
		$courses = Products::on_sale()->orderBy('updated_at', 'DESC');

		if (Category::find($category_id) != null) {

			$courses->where('category_id', $category_id);
		}

		//pagination
		$courses = $courses->get()->forPage($page, $per_page);
		foreach ($courses as $course) {

			$course->by = $course->instructor->lastname.' '. $course->instructor->firstname;
			$course->category = $course->category;
			$course->short_title = substr($course->title, 0, 34);
			$course->last_updated = $course->updated_at->diffForHumans();
			$course->thumbnail = $course->image;
			$course->url_link = $course->url_link();
			$course->images = $course->images;
			$course->mainimage = $course->mainimage;
			$course->secondaryimage = $course->secondaryimage;
			$course->percentdiscount = $course->percentdiscount;
			$course->quickdescription = $course->quickdescription();
		}

		header("Content-type: application/json");


		echo $courses;

			
}



	public function retrieve_shipping_settings()
	{
		header("Content-type: application/json");
		echo CmsPages::where('page_unique_name', 'shipping_details')->first()->page_content;

	}


	public function find($course_id)
		{

		header("Content-type: application/json");
		// $per_page = 100;
		 $course =  Products::find($course_id);

			$course->by = $course->instructor->lastname.' '. $course->instructor->firstname;
			$course->category = $course->category;
			$course->short_title = substr($course->title, 0, 34);
			$course->last_updated = $course->updated_at->diffForHumans();
			$course->thumbnail = $course->image;
			$course->url_link = $course->url_link();
			$course->images = $course->images;
			$course->mainimage = $course->mainimage;
			$course->quickdescription = $course->quickdescription();

		echo $course;

			}	


	



}























?>