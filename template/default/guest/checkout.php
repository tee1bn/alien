
    <?php

    $page_title = "Checkout ";
    $page_description = "";


    $billing_details = $this->auth()->billing_details;
    $shipping_details = $this->auth()->shipping_details;

    include 'includes/header.php';?>
      <script src="https://js.paystack.co/v1/inline.js"></script>





        <!-- Breadcrumb area Start -->

        <div class="breadcrumb-area bg--white-6 breadcrumb-bg-1 pt--60 pb--70 pt-lg--40 pb-lg--50 pt-md--30 pb-md--40">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 text-center">
                        <h1 class="page-title">Cart</h1>
                        <ul class="breadcrumb justify-content-center">
                            <li><a href="<?=domain;?>">Home</a></li>
                            <li class="current"><span>Cart</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Breadcrumb area End -->

        <!-- Main Content Wrapper Start -->
        <div id="content" ng-controller="ShopController"  class="main-content-wrapper">
            <div class="page-content-inner">
                <div class="container">
                    <div class="row pt--80 pt-md--60 pt-sm--40">
                        <div class="col-12">
                            <!-- User Action Start -->
                            <div class="user-actions user-actions__coupon">
                                <!-- <div class="message-box mb--30 mb-sm--20">
                                    <p><i class="fa fa-exclamation-circle"></i> Have A Coupon? <a class="expand-btn" href="#coupon_info">Click Here To Enter Your Code.</a></p>
                                </div> -->
                                <div id="coupon_info" class="user-actions__form hide-in-default">
                                    <form action="#" class="form">
                                        <p>If you have a coupon code, please apply it below.</p>
                                        <div class="form__group d-sm-flex">
                                            <input type="text" name="coupon" id="coupon" class="form__input form__input--2 mr--20 mr-xs--0" placeholder="Coupon Code">
                                            <button type="submit" class="btn btn-medium btn-style-1">Apply Coupon</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- User Action End -->
                        </div>
                    </div> 
                    <div class="row pb--80 pb-md--60 pb-sm--40">
                        <!-- Checkout Area Start -->  
                        <div class="col-lg-6">
                            <div class="checkout-title mt--10">
                                <h2>Billing Details</h2>
                            </div>
                            <div class="checkout-form">
                                <form action="#" class="form form--checkout">
                                    <div class="form-row mb--30">
                                        <div class="form__group col-md-6 mb-sm--30">
                                            <label for="billing_fname" class="form__label form__label--2">First Name 
                                             <span class="required">*</span></label>
                                            <input type="text" required="" 
                                            ng-model="$shop.$cart.$buyer_detail.billing.billing_firstname"
                                            ng-init="$shop.$cart.$buyer_detail.billing.billing_firstname='<?=$billing_details->billing_firstname;?>'"

                                             id="billing_firstname" class="form__input form__input--2">
                                        </div>
                                        <div class="form__group col-md-6">
                                            <label for="billing_lname" class="form__label form__label--2">Last Name  <span class="required">*</span></label>
                                            <input type="text" required=""
                                             ng-model="$shop.$cart.$buyer_detail.billing.billing_lastname" 
                                            ng-init="$shop.$cart.$buyer_detail.billing.billing_lastname='<?=$billing_details->billing_lastname;?>'"

                                             id="billing_lastname" class="form__input form__input--2">
                                        </div>
                                    </div>
                                    <div class="form-row mb--30">
                                        <div class="form__group col-12">
                                            <label for="billing_company" class="form__label form__label--2">Company Name (Optional)</label>
                                            <input type="text" 
                                            ng-model="$shop.$cart.$buyer_detail.billing.billing_company" 
                                            ng-init="$shop.$cart.$buyer_detail.billing.billing_company='<?=$billing_details->billing_company;?>'"
                                            id="billing_company" class="form__input form__input--2">
                                        </div>
                                    </div>
                                    <div class="form-row mb--30">
                                        <div class="form__group col-12">
                                            <label for="billing_country" class="form__label form__label--2">Country <span class="required">*</span></label>
                                            <select id="billing_country" required="" 
                                            ng-model="$shop.$cart.$buyer_detail.billing.billing_country"
                                            ng-init="$shop.$cart.$buyer_detail.billing.billing_country='<?=$billing_details->billing_country;?>'"
                                             class="form__input form__input--2 nice-select">
                                                <option value="">Select a country…</option>
                                                <option value="Nigeria">Nigeria</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row mb--30">
                                        <div class="form__group col-12">
                                            <label for="billing_streetAddress" class="form__label form__label--2">Street Address <span class="required">*</span></label>

                                            <input type="text"
                                             ng-model="$shop.$cart.$buyer_detail.billing.billing_street_address"
                                            ng-init="$shop.$cart.$buyer_detail.billing.billing_street_address='<?=$billing_details->billing_street_address;?>'"
                                              id="billing_streetAddress" class="form__input form__input--2 mb--30" placeholder="House number and street name">

                                            <input type="text" 
                                            ng-model="$shop.$cart.$buyer_detail.billing.billing_apartment" 
                                            ng-init="$shop.$cart.$buyer_detail.billing.billing_apartment='<?=$billing_details->billing_apartment;?>'"
                                            id="billing_apartment" class="form__input form__input--2" placeholder="Apartment, suite, unit etc. (optional)">
                                        </div>
                                    </div>
                                    <div class="form-row mb--30">
                                        <div class="form__group col-12">
                                            <label for="billing_city" class="form__label form__label--2">Town / City <span class="required">*</span></label>
                                            <input type="text" 
                                            ng-model="$shop.$cart.$buyer_detail.billing.billing_city"
                                            ng-init="$shop.$cart.$buyer_detail.billing.billing_city='<?=$billing_details->billing_city;?>'"
                                             id="billing_city" class="form__input form__input--2">
                                        </div>
                                    </div>
                                    <div class="form-row mb--30">
                                        <div class="form__group col-12">
                                            <label for="billing_state" class="form__label form__label--2">State / County <span class="required">*</span></label>
                                            <input type="text" 
                                            ng-model="$shop.$cart.$buyer_detail.billing.billing_state" 
                                            ng-init="$shop.$cart.$buyer_detail.billing.billing_state='<?=$billing_details->billing_state;?>'"
                                            id="billing_state" class="form__input form__input--2">
                                        </div>
                                    </div>
                                    <div class="form-row mb--30">
                                        <div class="form__group col-12">
                                            <label for="billing_phone" class="form__label form__label--2">Phone <span class="required">*</span></label>
                                            <input type="text"
                                             ng-model="$shop.$cart.$buyer_detail.billing.billing_phone" 
                                            ng-init="$shop.$cart.$buyer_detail.billing.billing_phone='<?=$billing_details->billing_phone;?>'"
                                             id="billing_phone" class="form__input form__input--2">
                                        </div>
                                    </div>
                                    <div class="form-row mb--30">
                                        <div class="form__group col-12">
                                            <label for="billing_email" class="form__label form__label--2">Email Address  <span class="required">*</span></label>
                                            <input type="email"
                                             ng-model="$shop.$cart.$buyer_detail.billing.billing_email" 
                                            ng-init="$shop.$cart.$buyer_detail.billing.billing_email='<?=$billing_details->billing_email;?>'"
                                             id="billing_email" class="form__input form__input--2">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form__group col-12">
                                            <div class="custom-checkbox mb--20">
                                                <input type="checkbox" ng-click="$shop.$cart.prepare_shipping_address($event)"  name="shipdifferetads" id="shipdifferetads" class="form__checkbox">
                                                
                                                <label for="shipdifferetads"  class="form__label form__label--2 shipping-label">Ship To A Different Address?</label>
                                            </div>

                                            <script>
                                                prepare_shipping_address = function ($different_shipping_choice){
                                                    if ($different_shipping_choice.checked) {
                                                        console.log('sdiif addreaa');
                                                     /*   $("#shipping_firstname").val("");
                                                        $("#shipping_lastname").val("");
                                                        $("#shipping_company").val("");
                                                        $("#shipping_country").val("");
                                                        $("#shipping_street_address").val("");
                                                        $("#shipping_apartment").val("");
                                                        $("#shipping_city").val("");
                                                        $("#shipping_state").val("");
                                                        $("#shipping_phone").val("");
                                                        $("#shipping_email").val("");
*/
                                                    }else{
                                                        console.log('not diff addreaa');

                                                        $("#shipping_firstname").val($("#billing_firstname").val());
                                                        $("#shipping_lastname").val($("#billing_lastname").val());
                                                       
                                                       $("#shipping_company").val("okok");
                                                       //  $("#shipping_country").val("");
                                                       //  $("#shipping_street_address").val("");
                                                       //  $("#shipping_apartment").val("");
                                                       //  $("#shipping_city").val("");
                                                       //  $("#shipping_state").val("");
                                                       //  $("#shipping_phone").val("");
                                                       //  $("#shipping_email").val("");

                                                    // $scope = angular.element($("#shipping_email")).scope();



                                                    }
                                                }
                                                
                                            </script>




                                            <div class="ship-box-info hide-in-default mt--30">
                                                <div class="form-row mb--30">
                                                    <div class="form__group col-md-6 mb-sm--30">
                                                        <label for="shipping_firstname" class="form__label form__label--2">First Name  <span class="required">*</span></label>
                                                        <input type="text" 
                                                        ng-model="$shop.$cart.$buyer_detail.shipping.shipping_firstname" 
                                            ng-init="$shop.$cart.$buyer_detail.shipping.shipping_firstname='<?=$shipping_details->shipping_firstname;?>'"
                                                         id="shipping_firstname" class="form__input form__input--2">
                                                    </div>
                                                    <div class="form__group col-md-6">
                                                        <label for="shipping_lname" class="form__label form__label--2">Last Name  <span class="required">*</span></label>
                                                        <input type="text"
                                                         ng-model="$shop.$cart.$buyer_detail.shipping.shipping_lastname" 
                                            ng-init="$shop.$cart.$buyer_detail.shipping.shipping_lastname='<?=$shipping_details->shipping_lastname;?>'"
                                                         id="shipping_lastname" class="form__input form__input--2">
                                                    </div>
                                                </div>
                                                <div class="form-row mb--30">
                                                    <div class="form__group col-12">
                                                        <label for="shipping_company" class="form__label form__label--2">Company Name (Optional)</label>
                                                        <input type="text"  
                                                        ng-model="$shop.$cart.$buyer_detail.shipping.shipping_company"
                                            ng-init="$shop.$cart.$buyer_detail.shipping.shipping_company='<?=$shipping_details->shipping_company;?>'"

                                                         id="shipping_company" class="form__input form__input--2">
                                                    </div>
                                                </div>
                                                <div class="form-row mb--30">
                                                    <div class="form__group col-12">
                                                        <label for="shipping_country" class="form__label form__label--2">Country <span class="required">*</span></label>
                                                        <select id="shipping_country"
                                                          ng-model="$shop.$cart.$buyer_detail.shipping.shipping_country" 
                                                        ng-init="$shop.$cart.$buyer_detail.shipping.shipping_country='<?=$shipping_details->shipping_country;?>'"
                                                          class="form__input form__input--2 nice-select">
                                                            <option value="">Select a country…</option>
                                                            <option value="Nigeria">Nigeria</option>    
                                                     
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-row mb--30">
                                                    <div class="form__group col-12">
                                                        <label for="shipping_street_address" class="form__label form__label--2">Street Address <span class="required">*</span></label>

                                                        <input type="text" 
                                                         ng-model="$shop.$cart.$buyer_detail.shipping.shipping_street_address" 
                                                        ng-init="$shop.$cart.$buyer_detail.shipping.shipping_street_address='<?=$shipping_details->shipping_street_address;?>'"
                                                        id="shipping_street_address" class="form__input form__input--2 mb--30" placeholder="House number and street name">

                                                        <input type="text"  
                                                        ng-model="$shop.$cart.$buyer_detail.shipping.shipping_apartment" 
                                                        ng-init="$shop.$cart.$buyer_detail.shipping.shipping_apartment='<?=$shipping_details->shipping_apartment;?>'"

                                                        id="shipping_apartment" class="form__input form__input--2" placeholder="Apartment, suite, unit etc. (optional)">
                                                    </div>
                                                </div>
                                                <div class="form-row mb--30">
                                                    <div class="form__group col-12">
                                                        <label for="shipping_city" class="form__label form__label--2">Town / City <span class="required">*</span></label>
                                                        <input type="text" 
                                                        ng-model="$shop.$cart.$buyer_detail.shipping.shipping_city" 
                                                        ng-init="$shop.$cart.$buyer_detail.shipping.shipping_city='<?=$shipping_details->shipping_city;?>'"
                                                        id="shipping_city" class="form__input form__input--2">
                                                    </div>
                                                </div>
                                                <div class="form-row mb--30">
                                                    <div class="form__group col-12">
                                                        <label for="shipping_state" class="form__label form__label--2">State / County <span class="required">*</span></label>
                                                        <input type="text"
                                                          ng-model="$shop.$cart.$buyer_detail.shipping.shipping_state" 
                                                        ng-init="$shop.$cart.$buyer_detail.shipping.shipping_state='<?=$shipping_details->shipping_state;?>'"
                                                          id="shipping_state" class="form__input form__input--2">
                                                    </div>
                                                </div>
                                                <div class="form-row mb--30">
                                                    <div class="form__group col-12">
                                                        <label for="shipping_phone" class="form__label form__label--2">Phone <span class="required">*</span></label>
                                                        <input type="text" 
                                                        ng-model="$shop.$cart.$buyer_detail.shipping.shipping_phone"
                                                        ng-init="$shop.$cart.$buyer_detail.shipping.shipping_phone='<?=$shipping_details->shipping_phone;?>'"
                                                         id="shipping_phone" class="form__input form__input--2">
                                                    </div>
                                                </div>
                                                <div class="form-row mb--30">
                                                    <div class="form__group col-12">
                                                        <label for="shipping_email" class="form__label form__label--2">Email Address  <span class="required">*</span></label>
                                                        <input type="email" 
                                                         ng-model="$shop.$cart.$buyer_detail.shipping.shipping_email"
                                                        ng-init="$shop.$cart.$buyer_detail.shipping.shipping_email='<?=$shipping_details->shipping_email;?>'"
                                                         id="shipping_email" class="form__input form__input--2">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="form-row">
                                        <div class="form__group col-12">
                                            <label for="orderNotes" class="form__label form__label--2">Order Notes</label>
                                            <textarea class="form__input form__input--2 form__input--textarea" id="orderNotes"  ng-model="$shop.$cart.$buyer_detail.billing.order_notes"
                                            placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-xl-5 offset-xl-1 col-lg-6 mt-md--40">
                            <div class="order-details">
                                <div class="checkout-title mt--10">
                                    <h2>Your Order</h2>
                                </div>
                                <div class="table-content table-responsive mb--30">
                                    <table class="table order-table order-table-2">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th class="text-right">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                       
                                            <tr  ng-repeat ="($index, $item) in $shop.$cart.$items">
                                                <th> {{$item.name}} 
                                                    <strong><span>&#10005;</span>{{$item.qty}}</strong>
                                                </th>
                                                <td class="text-right">{{($item.price * $item.qty) |  currency:'<?=currency;?>'}}</td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr class="cart-subtotal">
                                                <th>Subtotal</th>
                                                <td class="text-right">{{($shop.$cart.$total) |  currency:'<?=currency;?>'}} </td>
                                            </tr>
                                            <tr class="shipping">

                                                <th>Shipping</th>
                                                <td class="text-right">

                                                    <span>
                                                        {{$shop.$cart.$selected_shipping.price |  currency:'<?=currency;?>'}}

                                                     </span><br>
                                                      {{$shop.$cart.$selected_shipping.location}}

                                                </td>
                                            </tr>
                                            <tr class="order-total">
                                                <th>Order Total</th>
                                                <td class="text-right"><span class="order-total-ammount">
                                            {{$shop.$cart.$overall_total |  currency:'<?=currency;?>'}}
                                                </span></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="checkout-payment">
                                    <form action="#" class="payment-form">
