 
      <?php include 'header_nav.php' ;?>
      <?php include 'datatable.php' ;?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Support</h3>
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
                    <h2>Support tickets</h2>
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
              <th>#ticket-id</th>
                          <th>User</th>
                          <th>Complain</th>
                          <th>Created</th>
                          <th>Status</th>
                          <th>Action</th>
            </tr>
          </thead>

                      
<?php $i=1; foreach ($data['support_tickets'] as $ticket) :


if ($ticket->status == 1) {
$status = "<button type='button' class='btn btn-xs btn-success'>Closed</button>";
}else{
$status = "<button type='button' class='btn btn-xs btn-warning'>Open</button>";
}


?>


                          <tr>
                          <td>#<?=$ticket->id;?></td>
                          <td style="text-transform: capitalize;"><?=$ticket->user->lastname;?> <?=$ticket->user->firstname;?></td>
                          <td><?=($ticket->subject_of_ticket);?></td>
                          <td><?=$ticket->created_at;?></td>
                          <td><?=$status;?></td>
                          <td><a href="<?=$this->domain;?>/admin-support/viewSupportTicket/<?=$ticket->id;?>"><button type='button' class='btn btn-xs btn-primary'>View</button></td>
                          </tr>
           
                     
                     <?php $i++; endforeach;?>
                   
                      </tbody>
                    </table>


</div>












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































