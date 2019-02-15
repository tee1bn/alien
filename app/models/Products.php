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


	public function related_products()
	{
		return	self::where('id',$this->id)->latest()->random()->get();
	}


	public function getimagesAttribute()
	{
		return json_decode($this->front_image, true);
	}


	public function getmainimageAttribute()
	{
		return $this->images['images'][0];
	}



	public function getoldpriceAttribute()
	{	
		if ($this->old_price != '') {
			return  Config::currency().' '.number_format($this->old_price,2);		
		}
	}



	public static function upload_product_images($files)
	{
		$directory = 'uploadsp/images/products';

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


	public function getquickdescriptionAtrribute()
	{
		return substr($this->description, 0, random_int(180, 250) ).'...';
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