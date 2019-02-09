<?php


/**
 * this class is the default controller of our application,
 * 
*/
class FilesController extends controller
{	
	/**
	 * [$user the current user whose username we are using to access this coontroller]
	 * @var [User model instance]
	 */
	protected $user ;

	public function __construct($user){
		$this->user =  $user;
		$this->middleware('current_user')->mustbe_loggedin()->must_have_complete_profile();

	}


public function upload_img()
{
	// print_r($_FILES);

	$directory = [ 
			'image' => 'uploads/images/photos-images',
			'video' => 'uploads/videos/users'];

	$filetype = [ 'image'=>1, 'video'=>2];


	$i = 0;

	$allowed = ['image', 'video'];

	foreach ($_FILES as $file) {


   		 $handle = new Upload($file);


   		 $new_name =   substr(md5(uniqid()) , 0, 10);
         $handle->file_new_name_body = "{$this->auth()->username}_$new_name ";
		 $mime_type =  explode("/", $handle->file_src_mime )[0];

         if (!in_array($mime_type, $allowed)) {
         	continue;
         }

         $handle->Process($directory[$mime_type]);
         
                if (! $handle->processed) { echo "unprocessed"; continue ;}

                $original_file  = $directory[$mime_type].'/'.$handle->file_dst_name;


                $caption = Input::get('files')[$i]['caption'];
                $caption = ($caption== 'undefined')? '' : $caption;

                $description = Input::get('files')[$i]['description'];
                $description = ($description== 'undefined')? '' : $description;

                UsersFiles::create([
							'user_id'		=> $this->auth()->id,
							'file_path' 	=> $original_file,
							'caption' 		=> $caption,
							'description' 	=> $description,
							'type' 			=> $filetype[$mime_type],   //1=photo, 2=video
						 			]);



                $i++;



	}




}
	

	/**
	 * @return a view from the current active template use: Config::views_template()
	 * to find out current template
	 */
	public function index()
	{


			// $this->view('auth/about', ['user'=>$this->user]);


echo "string";

	}








}












?>