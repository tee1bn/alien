<?php


/**
 * this class is the default controller of our application,
 * 
*/
class shopController extends controller
{


	public function __construct(){

	}

public function open_order_confirmation($order_id='')
{
		echo $this->buildView('emails/order_confirmation', ['order'=> Orders::find($order_id)]);
}

	/**
	 * this is the default landing point for all request to our application base domain
	 * @return a view from the current active template use: Config::views_template()
	 * to find out current template
	 */
	public function index($category=null)
	{

		$this->view('guest/shop', ['default_category'=>$category]);
	}


	public function shopping_cart()
	{
		$this->view('guest/shoping-cart');
	}


}























?>