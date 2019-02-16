<div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">

              <a href="#" class="site_title"><i class="fa fa-paw"></i><span><b>
              
            <?=project_name;?>
                  </b></span>


              </a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?=asset;?>/images/avatar/4.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome, Admin </span>
                <h2 style="text-transform: capitalize;">                  
                    <?=$this->admin()->lastname?>
                    <?=$this->admin()->firstname?>

                </h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <!-- <li><a href="<?php echo $this->domain ;?>/admin-dashboard"><i class="fa fa-dashboard"></i> Dashboard</a>
                    
                  </li>
                      
            <li><a href="<?php echo $this->domain ;?>/admin-users"><i class="fa fa-group"></i> Users</a>
                    
                  </li> -->
                      
                   
<li class="active"><a><i class="fa fa-institution"></i> Products <span class="fa fa-chevron-down"></span></a>           
                    <ul class="nav child_menu" >

 <li>
  <a href="<?=domain ;?>/admin-products">
    Create Products</a>
  </li>
 <li>
  <a href="<?=domain ;?>/admin-categories">
    Categories</a>
  </li>
<!-- 
 <li>
  <a href="<?php echo $this->domain ;?>/admin-withdrawals">
    Withdrawals</a>
  </li>
 -->

</ul>

</li>

     
<li><a href="<?=domain ;?>/admin-orders"><i class="fa fa-list"></i> Orders</a>
                    
                  </li>
     
<li><a href="<?=domain ;?>/admin-newsletter"><i class="fa fa-envelope"></i> Newsletters</a>
                    
                  </li>
     <!--                      
<li class="active"><a><i class="fa fa-group"></i> Communication <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" style="display: block;">
                    
 <li><a href="<?php echo $this->domain ;?>/admin-broadcast"> Broadcasts</a>
                    
                  </li>

 <li><a href="<?php echo $this->domain ;?>/admin-support"> Supports</a>
                    
                  </li>

                      

                      
                      </ul>
                      </li> -->


             
<li><a><i class="fa fa-edit"></i> CMS <span class="fa fa-chevron-down"></span></a>           
                    <ul class="nav child_menu" >

          
        <li><a> About us <span class="fa fa-chevron-down"></span></a>           
                    <ul class="nav child_menu" >
         
         <li>
          <a href="<?=domain ;?>/about/our-brand">
           Our brand 
         </a>                  
         </li>

         <li>
          <a href="<?=domain ;?>/about/meet-the-ceo">
           Meet the CEO 
         </a>                  
         </li>
          <li>
          <a href="<?=domain ;?>/about/our-core-values">
           Our core values 
         </a>                  
         </li>

          </ul>
          </li>
          <li>
            <a href="<?=domain ;?>/contact">
             Contact 
           </a>                  
           </li>

          <li>
            <a href="<?=domain ;?>/gallery">
             Gallery 
           </a>                  
           </li>

          <li>
            <a href="<?=domain ;?>/admin-cms/sliders">
             Sliders 
           </a>                  
           </li>

          <li>
            <a href="<?=domain ;?>/admin-cms/social-handles">
             Socials 
           </a>                  
           </li>

          </ul>
          </li>
        
<li><a><i class="fa fa-bullhorn"></i> Blog <span class="fa fa-chevron-down"></span></a>           
                    <ul class="nav child_menu" >

          <li>
            <a href="<?=domain ;?>/admin/blog-posts">
             Posts 
           </a>                  
           </li>

          </ul>
          </li>
        
<li><a href="<?=domain ;?>/admin-settings"><i class="fa fa-cog"></i> Settings</a>
                    
                  </li>
      
          
                  
                    </ul>
                  </li>        
                  
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a href="<?= $this->domain ;?>/login/logout/admin" data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>