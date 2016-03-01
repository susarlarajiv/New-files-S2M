<div class="wrapper row-offcanvas row-offcanvas-left">
<aside class="left-side sidebar-offcanvas">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
		
         <div class="pull-left image">
		 <?php 
		
		  $qr='select * from user where user_id="'.$_SESSION['admin_id'].'"'; //exit();
		 $run=mysql_query($qr);
		 $fet=mysql_fetch_array($run);
		 $image=$fet['user_profile_photo_url'];
		 ?>
		 <img src="../uploads/profile/<?php echo $image; ?>" class="img-circle" alt="User Image" />
        <!--<img src="img/avatar3.png" class="img-circle" alt="User Image" />-->
         </div>
          <div class="pull-left info">
          <p>Hello, <?php echo ucfirst($_SESSION['us_name']);?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
        
        <ul class="sidebar-menu">
                        
        
       <li class="treeview">
        <a href="#">
        <i class="fa fa-dashboard"></i>
        <span>Dashboard</span>
        <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu" <?php if($option=='com_dashboard' || $option=='com_sitesettings') { echo 'style="display: block;"';}else{ echo 'class="collapse"';} ?>>
        
        <li <?php if($option=='com_dashboard'){echo 'class="active"';} ?>><a href="index.php?option=com_dashboard"><i class="fa fa-angle-double-right"></i> Dashboard View</a></li>

        <li <?php if($option=='com_sitesettings'){echo 'class="active"';} ?>><a href="index.php?option=com_sitesettings"><i class="fa fa-angle-double-right"></i> Site settings</a></li>
        </ul>
        </li>
        <!--content pages--->
        
       <!-- <li class="treeview">
        <a href="#">
        <i class="fa fa-bar-chart-o"></i>
        <span>Content Pages</span>
        <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu" <?php if($option=='com_contentpage' || $option=='com_contentpage_insert' || $option=='com_meta_tag' || $option=='com_meta_tag_insert' || $option=='com_pages' || $option=='com_pages_insert' || $option=='com_countrylist' || $option=='com_countrylist_insert' || $option=='com_statelist' || $option=='com_statelist_insert' || $option=='com_seo' || $option=='com_seo_insert' ) { echo 'style="display: block;"';}else{ echo 'class="collapse"';}?>>
  <li <?php if($option=='com_contentpage'){echo 'class="active"';} ?>><a href="index.php?option=com_contentpage"><i class="fa fa-angle-double-right"></i> View Content Page</a></li>
 
        </ul>
        </li>-->
        
        <!----admin user ----->
       <li class="treeview"><a href="#">
        <i class="fa fa-fw fa-user"></i>
       <span>Users</span>
       <i class="fa fa-angle-left pull-right"></i>
       </a>
      
      
        <ul class="treeview-menu" <?php if($option=='com_adminlist' || $option=='com_regusers' || $option=='com_regusers_insert' || $option=='com_newsletters' || $option=='com_tutor' || $option=='com_tutor_insert'||$option=='com_phermouser'|| $option=='com_regusers_insert') { echo 'style="display: block;"';}else{ echo 'class="collapse"';} ?>>
        
        <li <?php if($option=='com_adminlist'){echo 'class="active"';} ?>><a href="index.php?option=com_adminlist"><i class="fa fa-angle-double-right"></i>  Admin Users</a></li>
        <!--<li <?php if($option=='com_regusers'){echo 'class="active"';} ?>><a href="index.php?option=com_regusers"><i class="fa fa-angle-double-right"></i>  Registered Users</a></li>-->
<!-- <li <?php if($option=='com_phermouser'){echo 'class="active"';} ?>><a href="index.php?option=com_phermouser"><i class="fa fa-angle-double-right"></i>  Phermo Users</a></li>-->
        
       
<li <?php if($option=='com_regusers'){echo 'class="active"';} ?>><a href="index.php?option=com_regusers"><i class="fa fa-angle-double-right"></i> Registered Users</a></li>
        
                                             <li <?php if($option=='com_socialmedia'){echo 'class="active"';} ?>><a href="index.php?option=com_socialmedia"><i class="fa fa-angle-double-right"></i>Social data</a></li>
              
