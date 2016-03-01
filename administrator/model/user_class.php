<?php

class userClass

{



  function getCountAllTablesDataCount($tablename,$fieldname,$where)

  {

	global $callConfig;

	if($where!=""){
	$where="user_Role_user_role_id='".$where."'";

	$whr=$where;

	$query=$callConfig->selectQuery($tablename,$fieldname,$whr,'','','');

	return $callConfig->getCount($query);
}
  }

/* function getAllAdminUsersList($usertype,$sortfield,$order,$start,$limit)

  {

	global $callConfig;

	if($sortfield!="" && $order!="") $order=$sortfield.' '.$order;

	if($usertype=="senior")

	$whr=" roletype='senior'"; 	

	if($usertype=="level2")

	$whr=" roletype='".$usertype."'";

	$query=$callConfig->selectQuery(TPREFIX.TBL_ADMIN,'*',$whr,$order,$start,$limit);

	return $callConfig->getAllRows($query);

  } */

 function getAllUsersList($sortfield,$order,$start,$limit)

  {

	global $callConfig;

	if($sortfield!="" && $order!="") $order=$sortfield.' '.$order;

	$query=$callConfig->selectQuery(TPREFIX.TBL_USERS_INFO,'*','',$order,$start,$limit);

	return $callConfig->getAllRows($query);

  }

  function getadminlist()

  {

 

	global $callConfig;

	echo $query=$callConfig->selectQuery(TPREFIX.TBL_ADMIN,'*','','','','');

	 return $callConfig->getAllRows($query);

  } 
function getadminstatus()

  {

 

	global $callConfig;

	 $query=$callConfig->selectQuery(TBL_USER_TYPE_STATUS,'*','','','','');

	 return $callConfig->getAllRows($query);

  } 


  function getAllAdminUsersListCount($usertype)

  {

	global $callConfig;

	if($usertype=="senior")

	$whr=" roletype='senior'"; 	

	if($usertype=="level2")

	$whr=" roletype='".$usertype."'";	

	$query=$callConfig->selectQuery(TPREFIX.TBL_ADMIN,'user_id',$whr,'','','');

	 return $callConfig->getCount($query);

  } 

	 function checkMemberLogin()

    {

    global $callConfig;
	
	

  //$where="user_username='".$_POST['username']."' and user_password='".$callConfig->passwordEncrypt($_POST['password'])."' and status='Active' and (roletype='Head Quarters' or roletype='National' or roletype='State' or roletype='City')";
$where="user_username='".$_POST['username']."' and user_password='".$callConfig->passwordEncrypt($_POST['password'])."' and user_Role_user_role_id='1'";
echo $query=$callConfig->selectQuery(TBL_USER,'*',$where,'','',''); 
	$row=$callConfig->getRow($query);

	print_r($row);
	//echo "joooo";
	//exit;

	if($row->user_id!="")

	{
	
	echo "mahendra";//exit();


	$_SESSION['admin_id']=$row->user_id;

	$_SESSION['us_name']=$row->user_username;

	$_SESSION['admin_email']=$row->user_email_address;

	$_SESSION['lastlogin']=$row->user_lastlogin;

 	$_SESSION['roletype']=$row->user_Role_user_role_id;

	$_SESSION['adminmemberjoinedon']=$row->user_create_date;
	//print_r($_SESSION); exit();

	sitesettingsClass::recentActivities($_SESSION['us_name'].' >> login sucessfully on >> '.DATE_TIME_FORMAT.'','',$_SESSION['roletype']);

	

	if($_POST['redirect']=="article"){

 		header("location:index.php?option=com_articles");

		exit;

	}

	if($_SESSION['roletype']=="1"){

		header("location:index.php?option=com_dashboard");

		exit;

	} 

	else if($_SESSION['roletype']=="National"){

		header("location:index.php?option=com_dashboard");

		exit;

	}

	else if($_SESSION['roletype']=="State"){

		header("location:index.php?option=com_dashboard");

		exit;

	}

	else if($_SESSION['roletype']=="City"){

		header("location:index.php?option=com_dashboard");

		exit;

	}

	 else {

		header("location:index.php?option=com_dashboard");

		exit;

	}

	}

	else

	{

	header("location:index.php?ferr=Login failed, please check the login details");

	exit;

	}

 } 

