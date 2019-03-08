
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?=project_name;?></title>


<!-- fav icon -->
<link rel="shortcut icon" href="<?=domain;?>/public/img/android-icon-36x36.png" />

<!-- fav icon -->

<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>

<script src="<?=domain;?>/template/default/guest/assets/angulars/angularjs.js"></script>

  </head>

  <body class="nav-md">
    <div class="container body">
 <?php include 'sidebar.php';?>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a style="text-transform: capitalize;" href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?=asset;?>/images/avatar/4.jpg" alt=""> 
                   <?=$this->admin()->lastname?>
                    <?=$this->admin()->firstname?>

    
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="<?=domain;?>/admin-profile"> Profile</a></li>
                   <!--  <li>
                      <a href="<?=domain;?>/admin-settings">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li> -->
                    <li><a href="<?php echo domain ;?>/login/logout/admin"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                     <!--    <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="<img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li> -->

       
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->



<style>
  

  #notification_tab{

    position: fixed;
    right: 20px;
    top: 90px;
    z-index: 30;
    padding: 5px;
    border-radius: 2%;
    background: #4c57e5;
  }
  #loader-div{

    z-index: 6;
    background: #fdfdfd;
    /*display: none;*/
  }

</style>

<script>
  let $base_url = "<?=domain;?>";
</script>
<!-- 
<?php if(Session::hasFlash()) :?>
<div id="notification_tab" class="alert alert-info alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close" style="color: red;"> &times; </a>
    <?php// foreach (Session::flash() as $key => $message):?>
  <span>
    <?=$message['message'];?>
</span><br>


<?php// endforeach ;?>
</div>

<?php endif ;?> -->
