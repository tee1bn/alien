<?php

$page_title = "About us | Fashion store in usa";
$page_description = "";
 include 'includes/header.php';?>
	

	<script src="<?=asset;?>/includes/angularjs_apps/cms_about_page.js"></script>



	
<style>
	#ceo_div h3{

color: #717fe0;
	}



	#ceo_div p::first-letter{
		color: #717fe0 !important;
		  font-weight: bold;

}
</style>


	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('<?=asset;?>/images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			Our Brand
		</h2>
	</section>	


	<!-- Content page -->
	<section ng-app="AboutPage" ng-controller="AboutPageController" class="bg0 p-t-40 p-b-20">
<?php if ($this->admin()):?>
	<button class="btn btn-primary pull-right"  ng-click='update_page_cms()'>Save<?=$this->add_ajax_is_loading_spinner();?></button>
<?php endif ;?>

		<div class="container">
			<form id="content_management_form">

			<div id="ceo_div" class="row p-b-5">
				<div class="col-md-12 col-lg-12">
					<div class="p-t-7 p-r-85 p-r-15-lg p-r-0-md">
						<h3 class="mtext-111 cl2 p-b-5" <?=$this->allow_contenteditable('$page_cms[0].name');?>>
						</h3>

						<p style="
    font-size: 16px;
    text-align: justify;
" class="stext-113 cl6 p-b-10" <?=$this->allow_contenteditable('$page_cms[0].textcontent');?>>
						</p>

					
					</div>
				</div>
			</div>
			
	<!-- 	<div class="row p-b-5">
				<div class="col-md-12 col-lg-12">
					<div class="p-t-7 p-r-85 p-r-15-lg p-r-0-md">
						<h3 class="mtext-111 cl2 p-b-5" <?=$this->allow_contenteditable('$page_cms[1].name');?>>
						</h3>

						<p class="stext-113 cl6 p-b-10" <?=$this->allow_contenteditable('$page_cms[1].textcontent');?>>
						</p>

					
					</div>
				</div>
			</div> -->
			




			</form>
		</div>
	</section>	
	
		
<?php include 'includes/footer.php';?>
