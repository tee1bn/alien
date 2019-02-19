<?php


use Illuminate\Database\Eloquent\Model as Eloquent;

class UserShipping extends Eloquent 
{
	
	protected $fillable = [
			'user_id',
			'shipping_firstname',
			'shipping_lastname',
			'shipping_company',
			'shipping_country',
			'shipping_street_address',
			'shipping_city',
			'shipping_state',
			'shipping_phone',
			'shipping_email',
			'shipping_apartment',
					];
	
	protected $table = 'user_shipping_details';

	public static $shipping_detail_rules = [

		   			'shipping_firstname'  => [
		   							'required'=>true,
		   									] ,
                    'shipping_lastname'  => [
		   							'required'=>true,
		   									] ,
                    'shipping_country'  => [
		   							'required'=>true,
		   									] , 

                    'shipping_street_address'  =>[
		   							'required'=>true,
		   									] ,
                    'shipping_city'  => [
		   							'required'=>true,
		   									] ,
                    'shipping_state'  => [
		   							'required'=>true,
		   									] ,
                    'shipping_phone'  => [
		   							'required'=>true,
		   									]  ,
                    'shipping_email'  => [
		   							'required'=>true,
		   									] ,
	];



}


















?>