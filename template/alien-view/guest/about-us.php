
    <?php

    $page_title = "About Us | ".project_name;
    $page_description = "";
    include 'includes/header.php';?>

    <script src="<?=asset;?>/assets/angulars/cms_about_page.js"></script>

        <!-- Breadcrumb area Start -->

        <div class="breadcrumb-area bg--white-6 pt--60 pb--70 pt-lg--40 pb-lg--50 pt-md--30 pb-md--40">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 text-center">
                        <h1 class="page-title">About Us</h1>
                        <ul class="breadcrumb justify-content-center">
                            <li><a href="<?=domain;?>">Home</a></li>
                            <li class="current"><span>About Us</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Breadcrumb area End -->


        <!-- Main Content Wrapper Start -->
        <span  ng-controller="ShopController" ></span>
        <div id="content" ng-controller="AboutPageController" class="main-content-wrapper">
        <style type="text/css">
            .about-bg-1{
                    background: url(<?=domain;?>/{{$page_cms[0].image}}) no-repeat scroll ;
                    margin-left: 0rem;
                    margin-right: -15rem;
                    padding-right: 15rem;
                    height: 500px;
            }
            @media screen and (max-width: 600px) {
              .about-bg-1 {
                 background:none;
              }
            }
        </style>
            <div class="page-content-inner">
                <div class="container">
                    <div class="row pt--80 pt-md--60 pt-sm--40">
                        <div class="col-12">
                            <div class="about-text about-bg-1">
                                <div class="row">
                                    <div class="col-xl-5 offset-xl-7 col-md-6 offset-md-6 pt--90 pt-md--80 pb--100 pl-sm--35">
                                       <!--  <figure class="mb--40 mb-md--30 max-w-45">
                                            <img src="<?=asset;?>/assets/img/logo/m01-logo.png" alt="logo">
                                        </figure> -->
                                <h3 class="heading-tertiary heading-color mb--15"   <?=$this->allow_contenteditable('$page_cms[0].name');?>></h3>

                                        <p class="font-size-16 font-2 heading-color"  <?=$this->allow_contenteditable('$page_cms[0].textcontent');?>>
                                        </p>
                                    </div>
                                </div>
                            </div>   
                        </div>
                    </div>
                    <div class="row pt--80 pt-md--60 pt-sm--35 pb--40 pb-md--30 pb-sm--15">
                        <div class="col-lg-7 col-md-6 mb-sm--30">
                            <div class="about-text">
                                <h3 class="heading-tertiary heading-color mb--15"   <?=$this->allow_contenteditable('$page_cms[1].name');?>></h3>
                                <p class="color--light-3 mb--25 mb-md--20" <?=$this->allow_contenteditable('$page_cms[1].textcontent');?>></p>
                            <!--     <figure>
                                    <img src="<?=asset;?>/assets/img/about/about-signature.png" alt="signature">
                                </figure> -->
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-6">
                            <figure>
                                <img src="<?=domain;?>/{{$page_cms[1].image}}" alt="about">
                            </figure>
                        </div>
                    </div>
                   <!--  <div class="row ptb--40 ptb-md--30 ptb-sm--20">
                        <div class="col-lg-6 offset-lg-1 col-md-6 order-md-2 mb-sm--25">
                            <div class="about-text">
                                <h3 class="heading-tertiary heading-color mb--20">Why Work With Us ?</h3>
                                <p class="color--light-3 mb--25">Praesent sed ex vel mauris eleifend mollis. Vestibulum dictum sodales ante, ac pulvinar urna sollicitudin in. Suspendisse sodales dolor nec mattis convallis. Quisque ut nulla viverra, posuere lorem eget, ultrices metus.</p>
                                <ul class="list-with-icon color--light-3">
                                    <li class="mb--30 mb-md--25">
                                        <i class="fa fa-hourglass"></i>
                                        <span>Praesent sed ex vel mauris ele.</span>
                                    </li>
                                    <li class="mb--30 mb-md--25">
                                        <i class="fa fa-sun-o"></i>
                                        <span>Nam vel luctus nulla, eget interdum metus</span>
                                    </li>
                                    <li class="mb--25 mb-md--20">
                                        <i class="fa fa-bolt"></i>
                                        <span>Nam vel luctus nulla, eget interdum metus</span>
                                    </li>
                                </ul>
                                <p class="color--light-3">Dspendisse sodales dolor nec mattis convallis. Quisque ut nulla viverra, posuere lorem eget, ultrices metus ed maximus neque feugiat magna pretium, euismod sagittis massa tincidunt.</p>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-6 order-md-1">
                            <figure class="image-box image-box-w-video-btn btn-right max-w-sm-65 max-w-xs-100">
                                <a href="https://www.youtube.com/watch?v=Rp19QD2XIGM" class="video-popup">
                                    <img src="<?=asset;?>/assets/img/about/about-bg3.jpg" alt="about">
                                    <span class="video-btn video-btn--2"></span>
                                </a>
                            </figure>
                        </div>
                    </div> -->
                  <!--   <div class="row pt--30 pt-md--20 pt-sm--15 pb--40 pb-md--30 pb-sm--20">
                        <div class="col-12">
                            <div class="row justify-content-center mb--35 mb-md--25">
                                <div class="col-xl-6 text-center">
                                    <h3 class="heading-tertiary heading-color mb--15">Meet Our Team</h3>
                                    <p class="color--light-3">Praesent sed ex vel mauris eleifend mollis. Vestibulum dictum sodales ante, ac pulvinar urna sollicitudin in. Suspendisse sodales</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="airi-element-carousel team-carousel" 
                                        data-slick-options='{
                                            "spaceBetween": 30,
                                            "slidesToShow": 3,
                                            "slidesToScroll": 3
                                        }'
                                        data-slick-responsive='[
                                            {"breakpoint":991, "settings": {"slidesToShow": 2} },
                                            {"breakpoint":479, "settings": {"slidesToShow": 1} }
                                        ]'>

                                        <div class="airi-team">
                                            <div class="team-member">
                                                <div class="team-member__thumbnail">
                                                    <img src="<?=asset;?>/assets/img/team/member-1.jpg" alt="Team Member">
                                                    <a href="team.html" class="link-overlay">Team member</a>
                                                    <div class="team-member__overlay">
                                                        <ul class="social social-round">
                                                            <li class="social__item">
                                                                <a href="https://www.facebook.com/" class="social__link">
                                                                    <i class="fa fa-facebook"></i>
                                                                </a>
                                                            </li>
                                                            <li class="social__item">
                                                                <a href="https://twitter.com/" class="social__link">
                                                                    <i class="fa fa-twitter"></i>
                                                                </a>
                                                            </li>
                                                            <li class="social__item">
                                                                <a href="https://www.pinterest.com/" class="social__link">
                                                                    <i class="fa fa-pinterest-p"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="team-member__info">
                                                    <h2 class="team-member__name"><a href="team.html">Dollie Watts</a></h2>
                                                    <p class="team-member__designation">CEO Founder</p>
                                                    <p class="team-member__desc">Pellentesque dignissim at ante sed iaculis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed sod</p>
                                                </div>
                                            </div>  
                                        </div>
                                        <div class="airi-team">
                                            <div class="team-member">
                                                <div class="team-member__thumbnail">
                                                    <img src="<?=asset;?>/assets/img/team/member-2.jpg" alt="Team Member">
                                                    <a href="team.html" class="link-overlay">Team member</a>
                                                    <div class="team-member__overlay">
                                                        <ul class="social social-round">
                                                            <li class="social__item">
                                                                <a href="https://www.facebook.com/" class="social__link">
                                                                    <i class="fa fa-facebook"></i>
                                                                </a>
                                                            </li>
                                                            <li class="social__item">
                                                                <a href="https://twitter.com/" class="social__link">
                                                                    <i class="fa fa-twitter"></i>
                                                                </a>
                                                            </li>
                                                            <li class="social__item">
                                                                <a href="https://www.pinterest.com/" class="social__link">
                                                                    <i class="fa fa-pinterest-p"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="team-member__info">
                                                    <h2 class="team-member__name"><a href="team.html">Mitchell Bates</a></h2>
                                                    <p class="team-member__designation">Art Director</p>
                                                    <p class="team-member__desc">Pellentesque dignissim at ante sed iaculis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed sod</p>
                                                </div>
                                            </div>  
                                        </div>
                                        <div class="airi-team">
                                            <div class="team-member">
                                                <div class="team-member__thumbnail">
                                                    <img src="<?=asset;?>/assets/img/team/member-3.jpg" alt="Team Member">
                                                    <a href="team.html" class="link-overlay">Team member</a>
                                                    <div class="team-member__overlay">
                                                        <ul class="social social-round">
                                                            <li class="social__item">
                                                                <a href="https://www.facebook.com/" class="social__link">
                                                                    <i class="fa fa-facebook"></i>
                                                                </a>
                                                            </li>
                                                            <li class="social__item">
                                                                <a href="https://twitter.com/" class="social__link">
                                                                    <i class="fa fa-twitter"></i>
                                                                </a>
                                                            </li>
                                                            <li class="social__item">
                                                                <a href="https://www.pinterest.com/" class="social__link">
                                                                    <i class="fa fa-pinterest-p"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="team-member__info">
                                                    <h2 class="team-member__name"><a href="team.html">Leona Bowman</a></h2>
                                                    <p class="team-member__designation">Marketing Manager</p>
                                                    <p class="team-member__desc">Pellentesque dignissim at ante sed iaculis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed sod</p>
                                                </div>
                                            </div>  
                                        </div>
                                        <div class="airi-team">
                                            <div class="team-member">
                                                <div class="team-member__thumbnail">
                                                    <img src="<?=asset;?>/assets/img/team/member-4.jpg" alt="Team Member">
                                                    <a href="team.html" class="link-overlay">Team member</a>
                                                    <div class="team-member__overlay">
                                                        <ul class="social social-round">
                                                            <li class="social__item">
                                                                <a href="https://www.facebook.com/" class="social__link">
                                                                    <i class="fa fa-facebook"></i>
                                                                </a>
                                                            </li>
                                                            <li class="social__item">
                                                                <a href="https://twitter.com/" class="social__link">
                                                                    <i class="fa fa-twitter"></i>
                                                                </a>
                                                            </li>
                                                            <li class="social__item">
                                                                <a href="https://www.pinterest.com/" class="social__link">
                                                                    <i class="fa fa-pinterest-p"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="team-member__info">
                                                    <h2 class="team-member__name"><a href="team.html">Amanda Gutierrez</a></h2>
                                                    <p class="team-member__designation">CEO Founder</p>
                                                    <p class="team-member__desc">Pellentesque dignissim at ante sed iaculis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed sod</p>
                                                </div>
                                            </div>  
                                        </div>
                                        <div class="airi-team">
                                            <div class="team-member">
                                                <div class="team-member__thumbnail">
                                                    <img src="<?=asset;?>/assets/img/team/member-5.jpg" alt="Team Member">
                                                    <a href="team.html" class="link-overlay">Team member</a>
                                                    <div class="team-member__overlay">
                                                        <ul class="social social-round">
                                                            <li class="social__item">
                                                                <a href="https://www.facebook.com/" class="social__link">
                                                                    <i class="fa fa-facebook"></i>
                                                                </a>
                                                            </li>
                                                            <li class="social__item">
                                                                <a href="https://twitter.com/" class="social__link">
                                                                    <i class="fa fa-twitter"></i>
                                                                </a>
                                                            </li>
                                                            <li class="social__item">
                                                                <a href="https://www.pinterest.com/" class="social__link">
                                                                    <i class="fa fa-pinterest-p"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="team-member__info">
                                                    <h2 class="team-member__name"><a href="team.html">Marc Cook</a></h2>
                                                    <p class="team-member__designation">Art Director</p>
                                                    <p class="team-member__desc">Pellentesque dignissim at ante sed iaculis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed sod</p>
                                                </div>
                                            </div>  
                                        </div>
                                        <div class="airi-team">
                                            <div class="team-member">
                                                <div class="team-member__thumbnail">
                                                    <img src="<?=asset;?>/assets/img/team/member-6.jpg" alt="Team Member">
                                                    <a href="team.html" class="link-overlay">Team member</a>
                                                    <div class="team-member__overlay">
                                                        <ul class="social social-round">
                                                            <li class="social__item">
                                                                <a href="https://www.facebook.com/" class="social__link">
                                                                    <i class="fa fa-facebook"></i>
                                                                </a>
                                                            </li>
                                                            <li class="social__item">
                                                                <a href="https://twitter.com/" class="social__link">
                                                                    <i class="fa fa-twitter"></i>
                                                                </a>
                                                            </li>
                                                            <li class="social__item">
                                                                <a href="https://www.pinterest.com/" class="social__link">
                                                                    <i class="fa fa-pinterest-p"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="team-member__info">
                                                    <h2 class="team-member__name"><a href="team.html">Rose Robinson</a></h2>
                                                    <p class="team-member__designation">Marketing Manager</p>
                                                    <p class="team-member__desc">Pellentesque dignissim at ante sed iaculis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed sod</p>
                                                </div>
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                   <!--  <div class="row pt--30 pt-md--20 pt-sm--10 pb--75 pb-md--55 pb-sm--35">
                        <div class="col-12">
                            <div class="row mb--35 mb-md--25">
                                <div class="col-12 text-center">
                                    <h3 class="heading-tertiary heading-color">What Client Say ?</h3>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <div class="airi-element-carousel testimonial-carousel"    
                                    data-slick-options='{
                                        "slidesToShow": 1,
                                        "slidesToScroll": 1
                                    }'>
                                        <div class="testimonial testimonial-style-3">
                                            <div class="testimonial__inner">
                                                <img src="<?=asset;?>/assets/img/others/happy-client-1.jpg" alt="Client" class="testimonial__author--img">
                                                <p class="testimonial__desc">"Maecenas eu accumsan libero. Fusce id imperdiet felis. Cras sed ex vel turpis ultricies blandit nec et massa. Pellentesque lectus turpis, vestibulum eu interdum vel.</p>
                                                <div class="testimonial__author">
                                                    <h3 class="testimonial__author--name">Lura Frazier</h3>
                                                    <p class="testimonial__author--designation">Happy Client</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="testimonial testimonial-style-3">
                                            <div class="testimonial__inner">
                                                <img src="<?=asset;?>/assets/img/others/happy-client-2.jpg" alt="Client" class="testimonial__author--img">
                                                <p class="testimonial__desc">"Maecenas eu accumsan libero. Fusce id imperdiet felis. Cras sed ex vel turpis ultricies blandit nec et massa. Pellentesque lectus turpis, vestibulum eu interdum vel.</p>
                                                <div class="testimonial__author">
                                                    <h3 class="testimonial__author--name">Lura Frazier</h3>
                                                    <p class="testimonial__author--designation">Happy Client</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
        <!-- Main Content Wrapper Start -->

    <?php include 'includes/footer.php';?>
