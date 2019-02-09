


<style>
  #gitstar-notification{
    position: fixed;
    top: 10px;
    z-index: 99999999999999;
    width: 306px;
    margin-left: -151px;
    left: 50%;
   display: none;
}
</style>

<center>  
  <div id="gitstar-notification"  class="alert alert-info alert-dismissible" >
    <a href="javascript:void;" class="close" onclick="document.getElementById('gitstar-notification').style.display='none'">&times;</a>
        <!-- <strong><i class='fa fa-bell fa-2x pull-left'> </i></strong>  -->
	
	<span id="error_note"></span>    
  </div>
</center>






	<script>
		notify = function () {
  $.ajax({
            type: "POST",
            url: $base_url+"/home/flash_notification/",
            cache: false,
            success: function(data) {


				let $error_note = '';
				for (var i = 0; i < data.length; i++) {
					$error_note += data[i]['message'] +'<br>';
				}

				if ($error_note != '') {

		show_notification($error_note);
				}




            },
            error: function (data) {
                 //alert("fail"+data);
            }

            

        });

		}


show_notification = function ($notification) {
$('#error_note').html($notification);
    $('#gitstar-notification').css('display', 'block');
  }

notify();



$(document).ready(function(){
 $("body").on("submit", "#newsletter_form", function (e) {
  e.preventDefault();

  $datastring = $('#newsletter_form').serialize();

  $.ajax({

            type: "POST",
            url: $base_url+"/contact/add_to_news_letter/",
            data: $datastring,
            cache: false,
            success: function(data) {

    show_notification(data);

            },
            error: function (data) {
                 //alert("fail"+data);
            },



        });

  
});
});
    
	</script>