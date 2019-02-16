<?php


use Illuminate\Database\Eloquent\Model as Eloquent;

class Post extends Eloquent 
{
		
		protected $fillable = ['title', 'category_id', 'image_path' , 'content'];


	public function update_post($inputs, $files)
	{

			if (Input::exists('')  || true) {
				$validator = new Validator;
			$validator->check(Input::all() , array(
														'title'=> [
															'required'=> true,
															],
														'category'=> [
															'required'=> true,
															],
														'content'=> [
															'required'=> true,
															],

													));
			 if($validator->passed()){

			 		try{
					 	$this->update([
									'title' 		=> $inputs['title'],
									'category_id' 	=> $inputs['category_id'],
									'content' 		=> $inputs['content']
					 				]);
			 			$this->update_post_images($files, $inputs['images_to_be_deleted']);

			 			return true;
			 		}catch(Exception $e){

			 		}

			 }else{


			 }
		}
	}


	public function update_post_images($files, $images_to_be_deleted)
	{

	$property_media =	$this->upload_post_images($files);
    $new_images = $property_media['images'];


        $previous_images =  $this->image_path['images'];

        //delete necessary ones
			foreach ($images_to_be_deleted as $value) {
				$images_in_previous = $previous_images[$value];
				foreach ($images_in_previous as $image_path) {
				$handle =  new Upload($image_path);
				$handle->clean();
				}

				unset($previous_images[$value]);
			}
		($updated_previous_images = array_values($previous_images)); //after removing some
		

        foreach ($new_images as  $image) {
        	array_unshift($updated_previous_images, $image);
	        }

			$updated_files = [
								'images' => $updated_previous_images
								];

		$this->update(['image_path'=> json_encode($updated_files)]);
	}



	public function category(){

		return $this->belongsTo('Category', 'category_id');
	}

	public function comment(){

		return $this->hasMany('comment')->orderBy('created_at' , DESC)->take(5);
	}
		
	public function no_oF_comment(){

		return $this->hasMany('comment')->get()->count();
	}

	public static function recent_posts($qty = 3){
	
		return self::latest()->take($qty)->get();
	}

	public function intro()
	{
	
		return substr($this->content, 0, random_int(180, 250) ).'...';
	}


	public function other_posts()
	{

		return	self::where('id', '!=' ,$this->id)
					->whereRaW("(category_id = '$this->category_id' OR id != $this->id )")
					->latest()->take(20)->get()->shuffle()->take(3);
		}

	public function url()
	{
		return "blog/post/{$this->id}/{$this->url_title()}";
	}

	public function format_created_at()
	{
		return date("M d, Y", strtotime($this->created_at)) ;
	}

	public function url_title()
	{
			return str_replace(' ', '-', trim($this->title));
	}



	public static function default_main_image()
	{
			return "uploads/images/posts/product_9.jpg";
	}





	public static function upload_post_images($files)
	{
		$directory = 'uploads/images/posts';

		foreach ($files as $attribute => $attributes) {
			foreach ($attributes as $key => $value) {
				$refined_file[$key][$attribute] = $value;
			}

		}

		$i = 0;
		foreach ($refined_file as  $file) {

			$handle = new Upload ($file);


					$file_type = explode('/', $handle->file_src_mime)[0];
	                if (($file_type == 'image' ) ||($file_type == 'video' ) ) {



						$min_height = 350;
						$min_width  = 263;

						// echo $handle->image_src_x;

						if (($handle->image_src_x < $min_width) || ($handle->image_src_y < $min_height) ) {

							Session::putFlash('info', "Item image $i) must be or atleast {$min_width}px min 
								width x {$min_height}px min height for best fit!");
							continue;
						}


	                	$handle->Process($directory);
	                	$file_path = $directory.'/'.$handle->file_dst_name;

	                	if ($file_type == 'image') {

	                         // we now process the image a second time, with some other settings
				            $handle->image_resize            = true;
				            // $handle->image_ratio_y           = true;
				            $handle->image_x                 = $min_width;
				            $handle->image_y                 = $min_height;

				            $handle->Process($directory);

				            $resized_path    = $directory.'/'.$handle->file_dst_name;

							$images[$i]['main_image'] = $file_path;
							$images[$i]['thumbnail'] = $resized_path;
						}

	                }
	                $i++;
		}



			$property_media = [
			'images' => $images,
					];




		return ($property_media);


	}


	public function getdeletelinkAttribute()
	{
		return  Config::domain()."/blog/delete_post/{$this->id}";

	}



	public function geteditlinkAttribute()
	{
		return  Config::domain()."/admin/edit_post/{$this->id}";

	}


	public function gettitleAttribute($value='')
	{
		return ucfirst($value);
	}


	public function delete_post(array $ids)
	{
		foreach ($ids as $key => $id) {
			$post = self::find($id);
				if ($post != null) {

					try{
					 $post->delete();
					}catch(Exeception $e){

					}
				}
			}
			return true;
	}



	public function getimagepathAttribute($value)
	{
     
      return  json_decode($value, true);       
	}


	public function getmainimageAttribute($value)
	{
        if ((!is_dir($this->image_path['images'][0]['main_image']))  && (file_exists($this->image_path['images'][0]['main_image']))) {

        return ($this->image_path['images'][0]['main_image']);
        }

    	return self::default_main_image();

	}

	public function getmainimagesmallAttribute($value)
	{
        if ((!is_dir($this->image_path['images'][0]['thumbnail']))  && (file_exists($this->image_path['images'][0]['thumbnail']))) {

        return ($this->image_path['images'][0]['thumbnail']);
        }

    	return self::default_main_image();
	}

	// public function getfeaturedimagesAttribute()
	// {
	// 	echo $this->image_path;
 //      return  json_decode($this->image_path, true);

	// }


	public function next_post()
	{


	}
	public function prev_post()
	{

		
	}

	
	public function author()
	{
			return 'Dotun Otemuyiwa';
	}




}

 




?>