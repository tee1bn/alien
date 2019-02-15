 
      <?php include 'header_nav.php' ;?>
      <?php include 'datatable.php' ;?>

              <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Products</h3>
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
                    <h2>Create Products</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                <div class="x_content row">

            

                 <form method="post" enctype="multipart/form-data" action="<?=domain;?>/admin-products/createProduct">
                  <?=$this->inputErrors();?>
                  <div class="form-group">
                    <?=$this->csrf_field('add_products');?>
                   <input type="" name="name" class="form-control" required="required" value="<?=Input::old('name');?>" placeholder="Item name" >
                  </div>

                <div class="form-group">
                   <input type="" name="price" class="form-control" required="required" value="<?=Input::old('price');?>" placeholder="Item price">
                 </div>

                <div class="form-group">
                  <select name="category" class="form-control" required="required">
                    <option value="">select category</option>
                    <?php foreach (ProductsCategory::all() as $category):?>
                      <option value="<?=$category->id;?>"  <?=(Input::old('category') == $category->id)?'selected':'';?>>
                        <?=$category->category;?></option>
                    <?php endforeach ;?>
                  </select>

                 </div>

                <div class="form-group">
                   <input type="file" multiple="" name="front_image[]" class="form-control" required="required" value="<?=Input::old('front_image');?>" placeholder="Item price">
                  </div>

                     <div class="form-group">
                       <textarea class="form-control" name="description"  id="" required="required"  placeholder="Item description"><?=Input::old('description');?></textarea>
                      </div>

                  <div class="form-group">
                   <button type="submit" class="form-control btn-primary">
                     Add Item
                   </button> 
                  </div>


                 </form>


                    </div>


                   
                  </div>
                </div>
              </div>
            </div>



            <script>
              ClassicEditor.create( document.querySelector( '#editor' ) );
            </script>



             <div class="row">
              <div class="col-md-12 col-sm-12 col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Products Overview</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

<div class="table-responsive">

                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                          <tr>
              <th>#sn</th>
                          <th>Item</th>
                          <th>Price(<?=$currency;?>)</th>
                          <th>Category</th>
                          <th>Description</th>
                          <th>Created</th>
                          <th>Action</th>
            </tr>
          </thead>

                      
<?php $i=1; foreach (Products::all() as $item) :

  if ($item->is_on_sale()) {

    $on_sale_status = 'Put off sale';
    $label = 'info';
  }else{

      $on_sale_status = 'Put on sale';
          $label = 'default';

  }

?>


                          <tr>
                          <td>#<?=$i;?></td>
                          <td style="text-transform: capitalize;"><?=$item->name;?> </td>
                          <td><?=($item->price);?></td>
                          <td><?=($item->category->category);?></td>
                          <td><?=$item->description;?></td>
                          <td>
                            <label type='label' class='label label-xs label-primary'>
                            <?=$item->created_at;?>
                              </label>
                          </td>
                          <td>
                            <a href="<?=domain;?>/admin-products/edit_item/<?=$item->id;?>">
                              <label type='label' class='label label-xs label-primary'>Edit
                              </label>
                           </a>
                            <a href="<?=domain;?>/admin-products/deleteProduct/<?=$item->id;?>">
                                <label type='label' class='label label-xs label-danger'>Delete
                                </label>
                             </a>

                            <a href="<?=domain;?>/admin-products/pausePlayProduct/<?=$item->id;?>">
                                <label type='label' class='label label-xs label-<?=$label;?>'><?=$on_sale_status;?>
                                </label>
                             </a>


                            </td>
                          </tr>
           
                     
                     <?php $i++; endforeach;?>
                   
                      </tbody>
                    </table>


</div>








                  </div>
                </div>
              </div>
            </div>






























          </div>
        </div>
        <!-- /page content -->

           <?php include 'footer.php' ;?> 































