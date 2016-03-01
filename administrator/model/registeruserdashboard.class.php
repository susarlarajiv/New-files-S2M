<?php

class reguserdashboardClass

{
function selectreguserdata()

  {
  
	global $callConfig;
	

	 $query=$callConfig->selectQuery(TPREFIX.TBL_USERS,'*','','','',''); 

	 return $callConfig->getAllRows($query);

  } 

function selectreguserdatamounth($GET)

  {
 // print_r($_GET['moth']);exit();
	global $callConfig;
	
	//$whr="timeuserenter=".$_GET['moth']."";
$query="SELECT * FROM `tb_users` WHERE `timeuserenter` LIKE '%".$_GET['moth']."%' LIMIT 0 , 30";
	 //$query=$callConfig->selectQuery(TPREFIX.TBL_USERS,'*',$whr,'','',''); 

	 return $callConfig->getAllRows($query);

  } 
  
  function selectreguserdatayrs($GET)

  {
  //print_r($_GET['yrs']);//exit();
  
	global $callConfig;
//$whr="timeuserenter=".$_GET['yrs']."";

  $query="SELECT * FROM `tb_users` WHERE `timeuserenter` LIKE  '%".$_GET['yrs']."%' LIMIT 0 , 30";
 //exit();
	 //$query=$callConfig->selectQuery(TPREFIX.TBL_USERS,'*',$whr,'','',''); 

	 return $callConfig->getAllRows($query);

  }   
  
  
  function userReg()

  {
 // print_r($_POST); exit;
	 global $callConfig;
	 $eventimage = $callConfig->freeimageUploadcomncode("banners",'image',"../uploads/reguser/","../uploads/blog/thumbs/",$post['hdn_image'],'','');
$i=date("Y-M-d");
	 $fields=array('username'=>$_POST['uname'],
	 'reguser_image'=>$eventimage,
	 
	
	 'email'=>$_POST['email'],
	 'password'=>$callConfig->passwordEncrypt($_POST['Password']),
	  'phoneno'=>$_POST['phnum'],
	 'address'=>$_POST['answer'],
	 'lastname'=>$_POST['lname'],
     'firstname'=>$_POST['fname'],
	 'dateofbirth'=>$_POST['dateofbirth'],
	  'stateofbirth'=>$_POST['stateofbirth'],
	 'cityofbirth'=>$_POST['cityofbirth'],
	 
	 'timeuserenter'=>$i,
	 
	 'status'=>$_POST['status'],
	
	 /*'type'=>'user',	
	 'date'=>date('Y-m-d')*/);
//($fields); exit;
	 $res=$callConfig->insertRecord(TPREFIX.TBL_USERS,$fields);

	  if($res!="")

	  {

		  $callConfig->headerRedirect("index.php?option=com_reguserss&err=User created successfully");

	  }

	  else

	  {

		  $callConfig->headerRedirect("index.php?option=com_reguserss&ferr=User creation failed");

	  }

  }

  function updateRegusers($post)

  

  {



	 global $callConfig;

  $eventimage = $callConfig->freeimageUploadcomncode("banners",'image',"../uploads/reguser/","../uploads/blog/thumbs/",$post['hdn_image'],'','');

	 $fields=array('username'=>$_POST['uname'],
	
	
	 'email'=>$_POST['email'],
	 'password'=>$callConfig->passwordEncrypt($_POST['Password']),
	  'phoneno'=>$_POST['phnum'],
	 'address'=>$_POST['answer'],
	  'reguser_image'=>$eventimage,
	  'lastname'=>$_POST['lname'],
     'firstname'=>$_POST['fname'],
	 'dateofbirth'=>$_POST['dateofbirth'],
	  'stateofbirth'=>$_POST['stateofbirth'],
	 'cityofbirth'=>$_POST['cityofbirth'],
	 //'country'=>$_POST['country'],
	 //'state'=>$_POST['state'],
	 //'city'=>$_POST['city'],
	 'status'=>$_POST['status'],
	 
	 
	 /*'type'=>'user',	
	 'date'=>date('Y-m-d')*/);
//print_r($eventimage);//exit();
	 $res=$callConfig->updateRecord(TPREFIX.TBL_USERS,$fields,'id',$post['id']);

	 if($res!='')

	  {

		  $callConfig->headerRedirect("index.php?option=com_reguserss&err=User updation successfully");

	  }

	  else

	  {

		  $callConfig->headerRedirect("index.php?option=com_reguserss&ferr=User updation failed");

	  }

  }


 function BlockReg($GET)

  {


//print_r($_GET); echo "mahendra";
//exit();

  // echo $id;exit;

	   global $callConfig;
	   $fields=array('status'=>'Inactive',);
$res=$callConfig->updateRecord(TPREFIX.TBL_USERS,$fields,'id',$_GET['id']);
	   //$res=$callConfig->deleteRecord(TPREFIX.TBL_USERS,'id',$id);

	   if($res==1)

	  {

		  $callConfig->headerRedirect("index.php?option=com_reguserss&err=User Blocked successfully");

	  }

	  else

	  {

		  $callConfig->headerRedirect("index.php?option=com_reguserss&ferr=User Blocked failed");

	  }

  }




 function getReguser($id)
 {
	
	 global $callConfig;
	 $whr="id='".$id."'";

	 $query=$callConfig->selectQuery(TPREFIX.TBL_USERS,'*',$whr,'','',''); 

	 return $callConfig->getRow($query);
	 
	 
 }




 function deleteReg($id)

  {

  // echo $id;exit;

	   global $callConfig;

	   $res=$callConfig->deleteRecord(TPREFIX.TBL_USERS,'id',$id);

	   if($res==1)

	  {

		  $callConfig->headerRedirect("index.php?option=com_reguserss&err=User deleted successfully");

	  }

	  else

	  {

		  $callConfig->headerRedirect("index.php?option=com_reguserss&ferr=User deletion failed");

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

		

		$callConfig->headerRedirect("index.php?option=com_reguserss&err=Reguser Status changed successfully");

		

		}

		

		else

		

		{

		

		sitesettingsClass::recentActivities('Reguser Status changing failed on  '.DATE_TIME_FORMAT.'','e');

		

		$callConfig->headerRedirect("index.php?option=com_reguserss&ferr=Reguser Status changing failed");

		

		}

		

		}
		
		
		
		function regupdateaccess($get){

	


		global $callConfig;

		

		if($get['st']=="Active")


		$accessbe='Inactive';

		

		else

		

		$accessbe='Active';

		

		$fields=array('status'=>$accessbe);

		

		 $res=$callConfig->updateRecord(TPREFIX.TBL_USERS,$fields,'id',$get['id']);

		

		if($res==1)

		

		{

		sitesettingsClass::recentActivities('Reguser Access changed successfully on '.DATE_TIME_FORMAT.'','g');

		

		$callConfig->headerRedirect("index.php?option=com_reguserss&err=Reguser Access changed successfully");

		

		}

		

		else

		

		{

		

		sitesettingsClass::recentActivities('Reguser Access changing failed on  '.DATE_TIME_FORMAT.'','e');

		

		$callConfig->headerRedirect("index.php?option=com_reguserss&ferr=Reguser Access changing failed");

		

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
		$callConfig->headerRedirect("index.php?option=com_reguserss&err=Reguser Permition changed successfully");
		}

		else
		{
		sitesettingsClass::recentActivities('Reguser Permition changing failed on  '.DATE_TIME_FORMAT.'','e');
		$callConfig->headerRedirect("index.php?option=com_reguserss&ferr=Reguser Permition changing failed");
		}
		}


}


   


?>