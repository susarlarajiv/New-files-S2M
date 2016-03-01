<?php

class activityClass

{
function selectreguserdata()

  {
	global $callConfig;

	 $query=$callConfig->selectQuery(TPREFIX.TBL_ACTIVITYPROCESSING,'*','','','',''); 

	 return $callConfig->getAllRows($query);

  } 
  
  
  
  
  function userReg()

  {
 // print_r($_POST); exit;
	 global $callConfig;
	 $eventimage = $callConfig->freeimageUploadcomncode("banners",'image',"../uploads/activityprocessing/","../uploads/activityprocessing/thumbs/",$post['hdn_image'],'','');

	 $fields=array('activity_name'=>$_POST['activename'],
	 'reguser_image'=>$eventimage,
	 'status_Indicator'=>$_POST['onlinestatus'],
	 'activity_source'=>$_POST['activesource'],
	 'activity_id'=>$_POST['activityid'],
	 'dateofpost'=>$_POST['dateofpost'],
	 'timeofpost'=>$_POST['timeofpost'],
	  'activity_url'=>$_POST['activeurl'],
	 
	 'timeanddateofactivity'=>$_POST['dateandtimeofactivity'],
	 
	
	 'activity_email'=>$_POST['email'],
	 'password'=>$callConfig->passwordEncrypt($_POST['Password']),
	  'activity_type'=>$_POST['activetype'],
	 'message'=>$_POST['message'],
	 //'country'=>$_POST['country'],
	 //'state'=>$_POST['state'],
	 //'city'=>$_POST['city'],
	 'status'=>$_POST['status'],
	
	 /*'type'=>'user',	
	 'date'=>date('Y-m-d')*/);
//print_r($fields); exit;
	 $res=$callConfig->insertRecord(TPREFIX.TBL_ACTIVITYPROCESSING,$fields);

	  if($res!="")

	  {

		  $callConfig->headerRedirect("index.php?option=com_activityprocess&err=Activity Process created successfully");

	  }

	  else

	  {

		  $callConfig->headerRedirect("index.php?option=com_activityprocess&ferr=Activity Process  creation failed");

	  }

  }

  function updateRegusers($post)

  

  {



	 global $callConfig;

  $eventimage = $callConfig->freeimageUploadcomncode("banners",'image',"../uploads/activityprocessing/","../uploads/activityprocessing/thumbs/",$post['hdn_image'],'','');

	 $fields=array('activity_name'=>$_POST['activename'],
	 'reguser_image'=>$eventimage,
	 'status_Indicator'=>$_POST['onlinestatus'],
	 'activity_source'=>$_POST['activesource'],
	 'activity_id'=>$_POST['activityid'],
	 'dateofpost'=>$_POST['dateofpost'],
	 'timeofpost'=>$_POST['timeofpost'],
	  'activity_url'=>$_POST['activeurl'],
	 
	 'timeanddateofactivity'=>$_POST['dateandtimeofactivity'],
	 
	
	 'activity_email'=>$_POST['email'],
	 'password'=>$callConfig->passwordEncrypt($_POST['Password']),
	  'activity_type'=>$_POST['activetype'],
	 'message'=>$_POST['message'],
	 //'country'=>$_POST['country'],
	 //'state'=>$_POST['state'],
	 //'city'=>$_POST['city'],
	 'status'=>$_POST['status'],
	 
	 /*'type'=>'user',	
	 'date'=>date('Y-m-d')*/);
//print_r($eventimage);exit();
	 $res=$callConfig->updateRecord(TPREFIX.TBL_ACTIVITYPROCESSING,$fields,'id',$post['id']);

	 if($res!='')

	  {

		  $callConfig->headerRedirect("index.php?option=com_activityprocess&err=Activity Process  updation successfully");

	  }

	  else

	  {

		  $callConfig->headerRedirect("index.php?option=com_activityprocess&ferr=Activity Process  updation failed");

	  }

  }


 function getReguser($id)
 {
	
	 global $callConfig;
	 $whr="id='".$id."'";

	 $query=$callConfig->selectQuery(TPREFIX.TBL_ACTIVITYPROCESSING,'*',$whr,'','',''); 

	 return $callConfig->getRow($query);
	 
	 
 }




 function deleteReg($id)

  {

  // echo $id;exit;

	   global $callConfig;

	   $res=$callConfig->deleteRecord(TPREFIX.TBL_ACTIVITYPROCESSING,'id',$id);

	   if($res==1)

	  {

		  $callConfig->headerRedirect("index.php?option=com_activityprocess&err=Activity Process  deleted successfully");

	  }

	  else

	  {

		  $callConfig->headerRedirect("index.php?option=com_activityprocess&ferr=Activity Process  deletion failed");

	  }

  }

function regupdatestatus($get){

	


		global $callConfig;

		

		if($get['st']=="Active")


		$statusbe='Inactive';

		

		else

		

		$statusbe='Active';

		

		$fields=array('status'=>$statusbe);

		

		 $res=$callConfig->updateRecord(TPREFIX.TBL_ACTIVITYPROCESSING,$fields,'id',$get['id']);

		

		if($res==1)

		

		{

		sitesettingsClass::recentActivities('Reguser Status changed successfully on '.DATE_TIME_FORMAT.'','g');

		

		$callConfig->headerRedirect("index.php?option=com_activityprocess&err=Activity Process  Status changed successfully");

		

		}

		

		else

		

		{

		

		sitesettingsClass::recentActivities('Reguser Status changing failed on  '.DATE_TIME_FORMAT.'','e');

		

		$callConfig->headerRedirect("index.php?option=com_activityprocess&ferr=Activity Process  Status changing failed");

		

		}

		

		}
		
		
		
		function regupdateaccess($get){

	


		global $callConfig;

		

		if($get['st']=="Approved")


		$accessbe='Unapproved';

		

		else

		

		$accessbe='Approved';

		

		$fields=array('access'=>$accessbe);

		

		 $res=$callConfig->updateRecord(TPREFIX.TBL_ACTIVITYPROCESSING,$fields,'id',$get['id']);

		

		if($res==1)

		

		{

		sitesettingsClass::recentActivities('Reguser Access changed successfully on '.DATE_TIME_FORMAT.'','g');

		

		$callConfig->headerRedirect("index.php?option=com_activityprocess&err=Activity Process  Access changed successfully");

		

		}

		

		else

		

		{

		

		sitesettingsClass::recentActivities('Reguser Access changing failed on  '.DATE_TIME_FORMAT.'','e');

		

		$callConfig->headerRedirect("index.php?option=com_activityprocess&ferr=Activity Process  Access changing failed");

		

		}

		

		}
		
		function regupdatepermition($get){
		global $callConfig;
		if($get['per']=="off")
		$accessbe='Approved';
		else
		$accessbe=$get['access'];
		
     	$fields=array('access'=>$accessbe,'permition'=>$get['per']);
		 $res=$callConfig->updateRecord(TPREFIX.TBL_ACTIVITYPROCESSING,$fields,'id',$get['id']);
		if($res==1)
		{
		sitesettingsClass::recentActivities('Reguser Permition changed successfully on '.DATE_TIME_FORMAT.'','g');
		$callConfig->headerRedirect("index.php?option=com_activityprocess&err=Activity Process  Permition changed successfully");
		}

		else
		{
		sitesettingsClass::recentActivities('Reguser Permition changing failed on  '.DATE_TIME_FORMAT.'','e');
		$callConfig->headerRedirect("index.php?option=com_activityprocess&ferr=Activity Process  Permition changing failed");
		}
		}


}


   


?>