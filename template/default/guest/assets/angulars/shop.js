
	function Cart(){
		this.$items = [];
		this.$total  = 0;		//total of items selected
		this.$coupon = [];
		this.$shipping_details = [];
		this.$selected_shipping ;
		
		this.retrieve_shipping_settings = function () {

			var $this = this;
			 $.ajax({
	            type: "POST",
	            url: $base_url+'/shop/retrieve_shipping_settings/',
	            cache: false,
	            data: null,
	            success: function(data) {
	            	$this.$shipping_details = data;
					$this.set_shipping_cost('default');

	            },
	            error: function (data) {
	                 //alert("fail"+data);
	            }
	        });
		}
		this.retrieve_shipping_settings();

		this.set_shipping_cost  = function ($location) {

			for(x in this.$shipping_details){
				var	$shipping = this.$shipping_details[x];
				if ($shipping.location == $location) {
					this.$selected_shipping = $shipping;
				}

			}
			console.log(this.$shipping_details);
		}



		this.contains_object =  function(obj, list) {
			    var i;
			    for (i = 0; i < list.length; i++) {
			        if ((list[i] === obj ) || (list[i]['id'] == obj.id)) {
			            return true;
			        }

	    		}
    			return false;
		}


			this.add_item = function($item){

				//ensure item is not added in cart more than once
				if (this.contains_object($item, this.$items)) {
					window.show_notification('<b>'+$item.name+'</b><br> Already in Cart <br><small>You can increase the qty at "View Cart"</small> !');
					return ;
				}
				$item.qty = 1;
				this.$items.push($item);

				this.update_server();
				window.show_notification('<b>'+$item.name+'</b><br> Added to cart successfully!');
			}

			this.remove_item = function($item){
	
				var i;
			    for (i = 0; i < this.$items.length; i++) {
			        if (this.$items[i] === $item) {
			        	this.$items.splice(i, 1);

						this.update_server();
			            return true;
			        }
	    		}
	    			return false;
			}

			this.place_order = function () {
				// console.log("great");

                    
                    $form = new FormData ();
                    $form.append('cart', JSON.stringify(this) );
                
                 $.ajax({
                    type: "POST",
                    url: $base_url+"/shop/place_order",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: $form,
                    success: function(data) {
                      console.log(data);


                      window.notify();
                    },
                    error: function (data) {
                         //alert("fail"+data);
                    }

                   });
                             
			}

			this.empty_cart =  function () {
					this.$items = [];
					this.update_server();

					}

			this.calculate_total = function (){

					$total = 0;

					for(x in this.$items){
						$qty = (this.$items[x].qty != null) ? this.$items[x].qty : 1;
						$total = $total + (parseInt(this.$items[x].price) * parseInt(this.$items[x].qty) );
					}


					 this.$total = $total;
			}
			


			this.update_server = function () {

				this.calculate_total();

				$scope = angular.element($('#header-mini-cart')).scope();
				$scope.$cart = this;
			
				$form = new FormData ();
				for(x in this.$items){
					$item = this.$items[x];
					$form.append('items[]', JSON.stringify($item));
					};
		
		 $.ajax({
            type: "POST",
            url: $base_url+"/shop/update_cart",
            cache: false,
            contentType: false,
            processData: false,
            data: $form,
            success: function(data) {
              // console.log(data);
              // $scope.fetch_page_content();
              window.notify();
            },
            error: function (data) {
                 //alert("fail"+data);
            }

           });


			}

			this.prepare_shipping_address =  function ($different_shipping_choice){
				console.log($different_shipping_choice.target.checked);
				  if ($different_shipping_choice.target.checked) {
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
                            // this.$buyer_detail.shippind.shippind_email = this.$buyer_detail.billing.billing_email ;
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

                        $scope = angular.element($("#shipping_email")).scope();
                        $scope.$apply();



                                                    }
                                                
			};

	}


	function Shop($items=null) {
		this.$items = [];
		this.$items_page = 1;

		/**
		 * [$no_more_product true if there is 
		 * more products to fetch from db and false if other wise.
		 * mainly for pagination]
		 * @type {Boolean}
		 */
		this.$no_more_product = false;   
		this.$cart = new Cart();
		this.$quickview ;


		this.add_item = function($new_items= []){
				for(x in $new_items){
				var $new_item = $new_items[x];
				this.$items.push($new_item);
				}

		}
		
			// this.add_item($items);

		

		this.quickview = function ($item) {
					this.$quickview = $item;
					$('#productModal').modal('show');			
			}

		this.fetch_products = function () {

				$this= this;
				$category = null;
			 $.ajax({
	            type: "POST",
	            url: $base_url+'/shop/fetch_products/'+$this.$items_page+'/'+$category,
	            cache: false,
	            data: null,
	            success: function(data) {

	              		if (data.length==0) {
	              			$this.$no_more_product = true;
	              			return;
	              		}



	              	$this.add_item(data);
	              	$this.$items_page++;
	              	$this.retrieve_cart_in_session();
	              	$this.update_angular_scope();
				
		              console.log(data);
		              console.log($this);
									
			
	            },
	            error: function (data) {
	                 //alert("fail"+data);
	            }

	           });
			}

					this.fetch_products();


		this.retrieve_cart_in_session = function () {

			$this = this;
			 $.ajax({
	            type: "POST",
	            url: $base_url+'/shop/retrieve_cart_in_session/',
	            cache: false,
	            data: null,
	            success: function(data) {


				    // console.log(data);
				    	 for(x in data){
				    	var $item = data[x];
				    	$this.$cart.$items.push($item);
				    }
				    	$this.$cart.update_server();
				    	$this.update_angular_scope();

				
	            },
	            error: function (data) {
	                 //alert("fail"+data);
	            }

	           });
			}

	
			this.update_angular_scope = function () {
					$scope = angular.element($('#content')).scope().$apply();
					$scope = angular.element($('#header-mini-cart')).scope().$apply();
			}




	}




	app.controller('CartNotificationController', function($scope, $http) {

		$scope.no_in_cart="6453";
		$scope.$cart = [];
	});





	app.controller('ShopController', function($scope, $http) {

		$scope.$shop = [];
		$scope.$name = 'jinl';




	$scope.fetch_page_content = function () {
			$page = 1;
			
			$category = $category_id = 0;
		    $scope.$shop = new Shop();


		    return;


			$http.get($base_url+'/shop/fetch_products/'+$page+'/'+$category)
			    .then(function(response) {

				    // console.log(response.data);
				    $scope.$shop = new Shop(response.data);

				    // console.log($scope.$shop);


			$http.get($base_url+'/shop/retrieve_cart_in_session/')
			    .then(function(response) {

				    // console.log(response.data);
				    	 for(x in response.data){
				    	var $item = response.data[x];
				    	$scope.$shop.$cart.$items.push($item);
				    }
				    	$scope.$shop.$cart.update_server();

				    			          });
				    			        });
	} 

$scope.fetch_page_content();
});
