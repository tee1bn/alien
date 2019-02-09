<?php


/**
 * this class is the default controller of our application,
 * 
*/
class ProductsApiController extends controller
{


	public function __construct(){

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


	public function place_order()
	{
		echo "<pre>";

if (Input::exists('billing_and_order_details_form') ) {
		// print_r(Input::all());

	$this->validator()->check(Input::all() , array(

			'full_name' =>[

				'required'=> true,
				'max'=> '255',
					],

		'email' => [
						'required'=> true,
						'email'=> true,
					],

		'phone' => [
						'required'=> true,
						'min'=> 5,
					],
		
		'address' => [
								'required'=> true,
								'min'=> 3,
								'max'=> 255,
					],
		'order' => [

								'required'=> true,
								
					]

		));

 if($this->validator->passed()){

 $order =	Orders::create([
 			'buyer_name' => Input::get('full_name'),
 			'email' 	=> Input::get('email'),
 			'phone' 	=> Input::get('phone'),
 			'address' 	=> Input::get('address'),
 			'additional_note' => Input::get('additional_note'),
 			'buyer_order' 	=> Input::get('order'),

 	         ]);
 	Session::putFlash('Info', "Order placed successfully! ");
 	$this->empty_cart_in_session();
 	$this->send_order_confirmation_email($order->id);
 	$this->send_order_notification_email($order->id);

 }else{

 	Session::putFlash('Info', "Please try again ");





 }

		
	

	}


 	
	// Redirect::to('home/test');

}


	public function fetch_cart_in_session(){


		header("Content-type: application/json");

		if (isset($_SESSION['shopping_cart']  )) {
		print_r($_SESSION['shopping_cart']);
		}else{
			
			echo "[]";
		}

	}



	
	public function empty_cart_in_session()
	{
		unset($_SESSION['shopping_cart']);
	}




	public function store_cart_in_session()
	{
		$_SESSION['shopping_cart'] = $_POST['shopping_cart'];

		$response = ['response'=>'stored_in_session' ];

		header("Content-type: application/json");

		print_r(json_encode($response));
	}



	public function products_onsale($page=1)
	{
		header("Content-type: application/json");
		$per_page = 24;

		$products_onsale = Products::on_sale()->latest()->get()->forPage($page , $per_page);

		foreach ($products_onsale as  $product) {
			$product->category = $product->category;
			$product->formatted_price = $this->money_format($product->price);
		}

		echo $products_onsale;
	}




	public function all_products($page=1)
	{
		header("Content-type: application/json");
		$per_page = 2;
		echo Products::all()->forPage($page , $per_page);
	}




	/**
	 * this is the default landing point for all request to our application base domain
	 * @return a view from the current active template use: Config::views_template()
	 * to find out current template
	 */
	public function index()
		{
			# code...
		}	


}























?>