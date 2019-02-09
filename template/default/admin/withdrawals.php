 
      <?php include 'header_nav.php' ;?>
      <?php include 'datatable.php' ;?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Withdrawals </h3>
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
                    <h2>All Withdrawals </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">


<div class="table-responsive">        
 <table id="datatable" class="table table-striped table-datatable">
    <thead>
      <tr>
        <th>#Ref</th>
        <th>#user</th>
        <th>Amount</th>
        <th>Balance</th>
        <th>To Address</th>
        <!-- <th>Remark</th> -->
        <th>Mode</th>
        <th>Made/ paid on</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      <?php $i=1; foreach (RoiWithdrawal::all() as $withdrawal ):

      ?>
      <tr>
        <td><?=$withdrawal->id;?></td>
        <td>
          <a href="<?=$this->domain;?>/admin-users/userProfile/<?=$withdrawal->user->id;?>">
          <?=$withdrawal->user->username;?>
            
          </a>
        </td>        <td><?=$withdrawal->currency->currency_code;?><?=$this->money_format($withdrawal->amount);?></td>
        <td><?=$withdrawal->currency->currency_code;?><?=$this->money_format($withdrawal->payout_left);?></td>
        <td><?=$withdrawal->wallet_address;?></td>
        <!-- <td><?=$i;?></td> -->
        <td><span class="label label-primary"> <?=$withdrawal->currency->currency_name;?></span></td>
        <td>
          <span class="label label-warning"><?=date_format(date_create($withdrawal->created_at) , "d-m-y, H:s");?></span>/
          <span class="label label-primary"><?=date_format(date_create($withdrawal->fufilled_at) , "d-m-y, H:s");?></span>
        </td>
        <td><?=$withdrawal->status();?></td>
      </tr>
     
<?php $i++; endforeach ;?>

    </tbody>
  </table>
</div>











                  </div>
                </div>
              </div>
            </div>







             <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Plain Page</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      Add content to the page ...
                  </div>
                </div>
              </div>
            </div>






























          </div>
        </div>
        <!-- /page content -->

           <?php include 'footer.php' ;?> 































