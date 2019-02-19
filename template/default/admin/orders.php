 
      <?php include 'header_nav.php' ;?>
      <?php include 'datatable.php' ;?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Orders</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-md-12 form-group pull-right top_search">
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
              <div class="col-md-12 col-sm-12 col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Orders Overview</h2>
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

                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                          <tr>
              <th>#ref</th>
                          <th>Billing</th>
                          <!-- <th>Shipping</th> -->
                          <th>Total (item X qty) </th>
                          <th>Total(<?=$currency;?>)</th>
                          <th>Status</th>
                          <th>Created</th>
                          <th>Action</th>
            </tr>
          </thead>

                      
<?php 

$i=1; foreach (Orders::all() as $order) :

// print_r($order->order_detail());

?>


                          <tr>
                          <td>#<?=$order->id;?></td>
                          <td style="text-transform: capitalize;">

                             <label  class='label label-xs label-primary'>
                                  <?=$order->billing_lastname;?>
                                  <?=$order->billing_firstname;?>
                              </label><br>

                                <label  class='label label-xs label-primary'>
                                  <?=$order->billing_email;?>
                              </label>         <br>              
                                <label  class='label label-xs label-primary'>
                                  <?=$order->billing_phone;?>
                              </label>
                             </td>
                              
                          <td>

                             <label  class='label label-xs label-primary'>
                            <?=$order->total_item();?> x <?=$order->total_qty();?></td>
                              </label>
                          <td><?=$this->money_format($order->total_price());?></td>
                          <td>
                             <label  class='label label-xs label-primary'>
                                  <?=$order->status;?>
                              </label>
                            </td>
                          <td>
                              <label  class='label label-xs label-primary'>
                                  <?=$order->created_at;?>
                              </label>
                            </td>
                          <td>
                            <a href="<?=domain;?>/admin-orders/open_order/<?=$order->id;?>">
                              <span  class='label label-xs label-primary'>Open
                              </span>
                           </a>
                            <a href="<?=domain;?>/admin-orders/delete_order/<?=$order->id;?>">
                                <span  class='label label-xs label-danger'>Delete
                                </span>
                             </a>

                        


                            </td>
                          </tr>
           
                     
                     <?php $i++; endforeach;?>
                   
                      </tbody>
                    </table>


</div>








                  </div>
                </div>
              </div>
            </div>






























          </div>
        </div>
        <!-- /page content -->

           <?php include 'footer.php' ;?> 































