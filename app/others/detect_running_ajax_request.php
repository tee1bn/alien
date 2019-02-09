<style>
	.ajax-running{
		display: none;
	}
</style>
<script>
 
$(document).ready(function(){
    $(document).ajaxStart(function(){
        $(".ajax-running").css("display", "block");
    });
    $(document).ajaxComplete(function(){
        $(".ajax-running").css("display", "none");
    });
   
});

  </script>
