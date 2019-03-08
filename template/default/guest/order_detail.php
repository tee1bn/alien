
    <?php

    $page_title = "Order";
    $page_description = "";
    include 'includes/header.php';?>




        <!-- Breadcrumb area Start -->

        <div class="breadcrumb-area bg--white-6 ptb--70 ptb-lg--40" ng-controller="ShopController">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 text-center">
                        <h1 class="page-title">Order</h1>
                        <ul class="breadcrumb justify-content-center">
                            <li><a href="<?=domain;?>">Home</a></li>
                            <li class="current"><span>Order</span></li>
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
                      Bank: Access Bank<br>
                      Account Name: JOu euinipo <br>
                      Account Number: JOu euinipo <br>
                    <?php include 'auth/includes/order_detail.php';?>

                </div>
            </div>
        </div>
        <!-- Main Content Wrapper Start -->




    <?php
    include 'includes/footer.php';?>