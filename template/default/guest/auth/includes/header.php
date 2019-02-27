
    <?php


    $user_navigation = [
                            [   
                                'link' => domain."/user/dashboard", 
                                'nav' => "Dashboard",
                                'active' => "Dashboard"
                            ],

                            [   
                                'link' => domain."/user/orders", 
                                'nav' => "Orders",
                                'active' => "Orders"
                            ],

                            [   
                                'link' => domain."/user/addresses", 
                                'nav' => "Addresses",
                                'active' => "Addresses"
                            ],

                            [   
                                'link' => domain."/user/account-details", 
                                'nav' => "Account Details",
                                'active' => "Account Details"
                            ],

                            [   
                                'link' => domain."/login/logout", 
                                'nav' => "Log Out",
                                'active' => "Log Out"
                            ],
                        ];


    include realpath(__DIR__.'/../../includes/header.php');?>



        <!-- Breadcrumb area Start -->

        <span ng-controller="ShopController"></span>
        <div class="breadcrumb-area bg--white-6 breadcrumb-bg-1 pt--60 pb--70 pt-lg--40 pb-lg--50 pt-md--30 pb-md--40">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 text-center">
                        <h1 class="page-title">My Account</h1>
                        <ul class="breadcrumb justify-content-center">
                            <li><a href="Javascript:void;">Home</a></li>
                            <li class="current"><span>My Account</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Breadcrumb area End -->

        <!-- Main Content Wrapper Start -->
        <div id="content" class="main-content-wrapper">
            <div class="page-content-inner">
                <div class="container">
                    <div class="row pt--80 pt-md--60 pt-sm--40 pb--80 pb-md--60 pb-sm--40">
                        <div class="col-12">
                            <div class="user-dashboard-tab flex-column flex-md-row">
                                <div class="user-dashboard-tab__head nav flex-md-column" role="tablist" aria-orientation="vertical">

                                <?php foreach ($user_navigation as $nav) :?>
                                    <a class="nav-link <?=($page_menu == $nav['active'])? 'active': '';?>" 
                                     href="<?=$nav['link'];?>"><?=$nav['nav'];?></a>
                                <?php endforeach ;?>

                                </div>









