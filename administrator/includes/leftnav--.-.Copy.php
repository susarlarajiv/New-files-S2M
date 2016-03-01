<?php

$selmem = mysql_query("select COUNT(*) from tb_admin where mes_status='".unseen."' and  status='".Active."'");

$respet = mysql_result($selmem,0); 

$selmem1 = mysql_query("select COUNT(*) from tb_registeration where mes_status='".unseen."'");

$respet1 = mysql_result($selmem1,0);

$selmem2 = mysql_query("select COUNT(*) from  tb_newsletters where mes_status='".unseen."'and  status='".Active."'");

$respet2 = mysql_result($selmem2,0);

$selmem3 = mysql_query("select COUNT(*) from  tb_classifieds where mes_status='".unseen."'and  status='".Active."'");

$respet3 = mysql_result($selmem3,0);

$selmem4 = mysql_query("select COUNT(*) from  tb_directories where mes_status='".unseen."'and  status='".Active."'");

$respet4 = mysql_result($selmem4,0);

$selmem5 = mysql_query("select COUNT(*) from  tb_animaltype where mes_status='".unseen."'and  status='".Active."'");

$respet5 = mysql_result($selmem5,0);

$selmem6 = mysql_query("select COUNT(*) from  tb_breeds where mes_status='".unseen."'and  status='".Active."'");

$respet6 = mysql_result($selmem6,0);

$selmem7 = mysql_query("select COUNT(*) from  tb_barnd where mes_status='".unseen."'and  status='".Active."'");

$respet7 = mysql_result($selmem7,0);

$selmem8 = mysql_query("select COUNT(*) from   tb_category where mes_status='".unseen."'and  status='".Active."'");

$respet8 = mysql_result($selmem8,0);

$selmem9 = mysql_query("select COUNT(*) from  tb_subcategory where mes_status='".unseen."'and  status='".Active."'");

$respet9 = mysql_result($selmem9,0);

$selmem10 = mysql_query("select COUNT(*) from  tb_banners where mes_status='".unseen."'and  status='".Active."'");

$respet10 = mysql_result($selmem10,0);

$selmem11 = mysql_query("select COUNT(*) from  tb_advertise where mes_status='".unseen."'and  status='".Active."'");

$respet11 = mysql_result($selmem11,0);

$selmem12 = mysql_query("select COUNT(*) from  tb_events where mes_status='".unseen."'and  status='".Active."'");

$respet12 = mysql_result($selmem12,0);

$selmem13 = mysql_query("select COUNT(*) from  tb_blog where mes_status='".unseen."'and  status='".Active."'");

$respet13 = mysql_result($selmem13,0);

$selmem14 = mysql_query("select COUNT(*) from  tb_charity where mes_status='".unseen."'and  status='".Active."'");

$respet14 = mysql_result($selmem14,0);

$selmem15 = mysql_query("select COUNT(*) from  tb_competations where mes_status='".unseen."'and  status='".Active."'");

$respet15 = mysql_result($selmem15,0);

$selmem16 = mysql_query("select COUNT(*) from  tb_countries where mes_status='".unseen."'and  status='".Active."'");

$respet16 = mysql_result($selmem16,0);

$selmem17 = mysql_query("select COUNT(*) from  tb_states where mes_status='".unseen."'");

$respet17 = mysql_result($selmem17,0);

$selmem18 = mysql_query("select COUNT(*) from tb_cities where mes_status='".unseen."'and  status='".Active."'");

$respet18 = mysql_result($selmem18,0);

$selmem19 = mysql_query("select COUNT(*) from tb_blog_comments where mes_status='".unseen."'and  status='".Active."'");

$respet19 = mysql_result($selmem19,0);

$selmem20 = mysql_query("select COUNT(*) from tb_petgallery where mes_status='".unseen."'and  status='".Active."'");

$respet20 = mysql_result($selmem20,0);



$selmem21 = mysql_query("select COUNT(*) from tb_orders where mes_status='".unseen."' and ordertype='Products Payments'");

$respet21 = mysql_result($selmem21,0);

$selmem22 = mysql_query("select COUNT(*) from tb_orders where mes_status='".unseen."' and ordertype='Microsite  Payments'");

$respet22 = mysql_result($selmem22,0);

