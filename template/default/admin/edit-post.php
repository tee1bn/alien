 
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
  <div class="col-md-12 input-group">
    <input class="form-control has-feedback-left" value="<?=$post->title;?>" id="inputSuccess2" name="title" placeholder="Post title" type="text" required="">
    <span class="fa fa-chain form-control-feedback left" aria-hidden="true"></span>
  </div>


  <div class="col-md-12 input-group">
    <select class="select2_single form-control select2-hidden-accessible" name="category" tabindex="-1" aria-hidden="true">
      <option>Category</option>
        <?php foreach (Category::all() as $key): ?>
            <option value="<?=$key->id;?>" <?=($post->category_id == $key->id) ? 'checked': '';?>>
              <?=$key->category;?>
            </option>
        <?php endforeach ;?>

    </select>
  </div>



  <div class="col-md-12 input-group">
    <input type="file"  class="form-control has-feedback-left" id="inputSuccess2"  name="image_path[]" placeholder="Featured image" required="">
    <span class="fa fa-picture-o form-control-feedback left" aria-hidden="true"></span>
  </div>

    <div class="row">
    <div  style="margin-left: 15px;color: red;"> Mark pictures and click Update to delete marked images</div>
    <?php
    $i=0;

     foreach ($post->image_path['images'] as $key => $image):?> 
                  <div class="col-sm-3">
                    <div class="property-image">
                      <img src="<?=domain;?>/<?=$image['main_image'];?>" width="100%" style="object-fit: cover;">
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



  <div class="col-md-12 input-group">
    <textarea class="form-control  has-feedback-left" id="inputSuccess2" name="content" style="height: 200px;" placeholder="Content of post" required=""><?=$post->content;?></textarea>
    <span class="fa fa-edit form-control-feedback left" aria-hidden="true"></span>
  </div>
  <input type="hidden"  name="id" value="<?=$post->id;?>">

  <div class="col-md-4 input-group">
    <input class="form-control has-feedback-left" id="inputSuccess2" type="submit" value="Update">
  </div>
</form>





</div>
</div>
</div>
</div>















</div>
</div>
<!-- /page content -->



<?php include 'footer.php' ;?> 


