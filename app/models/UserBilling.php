<?php


use Illuminate\Database\Eloquent\Model as Eloquent;

class UserBilling extends Eloquent 
{
	
	protected $fillable = [
			'user_id',
			'billing_firstname',
			'billing_lastname',
			'billing_company',
			'billing_country',
			'billing_street_address',
			'billing_city',
			'billing_state',
			'billing_phone',
			'billing_email',
			'billing_apartment',
					];
	
	protected $table = 'user_billing_details';


		public static $billing_detail_rules = [

		   			'billing_firstname'  => [
		   							'required'=>true,
		   									] ,
                    'billing_lastname'  => [
		   							'required'=>true,
		   									] ,
                    'billing_country'  => [
		   							'required'=>true,
		   									] , 

                    'billing_street_address'  =>[
		   							'required'=>true,
		   									] ,
                    'billing_city'  => [
		   							'required'=>true,
		   									] ,
                    'billing_state'  => [
		   							'required'=>true,
		   									] ,
                    'billing_phone'  => [
		   							'required'=>true,
		   									]  ,
                    'billing_email'  => [
		   							'required'=>true,
		   									] ,
	];


}


















?>