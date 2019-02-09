 
      <?php include 'header_nav.php' ;?>
      <?php include 'datatable.php' ;?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Order Page</h3>
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
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Order 
                     <!-- <small>Sample user invoice design</small> -->
                   </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                     
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <section class="content invoice">
                      <!-- title row -->
                      <div class="row">
                        <div class="col-xs-12 invoice-header">
                          <h1>
                                          <i class="fa fa-globe"></i> Order.
                                          <small class="pull-right">Date: <?=$order->created_at;?></small>
                                      </h1>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- info row -->
                      <div class="row invoice-info">
                      
                        <div class="col-sm-4 invoice-col">
                          To
                          <address>
                                          <strong><?=$order->buyer_name;?></strong>
                                          <br><?=$order->address;?>
                                          <br>Phone: <?=$order->phone;?>
                                          <br>Email: <?=$order->email;?>
                                      </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                          <b>Order #<?=$order->id;?></b>
                          <br>
                          <span class="label label-primary"> <?=$order->status;?></span>
                         <!--  <br>
                          <br>
                          <b>Payment Due:</b> 2/22/2014
                          <br>
                          <b>Account:</b> 968-34567 -->
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <!-- Table row -->
                      <div class="row">
                        <div class="col-xs-12 table">
                          <table class="table table-striped">
                            <thead>
                              <tr>
                                <th>Product</th>
                                <th style="width: 59%">Description</th>
                                <th>Qty</th>
                                <th>Unit price</th>
                                <th>Subtotal</th>
                              </tr>
                            </thead>
                            <tbody>

                              <?php foreach ($order->order_detail() as $item):?>
                              <tr>
                                <td><?=$item['product']['name'];?></td>
                          <td><?=$item['product']['description'];?></td>
                                <td><?=$item['qty'];?></td>
                                <td><?=$currency;?><?=$this->money_format($item['product']['price']);?></td>

                                <td><?=$currency;?><?=$this->money_format($item['price']);?></td>
                              </tr>
                            <?php endforeach ;?>
                
                            </tbody>
                          </table>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <div class="row">
                        <!-- accepted payments column -->
                        <div class="col-xs-6">
                          <p class="lead">Additional Note:</p>
                         <!--  <img src="images/visa.png" alt="Visa">
                          <img src="images/mastercard.png" alt="Mastercard">
                          <img src="images/american-express.png" alt="American Express">
                          <img src="images/paypal.png" alt="Paypal"> -->
                          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                           <?=$order->additional_note;?>
                          </p>
                        </div>
                        <!-- /.col -->
                        <div class="col-xs-6">
                          <p class="lead">Amount </p>
                          <div class="table-responsive">
                            <table class="table">
                              <tbody>
                                <tr>
                                  <th style="width:50%">Subtotal:</th>
                                  <td><?=$currency;?><?=$this->money_format($order->total_price());?></td>
                                </tr>
                              <!--   <tr>
                                  <th>Tax (9.3%)</th>
                                  <td>$10.34</td>
                                </tr>
                                <tr>
                                  <th>Shipping:</th>
                                  <td>$5.80</td>
                                </tr> -->
                                <tr>
                                  <th>Total:</th>
                                  <td><?=$currency;?><?=$this->money_format($order->total_price());?></td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <!-- this row will not appear when printing -->
                      <div class="row no-print">
                        <div class="col-xs-12">
                          <!-- <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button> -->
                          <!-- <button class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment</button> -->
                          <?php if ($order->status !== 'complete'):?>
                          <a href="<?=domain;?>/admin-orders/mark_as_complete/<?=$order->id;?>" class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-check"></i> Mark as Complete </a>
                    <?php endif;?>
                        </div>
                      </div>
                    </section>
                  </div>
                </div>
              </div>
            </div>






   <!--           <div class="row">
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































