 
      <?php include 'header_nav.php' ;?>
      <?php include 'datatable.php' ;?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Testimonials</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
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
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Testimonials</h2>
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
              <th>S/N</th>
                          <th>Short Comment</th>
                          <th>Review Comment</th>
                          <th>Rate</th>
                          <th>Created</th>
                          <th>Action</th>
                          <th>>>></th>
            </tr>
          </thead>

                      
<?php $i=1; foreach (Testimonial::all() as $testimonial) :


if ($testimonial->status == 0) {

  $status = "<a href=".$this->domain.'/admin-testimonials/pausePlayTestimonial/'.$testimonial->id."> 
    <button type='button' class='btn btn-xs btn-primary'>Pause</button></a>";
}else{
$status = "<a href=".$this->domain.'/admin-testimonials/pausePlayTestimonial/'.$testimonial->id.">
         <button type='button' class='btn btn-xs btn-success'>Play</button> </a>";
}




?>


                          <tr>
                          <td><?=$i;?></td>
                          <td><?=$testimonial->subject_comment;?></td>
                          <td><?=$testimonial->review_comment;?></td>
                          <td><?=$testimonial->rate;?></td>
                          <td><?=$testimonial->created_at;?></td>
                          <td><?=$status;?></td>
                          <td><a href="<?=$testimonial->video_link;?>" target="_blank">
                            <button type='button' class='btn btn-xs btn-success'>See Video</button>
                          </a></td>
                         
                          </tr>
           
                     
                     <?php $i++; endforeach;?>
                   
                      </tbody>
                    </table>











                  </div>
                </div>
              </div>
            </div>







             <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Plain Page</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      Add content to the page ...
                  </div>
                </div>
              </div>
            </div>






























          </div>
        </div>
        <!-- /page content -->

           <?php include 'footer.php' ;?> 































