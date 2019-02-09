 
      <?php include 'header_nav.php' ;?>
      <?php include 'datatable.php' ;?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Investment Packs </h3>
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
                    <h2>Investment Packs</h2>
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
  <table id="bootstra-data-table"  class="table table-striped">
    <thead>
      <tr>
        <th>S/N</th>
        <!-- <th>Stage</th> -->
        <th>Pack Name</th>
        <th>Capital(<?=$currency;?>)</th>
        <th>Duration(days)</th>
        <th>ROI+P(%)</th>
        <th>Availability</th>
      </tr>
    </thead>
    <tbody>


<form method="post"  action="<?=$this->domain;?>/admin-investment-pack/updateInvestmentPackSettings">
    <?=$this->inputErrors();?>
    <?=$this->csrf_field('investmentpacks');?>

    
<?php

 foreach (InvestmentPacks::all() as $investmentpack): 

    if ($investmentpack->availability == on) {
        $availability = 'checked';
    }else{
        $availability = '';
    }

    ?>


    <tr>
         <td>#<?=$investmentpack->id;?></td>
        <!--  <td> <span class="badge badge-primary" style="text-transform: capitalize;">
             <?=$investmentpack->investmentStage->investment_stage;?> </span>
         </td> -->

         <td><input type="text" class="form-control" name="investmentpack[<?=$investmentpack->id;?>][pack_name]" value="<?=$investmentpack->pack_name;?>"></td>
         
         <td><input type="text" class="form-control" name="investmentpack[<?=$investmentpack->id;?>][capital_in_usd]" value="<?=$investmentpack->capital_in_usd;?>"></td>
         
         <td><input type="text" class="form-control" name="investmentpack[<?=$investmentpack->id;?>][duration_in_days]" value="<?=$investmentpack->duration_in_days;?>"></td>
         
         <td><input type="text" class="form-control" name="investmentpack[<?=$investmentpack->id;?>][roi_percent]" value="<?=$investmentpack->roi_percent;?>"></td>


         <td>
            <input type="checkbox" class="form-control" name="investmentpack[<?=$investmentpack->id;?>][availability]" <?=$availability;?> >
        </td>

    </tr>

    <?php endforeach ;?>






    </tbody>
  </table>

<button type="submit" class="btn btn-primary">Update</button>

</form>


</div>










                  </div>
                </div>
              </div>
            </div>





<!-- 

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




 -->

























          </div>
        </div>
        <!-- /page content -->

           <?php include 'footer.php' ;?> 































