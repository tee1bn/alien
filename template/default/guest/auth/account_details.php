
<?php 

    $page_title           = "Account Details";
    $page_description     = "";
    $page_menu            = "Account Details";


include 'includes/header.php' ;?>


                                <div class="user-dashboard-tab__content tab-content">
                                   
                                    <div class="" >


                                        <div class="panel-group">
                                          <div class="panel panel-default">
                                            <div class="panel-heading">
                                              <h4 class="panel-title">
                                                <a data-toggle="collapse" href="#collapse1">Account Details</a>
                                              </h4>
                                            </div>
                                            <div id="collapse1" class="panel-collapse collapse show">
                                              <div class="panel-body">
                                                <form action="<?=domain;?>/user-profile/update_profile"  method="post" class="form form--account">
                                                    <div class="row grid-space-30 mb--20">
                                                        <div class="col-md-6 mb-sm--20">
                                                            <div class="form__group">
                                                                <label class="form__label" for="f_name">First name <span class="required">*</span></label>
                                                                <input  value="<?=$this->auth()->firstname;?>" type="text" name="firstname" id="f_name" class="form__input">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form__group">
                                                                <label class="form__label" for="l_name">Last name <span class="required">*</span></label>
                                                                <input  value="<?=$this->auth()->lastname;?>" type="text" name="lastname" id="l_name" class="form__input">
                                                            </div>
                                                        </div>
                                                    </div>
                                             <!--        <div class="row mb--20">
                                                        <div class="col-12">
                                                            <div class="form__group">
                                                                <label class="form__label" for="d_name">Display name <span class="required">*</span></label>
                                                                <input  value="" type="text" name="d_name" id="d_name" class="form__input">
                                                                <span class="suggestion"><em>This will be how your name will be displayed in the account section and in reviews</em></span>
                                                            </div>
                                                        </div>
                                                    </div> -->
                                                    <div class="row mb--20">
                                                        <div class="col-12">
                                                            <div class="form__group">
                                                                <label class="form__label" for="email">Email Address <span class="required">*</span></label>
                                                                <input  value="<?=$this->auth()->email;?>" type="email" name="email" id="email" class="form__input">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form__group">
                                                                <input type="submit" value="Save Changes" class="btn btn-style-1 btn-submit">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                              </div>
                                              <!-- <div class="panel-footer">Panel Footer</div> -->
                                            </div>
                                          </div>
                                        </div>
                                        <hr/>
                                        <div class="panel-group">
                                          <div class="panel panel-default">
                                            <div class="panel-heading">
                                              <h4 class="panel-title">
                                                <a data-toggle="collapse" href="#collapse2">Change Password</a>
                                              </h4>
                                            </div>
                                            <div id="collapse2" class="panel-collapse collapse show">
                                              <div class="panel-body">
                                                    <form action="<?=domain;?>/user-profile/change_password" method="post" class="form form--account">
                                                    <legend class="form__legend">Password change</legend>
                                                    <div class="row mb--20">
                                                        <div class="col-12">
                                                            <div class="form__group">
                                                                <label class="form__label" for="cur_pass">Current password (leave blank to leave unchanged)</label>
                                                                <input type="password" name="current_password" id="cur_pass" class="form__input">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mb--20">
                                                        <div class="col-12">
                                                            <div class="form__group">
                                                                <label class="form__label" for="new_pass">New password (leave blank to leave unchanged)</label>
                                                                <input type="password" name="new_password" id="new_pass" class="form__input">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form__group">
                                                                <label class="form__label" for="conf_new_pass">Confirm new password</label>
                                                                <input type="password" name="confirm_password" id="conf_new_pass" class="form__input">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset><br>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form__group">
                                                            <input type="submit" value="Save Changes" class="btn btn-style-1 btn-submit">
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                              </div>
                                              <!-- <div class="panel-footer">Panel Footer</div> -->
                                            </div>
                                          </div>
                                        </div>


                                     
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
