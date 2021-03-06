


app.controller('AboutPageController', function($scope, $http) {

	$scope.here = 'okkkk';
	$scope.$page_cms = [];


  $scope.acknowledge_file_attachment = function ($file_upload_input, $route) {

         var   form_data  = new FormData();

         for (var i = 0; i < $file_upload_input.files.length; i++) {
        
                form_data.append('files'+i, $file_upload_input.files[i]);
            }


            $.ajax({
            type: "POST",
            url: $base_url+"/cms_api/"+$route,
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            success: function(data) {
              console.log(data);
              $scope.fetch_page_content();
            },
            error: function (data) {
                 //alert("fail"+data);
            }

            

        });

        
  }






// update_meet_ceo
  $scope.update_page_cms = function () {
    
    $content = (JSON.stringify($scope.$page_cms));

   var $form = new FormData();
    $form.append('content', $content);

    $.ajax({
            type: "POST",
            url: $base_url+"/cms_api/update_page_cms/about_page",
           cache: false,
            contentType: false,
            processData: false,
            data: $form,
            success: function(data) {
              console.log(data);
              // $scope.fetch_page_content();
              notify();
            },
            error: function (data) {
                 //alert("fail"+data);
            }


        });

    }



	$scope.fetch_page_content = function () {

			$http.get($base_url+'/cms_api/fetch_page_content/about_page')
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


    app.directive('loading',   ['$http' ,function ($http)
    {
        return {
            restrict: 'A',
            link: function (scope, elm, attrs)
            {
                scope.isLoading = function () {
                    return $http.pendingRequests.length > 0;
                };

                scope.$watch(scope.isLoading, function (v)
                {
                    if(v){
                        elm.show();
                    }else{
                        elm.hide();
                    }
                });
            }
        };

    }]);