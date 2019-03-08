
<?php


    $page_title           = "Orders ";
    $page_description     = "";
    $page_menu            = "Orders";


 include 'includes/header.php' ;?>


<style type="text/css">
    .panel-collapse{
        border: 1px solid #00000012;
        padding: 10px;
        margin-top: 30px;
    }
</style>
                            <div class="user-dashboard-tab__content tab-content">
                              

                              <?php include 'includes/order_detail.php';?>


                            </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Content Wrapper Start -->



    <?php
    include realpath(__DIR__.'/../includes/footer.php');?>
