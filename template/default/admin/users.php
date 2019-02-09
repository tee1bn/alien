 
      <?php include 'header_nav.php' ;?>
      <?php include 'datatable.php' ;?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Users</h3>
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
                    <h2>All Users</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">


<style>
  td{
    text-transform: capitalize;
  }
</style>

<div class="table-responsive">

                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                          <tr>
              <th>S/N</th>
                          <th>Name</th>
                          <th>Email</th>
                          <!-- <th>Phone</th> -->
                          <th>Joined</th>
                          <th>Status</th>
                          <th>Action</th>
            </tr>
          </thead>

                      

         <?php  $i=1; foreach (User::all() as $user) :
         $date   = $user->created_at;
         $status = ($user->blocked_on == null)
          ? "<button type='button' class='btn btn-xs btn-success'>Active</button>":
           "<button type='button' class='btn btn-xs btn-danger'>Blocked</button>";
         ?>

                          <tr>
                          <td><?=$i;?></td>
                          <td><?=$user->lastname;?> <?=$user->firstname;?></td>
                          <td><a href="mailto://<?=$user->email;?>"><?=$user->email;?></a></td>
                          <!-- <td><?=$user->phone;?></td> -->
                          <td><?=$date;?></td>
                          <td><?=$status;?></td>
                          <td>
  <a href="<?=$this->domain;?>/admin-users/userProfile/<?=$user->id;?>">
    <button type='button' class='btn btn-xs btn-primary'>View</button></a>
                          </td>
                          </tr>
           
                     
           <?php $i++; endforeach ; ?>
        
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































