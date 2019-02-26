<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Products extends Eloquent 
{
	
		protected $fillable = [
						'name',
						'price',
						'category_id',
						'ribbon',
						'old_price',
						'description',
						'front_image',
						'back_image',
						'on_sale',
							];
	
	protected $table = 'products';


	public function getpercentdiscountAttribute()
	{
		if (($this->old_price==null) ||($this->old_price <= $this->price) ) {
			return 0;
				}		

		return  (int) (($this->old_price - $this->price) * (100 / $this->old_price));
	}


	public function update_product($inputs, $files)
	{


			if (Input::exists('')  || true) {
				$validator = new Validator;
			$validator->check(Input::all() , array(

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
			 if($validator->passed()){


			 		try{
					 	$this->update([
									'name' 		=> $inputs['name'],
									'price' 	=> $inputs['price'],
									'category' 	=> $inputs['category_id'],
									'description' => $inputs['description'],
									'ribbon' => $inputs['ribbon'],
									'old_price' => $inputs['regular_price'],
					 				]);
			 			$this->update_product_images($files, $inputs['images_to_be_deleted']);

			 			return true;
			 		}catch(Exception $e){

			 		}

			 }else{


			 }
		}
	

	}



	public static function upload_post_images($files)
	{
		$directory = 'uploads/images/products';

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

/*						if (($handle->image_src_x < $min_width) || ($handle->image_src_y < $min_height) ) {

							Session::putFlash('info', "Item image $i) must be or atleast {$min_width}px min 
								width x {$min_height}px min height for best fit!");
							continue;
						}

*/
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



	public function update_product_images($files, $images_to_be_deleted)
	{

		$property_media =	$this->upload_post_images($files);

	    $new_images = $property_media['images'];


        $previous_images =  $this->images['images'];

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

		$this->update(['front_image'=> json_encode($updated_files)]);
	}




	public function getdeletelinkAttribute($value)
	{
		return  Config::domain()."/admin-products/deleteProduct/{$this->id}";
	}


	public function related_products()
	{
		return	self::where('id', '!=' ,$this->id)
					->whereRaW("(category_id = '$this->category_id' OR id != $this->id )")
					->latest()->take(20)->get()->shuffle()->take(4);
	}


	public function getimagesAttribute()
	{
		return json_decode($this->front_image, true);
	}


	public function getmainimageAttribute()
	{
		return $this->images['images'][0];
	}



	public function getsecondaryimageAttribute()
	{
		if (($this->images['images'][1] !=null ) && ( file_exists($this->images['images'][1]['main_image']))) {
			return $this->images['images'][1];
		}
			return $this->mainimage;
	}




/*
	public function getoldpriceAttribute()
	{	
		if ($this->old_price != '') {
			return  Config::currency().' '.number_format($this->old_price,2);		
		}
	}
*/



	public static function upload_product_images($files)
	{
		$directory = 'uploads/images/products';

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



						$min_height = 335;
						$min_width  = 270;

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
				            $handle->image_x                 = 350;
				            $handle->image_y                 = 263;

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


	public function quickdescription()
	{
		return substr($this->description, 0, random_int(240, 450) ).'...';
	}



	public function url_link()
	{
		return Config::domain()."/shop/product_detail/{$this->id}/{$this->url_title()}";
	}


	public function url_title()
	{
			return str_replace(' ', '-', trim($this->name));
	}


	public  function is_on_sale()
	{
		return (bool)($this->on_sale == 1);
	}

	public static function on_sale()
	{
		return self::where('on_sale' , 1);
	}

	public function category()
	{
		return $this->belongsTo('ProductsCategory' , 'category_id');
	}

}


















?>