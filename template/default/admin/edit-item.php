 
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

                  <div class="col-md-3 col-xs-12" style="background: #d2d6d8;">
                    <img class="img-responsive" src="<?=domain;?>/<?=$item->front_image;?>"  style="width:270px; height: 350px; object-fit: contain;"  >
                  </div>
            

                 <form method="post" enctype="multipart/form-data" class="col-md-9 col-xs-12" action="<?=domain;?>/admin-products/update_item">
                  <?=$this->inputErrors();?>
                  <div class="form-group">
                    <?=$this->csrf_field('update_products');?>
                   <input type="" name="name" class="form-control" required="required" value="<?=$item->name;?>" placeholder="Item name" >
                  </div>

                   <input type="hidden" name="item_id" value="<?=$item->id;?>" >
                <div class="form-group">
                   <input type="" name="price" class="form-control" required="required" value="<?=$item->price;?>" placeholder="Item price">
                 </div>

                <div class="form-group">
                  <select name="category" class="form-control" required="required">
                    <option value="">select category</option>
                    <?php foreach (ProductsCategory::all() as $category):?>
                      <option value="<?=$category->id;?>"  <?=($item->category->id == $category->id)?'selected':'';?>>
                        <?=$category->category;?></option>
                    <?php endforeach ;?>
                  </select>

                 </div>

                <div class="form-group">
                   <input type="file" name="front_image" class="form-control"  value="<?=$item->front_image;?>" placeholder="Item price">
                  </div>

                     <div class="form-group">
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