	 function userAuthentication()

	{

		if($_SESSION['admin_id']!="")

		{

		    if($_SESSION['roletype']=="Head Quarters")

			header("location:index.php?option=com_dashboard");

			else

			header("location:index.php?option=com_dashboard");

		}

	}

	function insertAdminUser($post)

	{
		
		//print_r($_POST);exit;
	global $callConfig;

	 $profilepic = $callConfig->freeimageUploadcomncode('profile','image',"../uploads/profile/","../uploads/profile/thumbs/",$post['hdn_image'],185,51); 

	$fieldnames=array(
	
	'user_first_name'=>$post['fname'],
	'User_Type_user_type_id'=>'1',
	
	'user_middle_initial'=>$post['mname'],
	'user_last_name'=>$post['lname'],
	'user_password'=>$callConfig->passwordEncrypt($post['password']),
	'user_email_address'=>$post['email'],
	'user_profile_photo_url'=>$profilepic,
	'user_address_1'=>$post['address'],
	'user_Role_user_role_id'=>$post['roletype'],
	'user_create_date'=>date('Y-m-d'),
	);
	 //print_r($fieldnames);exit;
	 $res=$callConfig->insertRecord(TBL_USER,$fieldnames); //exit();
	$myid=mysql_insert_id();
	if($res!="")
{
	
	$fieldnamess=array(
	
	'User_user_id'=>$myid,
	'user_status_desc'=>'Active',
	'user_type_is_active'=>'1',
	'user_status_id'=>'1'
	); 
	//print_r($fieldnamess);exit();
	$ress=$callConfig->insertRecord(TBL_USER_TYPE_STATUS,$fieldnamess);
	if($ress!=""){
//echo "mahendra";exit();
		sitesettingsClass::recentActivities('Admin User created successfully on >> '.DATE_TIME_FORMAT.'','g',$_SESSION['roletype']);

		$callConfig->headerRedirect("index.php?option=com_adminlist&err=Admin User created successfully");

	}}

	else

	{

		sitesettingsClass::recentActivities('Admin User creation failed on >> '.DATE_TIME_FORMAT.'','e',$_SESSION['roletype']);

		$callConfig->headerRedirect("index.php?option=com_adminlist&ferr=Admin User creation failed");

	}

	}
	
	
	function updateAdminUser($post)

	{

	global $callConfig;



	 $profilepic = $callConfig->freeimageUploadcomncode('profile','image',"../uploads/profile/","../uploads/profile/thumbs/",$post['hdn_image'],185,51); 

	

	$fieldnames=array(
	'user_first_name'=>$post['fname'],
	'user_middle_initial'=>$post['mname'],
	'user_last_name'=>$post['lname'],
	
	
	'user_username'=>$post['uname'],
	
	
	//'user_mobile_number'=>$post['name'],
	
	'User_Type_user_type_id'=>$_POST['usertype'],
	'user_Role_user_role_id'=>$_POST['roletype'],
	'user_modified_date'=>date('Y-m-d'),
	'user_password'=>$callConfig->passwordEncrypt($post['password']),
	'user_email_address'=>$post['email'],
	'user_profile_photo_url'=>$profilepic,
	'user_address_1'=>$post['address'],
	);
	

	//print_r($fieldnames);exit;

	

				$whr="id=".$post['id'];

    $query=$callConfig->selectQuery(TBL_USER,'*',$whr,'','','');

            $result=$callConfig->getRow($query); 

			if($profilepic!=$result->user_profile_photo_url){

     $callConfig->imageCommonUnlink("../uploads/profile/","../uploads/profile/thumbs/",$result->image); 

			}

	$res=$callConfig->updateRecord(TBL_USER,$fieldnames,'user_id',$post['hdn_id']);

	if($res==1)

	{

		sitesettingsClass::recentActivities('Admin User updated successfully on >> '.DATE_TIME_FORMAT.'','g',$_SESSION['roletype']);

		$callConfig->headerRedirect("index.php?option=com_adminlist&err=Admin User updated successfully");

	}

	else

	{

		sitesettingsClass::recentActivities('Admin User updation failed on >> '.DATE_TIME_FORMAT.'','e',$_SESSION['roletype']);

		$callConfig->headerRedirect("index.php?option=com_adminlist&ferr=Admin User updation failed");

	}

	}
	
