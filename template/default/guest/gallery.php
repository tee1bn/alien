
    <?php

    $page_title = "Gallery | ".project_name;
    $page_description = "";
    include 'includes/header.php';?>

    <script src="<?=asset;?>/assets/angulars/cms_gallery_page.js"></script>

        <!-- Breadcrumb area Start -->

        <div class="breadcrumb-area bg--white-6 pt--60 pb--70 pt-lg--40 pb-lg--50 pt-md--30 pb-md--40">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 text-center">
                        <h1 class="page-title">Gallery</h1>
                        <ul class="breadcrumb justify-content-center">
                            <li><a href="<?=domain;?>">Home</a></li>
                            <li class="current"><span>Gallery</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Breadcrumb area End -->
        <span ng-controller="ShopController"></span>
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
            right: 16px;
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


        <!-- Main Content Wrapper Start -->
        <div id="content" ng-controller="GalleryPageController"   class="main-content-wrapper">
            <button class="btn btn-primary pull-right --oga"  ng-click='update_page_cms()'>Save</button>

            <button class="btn btn-primary --oga" onclick="document.getElementById('file_upload_input').click();">Add Images</button>

        <input multiple="" type="file" style="display: none;" id="file_upload_input" onchange="angular.element(this).scope().acknowledge_file_attachment();" name="">

            <div class="shop-page-wrapper">
                <div class="container-fluid p-0">
                    <div class="row ">
                        <div style="height:376px;" ng-repeat="($index, $content) in $page_cms"  class="col-md-4">
                            <div  class="banner-box banner-type-3 banner-type-3-1 banner-hove">
                                <div class="banner-inner" style="width: 460px;">
                                    <div class="banner-image">
                                        <img  ng-click="open_previewer($page_cms, $index)" style="height: 376px;width: 460px; object-fit: cover;" src="<?=domain;?>/{{$content.path}}" alt="Banner">
                                    </div>
                                    <div class="banner-inf">
                                        <p style="position: absolute;    bottom: 30px;    right: 77px;" class="banner-title-1 lts-13 lts-lg-4 text-uppercase" 
                                         <?=$this->allow_contenteditable('$content.image_label');?>>
                                     </p>
                                    <!-- 
                                        <h2 class="banner-title-2"> 
                                            <strong  <?=$this->allow_contenteditable('$content.image_label');?>></strong>
                                        </h2>
                                     -->
                                    </div>
                                    <a style="position: relative;z-index: -9999999999999;" class=" banner-link banner-overlay">Shop Now</a>
                                <i class="fa fa-close fa-3x delete_img --oga" ng-click="delete_image($index)"></i>
                                </div>
                            </div>
                        </div>
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

        </div>


        <!-- Main Content Wrapper Start -->


    <?php
    include 'includes/footer.php';?>