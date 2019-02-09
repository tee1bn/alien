
var app = angular.module('ContactPage', []);


app.controller('ContactPageController', function($scope, $http) {

	$scope.here = 'okkkk';
	$scope.$page_cms = [];





  $scope.update_page_cms = function () {
  $content = (JSON.stringify($scope.$page_cms));

   var $form = new FormData();
    $form.append('content', $content);

    $.ajax({
            type: "POST",
            url: $base_url+"/cms_api/update_page_cms/contact_page",
           contentType: false,
            processData: false,
            data: $form,
            success: function(data) {
              console.log(data);
              // $scope.fetch_page_content();
            },
            error: function (data) {
                 //alert("fail"+data);
            }


        });
    }





	$scope.fetch_page_content = function () {

			$http.get($base_url+'/cms_api/fetch_page_content/contact_page')
			    .then(function(response) {

				    $scope.$page_cms = response.data;
				    console.log($scope.$page_cms)
			          });



	} 


	$scope.fetch_page_content() ;
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