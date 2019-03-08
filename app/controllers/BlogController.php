<?php
@session_start();

/**



*/
class BlogController extends controller
{



	public function __construct(){


		$this->per_page = 20;

	}



	public function update_post()
	{

		$post = Post::find(Input::get('id'));
		$update = 	$post->update_post($_POST, $_FILES['image_path']);

		if ($update === true) {
				Session::putFlash('success','Post Updated Successfully.');
			}
		Redirect::back();
	}




	public function create_post()
	{
	
		if (Input::exists()  || true) {

			$this->validator()->check(Input::all() , array(
														'title'=> [
															'required'=> true,
															'unique'=> 'Post',
															],
														'category'=> [
															'required'=> true,
															],
														'content'=> [
															'required'=> true,
															],

													));
			 if($this->validator->passed()){


					$post_image =  Post::upload_post_images($_FILES['image_path']);

					if (count($post_image['images'])!= 0) {

				 		$product = Post::create([
				 		'title' => Input::get('title'),
				 		'category_id' => Input::get('category'),
				 		'content' => Input::get('content'),
						'image_path'=> json_encode($post_image)
		 				]);
					Session::putFlash('success', "Post Created Successfully!");
				}else{

					Session::putFlash('info', "Please check the images and try again!");
				}
			}else{

					Session::putFlash('info', $this->inputErrors());

			}
		}
		
		Redirect::back();
	}


	public function update_category()
	{

		foreach ($_POST['category'] as $id => $category) {

			Category::updateOrCreate(['id'=> $id], 
									['category' => $category]);
		}

	 		Session::putFlash('success', 'Updated Successfully.');
	 		Redirect::back();
	}


	public function delete_category($category_id)
	 {
	 	if(Category::delete_category([$category_id])){
	 		Session::putFlash('success', 'Deleted Successfully.');
	 	}
	 	Redirect::back();
	 } 

	public function delete_post($post_id)
	 {
	 	if(Post::delete_post([$post_id])){
	 		Session::putFlash('success', 'Deleted Successfully.');
	 	}
	 	Redirect::back();
	 } 

	public function add_category($value='')
	{


		if (Input::exists() || true) {

					$this->validator()->check(Input::all() , Category::$validation_rules);
					if ($this->validator()->passed()) {

						Category::create([
							'category' => $_POST['category']
						]);

						Session::putFlash('success','Category created successfully.');
					}else{

						Session::putFlash('danger', $this->inputErrors());

					}
			}
		 
			Redirect::back();
	}




	
	public function index()
	{

		$posts 		= Post::all()->sortByDesc('created_at')->forPage($_GET['page'] , $this->per_page);	
		$for_pages 	= Post::all();	

	    $this->view('guest/blog'  , ['posts'=> $posts, 'for_pages'=>$for_pages]);
  	}

	

	
	public function post($post_id)
	{

		$this->post 		= Post::find($post_id) ;
		$this->page_title 	= $post->title;
    		

    	$this->view('guest/single-post', ['post'=>$this->post]);
	  }


	 
	
	public function category($category_id)
	{

		$this->category 	= Category::find($category_id) ;
		$posts 				= $this->category->posts->sortByDesc('created_at')->forPage($_GET['page'] , $this->per_page);
		$for_pages 			= $this->category->posts;
		$this->page_title 	= $this->category->category;
    			

    	$this->view('guest/blog'  , ['posts'=> $posts, 'for_pages'=>$for_pages]);
	  }







}























?>