	function updateAdminUser111($post)

	{
//print_r($_POST);exit();
	global $callConfig;



	 $profilepic = $callConfig->freeimageUploadcomncode('profile','image',"../uploads/profile/","../uploads/profile/thumbs/",$post['hdn_image'],185,51); 

	

	$fieldnames=array(
	'user_first_name'=>$post['fname'],
	'user_middle_initial'=>$post['mname'],
	'user_last_name'=>$post['lname'],
	
	
	'user_username'=>$post['uname'],
	
	
	//'user_mobile_number'=>$post['name'],
	
	'User_Type_user_type_id'=>$_POST['usertype'],
	'user_Role_user_role_id'=>$_POST['roletype'],
	'user_modified_date'=>date('Y-m-d'),
	'user_password'=>$callConfig->passwordEncrypt($post['password']),
	'user_email_address'=>$post['email'],
	'user_profile_photo_url'=>$profilepic,
	'user_address_1'=>$post['address'],
	);
	

	print_r($fieldnames);
	echo "mahendra";
	
//exit;
	

				$whr="user_id=".$_POST['hdn_id'];

   echo  $query=$callConfig->selectQuery(TBL_USER,'*',$whr,'','','');

            $result=$callConfig->getRow($query); 
			print_r($result11);
//exit();
			if($user_profile_photo_url!=$result->user_profile_photo_url){
			print_r($user_profile_photo_url);
			
     $callConfig->imageCommonUnlink("../uploads/profile/","../uploads/profile/thumbs/",$result->user_profile_photo_url); 

			}

	echo $res=$callConfig->updateRecord(TBL_USER,$fieldnames,'user_id',$_POST['hdn_id']);
echo"working";// exit();
	if($res==1)

	{

		sitesettingsClass::recentActivities('Admin User updated successfully on >> '.DATE_TIME_FORMAT.'','g',$_SESSION['roletype']);

		$callConfig->headerRedirect("index.php?option=com_adminlist&err=Admin User updated successfully");

	}

	else

	{

		sitesettingsClass::recentActivities('Admin User updation failed on >> '.DATE_TIME_FORMAT.'','e',$_SESSION['roletype']);

		$callConfig->headerRedirect("index.php?option=com_adminlist&ferr=Admin User updation failed");

	}

	} 


	function updateAdminUser100($post)

	{

	global $callConfig;



	 $profilepic = $callConfig->freeimageUploadcomncode('profile','image',"../uploads/profile/","../uploads/profile/thumbs/",$post['hdn_image'],185,51); 

	

	$fieldnames=array('us_name'=>$post['name'],'password'=>$callConfig->passwordEncrypt($post['password']),'email'=>$post['email'],'image'=>$profilepic,'country_id'=>$post['country'],'state_id'=>$post['state'],'city_id'=>$post['city'],'address'=>$post['address'],'roletype'=>$_POST['roletype'],'status'=>$post['status']);

	//print_r($fieldnames);exit;

	

				$whr="id=".$post['id'];

    $query=$callConfig->selectQuery(TPREFIX.TBL_ADMIN,'*',$whr,'','','');

            $result=$callConfig->getRow($query); 

			if($profilepic!=$result->image){

     $callConfig->imageCommonUnlink("../uploads/profile/","../uploads/profile/thumbs/",$result->image); 

			}

	$res=$callConfig->updateRecord(TPREFIX.TBL_USER,$fieldnames,'user_id',$post['hdn_id']);

	if($res==1)

	{

		sitesettingsClass::recentActivities('Admin User updated successfully on >> '.DATE_TIME_FORMAT.'','g',$_SESSION['roletype']);

		$callConfig->headerRedirect("index.php?option=com_adminlist&err=Admin User updated successfully");

	}

	else

	{

		sitesettingsClass::recentActivities('Admin User updation failed on >> '.DATE_TIME_FORMAT.'','e',$_SESSION['roletype']);

		$callConfig->headerRedirect("index.php?option=com_adminlist&ferr=Admin User updation failed");

	}

	} 

