<?php


/**
 * this class is the default controller of our application,
 * 
*/
class shopController extends controller
{

	public $billing_detail_rules = [

		   			'billing_firstname'  => [
		   							'required'=>true,
		   									] ,
                    'billing_lastname'  => [
		   							'required'=>true,
		   									] ,
                    'billing_country'  => [
		   							'required'=>true,
		   									] , 

                    'billing_street_address'  =>[
		   							'required'=>true,
		   									] ,
                    'billing_city'  => [
		   							'required'=>true,
		   									] ,
                    'billing_state'  => [
		   							'required'=>true,
		   									] ,
                    'billing_phone'  => [
		   							'required'=>true,
		   									]  ,
                    'billing_email'  => [
		   							'required'=>true,
		   									] ,
	];

	public $shipping_detail_rules = [

		   			'shipping_firstname'  => [
		   							'required'=>true,
		   									] ,
                    'shipping_lastname'  => [
		   							'required'=>true,
		   									] ,
                    'shipping_country'  => [
		   							'required'=>true,
		   									] , 

                    'shipping_street_address'  =>[
		   							'required'=>true,
		   									] ,
                    'shipping_city'  => [
		   							'required'=>true,
		   									] ,
                    'shipping_state'  => [
		   							'required'=>true,
		   									] ,
                    'shipping_phone'  => [
		   							'required'=>true,
		   									]  ,
                    'shipping_email'  => [
		   							'required'=>true,
		   									] ,
	];

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

		echo "<pre>";
		// print_r($_POST['cart']);

		$cart =  json_decode($_POST['cart'], true);
		foreach ($cart['$items'] as $key => $item) {
			unset($cart['$items'][$key]['$$hashKey']);
		}


		;
		$cart['$buyer_detail']['shipping'];


		$billing_validator	= new Validator;
		$shipping_validator	= new Validator;
		
	$billing_validator->check($cart['$buyer_detail']['billing'], $this->billing_detail_rules);
		$error_notes =  $this->inputErrors();
	$shipping_validator->check($cart['$buyer_detail']['shipping'], $this->shipping_detail_rules);
		// $error_notes .=  $this->inputErrors();

	 if($billing_validator->passed() || $shipping_validator->passed() ){


	 }else{

		Session::putFlash('danger', "{$error_notes}");
	 }

	 return;





		print_r($cart);






		Session::putFlash('success', "Order placed successfully! ");




	return;
 	$this->empty_cart_in_session();

 	/*$this->send_order_confirmation_email($order->id);
 	$this->send_order_notification_email($order->id);
*/
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

		$per_page = 9;
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
			$course->quick_description = $course->quick_description();
		}

		header("Content-type: application/json");


		echo $courses;

			
}


	public function find($course_id)
		{

		header("Content-type: application/json");
		// $per_page = 100;
		echo $course =  Course::find($course_id);
			}	


	



}























?>