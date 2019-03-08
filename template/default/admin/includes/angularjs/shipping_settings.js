
var app = angular.module('AdminShipping', []);


app.controller('ShippingSettingsController', function($scope, $http) {

	$scope.here = 'okkkk';
	$scope.$page_cms = [];

  $scope.location = '';
  $scope.handle = '';

  $scope.delete_shipping = function($index) {

    $scope.$page_cms.splice($index, 1);
    $scope.update_page_cms();
  }

  $scope.create_shipping = function () {

    $scope.$page_cms.unshift({
      'location': $scope.location,
      'price': $scope.price
    });
  }


  $scope.update_page_cms = function () {
    
 $content = (JSON.stringify($scope.$page_cms));

   var $form = new FormData();
    $form.append('content', $content);

   
    $.ajax({
            type: "POST",
            url: $base_url+"/cms_api/update_page_cms/shipping_details",
           cache: false,
            contentType: false,
            processData: false,
            data: $form,
            success: function(data) {
              console.log(data);
              // $scope.fetch_page_content();
              window.notify();
            },
            error: function (data) {
                 //alert("fail"+data);
            }


        });

    }

  $scope.fetch_page_content = function () {

      $http.get($base_url+'/cms_api/fetch_page_content/shipping_details')
          .then(function(response) {

            $scope.$page_cms = response.data;
            console.log($scope.$page_cms);
                });

  } 
  $scope.fetch_page_content() ;



  $scope.update_bank_detail = function () {
    
 $content = (JSON.stringify($scope.$bank_detail));

   var $form = new FormData();
    $form.append('content', $content);

   
    $.ajax({
            type: "POST",
            url: $base_url+"/cms_api/update_bank_detail",
           cache: false,
            contentType: false,
            processData: false,
            data: $form,
            success: function(data) {
              console.log(data);
              // $scope.fetch_page_content();
              window.notify();
            },
            error: function (data) {
                 //alert("fail"+data);
            }


        });

    }

  $scope.fetch_bank_detail = function () {

      $http.get($base_url+'/cms_api/fetch_page_content/account_detail')
          .then(function(response) {

            $scope.$bank_detail = response.data;
            console.log($scope.$bank_detail);
                });

  } 
  $scope.fetch_bank_detail() ;

  $scope.update_paystack_keys = function () {
    
 $content = (JSON.stringify($scope.$paystack_keys));

   var $form = new FormData();
    $form.append('content', $content);

   
    $.ajax({
            type: "POST",
            url: $base_url+"/cms_api/update_paystack_keys",
           cache: false,
            contentType: false,
            processData: false,
            data: $form,
            success: function(data) {
              console.log(data);
              // $scope.fetch_page_content();
              window.notify();
            },
            error: function (data) {
                 //alert("fail"+data);
            }


        });

    }

	$scope.fetch_paystack_keys = function () {

			$http.get($base_url+'/cms_api/fetch_page_content/paystack_keys')
			    .then(function(response) {

				    $scope.$paystack_keys = response.data;
				    console.log($scope.$paystack_keys);
			          });

	} 
	$scope.fetch_paystack_keys() ;





});

app.directive("contenteditable", function() {
  return {
    restrict: "A",
    require: "ngModel",
    link: function(scope, element, attrs, ngModel) {

      function read() {
        ngModel.$setViewValue(element.html());
      }

      ngModel.$render = function() {
        element.html(ngModel.$viewValue || "");
      };

      element.bind("blur keyup change", function() {
        scope.$apply(read);
      });
    }
  };
});