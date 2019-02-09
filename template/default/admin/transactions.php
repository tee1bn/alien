 
      <?php include 'header_nav.php' ;?>
      <?php include 'datatable.php' ;?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Investments </h3>
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
                    <h2>All Investments</h2>
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
        <th>User</th>
        <th>Order-id</th>
        <th>Plan</th>
        <th>Roi@today</th>
        <th>Invested</th>
        <th>Days</th>
        <th>Growth </th>
        <th>status </th>
      </tr>
    </thead>
    <tbody>

<?php $i=1; foreach (InvestmentOrders::all() as $order) :

if ($order->harvested()) {
  $harvested_status  = '<span class="label label-success label-sm">harvested</span>';
}else{
  $harvested_status  = '<span class="label label-danger label-sm">Not harvested</span>';
}




?>

      <tr>
        <td><a href="<?=$this->domain;?>/admin-users/userProfile/<?=$order->user->id;?>">
          <?=$order->user->username;?></a></td>
        <td>#<?=$order->id;?></td>
        <td><span class="badge badge-secondary">
          <?=$order->pack_name;?> - <?=$order->currency->currency_code;?><br>
          <?=$order->currency->currency_code;?><?=$this->money_format($order->amount);?>
            
          <span class="badge badge-success"><?=$order->currency->currency_code;?><?=$this->money_format($order->worth_after_maturity);?></span>
          </span>
        </td>
        <td>
          <span class="label label-primary">
                  <?=$order->currency->currency_code;?><?=$this->money_format($order->worth_at_today());?>            
          </span> 

        </td>
        <td>
          <span class="label ">
          <span class="label label-primary"><?=date_format(date_create($order->fufilled_at) , "d-m-y");?></span> 

</span>
        </td>
       <td>  
               <span class="label label-primary"><?=$order->no_of_days_of_growth();?>/<?=$order->duration_days;?></span>
</td>
        <td>
          <span class="label label-primary">

    <?=$order->maturity_growth();?>% 
      </span>
</td>
<td>
  <?=$order->status();?>
  </td>
      </tr>
     
    <?php $i++; endforeach ;?> 
    </tbody>
  </table>
</div>









                  </div>
                </div>
              </div>
            </div>






<!-- 
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
            </div> -->






























          </div>
        </div>
        <!-- /page content -->

           <?php include 'footer.php' ;?> 































