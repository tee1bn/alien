<?php include 'includes/header.php';?>


	<div ng-app = "Shop" ng-controller="productsDisplayController">

	<?php include 'includes/mini-cart.php';?>
	<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Shoping Cart
			</span>
		</div>
	</div>


	<!-- Shoping Cart -->
	<div class="bg0 p-t-75 p-b-85">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50" ng-show="$current_tab=='review_cart'">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div  class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="column-1">Product</th>
									<th class="column-2"></th>
									<th class="column-3">Price</th>
									<th class="column-4">Quantity</th>
									<th class="column-5">Total</th>
									<th class="column-2"></th>
								</tr>

								<tr ng-repeat="($index, $item) in $cart" class="table_row">
									<td class="column-1">
										<div class="how-itemcart1">
											<img src="<?=domain;?>/{{$item.product.front_image}}" alt="IMG">
										</div>
									</td>
									<td class="column-2">{{$item.product.name}}</td>
									<td class="column-3"><?=$currency;?>{{$item.product.formatted_price}}</td>
									<td class="column-4">
										<div class="wrap-num-product flex-w m-l-auto m-r-0">
											<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m" 
											ng-click="decrease_qty($item.product.id)">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>

											<input class="mtext-104 cl3 txt-center num-product" ng-model="$item.qty" type="number">

										<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m" ng-click="increase_qty($item.product.id)">
												<i class="fs-16 zmdi zmdi-plus" ></i>
											</div>
										</div>
									</td>
									<td class="column-5"><?=$currency;?>{{$item.price}}</td>
									<td ng-click="remove_from_cart($item.product.id)"  class="column-6  remove-item"><i class="fa fa-times"></i></td>
								</tr>

								

							</table>
						</div>

<style>

.remove-item:hover
{

 color: red !important;
}

.remove-item
{ 
 cursor: pointer !important;
}
</style>


						<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
							<div class="flex-w flex-m m-r-20 m-tb-5">
							
								<div class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
									<a href="<?=domain;?>/shop">Back to Shop</a>
								</div>
							</div>

							<div ng-hide="$cart.length==0" ng-click="set_current_tab('billing_detail')" class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
								Proceed
							</div>
						</div>
					</div>
				</div>


				
<div  class="col-lg-10 col-xl-7 m-lr-auto m-b-50" ng-show="$current_tab=='billing_detail'">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Billing Detail 
						</h4>

						
						<div class="col-md-12">
								
							<form id="billing_and_order_details_form" method="post">
								<?=$this->csrf_field('billing_and_order_details_form');?>
									<div class="bor8 bg0 m-b-12">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="full_name" placeholder="Full name" required="" >
									</div>

									<div class="bor8 bg0 m-b-12">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="email" name="email" placeholder="Email" required="">
									</div>

									<div class="bor8 bg0 m-b-12">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="phone" name="phone" placeholder="Telephone" required="">
									</div>

									<div class="bor8 bg0 m-b-12">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="address" name="address" placeholder="Address" required="">
									</div>

									<div class="bor8 bg0 m-b-22">
										<textarea class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="additional_note" placeholder="Additional note e.g size, color" style="height: 90px;"></textarea>
									</div>
									<input type="submit" value="submit" id="submit_order" style="display: none;">
									<input type="" name="order" value="{{$cart}}" style="display: none;">
									<div class="flex-w">
										<div ng-click="set_current_tab('review_cart')" class="flex-c-m stext-101 cl2 size-115 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer">
										 <i class="fa fa-chevron-left"></i>&nbsp;&nbsp;	Review cart
										</div>
										<button type="button" id="place_order_btn"  onclick="document.getElementById('submit_order').click()"  style="position: absolute;    right: 26px;" 
										class="flex-c-m stext-101 cl0 size-115 bg3 bor13 hov-btn3 p-lr-15 trans-04 pointer">
											Place order &nbsp;&nbsp; <i class="fa fa-chevron-right"></i>
											<?=$this->add_ajax_is_loading_spinner();?>
										</button>
									</div>

									</form>	
						</div>

					
					</div>
				</div>

				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Order Summary
						</h4>

						<div class="flex-w flex-t bor12 p-b-13">
							<div class="size-208">
								<span class="stext-110 cl2">
									Subtotal:
								</span>
							</div>

							<div class="size-209">
								<span class="mtext-110 cl2">
									<?=$currency;?>{{get_total_price_in_cart()}}
								</span>
							</div>
						</div>

					
						<div class="flex-w flex-t p-t-27 p-b-33">
							<div class="size-208">
								<span class="mtext-101 cl2">
									Total:
								</span>
							</div>

							<div class="size-209 p-t-1">
								<span class="mtext-110 cl2">
									<?=$currency;?>{{get_total_price_in_cart()}}
								</span>
							</div>
						</div>
<!-- 
						<button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
							Proceed to Checkout
						</button> -->
					</div>
				</div>
			</div>
		</div>
	</div>
		
		</div>
	
		<?php include 'includes/footer.php';?>