$selmem23 = mysql_query("select COUNT(*) from tb_orders where mes_status='".unseen."' and ordertype='Franchise Payments'");

$respet23 = mysql_result($selmem23,0);

$selmem24 = mysql_query("select COUNT(*) from tb_orders where mes_status='".unseen."' and ordertype='Listing  Payments'");

$respet24 = mysql_result($selmem24,0);

$selmem25 = mysql_query("select COUNT(*) from tb_orders where mes_status='".unseen."' and ordertype='Advertize Payments'");

$respet25 = mysql_result($selmem25,0);





?>

<div class="wrapper row-offcanvas row-offcanvas-left">

<aside class="left-side sidebar-offcanvas">

                <!-- sidebar: style can be found in sidebar.less -->

                <section class="sidebar">

                    <!-- Sidebar user panel -->

                    <div class="user-panel">

                     <div class="pull-left image">

                     <img src="img/avatar3.png" class="img-circle" alt="User Image" />

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

                    <ul class="treeview-menu" <?php if($option=='com_dashboard' || $option=='com_sitesettings' || $option=='com_bannersprice') { echo 'style="display: block;"';}else{ echo 'class="collapse"';} ?>>

					

					<li <?php if($option=='com_dashboard'){echo 'class="active"';} ?>><a href="index.php?option=com_dashboard"><i class="fa fa-angle-double-right"></i> Dashboard View</a></li>
                   <!-- <li <?php if($option=='com_dbbackup'){echo 'class="active"';} ?>><a href="index.php?option=com_dbbackup"><i class="fa fa-angle-double-right"></i> DBbackup</a></li>-->
					

                    <li <?php if($option=='com_sitesettings'){echo 'class="active"';} ?>><a href="index.php?option=com_sitesettings"><i class="fa fa-angle-double-right"></i> Sitesettings</a></li>
                    

                    </ul>

                    </li>

                    <!--content pages--->

				

                    <li class="treeview">

                    <a href="#">

                    <i class="fa fa-bar-chart-o"></i>

                    <span>Content Pages</span>

                    <i class="fa fa-angle-left pull-right"></i>

                    </a>

                    <ul class="treeview-menu" <?php if($option=='com_contentpage' || $option=='com_contentpage_insert' || $option=='com_meta_tag' || $option=='com_meta_tag_insert' || $option=='com_pages' || $option=='com_pages_insert' ) { echo 'style="display: block;"';}else{ echo 'class="collapse"';} ?> >

                    <li <?php if($option=='com_contentpage'){echo 'class="active"';} ?>><a href="index.php?option=com_contentpage"><i class="fa fa-angle-double-right"></i> View Content Page</a></li>

                 <?php /*?>   <li <?php if($option=='com_contentpage_insert'){echo 'class="active"';} ?>><a href="index.php?option=com_contentpage_insert"><i class="fa fa-angle-double-right"></i> Add Content Page</a></li><?php */?>

                    </ul>

                    </li>

					

                    <!----admin user ----->

                   <li class="treeview"><a href="#">

                    <i class="fa fa-fw fa-user"></i>

					<?php

					

					$totalusers=$respet+$respet1+$respet2;

					?>

                   <span>Users</span>

                   <i class="fa fa-angle-left pull-right"></i>

                   </a>
                    <ul class="treeview-menu" <?php if($option=='com_adminlist' || $option=='com_regusers' || $option=='com_newsletters' ) { echo 'style="display: block;"';}else{ echo 'class="collapse"';} ?>>

					 

                    <li <?php if($option=='com_adminlist'){echo 'class="active"';} ?>><a href="index.php?option=com_adminlist"><i class="fa fa-angle-double-right"></i>  Admin Users</a></li>

					

                    <li <?php if($option=='com_regusers'){echo 'class="active"';} ?>><a href="index.php?option=com_regusers"><i class="fa fa-angle-double-right"></i> Registered Users</a></li>

					

                    <li <?php if($option=='com_newsletters'){echo 'class="active"';} ?>><a href="index.php?option=com_newsletters"><i class="fa fa-angle-double-right"></i> Subscribers</a></li>

					

                    </ul>

                  </li>

                  <!----------------Pet Gallery-------------->

               <?php /*?>   <li class="treeview">

                  <a href="#">

                  <i class="fa fa-table"></i> <span>Gallery(<?php echo $respet20;?>)</span>

                  <i class="fa fa-angle-left pull-right"></i>

                  </a>

                    <ul class="treeview-menu" <?php if($option=='com_petgallery' ) { echo 'style="display: block;"';}else{ echo 'class="collapse"';} ?>>

                    <li <?php if($option=='com_petgallery'){echo 'class="active"';} ?>><a href="index.php?option=com_petgallery"><i class="fa fa-angle-double-right"></i>Pet Gallery(<?php echo $respet20;?>)</a></li>

                    </ul>

                  </li><?php */?>

				  

                  

                  <!---------Categories--------------->

				 
                  <li class="treeview">

                  <a href="#">

                  <i class="fa fa-edit"></i> <span>Menulist</span>

                  <i class="fa fa-angle-left pull-right"></i>

                  </a>

                  <ul class="treeview-menu" <?php if($option=='com_categories' || $option=='com_categories_insert' || $option=='com_subcategory' || $option=='com_subcategory_insert' || $option=='com_subsubcategory' || $option=='com_subsubcategory_insert'  || $option=='com_breeds' || $option=='com_animaltype' || $option=='com_brands' ||$option=='com_banners' ) { echo 'style="display: block;"';}else{ echo 'class="collapse"';} ?>>
 
                  <li <?php if($option=='com_categories'){echo 'class="active"';} ?>><a href="index.php?option=com_categories"><i class="fa fa-angle-double-right"></i> Categories</a></li>

                  <?php /*?> <li <?php if($option=='com_subcategory'){echo 'class="active"';} ?>><a href="index.php?option=com_subcategory"><i class="fa fa-angle-double-right"></i>  Sub Category(<?php echo $respet9;?>)</a></li>

                    <li <?php if($option=='com_subsubcategory'){echo 'class="active"';} ?>><a href="index.php?option=com_subsubcategory"><i class="fa fa-angle-double-right"></i>  Sub-Sub Category</a></li>

					<li <?php if($option=='com_banners'){echo 'class="active"';} ?>><a href="index.php?option=com_banners"><i class="fa fa-angle-double-right"></i> Banners(<?php echo $respet10;?>)</a></li>         <?php */?>               

               

                  </ul>

                  </li>
