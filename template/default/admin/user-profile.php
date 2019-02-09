 
      <?php include 'header_nav.php' ;?>
      <?php include 'datatable.php' ;?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>User Profile</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

           
            <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>User Report <small>Activity report</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                       
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content ">
                    <div class="col-md-2 col-sm-2 col-xs-12 profile_left text-center">
                      <div class="profile_img">
                        <div id="crop-avatar">
                          <!-- Current avatar -->


              <img class="img-responsive avatar-view" style="margin: auto;" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ82r0vnrZH7UyUkl18wrY5ROKYd--Lp_lN18X2X0ncl4HanHP-aQ" alt="Avatar" title="Change the avatar">
                        </div>
                      </div>
        <h3 style="text-transform: capitalize;"><?=$data['user']->lastname;?> <?=$data['user']->firstname;?></h3>

                      <ul class="list-unstyled user_data">
                      <!--   <li><i class="fa fa-phone user-profile-icon"></i> <?=$data['user']->phone;?>
                        </li> -->

                        <li>
                          <i class="fa fa-envelope user-profile-icon"></i><a href="mailto://<?=$data['user']->email;?>"> 
                            <?=$data['user']->email;?></a>
                        </li>
                       
                       

<!-- 
                        <li class="m-top-xs">
                          <i class="fa fa-external-link user-profile-icon"></i>
                          <a href="http://www.kimlabs.com/profile/" target="_blank">www.kimlabs.com</a>
                        </li> -->
                      </ul>

        <?php if($data['user']->blocked_on == null):?>

        <a href="<?=$this->domain;?>/admin-users/suspendingUser/<?=$data['user']->id;?>" class="btn btn-danger"><i class="fa fa-ban m-right-xs"></i> Block User</a>

          <?php else :?>

        <a href="<?=$this->domain;?>/admin-users/suspendingUser/<?=$data['user']->id;?>" class="btn btn-success"><i class="fa fa-unlock-alt m-right-xs"></i> Unblock User</a>


          <?php endif ;?>
                      <br>

                     

                    </div>
                    <div class="col-md-10 col-sm-10 col-xs-12">
<?php foreach ($data['user']->wallets as $wallet):?>

<div class="animated flipInY  ">
                <div class="tile-stats">
                  <div class="icon "><?=$wallet->currency->currency_code;?></div>
                  <div class="count"><?= $this->money_format($wallet->value_in_usd);?></div>
                  <h3 >Avail: <?= $this->money_format($wallet->value_in_usd);?></h3>
                  <p></p>
                </div>
              </div>

            <?php endforeach ;?>  

<!-- <form method="post" action="<?=$this->domain;?>/admin-users/credit_or_debit_user/<?=$data['user']->id;?>" >
  
  <?=$this->csrf_field('credit_or_debit_user');?>
  <input type="hidden" id="credit_or_debit" name="credit_or_debit" value="">
                          <div class="input-group">
<div class="input-group-btn">
                              <button type="submit" onclick="document.getElementById('credit_or_debit').value='credit'" class="btn btn-success dropdown-toggle" data-toggle="dropdow" aria-expanded="false">Credit(<?=$currency;?>)
                              </button>
                           
                            </div>

<input type="text" required="required" id="payment_amount" class="form-control" name="PAYMENT_AMOUNT" value="">
                            <div class="input-group-btn">
        <button type="submit" class="btn btn-danger" onclick="document.getElementById('credit_or_debit').value='debit'">Debit(<?=$currency;?>) 
                              </button>
                           
                            </div>
                            <-- /btn-group --
                          </div>
</form> -->
                   
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Edit User</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content" style="display: block;">

                  <form class="form-horizontal form-label-left" method="POST" action="<?=$this->domain;?>/admin-users/updateUserProfile">
                    <?=$this->inputErrors();?>
                    
                    <div class="form-group">
                      <label>First Name</label>
                      <input type="text" class="form-control" name="firstname" value="<?=$data['user']->firstname;?>" placeholder="Enter Firstname">
                      <?php echo $this->inputError('firstname')?> 

                    </div>

                    <div class="form-group">
                      <label>Last Name</label>
                      <input type="text" class="form-control" name="lastname" value="<?=$data['user']->lastname;?>" placeholder="Enter Last">
                       <?php echo $this->inputError('lastname')?> 
                    </div>

                    <div class="form-group">
                      <label>Email address</label>
                      <input type="email" class="form-control" name="email" value="<?=$data['user']->email;?>" placeholder="Enter Email">
                       <?php echo $this->inputError('email')?> 
                    </div>

                    <?php  $this->csrf_field('admin_user_update');   ;?>

                    <input type="hidden" name="user_id" value="<?=$data['user']->id;?>">
<!-- 
                    <div class="form-group">
                      <label>Phone</label>
                      <input type="text" class="form-control" name="phone" value="<?=$data['user']->phone;?>" placeholder="Enter Phone">
                       <?php echo $this->inputError('phone')?> 
                    </div>


                    <div class="form-group">
                      <label>Bank</label>
                      <input type="text" class="form-control" name="bank" value="<?=$data['user']->bank;?>" placeholder="Enter Bank">
                       <?php echo $this->inputError('bank')?> 
                    </div>


                    <div class="form-group">
                      <label>Account Name</label>
                      <input type="text" class="form-control" name="account_name" value="<?=$data['user']->account_name;?>" placeholder="Enter Account name">
                       <?php echo $this->inputError('account_name')?> 
                    </div>
                    
                    <div class="form-group">
                      <label>Account Number</label>
                      <input type="text" class="form-control" name="account_number" value="<?=$data['user']->account_number;?>" placeholder="Enter Account number">
                       <?php echo $this->inputError('account_number')?> 
                    </div> -->

<!-- 
                    <div class="form-group">
                      <label>Password</label>
                      <input type="password" class="form-control" value="" placeholder="Password">
                    </div>
 -->
                <div class="form-group">
                  <button type="submit" class="btn btn-primary" > Update User</button>
                </div>

                  </form>



                  </div>
                </div>
            







                    </div>
                  </div>
                </div>
              </div>
            </div>




















          </div>
        </div>
        <!-- /page content -->

           <?php include 'footer.php' ;?> 































