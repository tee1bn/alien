<?php


/**
 * this class is the default controller of our application,
 * 
*/
class shopController extends controller
{

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


	public function order_detail($order_id)
	{	
		$order = Orders::find($order_id);
		if ($order == null) {

			Redirect::back();
		}
		$this->view('guest/order_detail', ['order'=> $order]);

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
		// print_r($cart['$others']['payment_method']);


		$billing_validator	= new Validator;
		$shipping_validator	= new Validator;
		
		$billing_validator->check($cart['$buyer_detail']['billing'], UserBilling::$billing_detail_rules );
		$error_notes =  $this->inputErrors();
		unset($_SESSION['inputs-errors']); //remove captured errors for first validation

			if ($cart['$buyer_detail']['billing']['ship_to_diff_address'] == 1) {

				$shipping_validator->check($cart['$buyer_detail']['shipping'], UserShipping::$shipping_detail_rules );
				$error_notes .=  $this->inputErrors();
			}else{
				foreach ($cart['$buyer_detail']['billing'] as $key => $value) {
					 $new_key  = str_replace('billing', 'shipping', $key);
					$cart['$buyer_detail']['shipping'][$new_key] = $value;
				}

			}

		// print_r($cart['$buyer_detail']['shipping']);
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
			// echo json_encode($new_order->toArray() , 4);


				$paystack_keys = CmsPages::fetch_page_content('paystack_keys');
				$public_key = $paystack_keys['public_key'];


			echo json_encode([
							'order' => $new_order->toArray(),
							'payment_method' => $cart['$others']['payment_method'],
							'public_key' => $public_key
							]);

		

	 }else{

		Session::putFlash('danger', "{$error_notes}");
		echo "error"; //corrupts the json and prevents paystack from loading 
	 }

		// print_r($cart);
	 return; 	
	}

	public function complete_and_finish_order_process($order_id)
	{		
			$order = Orders::find($order_id);
			$order->mark_paid();
 			$this->send_order_confirmation_email($order->id);
 			$this->send_order_notification_email($order->id);
	        $this->empty_cart_in_session();
	}


	public function delete_stored_order($order_id)
	{
			Orders::delete_order([$order_id]);
			echo "deletededeed";
	}



	public function verify_paystack_payment($reference, $order_id)
	{
				$paystack_keys = CmsPages::fetch_page_content('paystack_keys');
				$secret_key = $paystack_keys['secret_key'];

				$result = array();
				//The parameter after verify/ is the transaction reference to be verified
				$url = "https://api.paystack.co/transaction/verify/$reference";

				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt(
				  $ch, CURLOPT_HTTPHEADER, [
				    "Authorization: Bearer $secret_key"]
				);
				$request = curl_exec($ch);
				curl_close($ch);

				if ($request) {
				    $result = json_decode($request, true);
				    // print_r($result);
				    if($result){
				      if($result['data']){
				        //something came in
				        if($result['data']['status'] == 'success'){

				          // the transaction was successful, you can deliver value
				          /* 
				          @ also remember that if this was a card transaction, you can store the 
				          @ card authorization to enable you charge the customer subsequently. 
				          @ The card authorization is in: 
				          @ $result['data']['authorization']['authorization_code'];
				          @ PS: Store the authorization with this email address used for this transaction. 
				          @ The authorization will only work with this particular email.
				          @ If the user changes his email on your system, it will be unusable
				          */
				          echo "Transaction was successful";

				          $this->complete_and_finish_order_process($order_id);
				          Session::putFlash('success','Order Saved Successfully');
				        }else{
				          // the transaction was not successful, do not deliver value'
				          // print_r($result);  //uncomment this line to inspect the result, to check why it failed.
				          echo "Transaction was not successful: Last gateway response was: ".$result['data']['gateway_response'];
				        }
				      }else{
				        echo $result['message'];
				      }

				    }else{
				      //print_r($result);
				      die("Something went wrong while trying to convert the request variable to json. Uncomment the print_r command to see what is in the result variable.");
				    }
				  }else{
				    //var_dump($request);
				    die("Something went wrong while executing curl. Uncomment the var_dump line above this line to see what the issue is. Please check your CURL command to make sure everything is ok");
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
			$cart = json_decode($_SESSION['cart'], true);

			foreach ($cart['$items'] as $key =>  $item) {

				 // $item_array =  json_decode($item, true);
				unset($cart['$items'][$key]['$$hashKey']);
				$items[] = $item;
			}

			// $cart['$items'] = $items;
	

				// print_r($items);
				// print_r($cart);


		print_r(json_encode($cart));

	}


	public function update_cart()
	{

		// print_r($_POST);
		$_SESSION['cart'] = ($_POST['cart']);

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
		ob_end_clean();
	}


	public function send_order_confirmation_email($order_id)
	{
		$order =  Orders::find($order_id);
		$to = $order->billing_email;
		$subject = Config::project_name().' ORDER CONFIRMATION';
		 $email_body = $this->buildView('emails/order_confirmation', ['order'=>$order]);

		$mailer = 	new Mailer();
		$mailer->sendMail($to, $subject, $email_body );
		ob_end_clean();
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