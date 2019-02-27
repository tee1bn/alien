    <?php include 'includes/header.php';?>
        <!-- Main Content Wrapper Start -->
        <div id="content"   class="main-content-wrapper">
            <div class="homepage-slider" id="homepage-slider-1">
                <div id="rev_slider_18_1_wrapper" class="rev_slider_wrapper fullscreen-container" data-alias="home-06" data-source="gallery" style="background:transparent;padding:0px;">
                <!-- START REVOLUTION SLIDER 5.4.7 fullscreen mode -->
                    <div id="rev_slider_18_1" class="rev_slider fullscreenbanner" style="display:none;" data-version="5.4.7">
                        <ul>    <!-- SLIDE  -->
                            

                            <?php
                            $rs = 16;
                            $data_title = ['01','02','03','04','05','06'];
                            $i = 0;
                             foreach ($sliders as $key => $slider):?>
                            <li data-index="rs-<?=$rs;?>" data-transition="parallaxvertical" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="1000"  data-thumb="<?=domain;?>/<?=$slider['slider_image'];?>"  data-rotate="0"  data-saveperformance="off"  data-title="<?=$data_title[$i];?>" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                                <!-- MAIN IMAGE -->
                                <img src="<?=domain;?>/<?=$slider['slider_image'];?>"  alt=""  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="off" class="rev-slidebg" data-no-retina>
                                <!-- LAYERS -->

                                <!-- LAYER NR. 1 -->
                                <div class="tp-caption     rev_group" 
                                     id="slide-16-layer-3" 
                                     data-x="['center','center','center','center']" data-hoffset="['344','344','77','0']" 
                                     data-y="['middle','middle','middle','top']" data-voffset="['-2','-2','0','55']" 
                                                data-width="['924','924','577','418']"
                                    data-height="['354','354','281','215']"
                                    data-whitespace="nowrap"
                         
                                    data-type="group" 
                                    data-responsive_offset="on" 

                                    data-frames='[{"delay":1290,"speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                                    data-margintop="[0,0,0,0]"
                                    data-marginright="[0,0,0,0]"
                                    data-marginbottom="[0,0,0,0]"
                                    data-marginleft="[0,0,0,0]"
                                    data-textAlign="['inherit','inherit','inherit','inherit']"
                                    data-paddingtop="[0,0,0,0]"
                                    data-paddingright="[0,0,0,0]"
                                    data-paddingbottom="[0,0,0,0]"
                                    data-paddingleft="[0,0,0,0]"

                                    style="z-index: 7; min-width: 924px; max-width: 924px; max-width: 354px; max-width: 354px; white-space: nowrap; font-size: 20px; line-height: 22px; font-weight: 400; color: #ffffff; letter-spacing: 0px;">
                                <!-- LAYER NR. 2 -->
                                <div class="tp-caption   tp-resizeme home-6-rev-text" 
                                     id="slide-16-layer-4" 
                                     data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                                     data-y="['top','top','top','top']" data-voffset="['0','0','0','0']" 
                                                data-fontsize="['115','115','80','50']"
                                    data-lineheight="['115','115','80','50']"
                                    data-width="none"
                                    data-height="none"
                                    data-whitespace="nowrap"
                         
                                    data-type="text" 
                                    data-responsive_offset="on" 

                                    data-frames='[{"delay":"+0","speed":2000,"frame":"0","from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","to":"o:1;","ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                                    data-margintop="[0,0,0,0]"
                                    data-marginright="[0,0,0,0]"
                                    data-marginbottom="[0,0,0,0]"
                                    data-marginleft="[0,0,0,0]"
                                    data-textAlign="['inherit','inherit','inherit','inherit']"
                                    data-paddingtop="[0,0,0,0]"
                                    data-paddingright="[0,0,0,0]"
                                    data-paddingbottom="[0,0,0,0]"
                                    data-paddingleft="[0,0,0,0]"

                                    style="z-index: 8; white-space: nowrap; font-size: 115px; line-height: 115px; font-weight: 700; color: #ffffff; letter-spacing: 0px;font-family:Montserrat;"><span class="light">
                                        <?=$slider['main_text'];?>
                                    </span>  </div>

                                <!-- LAYER NR. 3 -->
                                <div class="tp-caption tp-shape tp-shapewrapper tp-resizeme home-6-rev-shape" 
                                     id="slide-16-layer-5" 
                                     data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                                     data-y="['top','top','top','top']" data-voffset="['145','145','100','69']" 
                                                data-width="80"
                                    data-height="['5','5','5','2']"
                                    data-whitespace="nowrap"
                         
                                    data-type="shape" 
                                    data-responsive_offset="on" 

                                    data-frames='[{"delay":"+540","speed":2000,"frame":"0","from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","to":"o:1;","ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                                    data-margintop="[0,0,0,0]"
                                    data-marginright="[0,0,0,0]"
                                    data-marginbottom="[0,0,0,0]"
                                    data-marginleft="[0,0,0,0]"
                                    data-textAlign="['inherit','inherit','inherit','inherit']"
                                    data-paddingtop="[0,0,0,0]"
                                    data-paddingright="[0,0,0,0]"
                                    data-paddingbottom="[0,0,0,0]"
                                    data-paddingleft="[0,0,0,0]"

                                    style="z-index: 9;background-color:rgb(255,255,255);"> </div>

                                <!-- LAYER NR. 4 -->
                                <div class="tp-caption   tp-resizeme" 
                                     id="slide-16-layer-6" 
                                     data-x="['center','center','center','center']" data-hoffset="['-1','-1','0','0']" 
                                     data-y="['top','top','top','top']" data-voffset="['185','185','131','93']" 
                                                data-fontsize="['28','28','20','16']"
                                    data-lineheight="['30','30','20','20']"
                                    data-width="none"
                                    data-height="none"
                                    data-whitespace="nowrap"
                         
                                    data-type="text" 
                                    data-responsive_offset="on" 

                                    data-frames='[{"delay":"+870","speed":2000,"frame":"0","from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","to":"o:1;","ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                                    data-margintop="[0,0,0,0]"
                                    data-marginright="[0,0,0,0]"
                                    data-marginbottom="[0,0,0,0]"
                                    data-marginleft="[0,0,0,0]"
                                    data-textAlign="['inherit','inherit','inherit','inherit']"
                                    data-paddingtop="[0,0,0,0]"
                                    data-paddingright="[0,0,0,0]"
                                    data-paddingbottom="[0,0,0,0]"
                                    data-paddingleft="[0,0,0,0]"

                                    style="z-index: 10; white-space: nowrap; font-size: 28px; line-height: 30px; font-weight: 700; color: #ffffff; letter-spacing: 0px;font-family:Montserrat;">
                                    <?=$slider['sub_text'];?> </div>

                                <!-- LAYER NR. 5 -->
                                <a class="tp-caption LaBtnOutlineBlack rev-btn " href="<?=domain;?>/shop" 
                                     id="slide-16-layer-7" 
                                     data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                                     data-y="['top','top','top','top']" data-voffset="['269','269','200','150']" 
                                                data-width="none"
                                    data-height="none"
                                    data-whitespace="nowrap"
                         
                                    data-type="button" 
                                    data-responsive_offset="on" 
                                    data-responsive="off"
                                    data-frames='[{"delay":"+1500","speed":2000,"frame":"0","from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","to":"o:1;","ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"0","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgb(255,255,255);bg:rgb(40,40,40);bc:rgb(40,40,40);bw:2 2 2 2;"}]'
                                    data-margintop="[0,0,0,0]"
                                    data-marginright="[0,0,0,0]"
                                    data-marginbottom="[0,0,0,0]"
                                    data-marginleft="[0,0,0,0]"
                                    data-textAlign="['inherit','inherit','inherit','inherit']"
                                    data-paddingtop="[15,15,15,12]"
                                    data-paddingright="[45,45,45,35]"
                                    data-paddingbottom="[15,15,15,12]"
                                    data-paddingleft="[45,45,45,35]"

                                    style="z-index: 11; white-space: nowrap; color: #ffffff; border-color:rgb(255,255,255);border-width:2px 2px 2px 2px;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;">Shop Now </a>
                                </div>

                                <!-- LAYER NR. 6 -->
                                <div class="tp-caption   tp-resizeme" 
                                     id="slide-16-layer-1" 
                                     data-x="['left','left','left','left']" data-hoffset="['0','0','0','0']" 
                                     data-y="['top','top','top','top']" data-voffset="['0','0','0','0']" 
                                                data-width="none"
                                    data-height="none"
                                    data-whitespace="nowrap"
                         
                                    data-type="image" 
                                    data-basealign="slide" 
                                    data-responsive_offset="on" 

                                    data-frames='[{"delay":300,"speed":1500,"frame":"0","from":"x:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                                    data-textAlign="['inherit','inherit','inherit','inherit']"
                                    data-paddingtop="[0,0,0,0]"
                                    data-paddingright="[0,0,0,0]"
                                    data-paddingbottom="[0,0,0,0]"
                                    data-paddingleft="[0,0,0,0]"

                                    style="z-index: 5;"><img src="<?=asset;?>/assets/img/slider/home-06/m6-s1-2.png" alt="" data-ww="['257px','257px','144px','144px']" data-hh="['769px','769px','430px','430px']" data-no-retina> </div>

                                <!-- LAYER NR. 7 -->
                                <div class="tp-caption   tp-resizeme" 
                                     id="slide-16-layer-2" 
                                     data-x="['right','right','right','right']" data-hoffset="['0','0','0','0']" 
                                     data-y="['bottom','bottom','bottom','bottom']" data-voffset="['0','0','0','0']" 
                                                data-width="none"
                                    data-height="none"
                                    data-whitespace="nowrap"
                         
                                    data-type="image" 
                                    data-basealign="slide" 
                                    data-responsive_offset="on" 

                                    data-frames='[{"delay":340,"speed":1500,"frame":"0","from":"x:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                                    data-textAlign="['inherit','inherit','inherit','inherit']"
                                    data-paddingtop="[0,0,0,0]"
                                    data-paddingright="[0,0,0,0]"
                                    data-paddingbottom="[0,0,0,0]"
                                    data-paddingleft="[0,0,0,0]"

                                    style="z-index: 6;"><img src="<?=asset;?>/assets/img/slider/home-06/m6-s1-3.png" alt="" data-ww="['611px','611px','353px','353px']" data-hh="['204px','204px','118px','118px']" data-no-retina> </div>

                                <!-- LAYER NR. 8 -->
                                <div class="tp-caption   tp-resizeme" 
                                     id="slide-16-layer-9" 
                                     data-x="['left','left','left','right']" data-hoffset="['290','290','0','0']" 
                                     data-y="['bottom','bottom','bottom','bottom']" data-voffset="['0','0','0','0']" 
                                                data-width="none"
                                    data-height="none"
                                    data-whitespace="nowrap"
                         
                                    data-type="image" 
                                    data-basealign="slide" 
                                    data-responsive_offset="on" 

                                    data-frames='[{"delay":800,"speed":1500,"frame":"0","from":"z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                                    data-textAlign="['inherit','inherit','inherit','inherit']"
                                    data-paddingtop="[0,0,0,0]"
                                    data-paddingright="[0,0,0,0]"
                                    data-paddingbottom="[0,0,0,0]"
                                    data-paddingleft="[0,0,0,0]"

                                    style="z-index: 12;">
                                    <!-- <img src="<?=asset;?>/assets/img/slider/home-06/m6-s1-1.png" alt="" data-ww="['408px','408px','294px','204px']" data-hh="['880px','880px','634px','439px']" data-no-retina>  -->
                                </div>
                            </li>

                        <?php $i++;$rs++; endforeach ;?>
                           
                        </ul>
                        <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div> 
                    </div>
                </div><!-- END REVOLUTION SLIDER -->



                            <?php include 'includes/shop.php';?>

            <script src="<?=asset;?>/assets/angulars/cms_home_page.js"></script>
                        <div ng-controller="HomePageController">
                            <button class="btn btn-primary pull-right --oga"  ng-click='update_page_cms()'>Save<?=$this->add_ajax_is_loading_spinner();?></button>
                            <section class="top-collection-area ptb--80 pt-md--55 pb-md--60">

                        <input type="file" id="file_upload_input1" style="display: none;"  onchange="angular.element(this).scope().acknowledge_file_attachment(this, 'upload_files_for_home');" name="ceo">
                                <div class="container">
                    
                    <button onclick="document.getElementById('file_upload_input1').click()" class="btn btn-primary --oga pull-right">Change Image
                    (570x560 px )</button>
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            <div class="text-block">
                                                <h2 class="heading-secondary mb--40 mb-md--20" <?=$this->allow_contenteditable('$page_cms[0].name');?>>></h2>
                                                <p class="font-2 heading-color font-size-16 mb--40 mb-md--25" <?=$this->allow_contenteditable('$page_cms[0].textcontent');?>>></p>
                                                <!-- <a href="<?=domain;?>/shop" class="heading-button mb-sm--30">Shop Now</a> -->
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <figure class="image-box image-box-w-video-btn">
                                                <a  class="video-popup">
                                                    <img style="height: 570px; width: 560px; object-fit: cover;" src="<?=domain;?>/{{$page_cms[0].image}}" alt="banner">
                                                    <!-- <span class="video-btn"></span> -->

                                <input class="--oga form__input" ng-model="$page_cms[0].btn_link" placeholder="google-map code url">
                                                    <a href="{{$page_cms[0].btn_link}}" class="btn btn-default" style="position: absolute;right: 50%;top: 75%;" <?=$this->allow_contenteditable('$page_cms[0].btn_text');?>>
                                                        
                                                    </a>
                                                </a>
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <section class="newsletter-area bg--gray pt--30 pt-md--25 pb--40 pb-md--30">
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-8 col-md-10">
                                            <div class="newsletter-box text-center">
                                                <h2 class="heading-secondary mb--20" <?=$this->allow_contenteditable('$page_cms[1].name');?>> </h2>
                                                <p class="heading-color font-size-16 font-bold lts-2 mb--30"
                                                <?=$this->allow_contenteditable('$page_cms[1].textcontent');?>> 
                                            </p>
                                            <button class="btn btn primary" > BECOME AN ALIEN MEMBER</button>
                                                <!-- <form action="https://company.us19.list-manage.com/subscribe/post?u=2f2631cacbe4767192d339ef2&amp;id=24db23e68a" class="newsletter-form mc-form" method="post" target="_blank">
                                                    <input type="email" name="newsletter_email" id="newsletter_email" placeholder="Enter your email address.." required="required" class="newsletter-form__input">
                                                    <button type="submit" class="newsletter-form__submit">Subscribe</button>
                                                </form> -->
                                                <!-- mailchimp-alerts Start -->
                                                <div class="mailchimp-alerts">
                                                    <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                                                    <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                                                    <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                                                </div>
                                                <!-- mailchimp-alerts end -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>

                        </div>

                    <!-- Blog area Start Here -->
            <div class="blog-area ptb--80 ptb-sm--60">
                <div class="container">
                    <div class="row mb--40 mb-md--30">
                        <div class="col-12">
                            <h2 class="heading-secondary text-center">Blog</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="airi-element-carousel blog-carousel dot-style-1" dir="rtl"
                                data-slick-options='{
                                    "spaceBetween": 30,
                                    "slidesToShow": 3,
                                    "slidesToScroll": 1,
                                    "dots": true,
                                    "rtl": true,
                                    "infinite": true
                                }'
                                data-slick-responsive='[
                                    {"breakpoint":991, "settings": {"slidesToShow": 2} },
                                    {"breakpoint":767, "settings": {"slidesToShow": 1} }
                                ]'
                            >
                            <?php foreach (Post::recent_posts(4) as $key => $post) :?>
                                <div class="item">
                                    <article class="blog">
                                        <div class="blog-media">
                                            <div class="image">
                                                <a href="<?=$post->url();?>">
                                                    <img style="width: 370px; height:246.6px; object-fit:cover ;" src="<?=domain;?>/<?=$post->mainimage;?>" alt="Blog Thumb">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="blog-info">
                                            <div class="blog-entry-meta">
                                                <span class="blog-category">
<!--                                                     <a href="blog.html">Trends</a>
 -->                                                </span>
                                            </div>
                                            <h3 class="blog-title">
                                                <a href="<?=$post->url();?>"><?=$post->title;?></a>
                                            </h3>
                                            <div class="blog-footer-meta">
                                                <a class="posted-on"><?=$post->format_created_at();?></a>
                                                <span class="meta-separator">-</span>
                                                <a href="blog.html" class="posted-by">By <?=$post->author();?></a>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            <?php endforeach;?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <!-- Main Content Wrapper Start -->

        <?php include 'includes/footer.php';?>