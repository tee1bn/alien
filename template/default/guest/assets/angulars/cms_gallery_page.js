  function FilePreviewer($files, $index) {
      this.$files = $files;
      this.$index = $index;
      this.$current_file = $files[$index];


      this.next = function(){

        if ((this.$index + 1) == this.$files.length) {
          this.$index = -1 ;
          return;
        }

        this.$index++;
        this.update_current_file();
      };

      this.back = function(){

        if ((this.$index ) == 0 ) {
          this.$index = this.$files.length ;
          return;
        }

        this.$index--;
        this.update_current_file();
      };

        this.update_current_file = function(){
         this.$current_file = this.$files[this.$index];
          // console.log(this);
        };


  }


app.controller('GalleryPageController', function($scope, $http) {

	$scope.here = 'okkkk';
	$scope.$page_cms = [];




// var $scope.$file_upload_pad ='';
  $scope.delete_image = function ($index) {
      $scope.$page_cms.splice($index , 1);
      $scope.update_page_cms();

  }

  $scope.acknowledge_file_attachment = function () {
      $file_upload_input = document.getElementById('file_upload_input');
         var   form_data  = new FormData();

         for (var i = 0; i < $file_upload_input.files.length; i++) {
        
                form_data.append('files'+i, $file_upload_input.files[i]);
            }


            $.ajax({
            type: "POST",
            url: $base_url+"/cms_api/upload_files_for_gallery",
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


  $scope.open_previewer = function ($files, $index) {
    $('#myModal').modal();
    $scope.$file_previewer = new FilePreviewer($files, $index);
    console.log($scope.file_previewer);
  };









  $scope.update_page_cms = function () {
      
$data = 'content='+(JSON.stringify($scope.$page_cms));
    $.ajax({
            type: "POST",
            url: $base_url+"/cms_api/update_page_cms/gallery_page",
            cache: false,
            data: $data,
            success: function(data) {
                        console.log(data);
                        notify();
                        
            },
            error: function (data) {
                 //alert("fail"+data);
            }

            

        });
    }



	$scope.fetch_page_content = function () {

			$http.get($base_url+'/cms_api/fetch_page_content/gallery_page')
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