<!--<li <?php if($option=='com_newsletters'){echo 'class="active"';} ?>><a href="index.php?option=com_newsletters"><i class="fa fa-angle-double-right"></i> Subscribers</a></li>-->
      
        <?php /*?><li <?php if($option=='com_suppliers'){echo 'class="active"';} ?>><a href="index.php?option=com_suppliers"><i class="fa fa-angle-double-right"></i>  Supliers</a></li>
        <li <?php if($option=='com_buyer'){echo 'class="active"';} ?>><a href="index.php?option=com_buyer"><i class="fa fa-angle-double-right"></i>  Buyers</a></li><?php */?>
        </ul>
      </li>
	  
	  
	  
	  <!--<li class="treeview">
        <a href="#">
        <i class="fa fa-table"></i>
        <span>Subscribers </span>
        <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu" <?php if($option=='com_newsletters' || $option=='com_newsletters_insert') { echo 'style="display: block;"';}else{ echo 'class="collapse"';} ?>>
                  <?php /*?><li <?php if($option=='com_testimonial'){echo 'class="active"';} ?>><a href="index.php?option=com_testimonial"><i class="fa fa-angle-double-right"></i> Testimonials</a></li><?php */?>
                  <?php /*?><li <?php if($option=='com_newsletter_subscribers'){echo 'class="active"';} ?>><a href="index.php?option=com_newsletter_subscribers"><i class="fa fa-angle-double-right"></i>Newsletters Subscribers</a></li><?php */?>
                  <li <?php if($option=='com_newsletters'){echo 'class="active"';} ?>><a href="index.php?option=com_newsletters"><i class="fa fa-angle-double-right"></i>Subscribers </a></li>
                  
        </ul>
      </li>-->
      
      
