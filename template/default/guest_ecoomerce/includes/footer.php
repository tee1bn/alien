
	<!-- Footer -->
	<footer class="bg3 p-t-75 p-b-32">
		<div class="container">
			<div class="row">

				<div class="col-sm-6 col-lg-4 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Quick Links
					</h4>

					<ul>
						<li class="p-b-10">
							<a href="<?=domain;?>" class="stext-107 cl7 hov-cl1 trans-04">
								Home
							</a>
						</li>

						<li class="p-b-10">
							<a href="<?=domain;?>/shop" class="stext-107 cl7 hov-cl1 trans-04">
								Shop
							</a>
						</li>

						<li class="p-b-10">
							<a href="<?=domain;?>/about" class="stext-107 cl7 hov-cl1 trans-04">
								About
							</a>
						</li>

						<li class="p-b-10">
							<a href="<?=domain;?>/contact" class="stext-107 cl7 hov-cl1 trans-04">
								Contact
							</a>
						</li>
					</ul>
				</div>

				<div class="col-sm-6 col-lg-4 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						GET IN TOUCH
					</h4>
					<?php
					$contact = json_decode(CmsPages::where('page_unique_name','contact_page')->first()->page_content);
					;?>

					<p class="stext-107 cl7 size-201">
						Any questions? Let us know<br>
						 <!-- <?=$contact->address;?> <br> -->
						  Phone: <?=$contact->phone;?><br>
						  Email: <?=$contact->email;?>
					</p>

					<div class="p-t-27">

<?php
			$social_handles = CmsPages::where('page_unique_name',  'social_media_handles')->first()->page_content;
			$handles = json_decode($social_handles, true);
			foreach ($handles as $handle):
				?>

						<a href="<?=$handle['handle'];?>" class="fs-18 cl7 hov-cl1 trans-04 m-r-16" style="cursor:pointer;">
							<i class="fa fa-<?=$handle['social_media'];?>"></i>
						</a>

<?php endforeach ;?>

					</div>
				</div>

				<div class="col-sm-6 col-lg-4 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Newsletter
					</h4>

					<form id="newsletter_form">
						<div class="wrap-input1 w-full p-b-4">
							<input class="input1 bg-none plh1 stext-107 cl7" type="text" name="email" placeholder="email@example.com" required="">
							<div class="focus-input1 trans-04"></div>
						</div>

						<div class="p-t-18">
							<button class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn2 p-lr-15 trans-04">
								Subscribe
							</button>
						</div>
					</form>
				</div>
			</div>

			<div class="p-t-40">
			<!-- 	<div class="flex-c-m flex-w p-b-18">
					<a href="#" class="m-all-1">
						<img src="<?=asset;?>/images/icons/icon-pay-01.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="<?=asset;?>/images/icons/icon-pay-02.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="<?=asset;?>/images/icons/icon-pay-03.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="<?=asset;?>/images/icons/icon-pay-04.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="<?=asset;?>/images/icons/icon-pay-05.png" alt="ICON-PAY">
					</a>
				</div> -->

				<p class="stext-107 cl6 txt-center">
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | made by <a href="https://gitstardigital.com" target="_blank">Gitstar digital</a>

				</p>
			</div>
		</div>
	</footer>


	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>
<!-- custom moadl begins -->
<style>
	
	.modal-backdrop {
   background-color: black !important;
}
#close-modal{
	float: right;
	background: #717fe0;
}

</style>




<!--===============================================================================================-->
	<script src="<?=asset;?>/vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="<?=asset;?>/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?=asset;?>/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="<?=asset;?>/vendor/slick/slick.min.js"></script>
	<script src="<?=asset;?>/js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script src="<?=asset;?>/vendor/parallax100/parallax100.js"></script>
	<script>
        $('.parallax100').parallax100();
	</script>
<!--===============================================================================================-->
	<script src="<?=asset;?>/vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>

<!--===============================================================================================-->
	<script src="<?=asset;?>/vendor/isotope/isotope.pkgd.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=asset;?>/vendor/sweetalert/sweetalert.min.js"></script>
	
<!--===============================================================================================-->
	<script src="<?=asset;?>/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>
<!--===============================================================================================-->
	<script src="<?=asset;?>/js/main.js"></script>

</body>
</html>