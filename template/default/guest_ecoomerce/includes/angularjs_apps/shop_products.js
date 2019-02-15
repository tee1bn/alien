
//submitting completed order form
$(document).ready(function(){
 $("body").on("submit", "#billing_and_order_details_form", function (e) {
  e.preventDefault();

	$datastring = $('#billing_and_order_details_form').serialize();
	console.log($('#billing_and_order_details_form'));


  $.ajax({

            type: "POST",
            url: $base_url+"/products_api/place_order/",
            data: $datastring,
            cache: false,
            success: function(data) {
            	  window.location.assign($base_url+'/shop');
            },
            error: function (data) {
                 //alert("fail"+data);
            },



        });

});
});

var app = angular.module('Shop', []);


app.controller('productsDisplayController', function($scope, $http) {
    $scope.$categories 	= [];
    $scope.$products 	= [];
    $scope.$product_in_quick_view = [];
    $scope.$products_page 	= 1;
    $scope.$cart = [];

    $scope.$number_of_items_in_cart = document.getElementsByClassName('item-counter');
    			$scope.$no_more_content = false;



    $scope.$current_tab = 'review_cart';



$scope.update_search_filter = function ($filter) {

		$scope.searchText = $filter;
	}


$scope.update_item_counter =  function (){
	for(i in $scope.$number_of_items_in_cart){
		var $element = $scope.$number_of_items_in_cart[i];
		$element.innerHTML =  $scope.$cart.length;
	}


};



$scope.remove_from_cart  = function ($product_id) {
$index = $scope.product_is_in_cart($product_id);
	// alert($index +' '+ $product_id );

	$scope.$cart.splice($index, 1);
$scope.update_item_counter();


}




$scope.set_current_tab  = function ($tab) {

	    $scope.$current_tab = $tab;

};




$scope.increase_qty  = function ($product_id) {

	$index=  $scope.product_is_in_cart($product_id) ;
	$item 	=	$scope.$cart[$index];

	$scope.$cart[$index].qty++;

		$item.price = $item.qty * $item.product.price;

	}

$scope.decrease_qty  = function ($product_id) {

	$index	=  	$scope.product_is_in_cart($product_id) ;
	$item 	=	$scope.$cart[$index];

	if ($item.qty < 2) {
		$item.qty=1;
		return;
	}
	$scope.$cart[$index].qty--;
	$item.price = $item.qty * $item.product.price;


	}





$scope.empty_cart  = function () {



$http.get($base_url+'/products_api/empty_cart_in_session/')
    .then(function(response) {

	    $scope.$cart = [];
	   	$scope.update_item_counter();
          });


	   
}


$scope.fetch_cart_in_session  = function () {


     $http.get($base_url+'/products_api/fetch_cart_in_session/')
    .then(function(response) {

	        	    $scope.$cart = response.data;
	        	        console.log(response.data);

	$scope.update_item_counter();
          });

}

$scope.fetch_cart_in_session();

$scope.get_total_price_in_cart  = function () {

		var	$subtotals = [];
		for (var i = 0; i < $scope.$cart.length; i++) {
  			$item =	$scope.$cart[i];
  			$scope.$cart.price = $item.qty * $item.product.price ;

  			$subtotals.push($scope.$cart.price);
		}

		var $total = 0;

		for (var i = 0; i < $subtotals.length; i++) {
			$total += $subtotals[i];
		}

		$scope.$total_price_in_cart = $total;

		 $scope.$cart.$total_price_in_cart;
		return $total;

};

$scope.checkout  = function () {

            window.location.assign($base_url+'/shop/shopping-cart');
}


$scope.update_server_with_cart = function () {

	form_data = new FormData();

	form_data.append('shopping_cart', JSON.stringify($scope.$cart));

      $.ajax({
           type: "POST",
           url: $base_url+"/products_api/store_cart_in_session",
           data: form_data , // serializes the form's elements.
           contentType: false,
           cache:false,
           processData:false,
           success: function(data)
           {
            console.log(data);
           }
         });
										


										}


$scope.add_to_cart = function ($index, $product_id, $qty) {

	//ensure item is not added mre than once
	if ($scope.product_is_in_cart($product_id) !== false) {
		show_notification('Item already in cart, you can increase quantity at checkout.');
		return ;}

$fixed_index = 	$scope.get_product_index($product_id);

	$product = {};
	$product.product = $scope.$products[$fixed_index];
	$product.qty     = $qty;
	$product.price     = ($qty *  $product.product.price);
	
	$scope.$cart.push($product);

	$scope.update_item_counter();
    console.log($scope.$cart);

// $scope.get_total_price_in_cart();
$scope.update_server_with_cart();

			};

	$scope.get_product_index = function ($product_id) {
					for (var i = 0; i < $scope.$products.length; i++) {
					 $product =	$scope.$products[i];


					 if ($product.id == $product_id) {
					 // alert('peoduc_id '+$product_id+'  index '+i);
					 	return i ;
					 }
					}

					return false ;
			}

	$scope.product_is_in_cart = function ($product_id) {
					for (var i = 0; i < $scope.$cart.length; i++) {
					 $product =	$scope.$cart[i];


					 if ($product.product.id == $product_id) {
					 // alert('peoduc_id '+$product_id+'  index '+i);
					 	return i ;
					 }
					}

					return false ;
			}

$scope.set_in_quick_view = function ($index, $product_id) {
	// alert($product_id);
	$fixed_index = $scope.get_product_index($product_id);


    $scope.$product_in_quick_view =   $scope.$products[$fixed_index] ;
    $scope.$product_in_quick_view.qty =   1 ;
    $scope.$product_in_quick_view.$fixed_index =  $fixed_index ;

    // console.log( $scope.$product_in_quick_view );
    $('#myModal').modal();

}




$scope.fetch_products = function () {
     $http.get($base_url+'/products_api/products_onsale/'+$scope.$products_page)
    .then(function(response) {

    		if ($scope.$no_more_content == true) {return;}
    		if (response.data.length == 0) {
    			$scope.$no_more_content = true;
    			return;
    		}


	        for (var i in response.data) {
	        	    $scope.$products.push(response.data[i]);
	        }
	        // console.log(response);

            $scope.$products_page++;
          });
}
$scope.fetch_products();


$scope.fetch_categories = function () {
     $http.get($base_url+'/categories_api/all_categories/')
    .then(function(response) {

	        for (var i = 0; i < response.data.length; i++) {
	        	    $scope.$categories.push(response.data[i]);
	        }
	        // console.log(response.data);

          });
}
$scope.fetch_categories();



});

