<?php


use Illuminate\Database\Eloquent\Model as Eloquent;

class Category extends Eloquent 
{
	
	protected $fillable = [ 'category', 'note' ];	
	protected $table = 'post_categories';




public function posts(){

return $this->hasMany('Post');
	}

	public function url_link()
	{
		return "blog/category/{$category->id}/{$this->url_title()}";

	}

	public function url_title()
	{
			return ucfirst(str_replace(' ', '-', $this->category));
	}

}


















?>