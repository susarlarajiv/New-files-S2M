<?php
ob_start();
session_start();
ini_set( "session.cookie_lifetime", "0" ); 
include('dbconfig.php');
include('administrator/includes/dbconnection.php');
include('administrator/model/sitesettings.class.php');
include('model/frontend.class.php');

$site_Obj	= new sitesettingsClass();
$front_Obj 	= new frontendClass();

$sitesettings = $site_Obj->getsitesettings();
$id=$_SESSION['frontend_id'];
$userdetails=$front_Obj->getaccountdetails($id);?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="icon" type="image" href="http://192.254.233.173/~rajeshch/safe2meet/images/header-logo_03.png" />

<title>Safe2Meet</title>
<link type="text/css" rel="stylesheet" href="<?php echo SITEURL;?>/css/style.css" />
<link type="text/css" rel="stylesheet" href="<?php echo SITEURL;?>/css/responsive.css" />
<link rel="stylesheet" type="text/css" href="<?php echo SITEURL;?>/css/jquery.timepicker.css" />
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo SITEURL;?>/js/jquery.timepicker.js"></script>
  
 
  
<script>
$(function() {
	$( ".date_picker" ).datepicker({dateFormat: 'yy-mm-dd'});
	$('.time_picker').timepicker({ 'timeFormat': 'H:i' });
});
$(document).ready(function(){
	$(".mobileicon").click(function() { 
	$(".dashboardlist").slideToggle();
	});
 });
</script>

</head>
<body>
<?php if($_SESSION['frontend_id']==""){?>
    <header class="full_wrapper">
      <div class="site_container">
        <div class="header-logo"><a href="index.php"><img src="<?php echo SITEURL;?>/images/header-logo_03.png" /></a></div>
      </div>
    </header>
<?php }?>