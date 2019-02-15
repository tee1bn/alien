<?php

$page_title = "About us | Fashion store in usa";
$page_description = "";
 include 'includes/header.php';?>
	

	<script src="<?=asset;?>/includes/angularjs_apps/cms_about_page.js"></script>



	

	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('<?=asset;?>/images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			About us
		</h2>
	</section>	


	<!-- Content page -->
	<section ng-app="AboutPage" ng-controller="AboutPageController" class="bg0 p-t-40 p-b-20">

<button class="btn btn-primary pull-right"  ng-click='update_page_cms()'>Save</button>

		<div class="container">
			<form id="content_management_form">

				<textarea class="form-control">{{$page_cms}}</textarea>

			<div ng-repeat="($index, $section) in $page_cms" class="row p-b-5">
				<div class="col-md-12 col-lg-12">
					<div class="p-t-7 p-r-85 p-r-15-lg p-r-0-md">
						<h3 class="mtext-111 cl2 p-b-5" <?=$this->allow_contenteditable('$section.name');?>>
						</h3>

						<p style="
    font-size: 16px;
" class="stext-113 cl6 p-b-10" <?=$this->allow_contenteditable('$section.textcontent');?>>
						</p>

					
					</div>
				</div>

			<!-- 	<div class="col-11 col-md-5 col-lg-4 m-lr-auto">
					<div class="how-bor1 ">
						<div class="hov-img0">
							<img src="<?=domain;?>/{{$section.images}}" alt="IMG">
						</div>
					</div>
				</div> -->
			</div>
			
			</form>
		</div>
	</section>	
	
		
<?php include 'includes/footer.php';?>
