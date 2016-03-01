<?php
session_start();

	if($_SESSION['admin_id']=="")
	{
		header("Location:index.php?option=com_login");
		exit();
	}

	// store the current time
	$now = time();
	// get the time the session should have expired
	$limit = $now - 20 * 60;
	// check the time of the last activity
	
	if (isset ($_SESSION['last_activity']) && $_SESSION['last_activity'] < $limit) 
	{
	  sitesettingsClass::recentActivities($_SESSION['us_name'].' >> Previous Session Expired >> '.DATE_TIME_FORMAT.'','e');
   // if too old, clear the session array and redirect
	  $_SESSION = array();	  
	  header('Location:index.php?option=com_login&ferr=Previous Session Expired, please Login Again To Acess The Administrator Panel');
	  exit;
	} 
	else 
	{
		// otherwise, set the value to the current time
		$_SESSION['last_activity'] = $now;
		//echo $_SESSION['last_activity'];
	}

?>