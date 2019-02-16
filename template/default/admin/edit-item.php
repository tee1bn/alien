 
      <?php include 'header_nav.php' ;?>
      <?php include 'datatable.php' ;?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Edit item</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-md-12 form-group pull-right top_search">
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
              <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Edit item</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                <div class="x_content row">


                 <form method="post" enctype="multipart/form-data" class="col-md-12 " action="<?=domain;?>/admin-products/update_item">
                  <?=$this->inputErrors();?>
                  <div class="form-group">
                    <?=$this->csrf_field('update_products');?>
                    Name
                   <input type="" name="name" class="form-control" required="required" value="<?=$item->name;?>" placeholder="Item name" >
                  </div>

                   <input type="hidden" name="item_id" value="<?=$item->id;?>" >

                <div class="form-group">
                  Price:
                   <input type="" name="price" class="form-control" required="required" value="<?=$item->price;?>" placeholder="Item price">
                 </div>

                <div class="form-group">
                  Category:
                  <select name="category" class="form-control" required="required">
                    <option value="">select category</option>
                    <?php foreach (ProductsCategory::all() as $category):?>
                      <option value="<?=$category->id;?>"  <?=($item->category->id == $category->id)?'selected':'';?>>
                        <?=$category->category;?></option>
                    <?php endforeach ;?>
                  </select>

                 </div>

                <div class="form-group">
                  Images:
                   <input type="file" multiple="" name="front_image[]" class="form-control"  placeholder="Item price">
                  </div>



    <div class="row">
    <div  style="margin-left: 15px;color: red;"> Mark pictures and click Update to delete marked images</div>
    <?php
    $i=0;

     foreach ($item->images['images'] as $key => $image):?> 
                  <div class="col-sm-3">
                    <div class="property-image">
                      <img src="<?=domain;?>/<?=$image['main_image'];?>" style="width: 100%;    border: 1px solid beige; height: 210px; 
                      object-fit: contain;">
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
                      Description
                       <textarea class="form-control" name="description" rows="6" required="required"  placeholder="Item description"><?=$item->description;?></textarea>
                      </div>

                  <div class="form-group">
                   <button type="submit" class="form-control btn-primary">
                     Update Item
                   </button> 
                  </div>


                 </form>


                    </div>


                   
                  </div>
                </div>
              </div>
            </div>

























          </div>
        </div>
        <!-- /page content -->

           <?php include 'footer.php' ;?> 































