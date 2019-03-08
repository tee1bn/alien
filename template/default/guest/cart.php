
    <?php

    $page_title = "";
    $page_description = "";
    include 'includes/header.php';?>

    
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
                    <div class="row pt--80 pb--80 pt-md--45 pt-sm--25 pb-md--60 pb-sm--40">
                        <div class="col-lg-8 mb-md--30">
                            <form class="cart-form" action="#">
                                <div class="row no-gutters">
                                    <div class="col-12">
                                        <div class="table-content table-responsive">
                                            <table class="table text-center" style="color: black !important;">
                                                <thead>
                                                    <tr>
                                                        <th>&nbsp;</th>
                                                        <th>&nbsp;</th>
                                                        <th class="text-left">Product</th>
                                                        <th>price</th>
                                                        <th>quantity</th>
                                                        <th>total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr  ng-repeat ="($index, $item) in $shop.$cart.$items">
                                                        <td class="product-remove text-left">
                                                            <a href="javascript:void;"  ng-click="$shop.$cart.remove_item($item)" >
                                                                <i class="dl-icon-close"></i>
                                                            </a>
                                                        </td>
                                                        <td class="product-thumbnail text-left">

                                                            <img src="<?=domain;?>/{{$item.images.images[0].main_image}}"  alt="Product Thumnail" style="width: 75px; object-fit: cover;" >
                                                        </td>
                                                        <td class="product-name text-left wide-column" >
                                                            <h3>
                                                                <a href="{{$item.url_link}}" style="text-transform: capitalize;
                                                                color: black;">   {{$item.name}}
                                                                </a>
                                                            </h3>
                                                        </td>
                                                        <td class="product-price">
                                                            <span class="product-price-wrapper">
                                                                <span class="money">{{$item.price |  currency:'<?=currency;?>'}}</span>
                                                            </span>
                                                        </td>
                                                        <td class="product-quantity">
                                                            <div class="quantity">
                                                                <input ng-change="$shop.$cart.update_server();" type="number" class="quantity-input" ng-model="$item.qty" id="qty-4"  min="1">
                                                            </div>
                                                        </td>
                                                        <td class="product-total-price">
                                                            <span class="product-price-wrapper">
                                                                <span class="money">
                                                                    <strong>
                                                                        {{($item.price * $item.qty) |  currency:'<?=currency;?>'}}
                                                                    </strong>
                                                                </span>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>  
                                    </div>
                                </div>
                                <div class="row no-gutters border-top pt--20 mt--20">
                                    <div class="col-sm-6">
                                        <div class="coupon">
                                            <!-- <input type="text" id="coupon" name="coupon" class="cart-form__input" placeholder="Coupon Code"> -->
                                            <!-- <button type="submit" class="cart-form__btn">Apply Coupon</button> -->
                                               <a href="javascript:void;" ng-click="$shop.$cart.empty_cart()"  class="cart-form__btn">Empty Cart</a>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 text-sm-right">
                                        <a href="<?=domain;?>/shop" class="cart-form__btn"> Continue Shopping</a><br>
                                     
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-4">
                            <div class="cart-collaterals">
                                <div class="cart-totals">
                                    <h5 class="mb--15">Cart totals</h5>
                                    <div class="table-content table-responsive">
                                        <table class="table order-table">
                                            <tbody>
                                                <tr>
                                                    <th>Subtotal</th>
                                                    <td>{{($shop.$cart.$total) |  currency:'<?=currency;?>'}} </td>  
                                                </tr>
                                                <tr>
                                                    <th>Shipping</th>
                                                    <td>
                                                        <span>
                                                            {{$shop.$cart.$selected_shipping.location}}
                                                        {{$shop.$cart.$selected_shipping.price |  currency:'<?=currency;?>'}}
                                                     </span>
                                                     <!-- <br>{{$shop.$cart.$shipping_details}} -->

                                                        <div class="shipping-calculator-wrap">
                                                            <a href="#shipping_calculator" class="expand-btn">Calculate Shipping</a>
                                                            <form id="shipping_calculator" class="form shipping-calculator-form hide-in-default">
                                                                <div class="form__group mb--10">
                                                                    <select id="" ng-model="selected_shipping" class="nice-selec">
                                                                    <option value="">Select </option>
                                                                    <option ng-repeat="($index ,$shipping) in $shop.$cart.$shipping_details" style="text-transform: capitalize;" value="{{$shipping.location}}">
                                                                        {{$shipping.location}}

                                                                        {{$shipping.price |  currency:'<?=currency;?>'}}
                                                                    </option>
                                                                    </select>
                                                                </div>
                                                               <!-- 
                                                                <div class="form__group mb--10">
                                                                    <select id="calc_shipping_district" name="calc_shipping_district" class="nice-select">
                                                                        <option value="">Select a District…</option>
                                                                        <option>TANGAIL</option>
                                                                    </select>
                                                                </div>

                                                                <div class="form__group mb--10">
                                                                    <input type="text" name="calc_shipping_city" id="calc_shipping_city" placeholder="Town / City">
                                                                </div>

                                                                <div class="form__group mb--10">
                                                                    <input type="text" name="calc_shipping_zip" id="calc_shipping_zip" placeholder="Postcode / Zip">
                                                                </div> -->

                                                              
                                                                  <div class="form__group">
                                                                <input ng-click="$shop.$cart.set_shipping_cost(selected_shipping)" type="submit" value="Update Totals">
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </td>  
                                                </tr>
                                                <tr class="order-total">
                                                    <th>Total</th>
                                                    <td>
                                                        <span class="product-price-wrapper">
                                                            <span class="money">

                                                                {{($shop.$cart.$overall_total ) |  currency:'<?=currency;?>'}}</span>
                                                        </span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <a href="<?=domain;?>/shop/checkout" class="btn btn-fullwidth btn-style-1">
                                    Proceed To Checkout
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Content Wrapper Start -->


      
    <?php    include 'includes/footer.php';?>