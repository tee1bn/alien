
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


                                <div class="">
<!--                                         <div class="message-box mb--30 d-none">
                                            <p><i class="fa fa-check-circle"></i>No order has been made yet.</p>
                                            <a href="shop-sidebar.html">Go Shop</a>
                                        </div>
 -->                                        <div class="table-content table-responsive">
                                            <table class="table text-center">
                                                <thead>
                                                    <tr>
                                                        <th>Order</th>
                                                        <th>Date</th>
                                                        <th>Status</th>
                                                        <th>Total</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php foreach ($orders =$this->auth()->orders as  $order):?>

                                                    <tr>
                                                        <td>#<?=$order->id;?></td>
                                                        <td class="wide-column"><?=$order->date;?></td>
                                                        <td><?=$order->status;?></td>
                                                        <td class="wide-column">$49.00 for 1 item</td>
                                                        <td><a href="<?=$order->view_link;?>" class="btn btn-medium btn-style-1">View</a></td>
                                                    </tr>
                                                <?php endforeach ;?>
                                                <?php if($orders->count() == 0) :?>
                                                <center>No Order has been made yet</center>
                                                <?php endif ;?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                             </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Content Wrapper Start -->



    <?php
    include realpath(__DIR__.'/../includes/footer.php');?>
