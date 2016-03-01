<?php
error_reporting(0);
 ob_start();
session_start();


//ini_set( "session.cookie_lifetime", "0" ); 
include('dbconfig.php');
include('administrator/includes/dbconnection.php');
include('administrator/model/sitesettings.class.php');
include('model/frontend.class.php');

$front_Obj = new frontendClass();

$sitesettings = $front_Obj->getsitesettings();
//print_r($sitesettings);

 $_SESSION['frontend_id']; 
 $_SESSION['user_username'];
 $_SESSION['email'];
 
// print_r($_SESSION);

$userdetails=$front_Obj->getaccountdetails($id);

//print_r($userdetails);
 
?>
<div class="dashboardleft">
 <div class="logo1"><img src="images/dashboard-pics_03.png" /><!--<img src="uploads/reguser/< ?php echo $userdetails->reguser_image; ?>" width="90px"; height="90px"; />--></div>
 <div class="accname">
 <h1><?php echo $_SESSION['user_username']; ?></h1>
 <h2>unverified</h2>
 </div>
 <div class="clear_fix"></div>
 <div class="mobileicon"><img src="images/menu-icon_04.png" /></div>
 <ul class="dashboardlist">
   <li>
   <a href="#">
   <span style="position:relative; top:3px;"><img src="images/dashboard_existing-icons_03.png" /></span> 3rd Party Verifications   <img src="images/dashboard_existing-icons_06.png" class="arrowicon" /></a>
    <div class="clear_fix"></div>
   </li>

   <li>
   <a href="manageprofile.php">
   <span style="position:relative; top:1px;"><img src="images/dashboard_existing-icons_11.png" /></span>&nbsp;&nbsp;My Profile 
   <img src="images/dashboard_existing-icons_06.png" class="arrowicon" /></a>
    <div class="clear_fix"></div>
   </li>


   <li>
   <a href="logout.php">
   <span style="position:relative; top:2px;"><img src="images/dashboard_existing-icons_15.png" /></span> Logout 
   <img src="images/dashboard_existing-icons_06.png" class="arrowicon" /></a>
    <div class="clear_fix"></div>
   </li>

 </ul>
</div>