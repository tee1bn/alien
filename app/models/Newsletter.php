<?php


use Illuminate\Database\Eloquent\Model as Eloquent;

class Newsletter extends Eloquent 
{
	
	public $name ;
	protected $fillable = ['email'];
	protected $table = 'newsletters';

}


















?>