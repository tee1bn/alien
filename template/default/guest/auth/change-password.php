
    <?php

    $page_title = "Change Password";
    $page_description = "";
    include realpath(__DIR__.'/../includes/header.php');?>


        <!-- Breadcrumb area Start -->
        <span ng-controller="ShopController"></span>
        <div class="breadcrumb-area bg--white-6 breadcrumb-bg-1 pt--60 pb--70 pt-lg--40 pb-lg--50 pt-md--30 pb-md--40">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 text-center">
                        <h1 class="page-title">Change Password </h1>
                        <ul class="breadcrumb justify-content-center">
                            <li><a href="<?=domain;?>">Home</a></li>
                            <li class="current"><span>Change Password</span></li>
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
                    <div class="row pt--75 pt-md--55 pt-sm--35 pb--80 pb-md--60 pb-sm--40">
                        <div class="col-md-12 mb-sm--30">
                            <div class="login-box">
                                <h4 class="mb--35 mb-sm--20">Reset Password</h4>
                                <form action="<?=domain;?>/forgot-password/reset_password"  method="post" class="form form--login">

                                    <div class="form__group mb--20">
                                        <label class="form__label form__label--2" for="username_email">Email address
                                         <span class="required">*</span></label>
                                        <input required="" type="email" class="form__input form__input--3" id="username_email" name="user" value="<?=$_SESSION['change_password_email'];?>" readonly required>
                                    </div>


                                    <div class="form__group mb--20">
                                        <label class="form__label form__label--2" for="username_email">New password
                                         <span class="required">*</span></label>
                                        <input required="" type="password" class="form__input form__input--3" id="new_password" name="new_password">
                                    </div>


                                    <div class="form__group mb--20">
                                        <label class="form__label form__label--2" for="username_email">Confirm new password
                                         <span class="required">*</span></label>
                                        <input required="" type="password" class="form__input form__input--3" id="username_email"
                                         name="confirm_new_password">
                                    </div>



                                    <div class="d-flex align-items-center mb--20">
                                        <div class="form__group">
                                            <input type="submit" value="Submit" class="btn btn-submit btn-style-1">
                                        </div>
                                    </div>
                                    <!-- <a class="forgot-pass">A Reset link will be sent to your Email</a> -->
                                </form>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Content Wrapper Start -->


    <?php
    include 'includes/footer.php';?>