	function adminuserDelete($id)

	{

	global $callConfig;

	$res=$callConfig->deleteRecord(TBL_USER,'user_id',$id);

	if($res==1)

	{

		$whr="id=".$id;

    $query=$callConfig->selectQuery(TBL_USER,'*',$whr,'','','');

            $result=$callConfig->getRow($query); 

			

     $callConfig->imageCommonUnlink("../uploads/profile/","../uploads/profile/thumbs/",$result->image); 

		



		sitesettingsClass::recentActivities('Admin User deleted successfully on >> '.DATE_TIME_FORMAT.'','e',$_SESSION['roletype']);

		$callConfig->headerRedirect("index.php?option=com_adminlist&err=Admin User deleted successfully");

	}

	else

	{

		sitesettingsClass::recentActivities('Admin User deletion failed on >> '.DATE_TIME_FORMAT.'','e',$_SESSION['roletype']);

		$callConfig->headerRedirect("index.php?option=com_adminlist&ferr=Admin User deletion failed");

	}

	}
	
	  
	  
  function getAllAdminUsers()

  {
                                   
  	print_r($user_role);// exit();

	global $callConfig;

	
	if($_SESSION['roletype']=="1"||$_SESSION['roletype']=="2"){
	
	
	$whr='`user_Role_user_role_id`=1 or user_Role_user_role_id=2';
		
	


	$query=$callConfig->selectQuery(TBL_USER,'*',$whr,$order,$start,$limit);

	return $callConfig->getAllRows($query);
	}

  } 

  function getAdminUserData($id)

  {

	global $callConfig;

	$query=$callConfig->selectQuery(TBL_USER,'*','user_id='.$id,'','','');

	return $callConfig->getRow($query);

  }

  function getNewLetterSubscribers()

  {

	  global $callConfig;

	  $query=$callConfig->selectQuery(TPREFIX.TBL_NEWSLETTER_SUBSCRIBER,'*','','','','');

	  return $callConfig->getAllRows($query);

  }

 function deletesubscribers($id)

  {

	global $callConfig;

	$res=$callConfig->deleteRecord(TPREFIX.TBL_NEWSLETTER_SUBSCRIBER,'id',$id);

	if($res==1)

	{

		sitesettingsClass::recentActivities('Job deleted successfully on >> '.DATE_TIME_FORMAT.'','e',$_SESSION['roletype']);

		$callConfig->headerRedirect("index.php?option=subscribe&msg=Subscribers deleted successfully");

	}

	else

	{

		sitesettingsClass::recentActivities('Job deletion failed on >> '.DATE_TIME_FORMAT.'','e',$_SESSION['roletype']);

		$callConfig->headerRedirect("index.php?option=subscribe&msg=Subscribers deletion failed");

	}



  }

   function regupdatestatus($get){

		

		global $callConfig;

		

		if($get['st']=="Active")

		

		$statusbe='Inactive';

		

		else

		

		$statusbe='Active';

		

		$fieldnames=array('status'=>$statusbe);

		

		$res=$callConfig->updateRecord(TPREFIX.TBL_REGISTERATION,$fieldnames,'id',$get['id']);

		

		if($res==1)

		

		{

		

		sitesettingsClass::recentActivities('User Status changed successfully on '.DATE_TIME_FORMAT.'','g',$_SESSION['roletype']);

		

		$callConfig->headerRedirect("index.php?option=com_regusers&err=User Status changed successfully");

		

		}

		

		else

		

		{

		

		sitesettingsClass::recentActivities('User Status changing failed on  '.DATE_TIME_FORMAT.'','e',$_SESSION['roletype']);

		

		$callConfig->headerRedirect("index.php?option=com_regusers&ferr=User Status changing failed");

		

		}

		

		}



