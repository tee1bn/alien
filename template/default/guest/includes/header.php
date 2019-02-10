<?php
$currency = '$';
;?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title><?=$page_title;?> | <?=project_name;?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="<?=$page_description;?>">

<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?=asset;?>/images/icons/logo-05.jpg"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=asset;?>/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=asset;?>/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=asset;?>/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=asset;?>/fonts/linearicons-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=asset;?>/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?=asset;?>/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=asset;?>/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=asset;?>/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?=asset;?>/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=asset;?>/vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=asset;?>/vendor/MagnificPopup/magnific-popup.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=asset;?>/vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=asset;?>/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?=asset;?>/css/main.css">
<!--===============================================================================================-->



<!--===============================================================================================-->	
	<script src="<?=asset;?>/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=asset;?>/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=asset;?>/vendor/bootstrap/js/popper.js"></script>
	<script src="<?=asset;?>/vendor/bootstrap/js/bootstrap.min.js"></script>

	


<!-- /*
 AngularJS v1.4.8
 (c) 2010-2015 Google, Inc. http://angularjs.org
 License: MIT
*/ -->
<script>
	let $base_url = "<?=domain;?>";
</script>
<script src="<?=asset;?>/js/angularjs.js"></script>
<script src="<?=asset;?>/includes/angularjs_apps/shop_products.js"></script>


	<?=$this->detect_running_ajax_request();?>
	<?=$this->show_notifications();?>


</head>
<body class="animsition">
	
	<!-- Header -->
	<header class="header-v4">
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<!-- Topbar -->
		<!-- 	<div class="top-bar">
				<div class="content-topbar flex-sb-m h-full container">
					<div class="left-top-bar">
						Free shipping for standard order over $100
					</div>

				<?php include 'righthand-topbar.php';?>
				</div>
			</div> -->

			<div class="wrap-menu-desktop how-shadow1" style="
    position: fixed;
    top: 0px;">
				<nav class="limiter-menu-desktop container">
					
					<!-- Logo desktop -->		
					<a href="#" class="logo">
						<img src="<?=asset?>/images/icons/logo-05.jpg" alt="IMG-LOGO">
						<h3 style="color: #717fe0;"><?=project_name;?></h3>
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">


							
	<li><a href="<?=Config::domain();?>">Home</a></li>
		
				<li>
								<a href="#">Our Services <i class="fa fa-caret-down"></i></a>
								<ul class="sub-menu">
									<?php foreach (ProductsCategory::all() as $category ) :?>

									<li>
										<a href="<?=domain;?>/shop/<?=$category->category;?>"> <?=ucfirst($category->category);?></a>
									</li>

									<?php endforeach ;?>
								</ul>
							</li>


			
				<li>
								<a href="#">About us <i class="fa fa-caret-down"></i></a>
								<ul class="sub-menu">
									
									<li>
										<a href="<?=domain;?>/about/our-brand">Our Brand</a>
									</li>

									<li>
										<a href="<?=domain;?>/about/meet-the-ceo">Meet the CEO</a>
									</li>

								</ul>
							</li>
				
				<li>
					<a href="<?=domain;?>/about/our-core-values">Our Core Values</a>
				</li>
				
				<li>
					<a href="<?=Config::domain();?>/gallery">Gallery</a>
				</li>


				<li>
					<a href="<?=Config::domain();?>/contact">Contact</a>
				</li>
						</ul>
					</div>	

					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m">
						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
							<i class="zmdi zmdi-search"></i>
						</div>

						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-cart">
							<span class="badge badge-xs badge-primary item-counter"></span>
							<i class="zmdi zmdi-shopping-cart"></i>
						</div>

					</div>
				</nav>
			</div>	
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->		
			<div class="logo-mobile">
				<a href="">
						<img src="<?=asset?>/images/icons/logo-05.jpg" alt="IMG-LOGO">
				</a>
				<h4 style="margin-top: 5px;
    margin-left: 38px;"><?=project_name;?></h4>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">
				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
					<i class="zmdi zmdi-search"></i>
				</div>

				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 js-show-cart">
												<span class="badge badge-xs badge-primary item-counter"></span>
					<i class="zmdi zmdi-shopping-cart"></i>
				</div>

			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<!-- Menu Mobile -->
		<div class="menu-mobile">
			<!-- <ul class="topbar-mobile">
				<li>
					<div class="left-top-bar">
						Free shipping for standard order over $100
					</div>
				</li>

				<li>
									<?php include 'righthand-topbar.php';?>

				</li>
			</ul> -->

			<ul class="main-menu-m">
				<?php include 'navs.php'; ?>
			</ul>
		</div>

		<!-- Modal Search -->
		<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<div class="container-search-header">
				<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
					<i class="fa fa-times"></i>
				</button>

				<form class="wrap-search-header flex-w p-l-15">
					<button class="flex-c-m trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>
					<input class="plh3" type="text" name="search" placeholder="Search...">
				</form>
			</div>
		</div>
	</header>

	

<style>
	.git_product_image{
		width: 270px;
		height: 335px;
		object-fit: cover;
	}
	.item-counter{

    font-size: 12px;
    position: absolute;
    right: 3px;
    top: -6px;
	}

	.label-tag{
text-transform: capitalize;
    background: #b8bff0c9;
    border-radius: 7px;
    padding-right: 2px;
    padding-left: 2px;
	}
</style>
