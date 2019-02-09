<?php


use Illuminate\Database\Eloquent\Model as Eloquent;

class Admin extends Eloquent 
{
	
	protected $fillable = [ 'firstname','lastname', 'phone','email', 'password'];
	
	protected $table = 'administrators';




}


















?>