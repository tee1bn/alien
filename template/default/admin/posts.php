 
<?php include 'header_nav.php' ;?>
<?php include 'datatable.php' ;?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Posts</h3>
      </div>

      <div class="title_right">
        <div class="col-lg-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button">Go!</button>
            </span>
          </div>
        </div>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-lg-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Add category</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>

            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
<!--                       Add content to the page ...
-->                  




        <form method="post" action="<?=domain;?>/blog/add_category">

          <div class="input-group">
            <input type="text" placeholder='Add a category' name="category" class="form-control" required="">
            <span class="input-group-btn">
              <input class="btn btn-primary" id="inputSuccess2" type="submit" value="Add">
            </span>
          </div>

        </form>
</div>
</div>
</div>
</div>


<div class="row">
  <div class="col-lg-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>All category</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>

        </li>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
<!--                       Add content to the page ...
-->                  


              <form action="<?=domain;?>/blog/update_category" method="post" >
                <button type="submit" class="btn btn-primary pull-right">Update</button>
        <table id="datatable_newsletter" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>S/N</th>
                          <th>Category</th>
                          <th>Created at</th>
                          <th>Action</th>
            </tr>
          </thead>
                    <?php   
                    $i = 1;
                     foreach ($categories as $category) :
                   ?>

                          <tr>
                          <td><?=$i;?></td>
                          <td><input type="" name="category[<?=$category->id;?>]" value="<?=$category->category;?>"> </td>

                          <td>
                            <span class="label label-primary">
                              <?=$category->created_at;?>
                            </span>
                          </td>
                          <td>
                            <div class='btn-group btn-group-xs'>
                              <button type='button'
                               onclick="$confirm_dialog = new ConfirmationDialog('<?=$category->deletelink;?>')" class='btn btn-danger'><i class='fa fa-trash'></i></button>
                            </div>
                          </td>
                          </tr>
    <?php $i++; endforeach;?>   
              </tbody>
        </table>
                </form>

</div>
</div>
</div>
</div>


<div class="row">
  <div class="col-lg-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Post blogs</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>

        </li>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
<!--                       Add content to the page ...
-->                  
<form method="post" action="<?=domain;?>/blog/create_post" enctype="multipart/form-data" >
  <div class="col-md-12 input-group">
    <input class="form-control has-feedback-left" id="inputSuccess2" name="title" placeholder="Post title" type="text" required="">
    <span class="fa fa-chain form-control-feedback left" aria-hidden="true"></span>
  </div>


  <div class="col-md-12 input-group">
    <select class="select2_single form-control select2-hidden-accessible" name="category" tabindex="-1" aria-hidden="true">
      <option>Category</option>
        <?php foreach ($categories as $key): ?>
            <option value="<?=$key->id;?>"><?=$key->category;?></option>
        <?php endforeach ;?>

    </select>
  </div>



  <div class="col-md-12 input-group">
    <input type="file"  class="form-control has-feedback-left" id="inputSuccess2"  name="image_path[]" placeholder="Featured image" required="">


<datalist id="pictures">


<?php foreach ($data['pictures'] as $key): ?>

  <option value="<?=$key;?>"><img src="<?=$this->domain.'/'.$data['directory'].'/'.$key;?>"> </option>


<?php endforeach ;?>


</datalist>

    <span class="fa fa-picture-o form-control-feedback left" aria-hidden="true"></span>
  </div>


  <div class="col-md-12 input-group">
    <textarea class="form-control  has-feedback-left" id="content" name="content" style="height: 200px;" placeholder="Content of post" required=""></textarea>
    <span class="fa fa-edit form-control-feedback left" aria-hidden="true"></span>
  </div>


  <div class="col-md-4 input-group">
    <input class="form-control has-feedback-left" id="inputSuccess2" type="submit" value="Publish">
  </div>
</form>
 <script>
   CKEDITOR.replace( 'content' );
</script>



</div>
</div>
</div>
</div>














<div class="row">


  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
      <h2>View all Posts</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>

        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content table-responsive" style="display: ;">


        <table id="datatable" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>S/N</th>
                          <th>Title</th>
                          <th>Category</th>
                          <th>Content</th>
                          <th>Created at</th>
                          <th>Action</th>
            </tr>
          </thead>




            <?php
                     
                      $i = 1;

                     foreach ($data['posts'] as $post) :
                 $date =  strtoupper( date("M j, Y", date_timestamp_get($post->created_at)));
                  $content = substr($post->content , 0 , 150) ?>

                          <tr>
                          <td><?=$i;?></td>
                          <td><?=$post->title;?></td>
                          <td><?=$post->category->category;?></td>
                          <td><?=$content;?></td>
                          <td><?=$date;?></td>
                          <td>
<div class='btn-group btn-group-xs'>
  <a href="<?=domain;?>/admin/edit-post/<?=$post->id;?>">
  <button type='button' class='btn btn-xs btn-primary'   data-target='#edit_post_modal'><i class='fa fa-edit'></i></button></a>
  <a>
                              <button type='button'
                               onclick="$confirm_dialog = new ConfirmationDialog('<?=$post->deletelink;?>')" class='btn btn-danger btn-sm'><i class='fa fa-trash'></i></button>
                             </a></div>
                          </td>
                          </tr>
    <?php $i++; endforeach;?>   
              </tbody>
        </table>




      </div>
    </div>
  </div>
</div>    




<script>

function edit(item=''){


alert(item);
item = JSON.parse(item);



   name = item['name'];
   $("#edit-name").val(item['title']);


   $("#edit-front_image").val(item['image_path']);

   $("#edit-description").val(item['content']);
   $("#edit-form").attr('action' , '<?=$this->domain;?>/admin-updates/item-post/'+item['id']) ;

}


        </script>

<!-- edit posts modal -->








</div>
</div>
<!-- /page content -->



<?php include 'footer.php' ;?> 


