<style>
	
	.quick_view_image{

    height: 525px;
    width: 420px;
    object-fit: cover;
	}

.quick_view_image_div{
	background: #d2d6d8;
}

</style>


<div id="myModal" class="modal fade" role="dialog" style="
    position: fixed;
    z-index: 999999;">
  <div class="modal-dialog modal-lg">
      	<!-- <span id="close-modal" data-dismiss="modal">X</span> -->
					<img src="<?=asset;?>/images/icons/icon-close.png" data-dismiss="modal" id="close-modal" alt="CLOSE">
    <!-- Modal content-->
    <div class="modal-content" id="quick_view_modal">
     
      <div class="modal-body">

	<div class="row">
     					<div class="col-md-6 col-lg-7 p-b-30">


        <div class="item-slick3" data-thumb="<?=domain;?>/{{$product_in_quick_view.front_image}}">
										<div class="wrap-pic-w pos-relative quick_view_image_div">
											<img src="<?=domain;?>/{{$product_in_quick_view.front_image}}" alt="IMG-PRODUCT" class="quick_view_image"  >

										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" >
												<i class="fa fa-expand"></i>
											</a>
										</div>
									</div>
								</div>

        <div class="col-md-6 col-lg-5 p-b-30">
						<div class="p-r-50 p-t-5 p-lr-0-lg">
							<h4 class="mtext-105 cl2 js-name-detail p-b-14">
								{{$product_in_quick_view.name}}
							</h4>

							<span class="mtext-106 cl2">
								<?=$currency;?>{{$product_in_quick_view.formatted_price}}
							</span>

							<p class="stext-102 cl3 p-t-23">
									{{$product_in_quick_view.description}}
								</p>
							
							<!--  -->
							<div class="p-t-33">
								
								<div class="flex-w flex-r-m p-b-10">
									<div class="size-204 flex-w flex-m respon6-next">
										
									<!-- Qty: <input  ng-model="$product_in_quick_view.$qty" class="form-control" type="number"  min="1" > -->

										<button ng-click="add_to_cart($product_in_quick_view.$index, $product_in_quick_view.id, $product_in_quick_view.qty)" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
											Add to cart
										</button>
									</div>
								</div>	
							</div>

						</div>
					</div>
				</div>
      </div>
     
    </div>

  </div>
</div>