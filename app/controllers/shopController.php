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


	public function shopping_cart()
	{
		$this->view('guest/shoping-cart');
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