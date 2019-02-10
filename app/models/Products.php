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


	public function quick_description()
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