  function getRegusers()

  {

	  global $callConfig;

	  $query=$callConfig->selectQuery(TPREFIX.TBL_REGISTERATION,'*','','id DESC','','');

	  return $callConfig->getAllRows($query);

  }

  
  
 
  function adminchangepwd()

  {

	 global $callConfig;

		$fields=array('password'=>$callConfig->passwordEncrypt($_POST['password']));

		$res=$callConfig->updateRecord(TPREFIX.TBL_ADMIN,$fields,'user_id',$_SESSION['admin_id']);

		if($res>0)

		{

			$callConfig->headerRedirect("index.php?option=com_adminlist&err=Password changed successfully");

		}

		else

		{

			$callConfig->headerRedirect("index.php?option=com_adminlist&err=Password changing failed");

		}

		

   }

   

   

   function getAllCountriesList() /*----------Get All Countries-----------*/

		{

			//echo $where;die;

			global $callConfig;

			$query=$callConfig->selectQuery(TPREFIX.TBL_COUNTRIES,'*',$where,$order,$start,$limit);

			return $callConfig->getAllRows($query);

		}

		function getAllStatesList()   /*----------Get All States-----------*/

		{

			global $callConfig;

			$query=$callConfig->selectQuery(TPREFIX.TBL_STATES,'*',$whr,$order,$start,$limit);

			return $callConfig->getAllRows($query);

		}

		function getAllCitiesList()   /*----------Get All Cities-----------*/

		{

			global $callConfig;

			$query=$callConfig->selectQuery(TPREFIX.TBL_CITIES,'*',$whr,$order,$start,$limit);

			return $callConfig->getAllRows($query);

		}

		

		

		 function getStateList($whr)

  {

	  global $callConfig;



	 $query=$callConfig->selectQuery(TPREFIX.TBL_STATES,'*',$whr,'','','');



	return $callConfig->getAllRows($query);



  	

  }

		

		

	function getAllAdminUsersList($usertype,$sortfield,$order,$start,$limit)

  {

  	//echo $usertype;

	global $callConfig;

	if($sortfield!="" && $order!="") $order=$sortfield.' '.$order;

	if($usertype=="National")

	$whr="roletype='".$usertype."' and status='Active'"; 	

	if($usertype=="State")

	$whr="roletype='".$usertype."' and status='Active'";

	if($usertype=="City")

	$whr="roletype='".$usertype."' and status='Active'";

	$query=$callConfig->selectQuery(TBL_USER,'*',$whr,$order,$start,$limit);

	return $callConfig->getAllRows($query);

  } 

  

  

   function getStateListid($id)

  {

	  global $callConfig;



	 $query=$callConfig->selectQuery(TPREFIX.TBL_STATES,'*','c_id='.$id,'','','');



	return $callConfig->getAllRows($query);



  	

  }

  

   function getCityList($whr)

  {

	  global $callConfig;



	 $query=$callConfig->selectQuery(TPREFIX.TBL_CITIES,'*',$whr,'','','');



	return $callConfig->getAllRows($query);



  	

  }

  

  function getCountryData($id)

  {

	  

	global $callConfig;

	 $query=$callConfig->selectQuery(TPREFIX.TBL_COUNTRIES,'*','id='.$id,'','','');		

	return $callConfig->getRow($query); 

	  	  

  }

  function getcountryname($id)

  {

	 //echo $id;

	global $callConfig;

	$query=$callConfig->selectQuery(TPREFIX.TBL_COUNTRIES,'*','id='.$id,'','','');		

	return $callConfig->getRow($query);   

	  	  

  }

  

  function getStateData($id)

  {

	  

	global $callConfig;

	$query=$callConfig->selectQuery(TPREFIX.TBL_STATES,'*','id='.$id,'','','');		

	return $callConfig->getRow($query); 

	  	  

  }

   function getCityData($id)

  {

	  

	global $callConfig;

	$query=$callConfig->selectQuery(TPREFIX.TBL_CITIES,'*','id='.$id,'','','');		

	return $callConfig->getRow($query); 

	  	  

  }

  


  

  

   

}

?>