<?php

$page_title = "Contact us | Fashion Store in USA";
$page_description = "";


 include 'includes/header.php';?>

	<script src="<?=asset;?>/includes/angularjs_apps/cms_contact_page.js"></script>


	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('<?=asset;?>/images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			Contact
		</h2>
	</section>	

<script>


$(document).ready(function(){
 $("body").on("submit", "#send_message_form", function (e) {
  e.preventDefault();



	$datastring = $('#send_message_form').serialize();

  $.ajax({

            type: "POST",
            url: $base_url+"/contact/send_message/",
            data: $datastring,
            cache: false,
            success: function(data) {

				notify();

            },
            error: function (data) {
                 //alert("fail"+data);
            },



        });

	
});
});
		

</script>

	<!-- Content page -->
	<section class="bg0 p-t-30 p-b-20" ng-app="ContactPage" ng-controller="ContactPageController">
		<button class="btn btn-primary pull-right"  ng-click='update_page_cms()'>Save<?=$this->add_ajax_is_loading_spinner();?></button>

		<div class="container">
			<div class="flex-w flex-tr">
				<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
					<form id="send_message_form">
						<h4 class="mtext-105 cl2 txt-center p-b-30">
							Send Us A Message
						</h4>

						<div class="bor8 m-b-20 how-pos4-parent">
							<input required="" class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="email" placeholder="Your Email Address">
							<i class="fa fa-envelope-o how-pos4 pointer-none"></i>
						</div>

						<div class="bor8 m-b-30">
							<textarea required="" class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25" name="message" placeholder="How Can We Help?"></textarea>
						</div>

						<button type="submit" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
							Submit
						</button>
					</form>
				</div>


				<div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
				<!-- 	<div class="flex-w w-full p-b-42">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-map-marker"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Address
							</span>

							<p class="stext-115 cl6 size-213 p-t-18" <?=$this->allow_contenteditable('$page_cms.address');?> >
							</p>
						</div>
					</div>
 -->

					<div class="flex-w w-full p-b-42">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-phone-handset"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Lets Talk
							</span>

							<div class="stext-115 cl1 size-213 p-t-18"  <?=$this->allow_contenteditable('$page_cms.phone');?> >
							</div>
						</div>
					</div>

					<div class="flex-w w-full">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-envelope"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Sales Support
							</span>

							<p class="stext-115 cl1 size-213 p-t-18"  <?=$this->allow_contenteditable('$page_cms.email');?> >
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>	
	
	<style>
		.map{

    margin-left: 70px;
    margin-right: 70px;
		}
	</style>


	<!-- Map -->
	<!-- <div class="map">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3219.44734743338!2d-91.17862828516377!3d36.20432028007562!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x87d6b4f9b0ceb53b%3A0x3b361c832ee7edc8!2s206+W+Kentucky+St%2C+Imboden%2C+AR+72434%2C+USA!5e0!3m2!1sen!2sng!4v1538086355576" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
	</div> -->




	<?php include 'includes/footer.php';?>
