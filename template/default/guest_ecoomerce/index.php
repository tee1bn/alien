<?php

$page_title = "Home | Fashion Store In USA";
$page_description = "";

include 'includes/header.php';?>


<script src="<?=asset;?>/includes/angularjs_apps/cms_sliders.js"></script>


<div ng-app = "Shop" ng-controller="productsDisplayController" ng-cloak>


	<?php 	include 'includes/mini-cart.php';?>
	
<style>
	.slider-text{

    background: #ffffff47;
    padding: 10px;
    margin-bottom: 5px;
    	}
</style>
	
	<!-- Slider -->
	<section class="section-slide" ng-controller="SlidersController">
		<div class="wrap-slick1">
			<div class="slick1">
				<?php foreach ($sliders as  $slide):?>
				<div  class="item-slick1" style="background-image: url(<?=domain;?>/<?=$slide['slider_image'];?>);">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<div class="slider-text">
								
							<div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
								<span class="ltext-101 cl2 respon2">
									<?=ucfirst($slide['sub_text']);?>
								</span>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
								<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
									<?=$slide['main_text'];?>
								</h2>
							</div>
								
							</div>
							<div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
								<a href="<?=domain;?>/shop" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
									Shop Now
								</a>
							</div>
						</div>
					</div>
				</div>

<?php endforeach ;?>
			
			</div>
		</div>
	</section>


	<!-- Banner -->
	<div class="sec-banner bg0 p-t-80 p-b-50">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">

					<div class="block1 wrap-pic-w">
						<img src="<?=asset;?>/images/banner-01.jpg" alt="IMG-BANNER">

						<a href="<?=domain;?>/shop" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
							<div class="block1-txt-child1 flex-col-l">
								<span class="block1-name ltext-102 trans-04 p-b-8">
									Excellence
								</span>

<!-- 								<span class="block1-info stext-102 trans-04">
									Spring 2018
								</span>
 -->							</div>

							<div class="block1-txt-child2 p-b-4 trans-05">
								<div class="block1-link stext-101 cl0 trans-09">
									Shop Now
								</div>
							</div>
						</a>
					</div>
				</div>

				<div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">

					<div class="block1 wrap-pic-w">
						<img src="<?=asset;?>/images/banner-02.jpg" alt="IMG-BANNER">

						<a href="<?=domain;?>/shop" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
							<div class="block1-txt-child1 flex-col-l">
								<span class="block1-name ltext-102 trans-04 p-b-8">
									Creativity
								</span>

<!-- 								<span class="block1-info stext-102 trans-04">
									Spring 2018
								</span>
 -->							</div>

							<div class="block1-txt-child2 p-b-4 trans-05">
								<div class="block1-link stext-101 cl0 trans-09">
									Shop Now
								</div>
							</div>
						</a>
					</div>
				</div>
<div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">

					<div class="block1 wrap-pic-w">
						<img src="<?=asset;?>/images/banner-03.jpg" alt="IMG-BANNER">

						<a href="<?=domain;?>/shop" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
							<div class="block1-txt-child1 flex-col-l">
								<span class="block1-name ltext-102 trans-04 p-b-8">
									Satisfaction
								</span>

<!-- 								<span class="block1-info stext-102 trans-04">
									New Trend
								</span>
 -->							</div>

							<div class="block1-txt-child2 p-b-4 trans-05">
								<div class="block1-link stext-101 cl0 trans-09">
									Shop Now
								</div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- Product -->
	<section class="bg0 m-t-23 p-b-40" >
		<div class="container">
			<div class="p-b-10">
				<h3 class="ltext-103 cl5">
					Product Overview
				</h3>
			</div>
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

						<input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" ng-model="searchText" placeholder="Search">
					</div>	
				</div>

				
				<!-- filter spot -->
			</div>
			<div class="row isotop-grid" style="position: unset; height: auto; padding-bottom: 20px;">
				<div ng-repeat="($index , $product) in $products  | filter:searchText" class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item {{$product.category.category}}">
					<!-- Block2 -->
					<div class="block2">
						<div class="block2-pic hov-img0" style="background: #d2d6d8;">
							<img src="<?=domain;?>/{{$product.front_image}}" alt="IMG-PRODUCT" class="git_product_image">
							<a href="javascript:void;" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 " ng-click="set_in_quick_view($index, $product.id)">
								Quick View
							</a>
						</div>
						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="javascript:void;" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
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
			<div class="flex-c-m flex-w w-full p-t-45">
				<a  href="<?=domain;?>/shop" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
					Load More
				</a>
			</div>
		</div>
	</section>
		


	<div>


	<?php include 'includes/footer.php'; ?>