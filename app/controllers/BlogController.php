<?php
@session_start();

/**



*/
class BlogController extends controller
{



	public function __construct(){


		$this->per_page = 4;

	}


	public function page_title()
	{

		return $this->page_title;
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
    		

    	$this->view('guest/single-list', ['post'=>$this->post]);
	  }


	 
	
	public function category($category_id)
	{

		$this->category 	= Category::find($category_id) ;
		$posts 				= $this->category->posts->sortByDesc('created_at')->forPage($_GET['page'] , $this->per_page);
		$for_pages 			= $this->category->posts;
		$this->page_title 	= $this->category->category;
    			

    	$this->view('guest/index'  , ['posts'=> $posts, 'for_pages'=>$for_pages]);
	  }







}























?>