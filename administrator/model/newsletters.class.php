<?php



class newsletterClass



{ 

		function getAllnewsletters($sortfield,$order,$start,$limit)  

		{

			

			global $callConfig;

	if($sortfield!="" && $order!="") $order=$sortfield.' '.$order;

	$query=$callConfig->selectQuery(TPREFIX.TBL_NEWSLETTERS,'distinct(emailid),id,status','',$order,$start,$limit);

	return $callConfig->getAllRows($query);

			

		}

		

		

		function deletenewsletters($id)

		

		{

		

		global $callConfig;

		

		$res=$callConfig->deleteRecord(TPREFIX.TBL_NEWSLETTERS,'id',$id);

		

		if($res==1)

		

		{

		

		sitesettingsClass::recentActivities('Subscriber deleted successfully on '.DATE_TIME_FORMAT.'','g',$_SESSION['roletype']);

		

		$callConfig->headerRedirect("index.php?option=com_newsletters&err=Subscriber deleted successfully");

		

		}

		

		else

		

		{

		

		sitesettingsClass::recentActivities('Subscriber deletion failed on  '.DATE_TIME_FORMAT.'','e',$_SESSION['roletype']);

		

		$callConfig->headerRedirect("index.php?option=com_newsletters&ferr=Subscriber deletion failed");

		

		}

		

		}

		

		

		

		function subsciberStatusChanging($get){

		

		global $callConfig;

		

		if($get['st']=="Active")

		

		$statusbe='Inactive';

		

		else

		

		$statusbe='Active';

		

		$fieldnames=array('status'=>$statusbe);

		

		$res=$callConfig->updateRecord(TPREFIX.TBL_NEWSLETTERS,$fieldnames,'id',$get['id']);

		

		if($res==1)

		

		{

		

		sitesettingsClass::recentActivities('Subscriber Status changed successfully on '.DATE_TIME_FORMAT.'','g',$_SESSION['roletype']);

		

		$callConfig->headerRedirect("index.php?option=com_newsletters&err=Subscriber Status changed successfully");

		

		}

		

		else

		

		{

		

		sitesettingsClass::recentActivities('Subscriber Status changing failed on  '.DATE_TIME_FORMAT.'','e',$_SESSION['roletype']);

		

		$callConfig->headerRedirect("index.php?option=com_newsletters&ferr=Subscriber Status changing failed");

		

		}

		

		}

  

  

   function getAllbannersprice()

   {

	   global $callConfig;

			

	        $query=$callConfig->selectQuery(TPREFIX.TBL_PRICE_DISPLAY,'*','','','',''); 

			

			return $callConfig->getRow($query);

	   

	   

	   }

 function gatbnners()

  {

	global $callConfig;

	

	echo $query=$callConfig->selectQuery(TPREFIX.TBL_ADDBANNERTYPE,'*','status="Active"','','','');

	

	return $callConfig->getAllRows($query);

  }



	



}	



	?>