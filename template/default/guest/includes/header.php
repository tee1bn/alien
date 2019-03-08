
        
<!doctype html>
<html class="no-js" lang="zxx" ng-app = "app" ng-cloak>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?=$page_description;?>">
    <!-- Favicons -->
    <link rel="shortcut icon" href="<?=asset;?>/assets/img/logo/logo-a.png" type="image/x-icon">

    <!-- Title -->
    <title><?=$page_title;?></title>

    <!-- ************************* CSS Files ************************* -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?=asset;?>/assets/css/bootstrap.min.css">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="<?=asset;?>/assets/css/font-awesome.min.css">

    <!-- dl Icon CSS -->
    <link rel="stylesheet" href="<?=asset;?>/assets/css/dl-icon.css">

    <!-- All Plugins CSS -->
    <link rel="stylesheet" href="<?=asset;?>/assets/css/plugins.css">

    <!-- Revoulation Slider CSS  -->
    <link rel="stylesheet" href="<?=asset;?>/assets/css/revoulation.css">

    <!-- style CSS -->
    <link rel="stylesheet" href="<?=asset;?>/assets/css/main.css">

    <!-- modernizr JS
    ============================================ -->
    <script src="<?=asset;?>/assets/js/vendor/modernizr-2.8.3.min.js"></script>
    <!--[if lt IE 9]>
    <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


    <style>
