<?php
include('dbconfig.php');
include('administrator/includes/dbconnection.php');
include('administrator/model/sitesettings.class.php');
//echo "update tb_users set status='Active' where id=".$_GET['id']."";exit;
$ss = mysql_query("update user set user_status_id='1' where user_id=".$_GET['user_id']."");
//print_r($ss);exit;
$callConfig->headerRedirect("index.php");

?>