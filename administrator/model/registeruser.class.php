<?php

class reguserClass

{
function selectreguserdata()

  {
	global $callConfig;
	$whr='user_Role_user_role_id=3 and User_Type_user_type_id=3';

	 $query=$callConfig->selectQuery(TBL_USER,'*',$whr,'','',''); 

	 return $callConfig->getAllRows($query);

  } 
  
  
  
  
  function userReg()

  {
  //print_r($_POST); exit;
	 global $callConfig;
	 $eventimage = $callConfig->freeimageUploadcomncode("banners",'image',"../uploads/reguser/","../uploads/reguser/thumbs/",$post['hdn_image'],'','');
	//$i=date("Y-m-d H:i:s");
	$i=date("Y-m-d");
	
	//exit();
	 $fields=array(
	 'user_first_name'=>$_POST['fname'],
	 'user_middle_initial'=>$_POST['mname'],
	 'user_last_name'=>$_POST['lname'],
	 'user_profile_photo_url'=>$eventimage,
	  
	 'User_Type_user_type_id'=>'3',
	 'user_Role_user_role_id'=>'3',
	 
	 
	 
	 //user_newsletter_has_opted_in
	 'user_username'=>$_POST['uname'],
	 
	 
	
	 'user_email_address'=>$_POST['email'],
	 'user_password'=>$callConfig->passwordEncrypt($_POST['Password']),
	  'user_mobile_number'=>$_POST['phnum'],
	 'user_address_1'=>$_POST['answer'],
	
	 'user_dob'=>$_POST['dateofbirth'],
	  
	 
	 'user_create_date'=>$i,
	 );
	//print_r($fields); exit;
	 $res=$callConfig->insertRecord(TBL_USER,$fields);

	  if($res!="")

	  {
	  

		  $callConfig->headerRedirect("index.php?option=com_regusers&err=User created successfully");

	  }

	  else

	  {

		  $callConfig->headerRedirect("index.php?option=com_regusers&ferr=User creation failed");

	  }

  }

  function updateRegusers($post)

  

  {

//print_r($_POST);

	 global $callConfig;

  $eventimage = $callConfig->freeimageUploadcomncode("banners",'image',"../uploads/reguser/","../uploads/reguser/thumbs/",$post['hdn_image'],'','');

	 $fields=array(
	'user_username'=>$_POST['uname'],
	'user_middle_initial'=>$_POST['mname'],
	'User_Type_user_type_id'=>$_POST['usertype'],
	'user_Role_user_role_id'=>$_POST['userrole'],
	'user_email_address'=>$_POST['email'],
	'user_password'=>$callConfig->passwordEncrypt($_POST['Password']),
	'user_mobile_number'=>$_POST['phnum'],
	'user_address_1'=>$_POST['answer'],
	'user_profile_photo_url'=>$eventimage,
	'user_last_name'=>$_POST['lname'],
	'user_first_name'=>$_POST['fname'],
	'user_modified_date'=>date('Y-m-d'),
	'user_dob'=>$_POST['dateofbirth'],
	

	 	  );
//print_r($fields);//exit();
	  $res=$callConfig->updateRecord(TBL_USER,$fields,'user_id',$_POST['hidid']);

	 if($res!='')

	  {

		  $callConfig->headerRedirect("index.php?option=com_regusers&err=User updation successfully");

	  }

	  else

	  {

		  $callConfig->headerRedirect("index.php?option=com_regusers&ferr=User updation failed");

	  }

  }


 function getReguser($id)
 {
	
	 global $callConfig;
	 $whr="user_id='".$id."'and user_Role_user_role_id=3 and User_Type_user_type_id=3";

	  $query=$callConfig->selectQuery(TBL_USER,'*',$whr,'','',''); 
	 return $callConfig->getRow($query);
	 
	 
 }




 function deleteReg($id)

  {

  // echo $id;exit;

	   global $callConfig;

	   $res=$callConfig->deleteRecord(TPREFIX.TBL_USERS,'id',$id);

	   if($res==1)

	  {

		  $callConfig->headerRedirect("index.php?option=com_regusers&err=User deleted successfully");

	  }

	  else

	  {

		  $callConfig->headerRedirect("index.php?option=com_regusers&ferr=User deletion failed");

	  }

  }
  
 
function regupdatestatus($get){

	


		global $callConfig;

		

		if($get['st']=="Active")


		$statusbe='Inactive';

		

		else

		

		$statusbe='Active';

		

		$fields=array('status'=>$statusbe);

		

		 $res=$callConfig->updateRecord(TPREFIX.TBL_USERS,$fields,'id',$get['id']);

		

		if($res==1)

		

		{

		sitesettingsClass::recentActivities('Reguser Status changed successfully on '.DATE_TIME_FORMAT.'','g');

		

		$callConfig->headerRedirect("index.php?option=com_regusers&err=Reguser Status changed successfully");

		

		}

		

		else

		

		{

		

		sitesettingsClass::recentActivities('Reguser Status changing failed on  '.DATE_TIME_FORMAT.'','e');

		

		$callConfig->headerRedirect("index.php?option=com_regusers&ferr=Reguser Status changing failed");

		

		}

		

		}
		
		
		
		function regupdateaccess($get){

	


		global $callConfig;

		

		if($get['st']=="Approved")


		$accessbe='Unapproved';

		

		else

		

		$accessbe='Approved';

		

		$fields=array('access'=>$accessbe);

		

		 $res=$callConfig->updateRecord(TPREFIX.TBL_USERS,$fields,'id',$get['id']);

		

		if($res==1)

		

		{

		sitesettingsClass::recentActivities('Reguser Access changed successfully on '.DATE_TIME_FORMAT.'','g');

		

		$callConfig->headerRedirect("index.php?option=com_regusers&err=Reguser Access changed successfully");

		

		}

		

		else

		

		{

		

		sitesettingsClass::recentActivities('Reguser Access changing failed on  '.DATE_TIME_FORMAT.'','e');

		

		$callConfig->headerRedirect("index.php?option=com_regusers&ferr=Reguser Access changing failed");

		

		}

		

		}
		
		function regupdatepermition($get){
		global $callConfig;
		if($get['per']=="off")
		$accessbe='Approved';
		else
		$accessbe=$get['access'];
		
     	$fields=array('access'=>$accessbe,'permition'=>$get['per']);
		 $res=$callConfig->updateRecord(TPREFIX.TBL_USERS,$fields,'id',$get['id']);
		if($res==1)
		{
		sitesettingsClass::recentActivities('Reguser Permition changed successfully on '.DATE_TIME_FORMAT.'','g');
		$callConfig->headerRedirect("index.php?option=com_regusers&err=Reguser Permition changed successfully");
		}

		else
		{
		sitesettingsClass::recentActivities('Reguser Permition changing failed on  '.DATE_TIME_FORMAT.'','e');
		$callConfig->headerRedirect("index.php?option=com_regusers&ferr=Reguser Permition changing failed");
		}
		}


}


   


?>