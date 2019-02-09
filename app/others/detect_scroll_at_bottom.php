
<script>
  try{

    
window.addEventListener("scroll", function() {
  var elementTarget = document.getElementById("<?=$element_id;?>");
  if (window.scrollY > (elementTarget.offsetTop + elementTarget.offsetHeight -100)) {
    // alert('hello');
    elementTarget.click();
  }



});
  }catch (e){

  }
  </script>
