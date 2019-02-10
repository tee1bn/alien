  <!-- Footer Start -->
        <footer class="footer footer-3 bg--white border-top">
            <div class="container">
                <div class="row pt--40 pt-md--30 mb--40 mb-sm--30">
                    <div class="col-12 text-md-center">
                        <div class="footer-widget">
                            <div class="textwidget">
                                <a href="index.html" class="footer-logo">
                                    <!-- <img src="<?=asset;?>/assets/img/logo/logo.svg" alt="Logo"> -->
                                    <h2><?=project_name;?></h2>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb--15 mb-sm--20">
                    <div class="col-xl-2 col-md-4 mb-lg--30">
                        <div class="footer-widget">
                            <h3 class="widget-title widget-title--2">Company</h3>
                            <ul class="widget-menu widget-menu--2">
                                <li><a href="about-us.html">About Us</a></li>
                                <li><a href="#">Our Services</a></li>
                                <li><a href="#">Affiliate Program</a></li>
                                <li><a href="#">Work for <?=project_name;?></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-4 mb-lg--30">
                        <div class="footer-widget">
                            <h3 class="widget-title widget-title--2">USEFUL LINKS</h3>
                            <ul class="widget-menu widget-menu--2">
                                <li><a href="shop-collections.html">The Collections</a></li>
                                <li><a href="#">Size Guide</a></li>
                                <li><a href="#">Return Policiy</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-4 mb-lg--30">
                        <div class="footer-widget">
                            <h3 class="widget-title widget-title--2">SHOPPING</h3>
                            <ul class="widget-menu widget-menu--2">
                                <li><a href="shop-instagram.html">Look Book</a></li>
                                <li><a href="shop-sidebar.html">Shop Sidebar</a></li>
                                <li><a href="shop-fullwidth.html">Shop Fullwidth</a></li>
                                <li><a href="shop-no-gutter.html">Man & Woman</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-5 offset-xl-1 col-lg-6 offset-lg-3 col-md-8 offset-md-2">
                        <div class="footer-widget">
                            <h3 class="widget-title widget-title--2 widget-title--icon">Subscribe now and get 10% off new collection</h3>
                            <form action="https://company.us19.list-manage.com/subscribe/post?u=2f2631cacbe4767192d339ef2&amp;id=24db23e68a" class="newsletter-form newsletter-form--3 mc-form" method="post" target="_blank">
                                <input type="email" name="newsletter-email" id="newsletter-email" class="newsletter-form__input" placeholder="Enter Your Email Address..">
                                <button type="submit" class="newsletter-form__submit">
                                    <i class="dl-icon-right"></i>
                                </button>
                            </form>
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
                <div class="row align-items-center pt--10 pb--30">
                    <div class="col-md-4">
                        <!-- Social Icons Start Here -->
                        <ul class="social social-small">
                            <li class="social__item">
                                <a href="twitter.com" class="social__link">
                                <i class="fa fa-twitter"></i>
                                </a>
                            </li>
                            <li class="social__item">
                                <a href="plus.google.com" class="social__link">
                                <i class="fa fa-google-plus"></i>
                                </a>
                            </li>
                            <li class="social__item">
                                <a href="facebook.com" class="social__link">
                                <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                            <li class="social__item">
                                <a href="youtube.com" class="social__link">
                                <i class="fa fa-youtube"></i>
                                </a>
                            </li>
                            <li class="social__item">
                                <a href="instagram.com" class="social__link">
                                <i class="fa fa-instagram"></i>
                                </a>
                            </li>
                        </ul>
                        <!-- Social Icons End Here -->
                    </div>
                    <div class="col-md-4 text-md-center">
                        <p class="copyright-text">&copy; <?=date("Y");?> <?=project_name;?>. Built by GitStar Digital</p>
                    </div>
                    <div class="col-md-4 text-md-right">
                        <img src="<?=asset;?>/assets/img/others/payments-2.png" alt="Payment">
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer End -->


        <!-- Search from Start --> 
        <div class="searchform__popup" id="searchForm">
            <a href="#" class="btn-close"><i class="dl-icon-close"></i></a>
            <div class="searchform__body">
                <p>Start typing and press Enter to search</p>
                <form class="searchform">
                    <input type="text" name="search" id="search" class="searchform__input" placeholder="Search Entire Store...">
                    <button type="submit" class="searchform__submit"><i class="dl-icon-search10"></i></button>
                </form>
            </div>
        </div>
        <!-- Search from End --> 
        
        <!-- Side Navigation Start -->
        <aside class="side-navigation" id="sideNav">
            <div class="side-navigation-wrapper">
                <a href="#" class="btn-close"><i class="dl-icon-close"></i></a>
                <div class="side-navigation-inner">
                    <div class="widget">
                        <ul class="sidenav-menu">
                            <li><a href="about-us.html">About <?=project_name;?> Shop</a></li>
                            <li><a href="about-us.html">Help Center</a></li>
                            <li><a href="shop-collections.html">Portfolio</a></li>
                            <li><a href="blog.html">Blog</a></li>
                            <li><a href="shop-instagram.html">New Look</a></li>
                        </ul>
                    </div>
                    <div class="widget pt--30 pr--20">
                        <div class="text-widget">
                            <p>
                                <img src="<?=asset;?>/assets/img/others/payments.png" alt="payment">
                            </p>
                            <p>Pellentesque mollis nec orci id tincidunt. Sed mollis risus eu nisi aliquet, sit amet fermentum justo dapibus.</p>
                        </div>
                    </div>
                    <div class="widget">
                        <div class="text-widget">
                            <p>
                                <a href="#">(+612) 2531 5600</a>
                                <a href="mailto:info@la-studioweb.com">info@la-studioweb.com</a>
                                PO Box 1622 Colins Street West
                            </p>
                        </div>
                    </div>
                    <div class="widget">
                        <div class="text-widget google-map-link">
                            <p>
                                <a href="https://www.google.com/maps" target="_blank">Google Maps</a>
                            </p>
                        </div>
                    </div>
                    <div class="widget">
                        <div class="text-widget">
                            <!-- Social Icons Start Here -->
                            <ul class="social social-small">
                                <li class="social__item">
                                    <a href="twitter.com" class="social__link">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                                <li class="social__item">
                                    <a href="plus.google.com" class="social__link">
                                        <i class="fa fa-google-plus"></i>
                                    </a>
                                </li>
                                <li class="social__item">
                                    <a href="facebook.com" class="social__link">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </li>
                                <li class="social__item">
                                    <a href="youtube.com" class="social__link">
                                        <i class="fa fa-youtube"></i>
                                    </a>
                                </li>
                                <li class="social__item">
                                    <a href="instagram.com" class="social__link">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                </li>
                            </ul>
                            <!-- Social Icons End Here -->
                        </div>
                    </div>
                    <div class="widget">
                        <div class="text-widget">
                            <p class="copyright-text">&copy; 2018 <?=project_name;?> All rights reserved</p>
                        </div>
                    </div>
                </div>
            </div>
        </aside>
        <!-- Side Navigation End -->
            

        <!-- Global Overlay Start -->
        <div class="ai-global-overlay"></div>
        <!-- Global Overlay End -->



    </div>
    <!-- Main Wrapper End -->


    <!-- ************************* JS Files ************************* -->

    <!-- Bootstrap and Popper Bundle JS -->
    <script src="<?=asset;?>/assets/js/bootstrap.bundle.min.js"></script>

    <!-- All Plugins Js -->
    <script src="<?=asset;?>/assets/js/plugins.js"></script>

    <!-- Ajax Mail Js -->
    <script src="<?=asset;?>/assets/js/ajax-mail.js"></script>

    <!-- Main JS -->
    <script src="<?=asset;?>/assets/js/main.js"></script>

    <!-- REVOLUTION JS FILES -->
    <script src="<?=asset;?>/assets/js/revoulation/jquery.themepunch.tools.min.js"></script>
    <script src="<?=asset;?>/assets/js/revoulation/jquery.themepunch.revolution.min.js"></script>    

    <!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
    <script src="<?=asset;?>/assets/js/revoulation/extensions/revolution.extension.actions.min.js"></script>
    <script src="<?=asset;?>/assets/js/revoulation/extensions/revolution.extension.carousel.min.js"></script>
    <script src="<?=asset;?>/assets/js/revoulation/extensions/revolution.extension.kenburn.min.js"></script>
    <script src="<?=asset;?>/assets/js/revoulation/extensions/revolution.extension.layeranimation.min.js"></script>
    <script src="<?=asset;?>/assets/js/revoulation/extensions/revolution.extension.migration.min.js"></script>
    <script src="<?=asset;?>/assets/js/revoulation/extensions/revolution.extension.navigation.min.js"></script>
    <script src="<?=asset;?>/assets/js/revoulation/extensions/revolution.extension.parallax.min.js"></script>
    <script src="<?=asset;?>/assets/js/revoulation/extensions/revolution.extension.slideanims.min.js"></script>
    <script src="<?=asset;?>/assets/js/revoulation/extensions/revolution.extension.video.min.js"></script>

    <!-- REVOLUTION ACTIVE JS FILES -->
    <script src="<?=asset;?>/assets/js/revoulation.js"></script>
    
</body>

</html>