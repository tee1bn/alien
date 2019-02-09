 
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
                    <h2>Support ticket</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">


<div class="well"><?=$data['support_ticket']->subject_of_ticket;?></div>
      <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                            <!-- start recent activity -->
                            <ul class="messages">

<?php foreach ($data['support_ticket_messages'] as $message) :


if($message->user_id != null){
$background = 'whitesmoke';
$name = $message->supportTicket->user->lastname.' '.$message->supportTicket->user->firstname;


}else{


$name = 'Me';
$background = '';
}

?>

                              <li style="    background: <?=$background;?>; margin-bottom: 10px;">

                                <!-- <img src="<?=$web_asset;?>images/img.jpg" class="avatar" alt="Avatar"> -->
                                <div class="message_date" style="margin-right:  12px;">

                                  <h3 class="date text-info"><?=date_format(date_create($message->created_at), "d");?></h3>
                                  <p class="month"><?=date_format(date_create($message->created_at), "M");?></p>
                                </div>
                                <div class="message_wrapper">
                        <h4 class="heading" style="text-transform: capitalize;"><?=$name;?></h4>
                                  <blockquote class="message"><?=$message->message;?>.</blockquote>
                                  <br>
                                  <p class="url">
                                    <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                                    <a href="#"><i class="fa fa-calendar"></i> <?=$message->created_at;?> </a>
                                  </p>
                                </div>
                              </li>

<?php endforeach;?>
                            </ul>
                            <!-- end recent activity -->

                          </div>


<?php if ($data['support_ticket']->status == 0):?>

<hr>

<form method="post" action="<?=$this->domain;?>/admin-support/createTicketMessage/<?=$data['support_ticket']->id;?>">
  
  <?php $this->csrf_field();?>

<textarea class="form-control" name="message" style="height: 100px;" autofocus="autofocus"></textarea><br>

<button type="submit" class="btn btn-primary">Send Message</button><br>
<a href="<?=$this->domain;?>/admin-support/closeTicket/<?=$data['support_ticket']->id;?>">
  <button type="button" class="btn btn-primary">Close ticket</button>
</a>

</form>


<?php elseif($data['support_ticket']->status == 1):?>


  <button type="button" class="form-control btn-primary">Closed</button>

<?php endif ;?>




                  </div>
                </div>
              </div>
            </div>







            <!--  <div class="row">
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































