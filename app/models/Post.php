<?php


use Illuminate\Database\Eloquent\Model as Eloquent;

class Post extends Eloquent 
{
		
		protected $fillable = ['title', 'category_id', 'image_path' , 'content'];
		

	public function category(){

		return $this->belongsTo('Category');
	}

	public function comment(){

		return $this->hasMany('comment')->orderBy('created_at' , DESC)->take(5);
	}
		
	public function no_oF_comment(){

		return $this->hasMany('comment')->get()->count();
	}

	public static function recent_posts($qty = 3){
		return self::latest()->take($qty);
	}

	public function intro()
	{
		return substr($this->content, 0, random_int(180, 250) ).'...';
	}

	public function url_title()
	{
			return str_replace(' ', '-', $this->title);
	}

	
	public function author()
	{
			return 'Dotun Otemuyiwa';
	}




}

 




?>