
var app = angular.module('AdminSliders', []);


app.controller('AdminSlidersController', function($scope, $http) {

	$scope.here = 'okkkk';
	$scope.$page_cms = [];

$scope.$slider_main_text = '';
$scope.$slider_extra_text = '';

  $scope.delete_handle = function($index) {

    $scope.$page_cms.splice($index, 1);
    $scope.update_page_cms();
  }

  $scope.create_slider = function () {

    $scope.$page_cms.unshift({
      'slider_main_text': $scope.slider_main_text,
      'slider_extra_text': $scope.slider_extra_text
    });
  }


  $scope.update_page_cms = function () {
    
 $content = (JSON.stringify($scope.$page_cms));

   var $form = new FormData();
    $form.append('content', $content);

   
    $.ajax({
            type: "POST",
            url: $base_url+"/cms_api/update_page_cms/social_media_handles",
           cache: false,
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

			$http.get($base_url+'/cms_api/fetch_page_content/social_media_handles')
			    .then(function(response) {

				    $scope.$page_cms = response.data;
				    console.log($scope.$page_cms);
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