
    <?php

    $page_title = "About Us | ".project_name;
    $page_description = "";
    include 'includes/header.php';?>


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

                show_notification("Message sent successfully!");

            },
            error: function (data) {
                 //alert("fail"+data);
            },



        });

    
});
});
        

</script>        
    <script src="<?=asset;?>/assets/angulars/contact-us.js"></script>

        <!-- Breadcrumb area Start -->


        <div class="breadcrumb-area bg--white-6 pt--60 pb--70 pt-lg--40 pb-lg--50 pt-md--30 pb-md--40">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 text-center">
                        <h1 class="page-title">Contact Us</h1>
                        <ul class="breadcrumb justify-content-center">
                            <li><a href="<?=domain;?>">Home</a></li>
                            <li class="current"><span>Contact Us </span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Breadcrumb area End -->

        <!-- Main Content Wrapper Start -->
        <span ng-controller="ShopController" ></span>
        <div id="content" ng-controller="ContactPageController"  class="main-content-wrapper">
        <button class="btn btn-primary pull-right --oga"  ng-click='update_page_cms()'>Save<?=$this->add_ajax_is_loading_spinner();?></button>
            <div class="page-content-inner">
                <div class="container">
                    <div class="row pt--75 pt-md--50 pt-sm--30 pb--80 pb-md--60 pb-sm--35">
                        <div class="col-md-7 mb-sm--30">
                            <h2 class="heading-secondary mb--50 mb-md--35 mb-sm--20">Get in touch</h2>

                            <!-- Contact form Start Here -->
                            <form id="send_message_form" class="form">
                                <div class="form__group mb--20">
                                    <input type="text" id="contact_name" name="contact_name" class="form__input form__input--2" placeholder="Your name*">
                                </div>
                                <div class="form__group mb--20">
                                    <input type="email" id="contact_email" name="contact_email" class="form__input form__input--2" placeholder="Email Address*">
                                </div>
                                <div class="form__group mb--20">
                                    <input type="text" id="contact_phone" name="contact_phone" class="form__input form__input--2" placeholder="Your Phone*">
                                </div>
                                <div class="form__group mb--20">
                                    <textarea class="form__input form__input--textarea" id="contact_message" name="contact_message" placeholder="Message*"></textarea>
                                </div>
                                <div class="form__group">
                                    <input type="submit" value="Send" class="btn btn-submit btn-style-1">
                                </div>
                                <div class="form__output"></div>
                            </form>
                            <!-- Contact form end Here -->

                        </div>
                        <div class="col-md-5 col-xl-4 offset-xl-1">
                            <h2 class="heading-secondary mb--50 mb-md--35 mb-sm--20">Contact info</h2>
                            
                            <!-- Contact info widget start here -->
                           <!--  <div class="contact-info-widget mb--45 mb-sm--35">
                                <div class="contact-info">
                                    <h3>Postal Address</h3>
                                    <p>PO Box 16122 Collins Street West <br> Victoria 8007 Australia</p>
                                </div>
                            </div> -->
                            <!-- Contact info widget end here -->

                            <!-- Contact info widget start here -->
                            <div class="contact-info-widget mb--45 mb-sm--35">
                                <div class="contact-info">
                                    <h3><?=project_name;?></h3>
                                    <p> Address <br/> 
                                    <span <?=$this->allow_contenteditable('$page_cms.address');?>>
                                    </span>
                                </p>
                                </div>
                            </div>
                            <!-- Contact info widget end here -->

                            <!-- Contact info widget start here -->
                            <div class="contact-info-widget two-column-list sm-one-column mb--45 mb-sm--35">
                                <div class="contact-info mb-sm--35">
                                    <h3>Business Phone</h3>
                                    <a href="#" <?=$this->allow_contenteditable('$page_cms.phone');?>></a>
                                </div>
                                <div class="contact-info">
                                    <h3>Say Hello</h3>
                                    <a href="mailto://{{$page_cms.email}}"
                                     <?=$this->allow_contenteditable('$page_cms.email');?>></a>
                                </div>
                            </div>
                            <!-- Contact info widget end here -->
                            <!-- Social Icons Start Here -->
                            <ul class="social body-color">


                    <?php
                                $social_handles = CmsPages::where('page_unique_name',  'social_media_handles')->first()->page_content;
                                $handles = json_decode($social_handles, true);
                                foreach ($handles as $handle):
                                    ?>
                                <li class="social__item">
                                    <a href="<?=$handle['handle'];?>" class="social__link">
                                    <i class="fa fa-<?=$handle['social_media'];?>"></i>
                                    </a>
                                </li>                                            

                    <?php endforeach ;?>

                            </ul>
                            <!-- Social Icons End Here -->
                        </div>
                    </div>
                </div>
                <div class="container-fluid p-0">
                    <div class="row no-gutters">
                        <div class="col-12">
                            <div id="google-map" style="width: 87%;margin: auto;overflow: hidden;height: 325px;" >
                                <iframe src="https://www.google.com/maps/embed?pb=!1m12!1m8!1m3!1d63433.66725739805!2d3.307590163478357!3d6.444836881711777!3m2!1i1024!2i768!4f13.1!2m1!1sshoprite+nigeria!5e0!3m2!1sen!2sng!4v1550211567328" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Content Wrapper Start -->


    <?php
    include 'includes/footer.php';?>