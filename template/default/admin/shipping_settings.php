 
      <?php include 'header_nav.php' ;?>
      <?php include 'datatable.php' ;?>

    <script src="<?=asset;?>/includes/angularjs/shipping_settings.js"></script>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="" ng-app="AdminShipping" ng-controller="ShippingSettingsController">
            <div class="page-title">
              <div class="title_left">
                <h3>Store Settings </h3>
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
                    <h2>Shipping Settings</h2>
                    <ul class="nav navbar-right panel_toolbox">

                      <li>
                      <button type="" ng-click="create_shipping()" class="form-control btn btn-default">+Create</button>
                      </li>
                        <li>
                      <button type="" ng-click="update_page_cms()"  class="form-control btn btn-primary">Save
                      <?=$this->add_ajax_is_loading_spinner();?></button>
                      </li>
                      
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div ng-repeat="($index, $shipping) in $page_cms" class="row">
                      <div class="form-group col-md-5">
                        <label>*Location </label>
                      <input type="" class="form-control" ng-model="$shipping.location" name="name" placeholder="e.g Lagos">
                      </div>
                    <div class="form-group col-md-5">
                    <label>*Price</label>
                      <input type="" step="0.01" class="form-control" ng-model="$shipping.price" name="handle" placeholder="1500">
                    </div>
                <div class="form-group col-md-2">
                 <label>&nbsp;</label>
                  <button type="" class="form-control btn btn-danger" ng-click="delete_shipping($index)" ><i class="fa fa-trash"></i> Delete</button>
                    </div>

                    </div>
                                </div>
                </div>
              </div>
            </div>



             <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Bank Settings</h2>
                    <ul class="nav navbar-right panel_toolbox">

                  <!--     <li>
                      <button type="" ng-click="create_bank_detail()" class="form-control btn btn-default">+Create</button>
                      </li> -->
                        <li>
                      <button type="" ng-click="update_bank_detail()"  class="form-control btn btn-primary">Save
                      <?=$this->add_ajax_is_loading_spinner();?></button>
                      </li>
                      
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div  class="row">
                      <div class="form-group col-md-4">
                        <label>*Account Name </label>
                      <input type="" class="form-control" ng-model="$bank_detail.account_name"  placeholder="e.g Alien Fashion">
                      </div>
                    <div class="form-group col-md-4">
                    <label>*Account Number</label>
                      <input type="" step="0.01" class="form-control" ng-model="$bank_detail.account_number"  placeholder="09438232432">
                    </div>

                  <div class="form-group col-md-4">
                    <label>*Bank</label>
                      <input type="" step="0.01" class="form-control" ng-model="$bank_detail.bank" placeholder="XXX Bank">
                    </div>

                    </div>
                                </div>
                </div>
              </div>
            </div>


             <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Paystack Settings</h2>
                    <ul class="nav navbar-right panel_toolbox">

                  <!--     <li>
                      <button type="" ng-click="create_bank_detail()" class="form-control btn btn-default">+Create</button>
                      </li> -->
                        <li>
                      <button type="" ng-click="update_paystack_keys()"  class="form-control btn btn-primary">Save
                      <?=$this->add_ajax_is_loading_spinner();?></button>
                      </li>
                      
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div  class="row">
                      <div class="form-group col-md-12">
                        <label>*Public key </label>
                      <input type="" class="form-control" ng-model="$paystack_keys.public_key"  placeholder="e.g Alien Fashion">
                      </div>
                    <div class="form-group col-md-12">
                    <label>*Secret Key</label>
                      <input type="" step="0.01" class="form-control" ng-model="$paystack_keys.secret_key"  placeholder="09438232432">
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































