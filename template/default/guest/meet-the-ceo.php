<?php

$page_title = "About us | Fashion Store in USA";
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
			Meet the CEO
		</h2>
	</section>	


	<!-- Content page -->
	<section ng-app="AboutPage" ng-controller="AboutPageController" class="bg0 p-t-40 p-b-20">

<?php if ($this->admin()):?>
	<button class="btn btn-primary pull-right"  ng-click='update_page_cms()'>Save<?=$this->add_ajax_is_loading_spinner();?></button>
<?php endif;?>

<!-- <div class="loading-spiner-holder" data-loading ><div class="loading-spiner">loading<img src="..." /></div></div> -->

		<div class="container">
			<form id="content_management_form">

			<div id="ceo_div" class="row p-b-5">
					<div class="col-11 col-md-5 col-lg-4 m-lr-auto">
					<div class="how-bor1 ">
						<div class="hov-img0">
							<img src="<?=domain;?>/{{$page_cms[2].image}}" alt="CEO" style="height: 340px;object-fit: cover;">
							
<?php if($this->admin()):?>
							<i class="fa fa-pencil fa-2x" id="edit_ceo_image_btn" onclick="document.getElementById('file_upload_input').click();"></i>
<?php endif;?>

<input multiple="" type="file" style="display: none;" id="file_upload_input" onchange="angular.element(this).scope().acknowledge_file_attachment();" name="ceo">


						</div>
					</div>
				</div>
				<div class="col-md-7 col-lg-8">
					<div class="p-t-7 p-r-85 p-r-15-lg p-r-0-md">
						<h3 class="mtext-111 cl2 p-b-5" <?=$this->allow_contenteditable('$page_cms[2].name');?> 
						id='meet_ceo_head'>
						</h3>

						<p id="ceo_history" style="
    font-size: 16px;
    text-align: justify;
" class="stext-113 cl6 p-b-10" <?=$this->allow_contenteditable('$page_cms[2].textcontent');?> id="meet_ceo_body">
						</p>

					
					</div>
				</div>

			
			</div>
			
			</form>
		</div>
	</section>	
	<style>
		#edit_ceo_image_btn{

    cursor: pointer;
    position: absolute;
    z-index: 999;
    top: 50%;
    color: #ffffffb0;
    left: 46%;
		}
	</style>
		
<?php include 'includes/footer.php';?>
