<header class="header">

<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>

<!--<title>Crowdcube</title>-->

            <a href="index.php?option=com_dashboard" class="logo" style="padding:2px 0px;">

                <!-- Add the class icon to your logo image or logo icon to add the margining -->

               <img src="../uploads/site/<?php echo $site_settings_disp->site_image; ?>" height="42" width="175"/>

            </a>

            <!-- Header Navbar: style can be found in header.less -->

            <nav class="navbar navbar-static-top" role="navigation">

                <!-- Sidebar toggle button-->

                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">

                <span class="sr-only">Toggle navigation</span>

                <span class="icon-bar"></span>

                <span class="icon-bar"></span>

                <span class="icon-bar"></span>

                </a>

                

                

                

                

                <div class="navbar-right">

                    <ul class="nav navbar-nav">

                        <!-- User Account: style can be found in dropdown.less -->

                        <li class="dropdown user user-menu">

                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                                <i class="glyphicon glyphicon-user"></i>

                                <span><?php echo $_SESSION['us_name']?> <i class="caret"></i></span>

                            </a>

                            <ul class="dropdown-menu">

                                <!-- User image -->

                                <li class="user-header bg-light-blue">
								<?php 
		
		  $qr='select * from user where user_id="'.$_SESSION['admin_id'].'"'; //exit();
		 $run=mysql_query($qr);
		 $fet=mysql_fetch_array($run);
		 $image=$fet['user_profile_photo_url'];
		 ?>
		 <img src="../uploads/profile/<?php echo $image; ?>" class="img-circle" alt="User Image" />

                                    <!--<img src="img/avatar3.png" class="img-circle" alt="User Image" />-->

                                    <p>

                                        <?php echo $_SESSION['us_name']?>

                                        <!--<small>Member since Nov. 2012</small>-->

                                    </p>

                                </li>

                                <!-- Menu Body -->

                                <!--<li class="user-body">

                                    <div class="col-xs-4 text-center">

                                        <a href="#">Followers</a>

                                    </div>

                                    <div class="col-xs-4 text-center">

                                        <a href="#">Sales</a>

                                    </div>

                                    <div class="col-xs-4 text-center">

                                        <a href="#">Friends</a>

                                    </div>

                                </li>-->

                                <!-- Menu Footer-->

                                <li class="user-footer">

                                    <div class="pull-left">

                                        <a href="index.php?option=com_changepwd" class="btn btn-default btn-flat">Change Password</a>

                                    </div>

                                    <div class="pull-right">

                                        <a href="index.php?option=com_logout" class="btn btn-default btn-flat">Sign out</a>

                                    </div>

                                </li>

                            </ul>

                        </li>

                    </ul>

                </div>

            </nav>

            

        </header>

        