<!--                                         <div class="payment-group mb--10">
                                            <div class="payment-radio">
                                                <input type="radio" value="bank" name="payment-method" id="bank" checked>
                                                <label class="payment-label" for="cheque">Direct Bank Transfer</label>
                                            </div>
                                            <div class="payment-info" data-method="bank">
                                                <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.</p>
                                            </div>
                                        </div>
                                        <div class="payment-group mb--10">
                                            <div class="payment-radio">
                                                <input type="radio" value="cheque" name="payment-method" id="cheque">
                                                <label class="payment-label" for="cheque">
                                                    cheque payments
                                                </label>
                                            </div>
                                            <div class="payment-info cheque hide-in-default" data-method="cheque">
                                                <p>Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                            </div>
                                        </div>
                                        <div class="payment-group mb--10">
                                            <div class="payment-radio">
                                                <input type="radio" value="cash" name="payment-method" id="cash">
                                                <label class="payment-label" for="cash">
                                                    CASH ON DELIVERY
                                                </label>
                                            </div>
                                            <div class="payment-info cash hide-in-default" data-method="cash">
                                                <p>Pay with cash upon delivery.</p>
                                            </div>
                                        </div>
 -->                                        <div class="payment-group mt--20">
                                            <p class="mb--15">Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our privacy policy.</p>
                                            <button type="button" ng-click="$shop.$cart.place_order()"  class="btn btn-fullwidth btn-style-1">Pay Now</button>

                                        </div>
                                                                

                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Checkout Area End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Content Wrapper Start -->

    <?php
    include 'includes/footer.php';?>