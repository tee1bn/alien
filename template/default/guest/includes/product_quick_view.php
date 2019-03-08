
        <!-- Modal Start -->
        <div class="modal fade product-modal" id="productModal" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-body">
                <button type="button" class="close custom-close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true"><i class="dl-icon-close"></i></span>
                </button>
                <div class="row">
                    <div class="col-md-6">
                        <div class="<?=project_name;?>-element-carousel product-image-carousel nav-vertical-center nav-style-1"
                                data-slick-options='{
                                    "slidesToShow": 1,
                                    "slidesToScroll": 1,
                                    "arrows": true,
                                    "prevArrow": "dl-icon-left",
                                    "nextArrow": "dl-icon-right"
                                }'
                        >
                            <div   class="product-image">
                                <div class="product-image--holder">
                                    <a href="{{$shop.$quickview.url_link}}">
                                        <img src="<?=domain;?>/{{$shop.$quickview.images.images[0].main_image}}" alt="Product Image" class="primary-image" style="height: 600px;width: 100%;">
                                    </a>
                                </div>
                                <!-- <span class="product-badge sale" ng-if="$shop.$quickview.ribbon">{{$shop.$quickview.ribbon}}</span> -->
                                 <span class="product-badge new" ng-if="$shop.$quickview.old_price">-{{$shop.$quickview.percentdiscount}}%</span>  
                            </div>
                      
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="modal-box product-summary">
                            <div class="product-navigation mb--10">
                                <a href="#" class="prev"><i class="dl-icon-left"></i></a>
                                <a href="#" class="next"><i class="dl-icon-right"></i></a>
                            </div>
                            <h3 class="product-title mb--15"  >{{$shop.$quickview.name}}</h3>
                            <span class="product-price-wrapper mb--20">
                                <span class="money"   > {{$shop.$quickview.price |  currency:'<?=currency;?>'}}</span>
                                <span class="product-price-old">
                                    <span class="money"  >{{$shop.$quickview.old_price |  currency:'<?=currency;?>'}}</span>
                                </span>
                            </span>
                            <p class="product-short-description mb--25 mb-md--20">{{$shop.$quickview.quickdescription}}</p>
                            <div class="product-action d-flex flex-row align-items-center mb--30 mb-md--20">
                              <!--   <div class="quantity">
                                    <input type="number" class="quantity-input" name="qty" id="quick-qty" value="1" min="1">
                                </div> -->
                                <button ng-click="$shop.$cart.add_item($shop.$quickview)"  type="button" class="btn btn-style-1 btn-semi-large add-to-cart"  >
                                    Add To Cart
                                </button>
                                <!-- <a href="wishlist.html"><i class="dl-icon-heart2"></i></a> -->
                            </div>  
                          <!--   <div class="product-extra mb--30 mb-md--20">
                                <a href="#" class="font-size-12"><i class="fa fa-map-marker"></i>Find store near you</a>
                                <a href="#" class="font-size-12"><i class="fa fa-exchange"></i>Delivery and return</a>
                            </div> -->
                            <div class="product-summary-footer d-flex justify-content-between flex-sm-row flex-column flex-sm-row flex-column">
                                <div class="product-meta">
                                    <!-- <span class="sku_wrapper font-size-12">SKU: <span class="sku">REF. LA-887</span></span> -->
                                    <span class="posted_in font-size-12"  >Categories: <a href="" rel="tag" style="text-transform: capitalize;"  >{{$shop.$quickview.category.category}}</a></span>
                                </div>
                                <!-- 
                                <div class="product-share-box">
                                    <span class="font-size-12">Share With</span>
                                    <ul class="social social-small">
                                        <li class="social__item">
                                            <a href="facebook.com" class="social__link">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li class="social__item">
                                            <a href="twitter.com" class="social__link">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="social__item">
                                            <a href="plus.google.com" class="social__link">
                                                <i class="fa fa-google-plus"></i>
                                            </a>
                                        </li>
                                        <li class="social__item">
                                            <a href="plus.google.com" class="social__link">
                                                <i class="fa fa-pinterest-p"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Modal End -->