<!---------Categories--------------->

				 
                  <li class="treeview">

                  <a href="#">

                  <i class="fa fa-edit"></i> <span>Video</span>

                  <i class="fa fa-angle-left pull-right"></i>

                  </a>

                  <ul class="treeview-menu" <?php if($option=='com_videos' || $option=='com_videos_insert'  ) { echo 'style="display: block;"';}else{ echo 'class="collapse"';} ?>>
 
                  <li <?php if($option=='com_videos'){echo 'class="active"';} ?>><a href="index.php?option=com_videos"><i class="fa fa-angle-double-right"></i> view Videos</a></li>

                 
               

                  </ul>

                  </li>

				 

                  

                 <?php /*?> <li class="treeview">

                  <a href="#">

                 

                  <i class="fa fa-edit"></i> <span>Classifieds</span>

                  <i class="fa fa-angle-left pull-right"></i>

                  </a>

                  <ul class="treeview-menu" <?php if($option=='com_classifieds' || $option=='com_classifieds_insert' || $option=='com_directories' || $option=='com_directories_insert') { echo 'style="display: block;"';}else{ echo 'class="collapse"';} ?>>

                  

                  <li <?php if($option=='com_classifieds'){echo 'class="active"';} ?>><a href="index.php?option=com_classifieds&ctype=Yes"><i class="fa fa-angle-double-right"></i>Classifieds(<?php echo $respet3;?>)</a></li>

                 

                  <li <?php if($option=='com_directories'){echo 'class="active"';} ?>><a href="index.php?option=com_directories&ctype=No"><i class="fa fa-angle-double-right"></i>Directories(<?php echo $respet4;?>)</a></li>

                  </ul>

                  </li><?php */?>

                  

                 <!-------advertise-------> 
