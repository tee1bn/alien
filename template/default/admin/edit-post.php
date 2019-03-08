 
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
<form method="post" action="<?=domain;?>/blog/update_post" enctype="multipart/form-data" >
  <div class="form-group">
    <input class="form-control " value="<?=$post->title;?>" name="title" placeholder="Post title" type="text" required="">
  </div>


  <div class="form-group">
    <select class="select2_single form-control select2-hidden-accessible" name="category" tabindex="-1" aria-hidden="true">
      <option>Category</option>
        <?php foreach (Category::all() as $key): ?>
            <option value="<?=$key->id;?>" <?=($post->category_id == $key->id) ? 'checked': '';?>>
              <?=$key->category;?>
            </option>
        <?php endforeach ;?>

    </select>
  </div>



  <div class="form-group">
    <input type="file"  class="form-control"  name="image_path[]" placeholder="Featured image" required="">
  </div>

    <div class="row">
    <div  style="margin-left: 15px;color: red;"> Mark pictures and click Update to delete marked images</div>
    <?php
    $i=0;

     foreach ($post->image_path['images'] as $key => $image):?> 
                  <div class="col-sm-3">
                    <div class="property-image">
                      <img src="<?=domain;?>/<?=$image['main_image'];?>" style="width: 100%;    border: 1px solid beige; height: 210px;" >
                      <div class="property-image-content">
                        <i class="fa fa-times-circle delete-image" onclick="select_this_for_delete(this)"></i>
                        <input type="checkbox" name="images_to_be_deleted[]" value="<?=$key;?>" style="display: none;" >
                      </div>
                    </div>
                  </div>
      
    <?php $i++;  endforeach;?>
              </div><br>

  <style type="text/css">
.delete-image:hover{
color: red;
cursor: pointer;
}
.delete-image{
    position: absolute;
    top: 3px;
    right: 18px;
    font-size: 20px;
  }
          </style>


          <script>
            select_this_for_delete= function ($element) {
                $checkbox = $element.nextSibling.nextSibling;

              if ($checkbox.checked == false) {
                $checkbox.checked = true;
                $element.style.color = 'red';
              }else{
                $checkbox.checked = false;
                $element.style.color = 'black';

              }

            }
          </script>



  <div class="form-group">
    <textarea class="form-control " name="content" style="height: 200px;" placeholder="Content of post" required=""><?=$post->content;?></textarea>
  </div>
  <input type="hidden"  name="id" value="<?=$post->id;?>">

  <div class="col-md-4">
    <input class="form-control" type="submit" value="Update">
  </div>
</form>

 <script>
   CKEDITOR.replace( 'content' );
</script>




</div>
</div>
</div>
</div>















</div>
</div>
<!-- /page content -->



<?php include 'footer.php' ;?> 


