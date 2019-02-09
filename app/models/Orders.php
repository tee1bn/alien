<?php


use Illuminate\Database\Eloquent\Model as Eloquent;

class Orders extends Eloquent 
{
	
		protected $fillable = [
								'buyer_name',
								'email',
								'phone',
								'address',
								'additional_note',
								'buyer_order',
								'status'
								];
	
	protected $table = 'orders';



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