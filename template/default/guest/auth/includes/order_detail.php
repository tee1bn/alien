
                              <div class="">
                                <section class="content invoice">
                                  <div class="row">
                                    <div class="col-xs-12 invoice-header">
                                      <h1>
                                                      <!-- <i class="fa fa-globe"></i> Order. -->
                                                  </h1>
                                        <span class=" badge badge-lg badge-primary pull-right">Date: <?=$order->created_at;?></span>
                                    </div>
                                    <!-- /.col -->
                                  </div>
                                  <!-- info row -->
                                  <div class="row invoice-info">
                    
                                    <div class="col-sm-4 invoice-col">
                                      Billing Details
                                      <address>
                                                      <strong><?=$order->billing_lastname;?> <?=$order->billing_lastname;?></strong>
                                                      <br>Company: <?=$order->billing_company;?>
                                                      <br>Street: <?=$order->billing_street_address;?>
                                                      <br>Apartment: <?=$order->billing_apartment;?>
                                                      <br>State: <?=$order->billing_state;?>
                                                      <br>City: <?=$order->billing_city;?>
                                                      <br>Country: <?=$order->billing_country;?>
                                                      <br>Phone: <?=$order->billing_phone;?>
                                                      <br>Email: <?=$order->billing_email;?>
                                                  </address>
                                    </div>

                                    
                        
                                    <div class="col-sm-4 invoice-col">
                                      Shipping Details
                                      <address>
                                                      <strong><?=$order->shipping_lastname;?> <?=$order->shipping_lastname;?></strong>
                                                      <br>Company: <?=$order->shipping_company;?>
                                                      <br>Street: <?=$order->shipping_street_address;?>
                                                      <br>Apartment: <?=$order->shipping_apartment;?>
                                                      <br>State: <?=$order->shipping_state;?>
                                                      <br>City: <?=$order->shipping_city;?>
                                                      <br>Country: <?=$order->shipping_country;?>
                                                      <br>Phone: <?=$order->shipping_phone;?>
                                                      <br>Email: <?=$order->shipping_email;?>
                                                  </address>
                                    </div>

                                    
                        


                                    <!-- /.col -->
                                    <div class="col-sm-4 invoice-col">
                                      <b>Order ID #<?=$order->id;?></b>
                                      <br>
                                      <span class="label label-primary"> <?=$order->status;?></span>
                                      <br>
                                      <b><?=$order->payment;?></b>
                                      
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
                                    <div class="col-xs-12 table table-responsive">
                                      <table class="table table-striped table-bordered">
                                        <thead>
                                          <tr>
                                            <th style="width: 15%">Product</th>
                                            <!-- <th style="width: 60%">Description</th> -->
                                            <th style="width: 5%">Qty</th>
                                            <th style="width: 10%">Unit price</th>
                                            <th style="width: 10%">Subtotal</th>
                                          </tr>
                                        </thead>
                                        <tbody>

                                          <?php foreach ($order->order_detail() as $item):?>
                                          <tr>
                                            <td><a href="javascript:void;"><?=$item['name'];?>...</a></td>
                                            <!-- <td><?=substr($item['description'], 0 ,200);?></td> -->
                                            <td><?=$item['qty'];?></td>
                                            <td><?=$currency;?> <?=$this->money_format($item['price']);?></td>

                                            <td><?=$currency;?> <?=$this->money_format($item['price'] * $item['qty'] );?></td>
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
                                    <div class="col-md-6">
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
                                    <div class="col-md-6" >
                                      <p class="lead">Amount </p>
                                      <div class="table-responsive">
                                        <table class="table">
                                          <tbody>
                                            <tr>
                                              <th style="width:50%">Subtotal:</th>
                                              <td><?=$currency;?> <?=$this->money_format($order->total_price());?></td>
                                            </tr><!-- 
                                            <tr>
                                              <th>Tax (9.3%)</th>
                                              <td>$10.34</td>
                                            </tr> -->
                                            <tr>
                                              <th>Shipping:</th>
                                              <td><?=$currency;?> <?=$this->money_format($order->shippingcost);?>
                                              <span><?=$order->shipping_fee['location'];?></span> </td>
                                            </tr>
                                            <tr>
                                              <th>Total:</th>
                                              <td><?=$currency;?> <?=$this->money_format($order->overalltotal);?></td>
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
                                    </div>
                                  </div>
                                </section>
                               </div>
