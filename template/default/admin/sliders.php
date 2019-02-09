 
      <?php include 'header_nav.php' ;?>
      <?php include 'datatable.php' ;?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Sliders</h3>
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
                    <h2>Create Sliders</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                <div class="x_content row">

            

                 <form method="post" enctype="multipart/form-data" action="<?=domain;?>/admin-cms/create_slider">
                  <?=$this->inputErrors();?>
                  <div class="form-group">
                    <?=$this->csrf_field('add_sliders');?>
                   <input type="" name="main_text" class="form-control" maxlength="15" required="required" value="<?=Input::old('main_text');?>" placeholder="Slider main text (max 15 characters)" >
                  </div>

                <div class="form-group">
                   <input type="" name="sub_text" class="form-control" maxlength="30" required="required" value="<?=Input::old('sub_text');?>" placeholder="Slider sub_text (max 30 characters)">
                 </div>

                <div class="form-group">
                   <input type="file" name="slider_image" class="form-control" required="required" value="<?=Input::old('front_image');?>" placeholder="Item price">
                  </div>

                

                  <div class="form-group">
                   <button type="submit" class="form-control btn-primary">
                     Create Slider
                   </button> 
                  </div>


                 </form>


                    </div>


                   
                  </div>
                </div>
              </div>
            </div>

<style type="text/css">
  .slider_img_preview{

    width: 120px;
    height: 70px;
    object-fit: cover;

  }
</style>





             <div class="row">
              <div class="col-md-12 col-sm-12 col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Sliders Overview</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

<div class="table-responsive">
                      <form method="post" action="<?=domain;?>/admin-cms/update_sliders" enctype="multipart/form-data" style="overflow: hidden;" >
                        <input class="btn-primary btn pull-right" type="submit" value="update">

                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                          <tr>
              <th>#sn</th>
                          <th>Main text</th>
                          <th>Sub text</th>
                          <th>Image</th>
                          <!-- <th>Change Image</th> -->
                          <th>Action</th>
            </tr>
          </thead>

                      
<?php $i=1; foreach ($sliders as $key => $item) :?>

                          <tr>
                          <td>#<?=$i;?></td>
                          <td> <input type="" value="<?=$item['main_text'];?>" class="form-control" name="slider[<?=$key;?>][main_text]"></td>
                          <td> <input type="" value="<?=$item['sub_text'];?>" class="form-control" name="slider[<?=$key;?>][sub_text]"></td>
                          <td>
                              <img class="slider_img_preview" src="<?=domain;?>/<?=$item['slider_image'];?>" class="img-responsive">
                            <input type="hidden" value="<?=$item['slider_image'];?>" name="slider[<?=$key;?>][slider_image]">
                            <a  class='label label-lg label-primary'
                             onclick="open_file_upload_pad_for(this)" >change</a>
                           <input type="file" style="display: none;" onchange="upload_slider_image(this, <?=$key;?>)" class="form-control" id="slider_image_<?=$key;?>" name="slider_image_<?=$key;?>">
                            <span>
                              
                          </span>
                          </td>
                          <td>
                           <!--  <a href="<?=domain;?>/admin-products/edit_item/<?=$item->id;?>">
                              <label type='label' class='label label-lg label-primary'>Update
                              </label>
                           </a> -->
                            <a style="cursor: pointer;" href="<?=domain;?>/admin-cms/delete_slider/<?=$key;?>">
                                <label type='label' class='label label-lg label-danger'>Delete
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

                    </form>

                    </table>
</div>








                  </div>
                </div>
              </div>
            </div>






<script type="text/javascript">
  open_file_upload_pad_for = function (element) {

  element.parentNode.childNodes[7].click();
  }
  upload_slider_image = function ($file_upload_input, $slider_id) {

          console.log($file_upload_input);
         var   form_data  = new FormData();

         for (var i = 0; i < $file_upload_input.files.length; i++) {
        
                form_data.append('files'+i, $file_upload_input.files[i]);
            }


            $.ajax({
            type: "POST",
            url: $base_url+"/admin-cms/update_slider_image/"+$slider_id,
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            success: function(data) {
              console.log(data);
              notify();
              $new_slider_image_path  = '<?=domain;?>/'+data.new_slider_image_path;
              $file_upload_input.parentNode.childNodes[1].src= $new_slider_image_path;              
            },
            error: function (data) {
                 //alert("fail"+data);
            }

            

        });

        
  

    


      }
</script>























          </div>
        </div>
        <!-- /page content -->

           <?php include 'footer.php' ;?> 