<?php /*?>
                  <li class="treeview">

                  <a href="#">

				  <?php

				  $totaladvertise=$respet10+respet11;

				  ?>

                  <i class="fa fa-edit"></i> <span>Advertise(<?php echo $totaladvertise;?>)</span>

                  <i class="fa fa-angle-left pull-right"></i>

                  </a>

                  <ul class="treeview-menu" <?php if($option=='com_advertise' || $option=='com_advertise_insert' || $option=='com_banneradds_insert') { echo 'style="display: block;"';}else{ echo 'class="collapse"';} ?>>

                   <li <?php if($option=='com_banneradds'){echo 'class="active"';} ?>><a href="index.php?option=com_banneradds"><i class="fa fa-angle-double-right"></i>Banners Adds(<?php echo $respet11;?>)</a></li>                                   

                  </ul>

                  </li><?php */?>

                <!---------Regions--------------->

				
 <?php /*?>    
                  <li class="treeview">

                  <a href="#">

				  

             <i class="fa fa-edit"></i> <span>Regions(<?php echo $totalregions;?>)</span>

                  <i class="fa fa-angle-left pull-right"></i>

                  </a>

                  <ul class="treeview-menu" <?php if($option=='com_country' || $option=='com_country_insert' || $option=='com_state' || $option=='com_state_insert' || $option=='com_city' || $option=='com_city_insert'||$option=='com_lang' ||$option=='com_lang' ) { echo 'style="display: block;"';}else{ echo 'class="collapse"';} ?>>

               <li <?php if($option=='com_country'){echo 'class="active"';} ?>><a href="index.php?option=com_country"><i class="fa fa-angle-double-right"></i>Country(<?php echo $respet16;?>)</a></li>    

                  

                  <li <?php if($option=='com_state'){echo 'class="active"';} ?>><a href="index.php?option=com_state"><i class="fa fa-angle-double-right"></i>State(<?php echo $respet17;?>)</a></li>    

                  

                  <li <?php if($option=='com_city'){echo 'class="active"';} ?>><a href="index.php?option=com_city"><i class="fa fa-angle-double-right"></i> City(<?php echo $respet18;?>)</a></li>

				         

                                                                     

                                    

                  </ul>

                  </li>   

				<?php */?>

				

                  

                   <?php /*?><li class="treeview">

                  <a href="#">

                  <i class="fa fa-table"></i> <span>Posts</span>

                  <i class="fa fa-angle-left pull-right"></i>

                  </a>

                  <ul class="treeview-menu" <?php if($option=='com_articles' || $option=='com_articles_insert' || $option=='com_testimonials' || $option=='com_testimonials_insert' || $option=='com_email' || $option=='com_email_insert' || $option=='com_faq' || $option=='com_faq_insert'|| $option=='com_event'|| $option=='com_articles') { echo 'style="display: block;"';}else{ echo 'class="collapse"';} ?>>



                   <li <?php if($option=='com_email'){echo 'class="active"';} ?>><a href="index.php?option=com_email"><i class="fa fa-angle-double-right"></i>Email</a></li>



                  </ul>

                  </li>
<?php */?>
			

				  

		<!---------------------Events/shows/competiotions----------------------->
