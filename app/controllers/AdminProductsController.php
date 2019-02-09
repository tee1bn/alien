<?php


/**



*/
class AdminProductsController extends controller
{



	public function __construct(){
		$this->middleware('administrator')->mustbe_loggedin();

	}
	
	public function deleteProduct($product_id)
	{


			echo "delete()$product_id";

			$product = Products::find($product_id);

			if ($product !== null) {
				
				try {
					//delete file from server
	$handle = new Upload($product->front_image);
	$handle->clean();
					
					$product->delete();

					echo "deleted";
					Session::putFlash('Info', 'succesfully deleted!');



				} catch (Exception $e) {
					
					print_r($e->getMessage());
					Session::putFlash('Info', 'This product cannot be deleted');


				}
			}

	Redirect::to('admin-products');



	}
	
	public function pausePlayProduct($product_id){

		echo $product = Products::find($product_id);
		if($product->on_sale == 0){

			$product->update(['on_sale' => 1]);
		Session::putFlash('Info', 'Item put on sale successfully');

		}else{
			$product->update(['on_sale' => 0]);
			Session::putFlash('Info', 'Item removed from sale successfully');

		}


	Redirect::to('admin-products');


	}


	
	public function viewProduct($product_id){

		echo $product = Products::find($product_id);

	Redirect::to('admin-products');


	}
	
	


	public function update_item(){

				if (Input::exists('update_products')) {
						$this->validator()->check(Input::all() , array(


										'name' =>[

											'required'=> true,
											'min'=> 2,
												],
								'price' =>[

											'required'=> true,
											'min'=> 1,
											'max'=> 20,	
											'numeric'=> true,
												],

								'description' => [

													'required'=> true,
													'min'=> 4,
												]

						
						));

 if($this->validator->passed()){

$item_id = Input::get('item_id');

 $item =	Products::find($item_id);
 	$item->update([
 						'name' 			=>Input::get('name'),
						'price' 		=>Input::get('price'),
						'category_id' 	=>Input::get('category'),
						'description' 	=>Input::get('description'),
 								]);



 								print_r($_FILES['front_image']);

if ($_FILES['front_image']['size'] != 0) {


$handle = new Upload($_FILES['front_image']);
	$dir = 'uploads/images/products';

		$min_height = 335;
		$min_width = 270;

		echo $handle->image_src_x;

		if (($handle->image_src_x < $min_width) || ($handle->image_src_y < $min_height) ) {

					Session::putFlash('Info', "Item image must be or atleast {$min_width}px min width x {$min_height}px min height for best fit!");

		}

	$handle->file_new_name_body = 'product';


	$handle->process($dir);
	$front_image_path = $dir.'/'.$handle->file_dst_name;
	 (new Upload($item->front_image))->clean();

	 $item->update(['front_image'=> $front_image_path]);



}

Session::putFlash('Info', "Item Updated successfully!");
 }


				}

Redirect::to("admin-products/edit_item/$item_id");

	}


	public function createProduct(){

		if (Input::exists('add_products')) {

// print_r($_FILES['front_image']);


	$this->validator()->check(Input::all() , array(

			'name' =>[

				'required'=> true,
				'min'=> 2,
				'unique'=> 'Products',
					],
	'price' =>[

				'required'=> true,
				'min'=> 1,
				'max'=> 20,	
				'numeric'=> true,
					],

	'description' => [

						'required'=> true,
						'min'=> 4,
					]

		



		));

 if($this->validator->passed()){

 	echo "paseed";


$handle = new Upload($_FILES['front_image']);
	$dir = 'uploads/images/products';

		$min_height = 335;
		$min_width = 270;

		echo $handle->image_src_x;

		if (($handle->image_src_x < $min_width) || ($handle->image_src_y < $min_height) ) {

					Session::putFlash('Info', "Item image must be or atleast {$min_width}px min width x {$min_height}px min height for best fit!");

	// Redirect::to('admin-products');
		}

	$handle->file_new_name_body = 'product';


	$handle->process($dir);
	$front_image_path = $dir.'/'.$handle->file_dst_name;





//upload the feaured_img;
		if ($handle->processed) {


 		$product = Products::create([
 		'name' => Input::get('name'),
 		'description' => Input::get('description'),
 		'price' => Input::get('price'),
 		'category_id' => Input::get('category'),
		'front_image'=> $front_image_path
 	]);


		}


	Session::putFlash('Info', "Item created successfully!");

	Redirect::to('admin-products');



 }else{

	print_r($this->validator->errors());


 }

		}

	Redirect::to('admin-products');
	}
	
	






public function upload_item_image($item)
{



$handle = new Upload($item);
	$dir = 'uploads/images/products';

		$min_height = 335;
		$min_width = 270;

		echo $handle->image_src_x;

		if (($handle->image_src_x < $min_width) || ($handle->image_src_y < $min_height) ) {

					Session::putFlash('Info', "Item image must be or atleast {$min_width}px min width x {$min_height}px min height for best fit!");

	Redirect::to('admin-products');
		}

	$handle->file_safe_name = true;

	$handle->process($dir);

	$front_image_path = $dir.'/'.$handle->file_src_name;

	if ($handle->processed) {
	return $front_image_path;

	}else{}
}




	public function edit_item($item_id)
	{
		
		$products = Products::find($item_id);
		$this->view('admin/edit-item', ['item'=>$products]);  
	}





	public function index()
	{
		
		$products = Products::all();
		$this->view('admin/product', ['products'=>$products]);  
	}







}























?>