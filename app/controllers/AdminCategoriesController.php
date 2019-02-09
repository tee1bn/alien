<?php


/**



*/
class AdminCategoriesController extends controller
{



	public function __construct(){
		$this->middleware('administrator')->mustbe_loggedin();

	}
	
	public function delete_category()
	{


			echo "delete()$category_id";
			$category_id = Input::get('category_id');
			$category = ProductsCategory::find($category_id);

			if ($category !== null) {
				
				try {
					
					$category->delete();

					echo "deleted";
					Session::putFlash('Info', 'succesfully deleted!');



				} catch (Exception $e) {
					
					print_r($e->getMessage());
					Session::putFlash('Info', 'This category cannot be deleted');


				}
			}

	Redirect::to('admin-categories');



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
	
	


	public function update_category(){


				// if (Input::exists('update_category')) {
print_r($_POST);
						$this->validator()->check(Input::all() , array(


										'category' =>[

											'required'=> true,
											'min'=> 2
												],
							
						
						));

 if($this->validator->passed()){

echo "string";

$category_id = Input::get('category_id');

 $category =	ProductsCategory::find($category_id);
 	$category->update([
 						'category' 			=>Input::get('category'),
 								]);

 	Session::putFlash('info', 'Category updated successfully!');

 }else{
 	echo "stringstringstring";


	Session::putFlash('info', 'Category not updated successfully!');

 }



Redirect::to("admin-categories");

	}


	public function create_category(){

		if (Input::exists('add_category')) {



	$this->validator()->check(Input::all() , array(

			'category' =>[

				'required'=> true,
				'min'=> 1,
				'unique'=> 'ProductsCategory',
					]


		));

 if($this->validator->passed()){
 	ProductsCategory::create(['category'=> Input::get('category')]);
 	Session::putFlash('Info', "Category created successfully!");


 }else{

	print_r($this->validator->errors());


 }

		}

	Redirect::to('admin-categories');
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
		
		$this->view('admin/categories');  
	}







}























?>