 
      <?php include 'header_nav.php' ;?>
      <?php include 'datatable.php' ;?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Admin Dashboard</h3>
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
                    <h2>Dashboard</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">


       <div class="col-xs-12 col-md-6">
                                <div class="tile-stats">
                                  <div class="icon"><i class="fa fa-group"></i></div>
                                  <div class="count"><?=User::all()->count();?></div>
                                  <h3>Users</h3>
                                  <p>
                                    Active <span class="label label-success"><?=User::active_users()->count();?></span>
                                    Blocked <span class="label label-danger"><?=User::blocked_users()->count();?></span>
                                  </p>
                                </div>
                              </div>
                              
                              <div class="col-xs-12 col-md-6">
                                <div class="tile-stats">
                                  <div class="icon"><i class="fa fa-list"></i></div>
                                  <div class="count"><?=InvestmentOrders::all()->count();?></div>
                                  <h3>Investments</h3>
                                  <p>
                                    Pending <span class="label label-default"><?=InvestmentOrders::pending_orders()->get()->count();?></span>
                                    Growing <span class="label label-info"><?=InvestmentOrders::growing_orders();//>get()->count();?></span>
                                    Matured <span class="label label-primary"><?=InvestmentOrders::matured_orders();?></span>
                                    Harvested <span class="label label-success"><?=InvestmentOrders::harvested_orders()->get()->count();?></span>

                                  </p>
                                </div>
                              </div>
                              
                              <div class="col-xs-12 col-md-6">
                                <div class="tile-stats">
                                  <div class="icon"><i class="fa fa-list"></i></div>
                                  <div class="count"><?=RoiWithdrawal::all()->count();?></div>
                                  <h3>Withdrawals</h3>
                                  <p>
                                    Paid <span class="label label-success"><?=$paid_withdrawals = RoiWithdrawal::paid_withdrawals()->count();?></span>
                                    Processing <span class="label label-default"><?=RoiWithdrawal::all()->count() - $paid_withdrawals;?></span>
                                  
                                  </p>                                </div>
                              </div>
                              
                              <div class="col-xs-12 col-md-6">
                                <div class="tile-stats">
                                  <div class="icon"><i class="fa fa-life-buoy"></i></div>
                                  <div class="count"><?=SupportTicket::all()->count();?></div>
                                  <h3>Support tickets</h3>
                                    <p>
                                    Open <span class="label label-primary"><?=SupportTicket::open_tickets()->count();?></span>
                                    Closed <span class="label label-success"><?=SupportTicket::closed_tickets()->count();?></span>

                                  </p>                                </div>
                              </div>








                  </div>
                </div>
              </div>
            </div>







             <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>System Stability </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
<?php
  foreach (UserWallet::all(['currency_id'])->unique('currency_id') as $key => $value) :
    $outflow = UserWallet::where('currency_id', $value->currency_id)->sum('value_in_usd');

    $inflow = InvestmentOrders::where('currency_id', $value->currency_id)
                              ->where('fufilled_at', '!=',null)
                              ->where('harvested_at', null)->sum('amount');
    ?>
      
                              <div class=" col-md-12">
                                <div class="tile-stats">
                                  <div class="icon">
                                    <?=$value->currency->currency_code;?>
                                  </div>
                                  <div class="count"><?=$outflow - $inflow;?></div>
                                  <h3>System stability</h3>
                                    <p>
                                    Inflow <span class="label label-success"><?=$value->currency->currency_code;?><?=$this->money_format($inflow);?></span>
                                     Outflow <span class="label label-danger"><?=$value->currency->currency_code;?><?=$this->money_format($outflow);?></span>
                                  </p>                             

                                     </div>
                              </div>
<?php endforeach ;?>



                  </div>
                </div>
              </div>
            </div>






























          </div>
        </div>
        <!-- /page content -->

           <?php include 'footer.php' ;?> 































