
        <!-- Mini Cart Start -->
        <aside class="mini-cart" id="miniCart">
            <div class="mini-cart-wrapper">
                <a href="#" class="btn-close"><i class="dl-icon-close"></i></a>
                <div class="mini-cart-inner">
                    <h5 class="mini-cart__heading mb--40 mb-lg--30">Shopping Cart</h5>
                    <div class="mini-cart__content">
                        <ul class="mini-cart__list" style="">
                           

                  <li class="dropdown-menu-header" ng-show="$cart.$items.length==0">
                    <center class="dropdown-header m-0"><span class="grey darken-2">Your Cart is Empty</span>
                    </center>
                  </li>
                            <li ng-repeat="($index, $item) in $cart.$items" class="mini-cart__product">
                                <a  href="javascript:void;" ng-click="$cart.remove_item($item)" class="remove-from-cart remove">
                                    <i class="fa fa-times"></i>
                                </a>
                                <div class="mini-cart__product__image">
                                    <img src="<?=domain;?>/{{$item.images.images[0].main_image}}" 
                                    style="height: 50px;object-fit: cover;" alt="products">
                                </div>
                                <div class="mini-cart__product__content">
                                    <a class="mini-cart__product__title" href="{{$item.url_link}}">{{$item.name}} </a>
                                    <span class="mini-cart__product__quantity">{{$item.qty}} x {{$item.price |  currency:'<?=currency;?>'}}</span>
                                </div>
                            </li>
                           
                        </ul>
                        <div class="mini-cart__total">
                            <span>Subtotal</span>
                            <span class="ammount">  {{$cart.$total |  currency:'<?=currency;?>'}}</span>
                        </div>
                        <div class="mini-cart__buttons" ng-hide="$cart.$items.length==0">
                            <a href="<?=domain;?>/shop/cart" class="btn btn-fullwidth btn-style-1">View Cart</a>
                            <a href="<?=domain;?>/shop/checkout" class="btn btn-fullwidth btn-style-1">Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </aside>
        <!-- Mini Cart End -->