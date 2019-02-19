<?php


use Illuminate\Database\Eloquent\Model as Eloquent;

class Orders extends Eloquent 
{
	
		protected $fillable = [
								'buyer_name',
								'user_id',
								'email',
								'phone',
								'address',
								'additional_note',
								'buyer_order',
								'billing_details',
								'shipping_details',
								'status',
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
	
	protected $table = 'orders';


	public function getdateAttribute()
	{
		return date("M d, Y", strtotime($this->created_at)) ;
	}



	public function order_detail()
	{
		return (json_decode($this->buyer_order,true));
	}

	public function total_item()
	{


		$orders =  $this->order_detail();
		
		return count($orders);
	}

	public function total_qty()
	{

		$orders =  $this->order_detail();
		foreach ($orders as $order) {

			$total_qty[] = $order['qty'];

		}

		return array_sum($total_qty);
	}



public function total_price()
{

	$orders =  $this->order_detail();
	foreach ($orders as $order) {

		$total_price[] = $order['price'];

	}

	return array_sum($total_price);
}



}


















?>