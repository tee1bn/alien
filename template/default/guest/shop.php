<?php

$page_title = "Shop | Fashion store in usa";
$page_description = "";


 include 'includes/header.php';

?>
	

	<div ng-app = "Shop" ng-controller="productsDisplayController" ng-cloak>
	<?php include 'includes/mini-cart.php';?>

	
	<!-- Product -->
	<section class="bg0 m-t-23 p-b-40" >
		<div class="container">
			<div class="flex-w flex-sb-m p-b-52">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 " data-filter="*" ng-click="update_search_filter('')">
						All Products
					</button>

					<button style="text-transform: capitalize;" ng-repeat="($index , $category) in $categories " class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".{{$category.category}}"  ng-click="update_search_filter($category.category)" >
						{{$category.category}}
					</button>

				</div>

				<div class="flex-w flex-c-m m-tb-10">
					

					<div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
						<i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
						<i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						Search
					</div>
				</div>
				
				<!-- Search product -->
				<div class="dis-none panel-search w-full p-t-10 p-b-15">
					<div class="bor8 dis-flex p-l-15">
						<button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
							<i class="zmdi zmdi-search"></i>
						</button>

						<input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" ng-model="searchText" ng-init="searchText='<?=$default_category;?>'" placeholder="Search">
					</div>	
				</div>

				
				<!-- filter spot -->
			</div>
			<div class="row isotop-grid" style="position: unset; height: auto; padding-bottom: 20px;">
				<div ng-repeat="($index , $product) in $products  | filter:searchText" class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item {{$product.category.category}}">
					<!-- Block2 -->
					<div class="block2">
						<div class="block2-pic hov-img0" style="background: #d2d6d8;">
							<img src="<?=domain;?>/{{$product.front_image}}" alt="IMG-PRODUCT" class="git_product_image" >
							<a href="javascript:void;" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 " ng-click="set_in_quick_view($index, $product.id)">
								Quick View
							</a>
						</div>
						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
									{{$product.name}}
								</a>

								<span class="stext-105 cl3">
									<?=$currency;?>{{$product.formatted_price}}
								</span>
							</div>
<div class="block2-txt-child2 flex-r p-t-3">
								<span class="label-tag">{{$product.category.category}}</span>
								
							</div>

				
						</div>
					</div>
				</div>
			</div>

			<?php include 'includes/quick_view_modal.php';?>



			<!-- Load more -->
			<div class="flex-c-m flex-w w-full p-t-10 p-b-10" style="cursor: pointer;">
				<a  ng-show="$no_more_content==false" id="load_more_btn" ng-click="fetch_products();" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
					Load More
				</a>
			</div>
		</div>
	</section>
		

		</div>



<?php include 'includes/footer.php';?>