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