
<?php 

    $page_title           = " Addresses";
    $page_description     = "";
    $page_menu            = "Addresses";

    $billing_details = $this->auth()->billing_details;
    $shipping_details = $this->auth()->shipping_details;


include 'includes/header.php' ;?>



<style type="text/css">
    .panel-collapse{
        border: 1px solid #00000012;
        padding: 10px;
        margin-top: 30px;
    }
</style>
                                <div class="user-dashboard-tab__content tab-content">
                                    <div>
                                        <p class="mb--20">The following addresses will be used on the checkout page by default.</p>
                                        <div class="row">
                                            


                                            <div class="col-md-6">
                                                <div class="text-block">

                                                <div class="panel-group">
                                                  <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                      <h4 class="panel-title">
                                                        <a data-toggle="collapse" href="#collapse1">Billing Address <i class="fa fa-chevron-down"></i></a>
                                                      </h4>
                                                    </div>
                                                    <div id="collapse1" class="panel-collapse collapse show">
                                                      <div class="panel-body">
                                                    <form action="<?=domain;?>/user-profile/update_billing_details" method="post">
                                                        <div class="form-row mb--30">

                                                        <div class="form__group col-md-6 mb-sm--30">
                                                            <label class="form__label form__label--2">First Name  <span class="required">*</span></label>
                                                            <input required="" type="text" name="billing_firstname" 
                                                            value="<?=$billing_details->billing_firstname;?>" id="" class="form__input form__input--2">
                                                        </div>


                                                        <div class="form__group col-md-6 mb-sm--30">
                                                            <label class="form__label form__label--2">Last Name  <span class="required">*</span></label>
                                                            <input required="" type="text" name="billing_lastname" 
                                                            value="<?=$billing_details->billing_lastname;?>" id="" class="form__input form__input--2">
                                                        </div>

                                                    </div>
                                                    <div class="form-row mb--30">
                                                        <div class="form__group col-12">
                                                            <label for="billing_company" class="form__label form__label--2">Company Name (Optional)</label>
                                                            <input type="text" name="billing_company"  value="<?=$billing_details->billing_company;?>" 
                                                            id="billing_company" class="form__input form__input--2">
                                                        </div>
                                                    </div>
                                                    <div class="form-row mb--30">
                                                        <div class="form__group col-12">
                                                            <label for="billing_country" class="form__label form__label--2">Country <span class="required">*</span></label>
                                                            <select id="billing_country" required="" 
                                                             value="<?=$billing_details->billing_country;?>"  name="billing_country" class="form__input form__input--2 nice-select" style="display: none;">
                                                                <option value="">Select a country…</option>
                                                                <option value="AF">Nigeria</option>
                                                             
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-row mb--30">
                                                        <div class="form__group col-12">
                                                            <label for="billing_streetAddress" class="form__label form__label--2">Street Address <span class="required">*</span></label>

                                                            <input type="text"  value="<?=$billing_details->billing_street_address;?>"  name="billing_street_address" id="" class="form__input form__input--2 mb--30" placeholder="House number and street name">

                                                            <input type="text" value="<?=$billing_details->billing_apartment;?>"  name="billing_apartment" id="billing_apartment" class="form__input form__input--2" placeholder="Apartment, suite, unit etc. (optional)">
                                                        </div>
                                                    </div>
                                                    <div class="form-row mb--30">
                                                        <div class="form__group col-12">
                                                            <label for="billing_city" class="form__label form__label--2">Town / City <span class="required">*</span></label>
                                                            <input type="text" required="" value="<?=$billing_details->billing_city;?>" name="billing_city" id="billing_city" class="form__input form__input--2">
                                                        </div>
                                                    </div>
                                                    <div class="form-row mb--30">
                                                        <div class="form__group col-12">
                                                            <label for="billing_state" class="form__label form__label--2">State / County <span class="required">*</span></label>
                                                            <input required="" type="text"value="<?=$billing_details->billing_state;?>" name="billing_state" class="form__input form__input--2">
                                                        </div>
                                                    </div>
                                                    <div class="form-row mb--30">
                                                        <div class="form__group col-12">
                                                            <label for="billing_phone"  class="form__label form__label--2">Phone <span class="required">*</span></label>
                                                            <input type="text" required="" value="<?=$billing_details->billing_phone;?>" name="billing_phone" id="billing_phone" class="form__input form__input--2">
                                                        </div>
                                                    </div>
                                                    <div class="form-row mb--30">
                                                        <div class="form__group col-12">
                                                            <label for="billing_email" class="form__label form__label--2">Email Address  <span class="required">*</span></label>
                                                            <input type="email" value="<?=$billing_details->billing_email;?>"   name="billing_email" id="billing_email" class="form__input form__input--2">
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
                                                </div>
                                            </div>





                                            <div class="col-md-6">
                                                <div class="text-block">

                                                <div class="panel-group">
                                                  <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                      <h4 class="panel-title">
                                                        <a data-toggle="collapse" href="#collapse4">Shipping Address
                                                            <i class="fa fa-chevron-down"></i>
                                                        </a>
                                                      </h4>
                                                    </div>
                                                    <div id="collapse4" class="panel-collapse collapse show">
                                                      <div class="panel-body">
                                                        <form action="<?=domain;?>/user-profile/update_shipping_details" method="post">
                                                        <div class="form-row mb--30">

                                                        <div class="form__group col-md-6 mb-sm--30">
                                                            <label class="form__label form__label--2">First Name  <span class="required">*</span></label>
                                                            <input required="" type="text" name="shipping_firstname" 
                                                            value="<?=$shipping_details->shipping_firstname;?>" id="" class="form__input form__input--2">
                                                        </div>


                                                        <div class="form__group col-md-6 mb-sm--30">
                                                            <label class="form__label form__label--2">Last Name  <span class="required">*</span></label>
                                                            <input required="" type="text" name="shipping_lastname" 
                                                            value="<?=$shipping_details->shipping_lastname;?>" id="" class="form__input form__input--2">
                                                        </div>

                                                    </div>
                                                    <div class="form-row mb--30">
                                                        <div class="form__group col-12">
                                                            <label for="shipping_company" class="form__label form__label--2">Company Name (Optional)</label>
                                                            <input type="text" name="shipping_company"  value="<?=$shipping_details->shipping_company;?>" 
                                                            id="shipping_company" class="form__input form__input--2">
                                                        </div>
                                                    </div>
                                                    <div class="form-row mb--30">
                                                        <div class="form__group col-12">
                                                            <label for="shipping_country" class="form__label form__label--2">Country <span class="required">*</span></label>
                                                            <select id="shipping_country" required="" 
                                                             value="<?=$shipping_details->shipping_country;?>"  name="shipping_country" class="form__input form__input--2 nice-select" style="display: none;">
                                                                <option value="">Select a country…</option>
                                                                <option value="AF">Nigeria</option>
                                                             
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-row mb--30">
                                                        <div class="form__group col-12">
                                                            <label for="shipping_streetAddress" class="form__label form__label--2">Street Address <span class="required">*</span></label>

                                                            <input type="text"  value="<?=$shipping_details->shipping_street_address;?>"  name="shipping_street_address" id="" class="form__input form__input--2 mb--30" placeholder="House number and street name">

                                                            <input type="text" value="<?=$shipping_details->shipping_apartment;?>"  name="shipping_apartment" id="shipping_apartment" class="form__input form__input--2" placeholder="Apartment, suite, unit etc. (optional)">
                                                        </div>
                                                    </div>
                                                    <div class="form-row mb--30">
                                                        <div class="form__group col-12">
                                                            <label for="shipping_city" class="form__label form__label--2">Town / City <span class="required">*</span></label>
                                                            <input type="text" required="" value="<?=$shipping_details->shipping_city;?>" name="shipping_city" id="shipping_city" class="form__input form__input--2">
                                                        </div>
                                                    </div>
                                                    <div class="form-row mb--30">
                                                        <div class="form__group col-12">
                                                            <label for="shipping_state" class="form__label form__label--2">State / County <span class="required">*</span></label>
                                                            <input required="" type="text"value="<?=$shipping_details->shipping_state;?>" name="shipping_state" class="form__input form__input--2">
                                                        </div>
                                                    </div>
                                                    <div class="form-row mb--30">
                                                        <div class="form__group col-12">
                                                            <label for="shipping_phone"  class="form__label form__label--2">Phone <span class="required">*</span></label>
                                                            <input type="text" required="" value="<?=$shipping_details->shipping_phone;?>" name="shipping_phone" id="shipping_phone" class="form__input form__input--2">
                                                        </div>
                                                    </div>
                                                    <div class="form-row mb--30">
                                                        <div class="form__group col-12">
                                                            <label for="shipping_email" class="form__label form__label--2">Email Address  <span class="required">*</span></label>
                                                            <input type="email" value="<?=$shipping_details->shipping_email;?>"   name="shipping_email" id="shipping_email" class="form__input form__input--2">
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
