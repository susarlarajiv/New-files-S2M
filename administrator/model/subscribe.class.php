<?php

class subscribeClass
{ 


	function insertnews($post)
	{

	global $callConfig;
	 $newstrt=$post['postedon'];
		$fieldnames=array(
		'type'=>$post['type'],
		'price'=>$post['price'],
		'status'=>$post['status']);
		 $res=$callConfig->insertRecord(TPREFIX.TBL_SUBSCRIBE,$fieldnames);
		if($res!="")
		{
			sitesettingsClass::recentActivities('subscribe created successfully on'.DATE_TIME_FORMAT.'','g');
	
			$callConfig->headerRedirect("index.php?option=com_subscribe&err=subscribe created successfully");
		}
		else
		{
			sitesettingsClass::recentActivities('subscribe creation failed on'.DATE_TIME_FORMAT.'','e');

			$callConfig->headerRedirect("index.php?option=com_subscribe&ferr=subscribe creation failed");
		}

	}
	
	function updatenews($post)

	{

	global $callConfig;
		$fieldnames=array(
		'type'=>$post['type'],
		'price'=>$post['price'],
		'status'=>$post['status']);
		$res=$callConfig->updateRecord(TPREFIX.TBL_SUBSCRIBE,$fieldnames,'id',$_POST['id']);
	
	if($res==1)

	{

		sitesettingsClass::recentActivities('subscribe updated successfully on   '.DATE_TIME_FORMAT.'','g');

		$callConfig->headerRedirect("index.php?option=com_subscribe&err=subscribe updated successfully");

	}

	else

	{

		sitesettingsClass::recentActivities('subscribe updation failed on '.DATE_TIME_FORMAT.'','e');

		$callConfig->headerRedirect("index.php?option=com_subscribe&ferr=subscribe updation failed");

	}
		

	}
	
	
	function newsDelete($id)

	{

	global $callConfig;

	$res=$callConfig->deleteRecord(TPREFIX.TBL_SUBSCRIBE,'id',$id);

	if($res==1)

	{

		sitesettingsClass::recentActivities('subscribe deleted successfully on   '.DATE_TIME_FORMAT.'','e',$_SESSION['roletype']);

		$callConfig->headerRedirect("index.php?option=com_subscribe&err=subscribe deleted successfully");

	}

	else

	{

		sitesettingsClass::recentActivities('subscribe deletion failed on   '.DATE_TIME_FORMAT.'','e',$_SESSION['roletype']);

		$callConfig->headerRedirect("index.php?option=com_subscribe&ferr=subscribe deletion failed");

	}

	}
	function getnewss()
	{
		global $callConfig;
		echo $query=$callConfig->selectQuery(TPREFIX.TBL_SUBSCRIBE,'*','','','','');
		return $callConfig->getAllRows($query);
	}
	function getnews($id)
    {

	global $callConfig;

	$query=$callConfig->selectQuery(TPREFIX.TBL_SUBSCRIBE,'*','id='.$id,'','','');

	return $callConfig->getRow($query);

    }
	
	
	function subscribeStatusChanging($get){

		

		global $callConfig;

		

		if($get['st']=="Active")

		

		$statusbe='Inactive';

		

		else

		

		$statusbe='Active';

		

		$fieldnames=array('status'=>$statusbe);

		

		$res=$callConfig->updateRecord(TPREFIX.TBL_SUBSCRIBE,$fieldnames,'id',$get['id']);

		

		if($res==1)

		

		{

		

		sitesettingsClass::recentActivities('subscribe Status changed successfully on  '.DATE_TIME_FORMAT.'','g');

		

		$callConfig->headerRedirect("index.php?option=com_subscribe&err=subscribe Status changed successfully");

		

		}

		

		else

		

		{

		

		sitesettingsClass::recentActivities('subscribe Status changing failed on  '.DATE_TIME_FORMAT.'','e');

		

		$callConfig->headerRedirect("index.php?option=com_subscribe&ferr=subscribe Status changing failed");

		

		}

		

		}

}

?>