<!-------News Page---------->
      <!--<li class="treeview">
        <a href="#">
        <i class="fa fa-table"></i>
        <span>Menu Section</span>
        <i class="fa fa-angle-left pull-right"></i>
        </a>
                  <ul class="treeview-menu" <?php if($option=='com_menu' || $option=='com_menu_insert' || $option=='com_submenu' || $option=='com_submenu_insert' || $option=='com_headerbanners' || $option=='com_headerbanners_insert') { echo 'style="display: block;"';}else{ echo 'class="collapse"';} ?>>
 
                  <li <?php if($option=='com_menu'){echo 'class="active"';} ?>><a href="index.php?option=com_menu"><i class="fa fa-angle-double-right"></i> Menus</a></li>

                  <li <?php if($option=='com_submenu'){echo 'class="active"';} ?>><a href="index.php?option=com_submenu"><i class="fa fa-angle-double-right"></i>  Sub Menus</a></li>

                   <?php /*?>  <li <?php if($option=='com_subsubcategory'){echo 'class="active"';} ?>><a href="index.php?option=com_subsubcategory"><i class="fa fa-angle-double-right"></i>  Sub-Sub Category</a></li>
<?php */?>
					<li <?php if($option=='com_headerbanners'){echo 'class="active"';} ?>><a href="index.php?option=com_headerbanners"><i class="fa fa-angle-double-right"></i> Banners</a></li>                        

               

                  </ul>
      </li>-->
      
     
     <?php /*?>  
      <li class="treeview">
        <a href="#">
        <i class="fa fa-table"></i>
        <span>Video</span>
        <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu" <?php if($option=='com_videos' || $option=='com_videos_insert'  ) { echo 'style="display: block;"';}else{ echo 'class="collapse"';} ?>>
 
                  <li <?php if($option=='com_videos'){echo 'class="active"';} ?>><a href="index.php?option=com_videos"><i class="fa fa-angle-double-right"></i> view Videos</a></li>

                  </ul>
      </li>      
      ?php */?>
      
			
			
			
			
			
			
			
			
	  
	  

	  
	  
	 
     <!-- <li class="treeview">
        <a href="#">
        <i class="fa fa-table"></i>
        <span>Contact Us</span>
        <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu" <?php if($option=='com_contactus' || $option=='com_contactus_insert') { echo 'style="display: block;"';}else{ echo 'class="collapse"';} ?>>
                  <li <?php if($option=='com_contactus'){echo 'class="active"';} ?>><a href="index.php?option=com_contactus"><i class="fa fa-angle-double-right"></i> Contact Us</a></li>
                  
                  
        </ul>
      </li>-->
	  
      
      <!--<li class="treeview">
        <a href="#">
        <i class="fa fa-table"></i>
        <span>Testimonials</span>
        <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu" <?php if($option=='com_testimonial' || $option=='com_testimonial_insert') { echo 'style="display: block;"';}else{ echo 'class="collapse"';} ?>>
                  <li <?php if($option=='com_testimonial'){echo 'class="active"';} ?>><a href="index.php?option=com_testimonial"><i class="fa fa-angle-double-right"></i> Testimonials</a></li>
                  
                  
                  </ul>
      </li>-->
      
      <!-- •	Blog Management  -->
      <!--<li class="treeview">
        <a href="#">
        <i class="fa fa-table"></i>
        <span>Blog Management</span>
        <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu" <?php if($option=='com_blog' || $option=='com_blog_insert') { echo 'style="display: block;"';}else{ echo 'class="collapse"';} ?>>
                  <li <?php if($option=='com_blog'){echo 'class="active"';} ?>><a href="index.php?option=com_blog"><i class="fa fa-angle-double-right"></i> Blog Management</a></li>
                  
                  
                  </ul>
      </li>-->
      
      
      <!-- •	Blog Management  -->   
      
     <!-- Newsletters --> 
      
      
      
      <!-- Newsletters -->
      
      
      <!--<li class="treeview">
        <a href="#">
        <i class="fa fa-table"></i>
        <span>Teams</span>
        <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu" <?php if($option=='com_teams' || $option=='com_teams_insert') { echo 'style="display: block;"';}else{ echo 'class="collapse"';} ?>>
                  <li <?php if($option=='com_teams'){echo 'class="active"';} ?>><a href="index.php?option=com_teams"><i class="fa fa-angle-double-right"></i> Teams</a></li>
                  
                  
                  </ul>
      </li>-->
      
      
      <!--<li class="treeview">
        <a href="#">
        <i class="fa fa-table"></i>
        <span>Cities Management</span>
        <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu" <?php if($option=='com_cities' || $option=='com_cities_insert') { echo 'style="display: block;"';}else{ echo 'class="collapse"';} ?>>
                  <li <?php if($option=='com_cities'){echo 'class="active"';} ?>><a href="index.php?option=com_cities"><i class="fa fa-angle-double-right"></i>Cities Management</a></li>
                  
                  
                  </ul>
                  
      </li>-->
      <!-- order -->
     <!-- <li class="treeview">
        <a href="#">
        <i class="fa fa-table"></i>
        <span>Orders</span>
        <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu" <?php if($option=='com_orders' || $option=='com_orders_insert'|| $option=='com_orders_display'|| $option=='com_orders_mail') { echo 'style="display: block;"';}else{ echo 'class="collapse"';} ?>>
                  <li <?php if($option=='com_orders'){echo 'class="active"';} ?>><a href="index.php?option=com_orders"><i class="fa fa-angle-double-right"></i> Orders</a></li>
                  
                  
                  </ul>
      </li>-->
              <!-- Coupouns Management  -->
              
              
                    <!-- Coupouns Management  -->
      <!--<li class="treeview">
        <a href="#">
        <i class="fa fa-table"></i>
        <span>Coupouns Management </span>
        <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu" <?php if($option=='com_promocode' || $option=='com_promocode_insert'|| $option=='com_orders_display'|| $option=='com_orders_mail') { echo 'style="display: block;"';}else{ echo 'class="collapse"';} ?>>
                  <li <?php if($option=='com_coupouns'){echo 'class="active"';} ?>><a href="index.php?option=com_promocode"><i class="fa fa-angle-double-right"></i> Coupouns Management </a></li>
                  
                  
                  </ul>
      </li>-->
      
              <!-- order -->
      
      <!--<li class="treeview">
        <a href="#">
        <i class="fa fa-table"></i>
        <span>Matches</span>
        <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu" <?php if($option=='com_matches' || $option=='com_matches_insert') { echo 'style="display: block;"';}else{ echo 'class="collapse"';} ?>>
                  <li <?php if($option=='com_matches'){echo 'class="active"';} ?>><a href="index.php?option=com_matches"><i class="fa fa-angle-double-right"></i> Matches</a></li>
                  
                  
                  
                  </ul>
      </li>-->
      
      <!--<li class="treeview">
        <a href="#">
        <i class="fa fa-table"></i>
        <span>Products</span>
        <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu" <?php if($option=='com_products' || $option=='com_products_insert') { echo 'style="display: block;"';}else{ echo 'class="collapse"';} ?>>
                  <li <?php if($option=='com_products'){echo 'class="active"';} ?>><a href="index.php?option=com_products"><i class="fa fa-angle-double-right"></i> Products</a></li>
                  
                  
                  
                  </ul>
      </li>-->
      
      <!--<li class="treeview">
        <a href="#">
        <i class="fa fa-table"></i>
        <span>Category Management </span>
        <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu" <?php if($option=='com_category' || $option=='com_category_insert'||$option=='com_subcategory') { echo 'style="display: block;"';}else{ echo 'class="collapse"';} ?>>
                  <li <?php if($option=='com_category'){echo 'class="active"';} ?>><a href="index.php?option=com_category"><i class="fa fa-angle-double-right"></i> Category Management </a></li>
                  <li <?php if($option=='com_subcategory'){echo 'class="active"';} ?>><a href="index.php?option=com_subcategory"><i class="fa fa-angle-double-right"></i> SubCategory Management </a></li>
                  
                  
                  </ul>
      </li>
      -->
      <!--<li class="treeview">
        <a href="#">
        <i class="fa fa-table"></i>
        <span>FAQ’s</span>
        <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu" <?php if($option=='com_faq' || $option=='com_faq_insert') { echo 'style="display: block;"';}else{ echo 'class="collapse"';} ?>>
                  <li <?php if($option=='com_faq'){echo 'class="active"';} ?>><a href="index.php?option=com_faq"><i class="fa fa-angle-double-right"></i>FAQ’s</a></li>
                  
                  
                  </ul>
      </li>-->
      
	  
	    <!-- <li class="treeview">
        <a href="#">
        <i class="fa fa-table"></i>
        <span>Activity Processing</span>
        <i class="fa fa-angle-left pull-right"></i>        </a>
        <ul class="treeview-menu" <?php if($option=='com_activityprocess' || $option=='com_activityprocess_insert'|| $option=='com_activityprocess_view') { echo 'style="display: block;"';}else{ echo 'class="collapse"';} ?>>
                  <li <?php if($option=='com_activityprocess'){echo 'class="active"';} ?>><a href="index.php?option=com_activityprocess"><i class="fa fa-angle-double-right"></i>Activity Processing</a></li>
                  
                  
           </ul>
      </li>-->
	  
	  
	  
	  
	  
	     <!--<li class="treeview">
        <a href="#">
        <i class="fa fa-table"></i>
        <span>Verification Processing</span>
        <i class="fa fa-angle-left pull-right"></i>        </a>
        <ul class="treeview-menu" <?php if($option=='com_userrequestdata' || $option=='com_userrequestdata_insert'||$option=='com_userrequestdata_view') { echo 'style="display: block;"';}else{ echo 'class="collapse"';} ?>>
                  <li <?php if($option=='com_userrequestdata'){echo 'class="active"';} ?>><a href="index.php?option=com_userrequestdata"><i class="fa fa-angle-double-right"></i>User Requested Data</a></li>
                  
                  
           </ul>
      </li>-->
     
       
   
	  <!--------Board OF Directory-------------->
     </ul>
    </section>
    <!-- /.sidebar -->
</aside>

<div style="padding-top:20px;">
<?php 

if(isset($_GET['err']) && $_GET['err']!=""){

?>

<div class="success" align="center" style="min-height:40px;color:#5cb85c;"><img src="img/tick.png" width="20px" height="20px;" />&nbsp;Success: <?=$_GET['err']?>!</div>

<?php } if(isset($_GET['ferr']) && $_GET['ferr']!=""){?>

<div class="warning" align="center" style="min-height:40px;color:#F00;"><img src="img/error.png" width="20px" height="20px;" />&nbsp;Fail: <?=$_GET['ferr']?>!</div>

<?php }?>

</div> 