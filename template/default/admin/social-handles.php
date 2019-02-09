 
      <?php include 'header_nav.php' ;?>
      <?php include 'datatable.php' ;?>

    <script src="<?=asset;?>/includes/angularjs/admin_socials.js"></script>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="" ng-app="AdminSocials" ng-controller="AdminSocialsController">
            <div class="page-title">
              <div class="title_left">
                <h3>Socials </h3>
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

          <!--  
            <div class="row" >
              {{here}}
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Handles <small>(type in lowercase)</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">


                    <div  class="row">
                      <div class="form-group col-md-5">
                        <label>*Social media</label>
                      <input type="" class="form-control" ng-model="social_media" name="name" placeholder="e.g facebook">
                      </div>
                    <div class="form-group col-md-5">
                    <label>*Handle</label>
                      <input type="" class="form-control" ng-model="handle" name="handle" placeholder="e.g https://facebook.com/handle">
                    </div>
                <div class="form-group col-md-2">
                 <label>*Create</label>
                      <input type="" ng-click="create_handle()" class="form-control btn btn-default" value="create">
                    </div>

                    </div>
              
                  </div>
                </div>
              </div>
            </div>

 -->





             <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Social Handles</h2>
                    <ul class="nav navbar-right panel_toolbox">

                      <li>
                      <button type="" ng-click="create_handle()" class="form-control btn btn-default">+Create</button>
                      </li>
                        <li>
                      <button type="" ng-click="update_page_cms()"  class="form-control btn btn-primary">Save
                      <?=$this->add_ajax_is_loading_spinner();?></button>
                      </li>
                      
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div ng-repeat="($index, $social_handle) in $page_cms" class="row">
                      <div class="form-group col-md-5">
                        <label>*Social media</label>
                      <input type="" class="form-control" ng-model="$social_handle.social_media" name="name" placeholder="e.g facebook">
                      </div>
                    <div class="form-group col-md-5">
                    <label>*Handle</label>
                      <input type="" class="form-control" ng-model="$social_handle.handle" name="handle" placeholder="e.g https://facebook.com/handle">
                    </div>
                <div class="form-group col-md-2">
                 <label>&nbsp;</label>
                  <button type="" class="form-control btn btn-danger" ng-click="delete_handle($index)" ><i class="fa fa-trash"></i> Delete</button>
                    </div>

                    </div>
                                </div>
                </div>
              </div>
            </div>


          </div>
        </div>
        <!-- /page content -->

           <?php include 'footer.php' ;?> 































