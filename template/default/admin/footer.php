

  <?=$this->show_notifications();?>
  <?=$this->detect_running_ajax_request();?>

<script>
function del(id, name, model, method){

 $("#delete-form").attr('action' , '<?=$this->domain;?>/admin-delete/'+method+'/'+model+'/'+id) ;
 $("#name-placeholder").html(name) ;        
}

</script>

<div id='delete_post_modal' class='modal fade bs-example-modal-sm' tabindex='-1' role='dialog' aria-hidden='true'>
  <div class='modal-dialog modal-sm'>
    <div class='modal-content'>

      <div class='modal-header'>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>×</span>
        </button>
        <h4 class='modal-title' id='myModalLabel2'>Delete Post</h4>
      </div>
      <div class='modal-body'>
        <h4>Are you sure?</h4>
        <p><span id='name-placeholder' style="font-weight: bold;"></span> will be permanently deleted with no possibility of restoration.</p>

      </div>
      <div class='modal-footer'>
      <form id='delete-form' method='post' >
      <input type='hidden' value='22' name= 'post_id'/>
        <button type='submit' class='btn btn-default'>Yes</button>
                <button type='button' class='btn btn-default' data-dismiss='modal'>No</button>

        </form>
      </div>

    </div>
  </div>
</div>









</div>
</div>

<!-- footer content -->
<footer class="footer_fixed">
  <div class="pull-right">
    <b></b> Admin developed by <a href="http://gitstardigital.com" target="_blank">Gitstar Digital</a>
  </div>
  <div class="clearfix"></div>
</footer>
<!-- /footer content -->
</div>
</div>
