<?php

$page_title = "Gallery | Fashion store in usa";
$page_description = "";
 include 'includes/header.php';?>
	

	<script src="<?=asset;?>/includes/angularjs_apps/cms_gallery_page.js"></script>



	<style>
		.gallery-img-modal{

            object-fit: contain;
            height: 300px;
            width: 100%;
        }

		.gallery-img{
            cursor:default;
            object-fit: cover;
            height: 300px;
            width: 100%;
        }

        .gallery-img-holder:hover{


        }

        .gallery-img-holder{
            padding: 0px;
            cursor: pointer;
        }

        .open_img_icon{
            display: none;
            position: absolute;
            top: 50%;
            left: 50%;
            color: rgba(255, 255, 255, 0.5);
            margin-left: -23px;
            margin-top: -17px;
        }

        .gallery-label{
            position: absolute;
            color: rgba(255, 255, 255, 0.7);
            left: 5px;
            top:5px;
        }

        .add-image:hover{
            color:  white;
            cursor: pointer;
        }

        .add-image{
            color: #ffffff40 ;
            background: rgba(0, 0, 0, 1);
            padding: 7px;
            border-radius: 35px;
            position: absolute;
        }

        .delete_img:hover{
        color: #ff000073;
        }
        .delete_img{
            position: absolute;
            top: 0px;
            right: 0px;
            background: #f5f5f5c7;
        }

	</style>

	<script>
		show_open_icon = function ($div) {
			$div.childNodes[1].style.display = "block";
			$div.childNodes[3].style.display = "block";
		}
		hide_open_icon = function ($div) {
			$div.childNodes[1].style.display = "none";
		}
	</script>

	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('<?=asset;?>/images/bg-02.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			Gallery
		</h2>
	</section>	
			<section class="bg0 p-t-62 p-b-60" ng-app="GalleryPage" ng-controller="GalleryPageController">

<?php if($this->admin()):?>
	<i class="fa fa-plus fa-2x  add-image" onclick="document.getElementById('file_upload_input').click();"></i>
<?php endif;?>

<input multiple="" type="file" style="display: none;" id="file_upload_input" onchange="angular.element(this).scope().acknowledge_file_attachment();" name="">

					<div class="container">
						<div class="row">
							<div 
							ng-repeat="($index, $content) in $page_cms" class="col-md-3 gallery-img-holder"
							 onmousemove="show_open_icon(this)" onmouseout="hide_open_icon(this)">
								<i class="fa fa-plus fa-4x open_img_icon"  ng-click="open_previewer($page_cms, $index)" ></i>
								<span style="display: none; background: #002bff96;" class="gallery-label badge badge-primary"
								<?=$this->allow_contenteditable('$content.image_label');?> >
							{{$content.image_label}}
						</span>
								<img src="<?=domain;?>/{{$content.path}}" class="gallery-img">
                                
                                <?php if($this->admin()):?>
                                <i class="fa fa-close fa-3x delete_img" ng-click="delete_image($index)"></i>
                                <?php endif;?>

							</div>


						</div>
					</div>


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
        <button type="button" class="close " id="modal-closer" data-dismiss="modal">&times;</button>
        <i class="fa fa-chevron-left img-nexter-left  img-nexter fa-3x" ng-click="$file_previewer.back()"></i>
        <i class="fa fa-chevron-right img-nexter-right img-nexter  fa-3x" ng-click="$file_previewer.next()"></i>
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content gallery-modal-body">
      <div class="modal-body" style="    padding: 20% 0;">
      		<p>
			<img src="<?=domain;?>/{{$file_previewer.$current_file.path}}" class="gallery-img-modal">
				{{$file_previewer.$current_file.image_label}}
			</p>

      </div>
     
    </div>

  </div>
</div>

			</section>

<style>
	#myModal{
    z-index: 999999;
   background-color: rgb(0, 0, 0, 0.9) !important;
}
.gallery-modal-body{

    background: none ;
    text-align: center;
}

#modal-closer {
    background: white;
    padding: 10px;
    border-radius: 172px;

    }



    .img-nexter:hover{
	color: white;
	cursor: pointer;
    }

    .img-nexter{
    position: absolute;
    top: 50%;    
    z-index: 99999999;
}
.img-nexter-left{
	left: 0px;
    }

    .img-nexter-right{
	right: 0px;


    }


</style>	


<!-- image viewer modal ends -->

		
<?php include 'includes/footer.php';?>
