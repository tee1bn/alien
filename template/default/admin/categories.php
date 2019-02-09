 
      <?php include 'header_nav.php' ;?>
      <?php include 'datatable.php' ;?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Categories</h3>
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
                    <h2>Create Category</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                <div class="x_content row">

            

                 <form method="post" enctype="multipart/form-data" action="<?=domain;?>/admin-categories/create_category">
                  <?=$this->inputErrors();?>
                  <div class="form-group">
                    <?=$this->csrf_field('add_category');?>
                   <input type="" name="category" class="form-control" required="required" value="<?=Input::old('category');?>" placeholder="Category name" >
                  </div>

                
                  <div class="form-group">
                   <button type="submit" class="form-control btn-primary">
                     Add Category
                   </button> 
                  </div>


                 </form>


                    </div>


                   
                  </div>
                </div>
              </div>
            </div>







             <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Categories Overview</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
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
              <th>Categories</th>
              <th>Actions</th>
                         
            </tr>
          </thead>

                      
<?php $i=1; foreach (ProductsCategory::all() as $category) :


?>


                          <tr>
                            <td><?=$i;?></td>
                            <form method="post" action="<?=domain;?>/admin-categories/update_category">

                          <td>

<div class="input-group" style="width: 100%">
  <?=$this->csrf_field('update_category');?>
    <input type="hidden" name="category_id" value="<?=$category->id;?>">
                            <input type="text" name="category" class="form-control" value="<?=$category->category;?>">
                            <span class="input-group-btn">

                                  </span>
                          </div>
                          </td>     
                          <td>
                            
                            <div class="btn-group">
  <button type="submit" class="btn  btn-primary">update</button>
                          </form>                 

                            <form method="post" action="<?=domain;?>/admin-categories/delete_category" style="display: inline;">
    <input type="hidden" name="category_id" value="<?=$category->id;?>">
  <button type="submit" class="btn  btn-danger"><i class="fa fa-trash"></i></button>
</form>
</div>
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































