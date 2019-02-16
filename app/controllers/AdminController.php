<?php


/**
 * this class is the default controller of our application,
 * 
*/
class AdminController extends controller
{


	public function __construct(){

	}
	
	


	public function blog_posts()
	{

		$post = Post::all();
		$categories = Category::all();

		$this->view('admin/posts', [
									'posts'=>$post,
									'categories'=>$categories,
									'pictures' => $file,
									'directory' => $dir,
							]);  //note this is a path to the view
	
	}



	public function edit_post($post_id)
	{
			try {
				echo $post = Post::find($post_id);
				
			} catch (Exception $e) {
				
				Session::putFlash('warning','Could Not Find Post. Please try again');
				Redirect::back();
			}

			$this->view('admin/edit-post', [
									'post'=>$post,
							]);  //note this is

	}


	public function index()
	{
	}

}























?>