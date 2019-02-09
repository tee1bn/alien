<?php


use Illuminate\Database\Eloquent\Model as Eloquent;

class Category extends Eloquent 
{
	
	protected $fillable = [ 'category', 'note' ];	
	protected $table = 'post_categories';




public function posts(){

return $this->hasMany('Post');
	}


}


















?>