<?php /*?>
				<li class="treeview">

                  <a href="#">

                  <i class="fa fa-table"></i> <span>Events</span>

                  <i class="fa fa-angle-left pull-right"></i>

                  </a> 

                  <ul class="treeview-menu" <?php if($option=='com_events' || $option=='com_events_insert' || $option=='com_compevents' || $option=='com_compevents_insert' || $option=='com_expos' || $option=='com_expos_insert' || $option=='com_games' || $option=='com_games_insert' || $option=='com_news' || $option=='com_news_insert') { echo 'style="display: block;"';}else{ echo 'class="collapse"';} ?>>

                  

				  <li <?php if($option=='com_events' || $option=='com_eventssend'){echo 'class="active"';} ?>><a href="index.php?option=com_events&type=splevt"><i class="fa fa-angle-double-right"></i> View Events (<?php echo $respet12;?>) </a></li>

				  

				  <li <?php if($option=='com_expos'){echo 'class="active"';} ?>><a href="index.php?option=com_expos"><i class="fa fa-angle-double-right"></i>Expos/Shows</a></li>	



				  <li <?php if($option=='com_games'){echo 'class="active"';} ?>><a href="index.php?option=com_games"><i class="fa fa-angle-double-right"></i>Kids Club</a></li>	
                  
                 <li <?php if($option=='com_games'){echo 'class="active"';} ?>><a href="index.php?option=com_games"><i class="fa fa-angle-double-right"></i>Pedigree Clubs</a></li>	

				  <li <?php if($option=='com_compevents'){echo 'class="active"';} ?>><a href="index.php?option=com_compevents&type=comp"><i class="fa fa-angle-double-right"></i>Competition (<?php echo $respet15;?>)</a></li>	

				  

				  <li <?php if($option=='com_news'){echo 'class="active"';} ?>><a href="index.php?option=com_news"><i class="fa fa-angle-double-right"></i>News</a></li>	



                  </ul>

                </li><?php */?>

		<!--------------------End Events/shows/competiotions----------------------->
                  

                 <?php /*?> <!------FAQ----->

                  <li class="treeview">

                  <a href="#">

                  <i class="fa fa-fw fa-question"></i>

                  <span>FAQ</span>

                  <i class="fa fa-angle-left pull-right"></i>

                  </a>

                  <ul class="treeview-menu" <?php if($option=='com_faq_categories' || $option=='com_faq_categories_insert' || $option=='com_faq' || $option=='com_faq_insert') { echo 'style="display: block;"';}else{ echo 'class="collapse"';} ?>>

                  <li <?php if($option=='com_faq_categories'){echo 'class="active"';} ?>><a href="index.php?option=com_faq_categories"><i class="fa fa-angle-double-right"></i> View FAQ Categories</a></li>

                  <li <?php if($option=='com_faq_categories_insert'){echo 'class="active"';} ?>><a href="index.php?option=com_faq_categories_insert"><i class="fa fa-angle-double-right"></i> Add FAQ Category</a></li>

                  <li <?php if($option=='com_faq'){echo 'class="active"';} ?>><a href="index.php?option=com_faq"><i class="fa fa-angle-double-right"></i> View FAQ</a></li>

                  <li <?php if($option=='com_faq_insert'){echo 'class="active"';} ?>><a href="index.php?option=com_faq_insert"><i class="fa fa-angle-double-right"></i> Add FAQ</a></li>

                  <!--<li><a href="pages/UI/timeline.html"><i class="fa fa-angle-double-right"></i> Timeline</a></li>-->

                  </ul>

                  </li>

          

                  <!------------newsletter----------------------->

                  <?php /*?><li class="treeview">

                  <a href="#">

                  <i class="fa fa-table"></i> <span>News Letter Subscribers</span>

                  <i class="fa fa-angle-left pull-right"></i>

                  </a>

                  <ul class="treeview-menu" <?php if($option=='com_newsletter' ) { echo 'style="display: block;"';}else{ echo 'class="collapse"';} ?>>

                  <li <?php if($option=='com_newsletters'){echo 'class="active"';} ?>><a href="index.php?option=com_newsletters"><i class="fa fa-angle-double-right"></i> View Subscribers</a></li>

                 <!-- <li <?php if($option=='com_investors_insert'){echo 'class="active"';} ?>><a href="index.php?option=com_investors_insert"><i class="fa fa-angle-double-right"></i> Add Investment</a></li>-->

                  </ul>

                  </li><?php */?>

                  

                 
                  

                

                  

                  <!----------------seo-------------->

                  <li class="treeview">

                  <a href="#">

                  <i class="fa fa-table"></i> <span>Seo</span>

                  <i class="fa fa-angle-left pull-right"></i>

                  </a>

                    <ul class="treeview-menu" <?php if($option=='com_seo' ) { echo 'style="display: block;"';}else{ echo 'class="collapse"';} ?>>

                    <li <?php if($option=='com_seo'){echo 'class="active"';} ?>><a href="index.php?option=com_seo"><i class="fa fa-circle-o"></i>Seo</a></li>

                    </ul>

                  </li>

         <?php /*?> <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Layout Options</span>
                <span class="label label-primary pull-right">4</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
                <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
                <li><a href="pages/layout/fixed.html"><i class="fa fa-square-o"></i> Fixed</a></li>
                <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
              </ul>
            </li>           

            <li class="treeview">
              <a href="#">
                <i class="fa fa-pie-chart"></i>
                <span>Charts</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>
                <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
                <li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
                <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
              </ul>
            </li>    <?php */?>   

                  

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