
<style>
	#empty_cart{
    position: absolute;
    top: 40%;
    left: 34%;

    font-weight: 900;
}

.mini-cart-img-git{
	width: 60px;
	height: 75px;
	object-fit: contain;
}
.header-cart-item-img{
	background: #d2d6d8;
}
</style>
	<!-- Cart -->
	<div class="wrap-header-cart js-panel-cart">
		<div class="s-full js-hide-cart"></div>

		<div class="header-cart flex-col-l p-l-65 p-r-25">
			<div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					Your Cart
				</span>

				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>
			<div id="empty_cart" ng-hide="$cart.length!=0">Add items to cart<br>from the shop <br> to check out!</div>
			
			<div ng-hide="$cart.length==0" class="header-cart-content flex-w js-pscroll">
				<ul  class="header-cart-wrapitem w-full">
					
				

					<li ng-repeat="($index, $item) in $cart" class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img">
							<img src="<?=domain;?>/{{$item.product.front_image}}" alt="IMG">
						</div>

						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
							{{$item.product.name}}
							</a>

							<span class="header-cart-item-info">
								{{$item.qty}} x <?=$currency;?>{{$item.product.formatted_price}}
							</span>
						</div>
					</li>


				</ul>
				
				<div class="w-full">
					<div class="header-cart-total w-full p-tb-40">
						Total: <?=$currency;?>{{get_total_price_in_cart()}}
					</div>

					<div class="header-cart-buttons flex-w w-full">
						<button ng-click="checkout()" href="#" ng-disabled="$cart.length==0"
						class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
							Check Out &nbsp;<?=$this->add_ajax_is_loading_spinner();?>
						</button>

						<button ng-click="empty_cart()" ng-disabled="$cart.length==0" href="#" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
							Empty Cart 
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
