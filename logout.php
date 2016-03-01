<?php
session_start();
if (isset($_SESSION['frontend_id'])){
//sitesettingsClass::recentActivities('Admin logout sucessfully User ID >> '.$_SESSION['userid'].' on >> '.DATE_TIME_FORMAT.'','g');
unset($_SESSION['frontend_id']);
unset($_SESSION['username']);
session_destroy();
}

if($_SESSION['frontend_id']=="")
{
header("Location:index.php?msg='Logout Success......Please Register to Sign In'");

}
?>