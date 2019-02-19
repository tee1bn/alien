
<?php 

    $page_title           = " Dashboard";
    $page_description     = "";
    $page_menu            = "Dashboard";


include 'includes/header.php' ;?>


                                <div class="user-dashboard-tab__content tab-content">
                                    <div class="tab-pane fade show active" id="dashboard">
                                        <p>Hello <strong><?=$this->auth()->firstname;?></strong> 
                                            (not <strong><?=$this->auth()->firstname;?></strong>? 
                                            <a href="<?=domain;?>/login/logout">Log out</a>)</p>
                                        <p>From your account dashboard. you can easily check &amp; view your <a href="#">recent orders</a>, manage your <a href="#">shipping and billing addresses</a> and <a href="#">edit your password and account details</a>.</p>
                                    </div>




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
