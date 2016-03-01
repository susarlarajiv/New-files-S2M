<?php 
 include('dbconfig.php');
 include('administrator/includes/dbconnection.php');
 $email = $_REQUEST['q'];
 $query = "SELECT user_email_address FROM user where user_email_address='".$email."'";
 $result = mysql_query($query);
  $numResults = mysql_num_rows($result);
 
  if($numResults>=1)
        { 
             echo " ";
        }
  else 
  { 
     echo $email;
	  
  }
?>