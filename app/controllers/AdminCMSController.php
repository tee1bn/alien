<?php


/**
 * this class is the default controller of our application,
 * 
*/
class AdminCMSController extends controller
{


	public function __construct(){

		$this->middleware('administrator')->mustbe_loggedin();
	}


public function delete_slider($slider_key)
{

$page_content = CmsPages::where('page_unique_name', 'sliders')->first();
$page_content_array = ($this->get_db_slider_record());

echo "<pre>";
	//delete file from server
	$handle = new Upload($page_content_array[$slider_key]['slider_image']);
	$handle->clean();

	unset($page_content_array[$slider_key]);
	$page_content_array = array_values($page_content_array);
print_r($page_content_array);
print_r($slider_key);

	Session::putFlash('info', 'Slider deleted successfully');
	$page_content->update(['page_content' => json_encode($page_content_array)]);
	
	
	Redirect::to('admin-cms/sliders');

}


public function update_slider_image($slider_key=null)
{
/*	print_r($_FILES);
	print_r($slider_key);
echo "<pre>";*/
 $page_content = CmsPages::where('page_unique_name', 'sliders')->first();

	$page_content_array = ($this->get_db_slider_record());
$old_file = $page_content_array[$slider_key]['slider_image'];

	$new_slider_image_path = $this->upload_slider_file($_FILES['files0']);
	$page_content_array[$slider_key]['slider_image'] = $new_slider_image_path; 

	//delete file from server
	$handle = new Upload($old_file);
	$handle->clean();

		// print_r($page_content_array);


	$page_content->update(['page_content' => json_encode($page_content_array)]);


header("content-type:application/json;");
print_r(json_encode(['new_slider_image_path' => $new_slider_image_path]));




}

public function get_db_slider_record($value='')
{


 $page_content = CmsPages::where('page_unique_name', 'sliders')->first();
 $test_specimen_is_array = is_array(json_decode($page_content->page_content , TRUE)) ;
 	if (!$test_specimen_is_array) {
 		$page_content_array = [];
 	}else{
 		
 $page_content_array = json_decode($page_content->page_content, true);
 	}

return $page_content_array ;

 }

public function create_slider()
{

	$page_content_array = $this->get_db_slider_record();


	if (/*Input::exists()*/ true) {
		print_r(Input::all());

	$this->validator()->check(Input::all() , array(

			'main_text' =>[

				'required'=> true,
				'max'=> '15',
				'min'=> '2',
					],
			'sub_text' =>[

				'required'=> true,
				'max'=> '30',
				'min'=> '2',
					],
	));

	 if($this->validator->passed()){

	
	 print_r($page_content_array);



	  $slider_image = $this->upload_slider_file($_FILES['slider_image']);
	 	$new_slider = [
	 			  	'main_text' 	=> Input::get('main_text'),
            		'sub_text' 		=> Input::get('sub_text'),
            		'slider_image' 	=> $slider_image
	 				];

print_r($new_slider);

	array_unshift($page_content_array, $new_slider);
	print_r($page_content_array);
	 $page_content = CmsPages::where('page_unique_name', 'sliders')->first();

	$page_content->update(['page_content' => json_encode($page_content_array)]);

	Session::putFlash('info', 'Slider created successfully!');
	 }else{


	 	
	 }


	}

Redirect::to('admin-cms/sliders');

}


public function upload_slider_file($file)
{

	 $directory = 'uploads/cms/sliders';
	 $min_height = 930;
	 $min_width = 1920;
	 $handle = new Upload($file);
	 if(explode('/', $handle->file_src_mime)[0] != 'image'){
	 	Session::putFlash('Info','File must be an image');
	 	Redirect::to('admin-cms/sliders');
	 }
	

	 if (($handle->image_src_x < $min_width) ||($handle->image_src_y < $min_height) ) {
	 	Session::putFlash('Info',"Image must be atleast min width{$min_width}px by min height{$min_height}px for best fit.");
	 }

	 $handle->process($directory);
	  $slider_image = $directory.'/'.$handle->file_dst_name;


	  return $slider_image;

	}

public function update_sliders()
{
echo "<pre>";
	print_r($_FILES);
	// print_r(Input::get('slider'));
	
 $page_content = CmsPages::where('page_unique_name', 'sliders')->first();

	$page_content_array = $this->get_db_slider_record();


 	$updated_content = Input::get('slider');

$page_content->update(['page_content'=> json_encode($updated_content)]);
Session::putFlash('info', 'Sliders updated successfully!');
Redirect::to('admin-cms/sliders');
}




	public function sliders()
	{
 $page_content = CmsPages::where('page_unique_name', 'sliders')->first();
 $test_specimen_is_array = is_array(json_decode($page_content->page_content , TRUE)) ;
 	if (!$test_specimen_is_array) {
 		$page_content_array = [];
 	}else{
 		
 $page_content_array = json_decode($page_content->page_content, true);
 	}


		$this->view('admin/sliders', ['sliders' => $page_content_array]);

	}

	/**
	 * this is the default landing point for all request to our application base domain
	 * @return a view from the current active template use: Config::views_template()
	 * to find out current template
	 */
	public function social_handles()
	{

		$this->view('admin/social-handles');
	}


}























?>