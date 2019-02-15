<?php


use Illuminate\Database\Eloquent\Model as Eloquent;

class Post extends Eloquent 
{
		
		protected $fillable = ['title', 'category_id', 'image_path' , 'content'];
		

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
		return self::where('title', 'LIKE', $this->title)/*->where('id','!=', $this->id)*/->take(3)->get();
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


	public function getimagepathAttribute($value)
	{
        if ((!is_dir($value))  && (file_exists($value))) {

        return ($value);
        }

    	return self::default_main_image();

	}



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