.fixed-headers .container-fluid{
        background-image: linear-gradient(to bottom right, #20253d, #48587f);
 }
.header-mobile{
        background-image: linear-gradient(to bottom right, #20253d, #48587f);
 }
/*
 body{
    
        background-image: linear-gradient(to bottom right, #20253d, #48587f);
        color: #e2e2e2 !important;
    }*/
 header .mainmenu__link, .header-toolbar i{
    color:#e2e2e2 !important;
 }   
 .mini-cart-count{
    background: #4879be !important;
 }

footer i {
    color:aliceblue; 
}

  .btn{
        background-image: linear-gradient(to bottom right, #20253d, #48587f);
    }
  

        
    .page-title{
    color:#e2e2e2 !important;
    }
        
        
      .product-summary .product-title ,
      .product-summary .money, 
      .product-summary .product-price-old, 
     {
     color:#e2e2e2 !important;
    }
        
    .post-content p ,.entry-content,.product-summary p ,.product-short-description {
     color:#2f3856c4  !important;
    }
.breadcrumb{
    display: none;
}
/*
 .breadcrumb-area .container-fluid{
    background: #181d2d;
    }

 .breadcrumb li a ,.breadcrumb li span{
    color:#e2e2e2 !important;
 }

 .breadcrumb-area{
    
    background: #181d2d;
 }
*/
 .footer{
    background: #181d2d;
 }
/*
 .product-imagess{

    border: 3px solid #5b7aaa !important;
 }
 .product-title{
    color:#e2e2e2 !important;
 }*/
</style>    


    <style>
            

        <?php if ($this->admin()):?>
            .--oga{
                display: block;
            }
        <?php else:?>
            .--oga{
                display: none;
            }

        <?php endif;?>

    </style>

    <!-- jQuery JS -->
    <script src="<?=asset;?>/assets/js/vendor/jquery.min.js"></script>



    <!-- angularjs -->
    <script src="<?=asset;?>/assets/angulars/angularjs.js"></script>
    <script>
        let $base_url = "<?=domain;?>";
        var app = angular.module('app', []);
    </script>
    <script src="<?=asset;?>/assets/angulars/shop.js"></script>

        <!-- mail chimp -->
        <script id="mcjs">!function(c,h,i,m,p){m=c.createElement(h),p=c.getElementsByTagName(h)[0],m.async=1,m.src=i,p.parentNode.insertBefore(m,p)}(document,"script","https://chimpstatic.com/mcjs-connected/js/users/41c69bef7fcecb0a1f093b73e/9077ec3c24a280e954265673a.js");</script>
</head>

<body>

<!-- 
    <div class="ai-preloader active">
        <div class="ai-preloader-inner h-100 d-flex align-items-center justify-content-center">
            <div class="ai-child ai-bounce1"></div>
            <div class="ai-child ai-bounce2"></div>
            <div class="ai-child ai-bounce3"></div>
        </div>
    </div> -->
        
<?php 
  $menu = explode('/', $_GET['url'])[0];

;?>
      
  
    <!-- Main Wrapper Start -->
    <div class="wrapper">
        <div id="header-mini-cart" ng-controller ="CartNotificationController">

            <?php include 'navigation.php';;?>

            <!-- Header Area Start -->
            <header class="header header-fullwidth header-style-1">
                <div class="header-inner fixed-headers" style="padding: 0px; background:;">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <div class="col-xl-5 col-lg-6">
                                <!-- Main Navigation Start Here -->
                                <nav class="main-navigation">
                                    <ul class="mainmenu">

                                        <?php foreach ($main_navigation as $key => $main_menu) :?>

                                        <li class="mainmenu__item menu-item-has-children megamenu-holder 
                                        <?=($menu == $main_menu[active])?'active': '' ;?>">
                                            <a href="<?=$main_menu['link'];?>" class="mainmenu__link">
                                                <span class="mm-text"><?=$main_menu['nav'];?></span>
                                                <!-- <span class="tip"></span> -->
                                            </a>
                                        </li>
                                    <?php endforeach;?>
                                    </ul>

                                </nav>
                                <!-- Main Navigation End Here -->
                            </div>
                            <div class="col-lg-2 col-md-3 col-4 text-lg-center">
                                <!-- Logo Start Here -->
                                <a href="<?=domain;?>" class="logo-box" style="height: 100px;" >
                                   
                                    <figure class="logo--normal"> 
                                        <!-- <img src="<?=asset;?>/assets/img/logo/logo.svg" alt="Logo"/>    -->
                                        <img src="<?=asset;?>/assets/img/logo/logo-a.png" alt="Logo" style="height: 130px;">  

                                    </figure>
                                    <figure class="logo--transparency">
                                        <img src="<?=asset;?>/assets/img/logo/logo-a.png" alt="Logo"/>  
                                    </figure>
                                    <h2>
                                        <!-- <?=project_name;?> -->
                                    </h2>

                                </a>
                                <!-- Logo End Here -->
                            </div>


                            <div class="col-xl-5 col-lg-4 col-md-9 col-8">
                                <ul class="header-toolbar text-right">
                                    <li class="header-toolbar__item d-`none d-lg-block">
                                        <a href="#sideNav" class="toolbar-btn">
                                            <i class="dl-icon-menu2"></i>
                                        </a>                                    
                                    </li>
                                    <li class="header-toolbar__item user-info-menu-btn">
                                        <?php if ($this->auth()):?>
                                            <a href="#">
                                                <i class="fa fa-user-circle-o"></i>
                                            </a>
                                        <?php else:?>
                                        <a href="#">
                                            <i class="fa fa-lock"></i>
                                        </a>
                                        <?php endif;?>
                                        <ul class="user-info-menu">
                                            <?php if ($this->auth()):?>
                                            <li>
                                               <a> <b><?=$this->auth()->lastname;?> <?=$this->auth()->firstname;?></b></a>
                                            </li>
                                            <?php endif;?>


                                            
                                            <?php foreach ($auth_navigation as $key => $nav):
                                                if ($nav['hide'])  {
                                                    continue;
                                                }
                                                ?>
                                            <li>
                                                <a href="<?=$nav['link'];?>"><?=$nav['nav'];?></a>
                                            </li>

                                        <?php endforeach ;?>
                                        </ul>
                                    </li>

                                    <li class="header-toolbar__item">
                                        <a href="#miniCart" class="mini-cart-btn toolbar-btn">
                                            <i class="dl-icon-cart4"></i>
                                            <sup class="mini-cart-count">{{$cart.$items.length}}</sup>
                                        </a>
                                    </li>
                                    <li class="header-toolbar__item">
                                        <a href="#searchForm" class="search-btn toolbar-btn">
                                            <i class="dl-icon-search1"></i>
                                        </a>
                                    </li>
                                    <li class="header-toolbar__item d-lg-none">
                                        <a href="#" class="menu-btn"></a>                 
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- Header Area End -->

            <!-- Mobile Header area Start -->
            <header class="header-mobile" >
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-4">
                            <a href="<?=domain;?>" class="logo-box">
                                <figure class="logo--normal">
                                    <img src="<?=asset;?>/assets/img/logo/logo-al.png" alt="Logo" style="height: 50px;" >
                                </figure>
                                 
                            </a>
                        </div>
                        <div class="col-8">
                            <ul class="header-toolbar text-right">
                                <li class="header-toolbar__item user-info-menu-btn">
                                        <?php if ($this->auth()):?>
                                            <a href="#">
                                                <i class="fa fa-user-circle-o"></i>
                                            </a>
                                        <?php else:?>
                                        <a href="#">
                                            <i class="fa fa-lock"></i>
                                        </a>
                                        <?php endif;?>
                                    <ul class="user-info-menu">
                                          <?php foreach ($auth_navigation as $key => $nav):
                                             if ($nav['hide'])  {
                                                    continue;
                                                }
                                                ?>
                                            <li>
                                                <a href="<?=$nav['link'];?>"><?=$nav['nav'];?></a>
                                            </li>

                                        <?php endforeach ;?>
                                    </ul>
                                </li>
                                <li class="header-toolbar__item">
                                    <a href="#miniCart" class="mini-cart-btn toolbar-btn">
                                        <i class="dl-icon-cart4"></i>
                                        <sup class="mini-cart-count">{{$cart.$items.length}} </sup>
                                    </a>
                                </li>
                                <li class="header-toolbar__item">
                                    <a href="#searchForm" class="search-btn toolbar-btn">
                                        <i class="dl-icon-search1"></i>
                                    </a>
                                </li>
                                <li class="header-toolbar__item d-lg-none">
                                    <a href="#" class="menu-btn"></a>                 
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <!-- Mobile Navigation Start Here -->
                            <div class="mobile-navigation dl-menuwrapper" id="dl-menu">
                                <button class="dl-trigger">Open Menu</button>
                                <ul class="dl-menu">
                            <?php foreach ($main_navigation as $key => $main_menu) :?>

                                    <li>
                                        <a href="<?=$main_menu['link'];?>">
                                            <?=$main_menu['nav'];?>
                                            <!-- <span class="tip">Hot</span> -->
                                        </a>
                                    </li>

                                    <?php endforeach;?>                                    
                                </ul>
                            </div>
                            <!-- Mobile Navigation End Here -->
                        </div>
                    </div>
                </div>
            </header>
            <!-- Mobile Header area End -->
            <?php include 'mini-cart.php';?>
        </div>