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

								'shipping_fee',
								'paid_at',

								];
	
	protected $table = 'orders';


	public function mark_paid()
	{
		$this->update(['paid_at'=> date("Y-m-d H:i:s")]);

	}

	public function getshippingfeeAttribute($value)
	{

		return json_decode($value, true) ;
	}


	public function getpaymentAttribute()
	{
		if ($this->paid_at) {

			return '<span class="label label-success">Paid</span>';
		}

			return '<span class="label label-danger">Unpaid</span>';

	}

	public function getshippingcostAttribute()
	{

		return (int) $this->shipping_fee['price'] ;
	}



	public function getdateAttribute()
	{
		return date("M d, Y", strtotime($this->created_at)) ;
	}




	public function getoveralltotalAttribute()
	{
		return $this->total_price() + $this->shippingcost;
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

			$total_price[] = $order['price'] *$order['qty'];

		}

		$total =  array_sum($total_price) ;

		return $total;
	}


	public function paystack_total()
	{
		return (100 * $this->overalltotal);
	}




	public function delete_order(array $ids)
	{
		foreach ($ids as $key => $id) {
			$order = self::find($id);
				if ($order != null) {

					try{
					 $order->delete();
					}catch(Exeception $e){

					}
				}
			}
			return true;
	}



}


















?>