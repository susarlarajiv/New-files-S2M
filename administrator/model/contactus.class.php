<?php

class contactustopicClass

{ 


 // Product category //

 function getAllBlogTopicsList($id)

  {

	global $callConfig;

	$query=$callConfig->selectQuery(TPREFIX.TBL_CONTACTUS,'*',$where,$order,$start,$limit);

	return $callConfig->getAllRows($query);

  } 
  
  function countrylistStatusChanging($get)
  {
	  global $callConfig;

	if($get['st']=="Active")

	$statusbe='Inactive';

	else

	$statusbe='Active';

	$fieldnames=array('status'=>$statusbe);

	$res=$callConfig->updateRecord(TPREFIX.TBL_CONTACTUS,$fieldnames,'id',$get['id']);

	if($res==1)

	{

		sitesettingsClass::recentActivities('Contact List Status changed successfully on   '.DATE_TIME_FORMAT.'','g');

		$callConfig->headerRedirect("index.php?option=com_contactus&err=Contact List Status changed successfully");

	}

	else

	{

		sitesettingsClass::recentActivities('Contact List Status changing failed on   '.DATE_TIME_FORMAT.'','e');

		$callConfig->headerRedirect("index.php?option=com_contactus&err=Contact List Status changing failed");

	}
	  
  }

  function getAllBlogTopicsListCount($parentid,$dispin)

  {

	global $callConfig;

	if($dispin!="")

	$where=" displayin='".$dispin."'";

	if($parentid!="" && $parentid!="all"){

	$where.=" and parentid='".$parentid."'";

	}

	$query=$callConfig->selectQuery(TPREFIX.TBL_CONTACTUS,'id',$where,'','','');

	return $callConfig->getCount($query);

  } 

  

  function getBlogTopicData($id)

  {

	global $callConfig;

	$query=$callConfig->selectQuery(TPREFIX.TBL_CONTACTUS,'*','id='.$id,'','','');

	return $callConfig->getRow($query);

 }

 

 function getBlogTopicTitle($id)

	{

		global $callConfig;

		$query=$callConfig->selectQuery(TPREFIX.TBL_CONTACTUS,'title',"id=".$id,'','','');

		return $callConfig->getRow($query);

	}

 

	function insertBlogTopics($post)

	{
	 
	global $callConfig;
	
	$fieldnames=array(
'title'=>mysql_real_escape_string($post['title']),
'address'=>mysql_real_escape_string($post['address']),
'email'=>mysql_real_escape_string($post['email']),
'phone'=>$post['phone'],
'meta_title'=>mysql_real_escape_string($post['meta_title']),
'meta_keyword'=>mysql_real_escape_string($post['meta_keyword']),
'meta_description'=>mysql_real_escape_string($post['meta_description']),
'mayihelpu'=>mysql_real_escape_string($post['mayihelpu']),
);
//print_r($fieldnames);exit;
$res=$callConfig->insertRecord(TPREFIX.TBL_CONTACTUS,$fieldnames);
	if($res!="")

	{

		sitesettingsClass::recentActivities('Contact List   Contact List created successfully on   '.DATE_TIME_FORMAT.'','g',$_SESSION['roletype']);

		$callConfig->headerRedirect("index.php?option=com_contactus&err=Contact List   Contact List created successfully");

	}

	else

	{

		sitesettingsClass::recentActivities('Contact List   Contact List creation failed on   '.DATE_TIME_FORMAT.'','e',$_SESSION['roletype']);

		$callConfig->headerRedirect("index.php?option=com_contactus&ferr=Contact List   Contact List creation failed");

	}

	}

	

	function updateBlogTopics($post)

	{
//print_r($post);exit;
	global $callConfig;
	
  $finaldate=$posteddate[2]."".$posteddate[0]."".$posteddate[1];
	

	$fieldnames=array(
'title'=>mysql_real_escape_string($post['title']),
'address'=>mysql_real_escape_string($post['address']),
'phone'=>mysql_real_escape_string($post['phone']),
'fax'=>mysql_real_escape_string($post['fax']),
'email'=>mysql_real_escape_string($post['email']),
'phone'=>$post['phone'],
'meta_title'=>mysql_real_escape_string($post['meta_title']),
'meta_keyword'=>mysql_real_escape_string($post['meta_keyword']),
'meta_description'=>mysql_real_escape_string($post['meta_description']),
'mayihelpu'=>mysql_real_escape_string($post['mayihelpu']),

);

//print_r($fieldnames);exit;
			 $query=$callConfig->selectQuery(TPREFIX.TBL_CONTACTUS,'*',$whr,'','','');

	           $result=$callConfig->getRow($query); 
               if($image!=$result->image){
			    $callConfig->imageCommonUnlink("../uploads/countrylist/","../uploads/countrylist/thumbs/",$result->image);
			   }
	$res=$callConfig->updateRecord(TPREFIX.TBL_CONTACTUS,$fieldnames,'id',$_POST['id']);

	if($res!='')

	{

		sitesettingsClass::recentActivities('Contact List   Contact List updated successfully on   '.DATE_TIME_FORMAT.'','g',$_SESSION['roletype']);

		$callConfig->headerRedirect("index.php?option=com_contactus&err=Contact List   Contact List updated successfully");

	}

	else

	{

		sitesettingsClass::recentActivities('Contact List   Contact List updation failed on   '.DATE_TIME_FORMAT.'','e',$_SESSION['roletype']);

		$callConfig->headerRedirect("index.php?option=com_contactus&ferr=Contact List   Contact List updation failed");

	}

	}

	

	function BlogTopicDelete($id)

	{

	global $callConfig;
				$whr="id=".$id;

			 $query=$callConfig->selectQuery(TPREFIX.TBL_CONTACTUS,'*',$whr,'','','');

	           $result=$callConfig->getRow($query); 

			    $callConfig->imageCommonUnlink("../uploads/countrylist/","../uploads/countrylist/thumbs/",$result->image);
	$res=$callConfig->deleteRecord(TPREFIX.TBL_CONTACTUS,'id',$id);

	if($res==1)

	{

		$query=$callConfig->selectQuery(TPREFIX.TBL_BLOGCOMMENTS,'id','b_id='.$id,'','','');

		$commentsres = $callConfig->getAllRows($query);

		$c=array();

		foreach($commentsres as $res_comets){

		$c[]=$res_comets->id;

		}

		$callConfig->deleteRecord(TPREFIX.TBL_BLOGCOMMENTS,'id',$c);

		sitesettingsClass::recentActivities('Contact List   Contact List deleted successfully on   '.DATE_TIME_FORMAT.'','g',$_SESSION['roletype']);

		$callConfig->headerRedirect("index.php?option=com_contactus&err=Contact List   Contact List deleted successfully");

	}

	else

	{

		sitesettingsClass::recentActivities('Contact List   Contact List deletion failed on   '.DATE_TIME_FORMAT.'','e',$_SESSION['roletype']);

		$callConfig->headerRedirect("index.php?option=com_contactus&ferr=Contact List   Contact List deletion failed");

	}

	}

	

	

	

	function BlogTopicDeleteImage($id)

{

	//echo "hi";exit;

	global $callConfig;

	//$image = $callConfig->freeimageUploadcomncode("countrylist",'image',"../uploads/countrylist/","../uploads/countrylist/thumbs/",$post['hdn_image'],204,107);

	$fieldnames=array('image'=>'');

	$res=$callConfig->updateRecord(TPREFIX.TBL_CONTACTUS,$fieldnames,'id',$id);

	if($res!="")

	{

		sitesettingsClass::recentActivities('Home   Contact List Image Contact List created successfully on   '.DATE_TIME_FORMAT.'','g',$_SESSION['roletype']);

		$callConfig->headerRedirect("index.php?option=com_contactus&err=Home   Contact List Image Contact List created successfully");

	}

	else

	{

		sitesettingsClass::recentActivities('Home   Contact List Image Contact List creation failed on   '.DATE_TIME_FORMAT.'','e',$_SESSION['roletype']);

		$callConfig->headerRedirect("index.php?option=com_contactus&ferr=Home   Contact List Image Contact List creation failed");

	}

}

	

	

	

	/// home articles //

	function insertHomeBlogTopics($post)

	{

	global $callConfig;

	$image = $callConfig->freeimageUploadcomncode("countrylist",'image',"../uploads/countrylist/","../uploads/countrylist/thumbs/",$post['hdn_image'],204,107);

	$fieldnames=array('parentid'=>$post['parentid'],'title'=>mysql_real_escape_string($post['title']),'smalltext'=>mysql_real_escape_string($post['smalltext']),'bigtext'=>mysql_real_escape_string($post['bigtext']),'image'=>$image,'displayin'=>'home','disp_order'=>$post['disp_order'],'status'=>$post['status']);

	$res=$callConfig->insertRecord(TPREFIX.TBL_CONTACTUS,$fieldnames);

	if($res!="")

	{

		sitesettingsClass::recentActivities('Home   Article created successfully on   '.DATE_TIME_FORMAT.'','g',$_SESSION['roletype']);

		$callConfig->headerRedirect("index.php?option=com_articlepost&err=Home   Article created successfully");

	}

	else

	{

		sitesettingsClass::recentActivities('Home   Article creation failed on   '.DATE_TIME_FORMAT.'','e',$_SESSION['roletype']);

		$callConfig->headerRedirect("index.php?option=com_articlepost&ferr=Home   Article creation failed");

	}

	}

	

	function updateHomeBlogTopics($post)

	{

	global $callConfig;

	$image = $callConfig->freeimageUploadcomncode("countrylist",'image',"../uploads/countrylist/","../uploads/countrylist/thumbs/",$post['hdn_image'],204,107);

	if($_SESSION['roletype']=="senior")

	{

		$fieldnames=array('parentid'=>$post['parentid'],'title'=>mysql_real_escape_string($post['title']),'smalltext'=>mysql_real_escape_string($post['smalltext']),'bigtext'=>mysql_real_escape_string($post['bigtext']),'image'=>$image,'displayin'=>'home','disp_order'=>$post['disp_order'],'status'=>$post['status']);

	}

	else

	{

		$fieldnames=array('parentid'=>$post['parentid'],'title'=>mysql_real_escape_string($post['title']),'smalltext'=>mysql_real_escape_string($post['smalltext']),'bigtext'=>mysql_real_escape_string($post['bigtext']),'image'=>$image,'displayin'=>'home','disp_order'=>$post['disp_order']);

	}

	$res=$callConfig->updateRecord(TPREFIX.TBL_CONTACTUS,$fieldnames,'id',$post['hdn_id']);

	if($res==1)

	{

		sitesettingsClass::recentActivities('Home   Article updated successfully on   '.DATE_TIME_FORMAT.'','g',$_SESSION['roletype']);

		$callConfig->headerRedirect("index.php?option=com_articlepost&err=Home   Article updated successfully");

	}

	else

	{

		sitesettingsClass::recentActivities('Home   Article updation failed on   '.DATE_TIME_FORMAT.'','e',$_SESSION['roletype']);

		$callConfig->headerRedirect("index.php?option=com_articlepost&ferr=Home   Article updation failed");

	}

	}

	

	function HomeBlogTopicDelete($id)

	{

	global $callConfig;

	$query=$callConfig->selectQuery(TPREFIX.TBL_CONTACTUS,'image','id='.$id,'','','');

	$imageres = $callConfig->getRow($query);

	$callConfig->imageCommonUnlink("../uploads/countrylist/","../uploads/countrylist/thumbs/",$imageres->image);

	$res=$callConfig->deleteRecord(TPREFIX.TBL_CONTACTUS,'id',$id);

	if($res==1)

	{

		$query=$callConfig->selectQuery(TPREFIX.TBL_BLOGCOMMENTS,'id','b_id='.$id,'','','');

		$commentsres = $callConfig->getAllRows($query);

		$c=array();

		foreach($commentsres as $res_comets){

		$c[]=$res_comets->id;

		}

		$callConfig->deleteRecord(TPREFIX.TBL_BLOGCOMMENTS,'id',$c);

		sitesettingsClass::recentActivities('Home   Article Contact List deleted successfully on   '.DATE_TIME_FORMAT.'','g',$_SESSION['roletype']);

		$callConfig->headerRedirect("index.php?option=com_articlepost&err=Home   Article Contact List deleted successfully");

	}

	else

	{

		sitesettingsClass::recentActivities('Contact List Contact List deletion failed on   '.DATE_TIME_FORMAT.'','e',$_SESSION['roletype']);

		$callConfig->headerRedirect("index.php?option=com_articlepost&ferr=Home   Article Contact List deletion failed");

	}

	}

	

	

	function HomeBlogTopicCommentsDelete($id)

	{

	global $callConfig;

	$res=$callConfig->deleteRecord(TPREFIX.TBL_BLOGCOMMENTS,'id',$id);

	if($res==1)

	{

		sitesettingsClass::recentActivities('Home   Article Comment deleted successfully on   '.DATE_TIME_FORMAT.'','g',$_SESSION['roletype']);

		$callConfig->headerRedirect("index.php?option=com_articlecommnets&err=Home   Article Comment deleted successfully");

	}

	else

	{

		sitesettingsClass::recentActivities('Home   Article Comment deletion failed on   '.DATE_TIME_FORMAT.'','e',$_SESSION['roletype']);

		$callConfig->headerRedirect("index.php?option=com_articlecommnets&ferr=Home   Article Comment deletion failed");

	}

	}

	//  home artilces end ///

	

	

  function getAllBlogTopicsListDropDown()

  {

	global $callConfig;

	$query=$callConfig->selectQuery(TPREFIX.TBL_CONTACTUS,'*','','','','','');

	return $callConfig->getAllRows($query);

  } 

	

  function getAllBlogCommentsList($dispin,$b_id,$sortfield,$order,$start,$limit)

  {

	global $callConfig;

	if($sortfield!="" && $order!="") $order=$sortfield.' '.$order;

	if($b_id!="" && $b_id!="all")

	{

		$wher.=" cpid='".$b_id."'";

	}

	$query=$callConfig->selectQuery(TPREFIX.TBL_BLOGCOMMENTS,'*',$wher,$order,$start,$limit);

	return $callConfig->getAllRows($query);

  } 

  function getAllBlogCommentsListCount($dispin,$b_id)

  {

	global $callConfig;

	if($b_id!="" && $b_id!="all")

	{

		$wher.=" cpid='".$b_id."'";

	}

	$query=$callConfig->selectQuery(TPREFIX.TBL_BLOGCOMMENTS,'ccid',$wher,'','','');

	return $callConfig->getCount($query);

  } 

	function BlogCommentDelete($id)

	{

	global $callConfig;

	$res=$callConfig->deleteRecord(TPREFIX.TBL_BLOGCOMMENTS,'ccid',$id);

	if($res==1)

	{

		sitesettingsClass::recentActivities('Contact List   Comment deleted successfully on   '.DATE_TIME_FORMAT.'','g',$_SESSION['roletype']);

		$callConfig->headerRedirect("index.php?option=com_contactuscomments&err=Contact List   Comment deleted successfully");

	}

	else

	{

		sitesettingsClass::recentActivities('Contact List   Comment deletion failed on   '.DATE_TIME_FORMAT.'','e',$_SESSION['roletype']);

		$callConfig->headerRedirect("index.php?option=com_contactuscomments&ferr=Contact List   Comment deletion failed");

	}

	}

	

	function BlogCommentStatusChanging($id,$status){
	
	//echo $id;exit;
		global $callConfig;
		if($status == "Active")
		{
			$fieldnames=array('status'=>'Inactive');						
		}
		else
		{
			$fieldnames=array('status'=>'Active');
			//print_r($fieldnames);exit;
		}
		
		
	$res=$callConfig->updateRecord(TPREFIX.TBL_BLOGCOMMENTS,$fieldnames,'ccid',$id);

	if($res==1)

	{

		sitesettingsClass::recentActivities('Contact List   Comment Status changed successfully on   '.DATE_TIME_FORMAT.'','g',$_SESSION['roletype']);

		$callConfig->headerRedirect("index.php?option=com_contactuscomments&err=Contact List   Comment Status changed successfully");

	}

	else

	{

		sitesettingsClass::recentActivities('Contact List   Comment Status changing failed on   '.DATE_TIME_FORMAT.'','e',$_SESSION['roletype']);

		$callConfig->headerRedirect("index.php?option=com_contactuscomments&ferr=Contact List   Comment Status changing failed");

	}

	}

	

	function HomeBlogCommentStatusChanging($get){

	global $callConfig;

	if($get['st']=="Active")

	$statusbe='Inactive';

	else

	$statusbe='Active';

	$fieldnames=array('status'=>$statusbe);

	$res=$callConfig->updateRecord(TPREFIX.TBL_BLOGCOMMENTS,$fieldnames,'id',$get['id']);

	if($res==1)

	{

		sitesettingsClass::recentActivities('Home   Article Comment Status changed successfully on   '.DATE_TIME_FORMAT.'','g',$_SESSION['roletype']);

		$callConfig->headerRedirect("index.php?option=com_articlecommnets&err=Home   Article Comment Status changed successfully");

	}

	else

	{

		sitesettingsClass::recentActivities('Home   Article Comment Status changing failed on   '.DATE_TIME_FORMAT.'','e',$_SESSION['roletype']);

		$callConfig->headerRedirect("index.php?option=com_articlecommnets&ferr=Home   Article Comment Status changing failed");

	}

	}

	

	

	

	function getAllRelationshipAdviceList($sortfield,$order,$start,$limit)

  {

	global $callConfig;

	if($sortfield!="" && $order!="") $order=$sortfield.' '.$order;

	$query=$callConfig->selectQuery(TPREFIX.TBL_RELATIONSHIPADVICE,'*','',$order,$start,$limit);

	return $callConfig->getAllRows($query);

  } 

  function getAllRelationshipAdviceListCount()

  {

	global $callConfig;

	$query=$callConfig->selectQuery(TPREFIX.TBL_RELATIONSHIPADVICE,'rid','','','','');

	return $callConfig->getCount($query);

  } 

  

  function getRelationshipAdviceData($id)

  {

	global $callConfig;

	$query=$callConfig->selectQuery(TPREFIX.TBL_RELATIONSHIPADVICE,'*','rid='.$id,'','','');

	return $callConfig->getRow($query);

 }

	

	

	

	

    function insertRelationAdvice($post)

	{

	global $callConfig;

	$fieldnames=array('name'=>$_SESSION['us_name'],'email'=>$_SESSION['email'],'comments'=>mysql_real_escape_string($post['comments']),'answers'=>mysql_real_escape_string($post['answers']),'status'=>$post['status']);

	$res=$callConfig->insertRecord(TPREFIX.TBL_RELATIONSHIPADVICE,$fieldnames,'rid',$post['hdn_id']);

	if($res!="")

	{

		sitesettingsClass::recentActivities('Home   Relationship Advice inserted successfully on   '.DATE_TIME_FORMAT.'','g',$_SESSION['roletype']);

		$callConfig->headerRedirect("index.php?option=com_relationadvice&err=Home   Relationship Advice inserted successfully");

	}

	else

	{

		sitesettingsClass::recentActivities('Home   Relationship Advice insertion failed on   '.DATE_TIME_FORMAT.'','e',$_SESSION['roletype']);

		$callConfig->headerRedirect("index.php?option=com_relationadvice&ferr=Home   Relationship Advice insertion failed");

	}

	}

	

    function updateRelationAdvice($post)

	{

	global $callConfig;

	

	$query=$callConfig->selectQuery(TPREFIX.TBL_RELATIONSHIPADVICE,'name,email','rid='.$post['hdn_id'],'','','');

	$ressec=$callConfig->getRow($query);

	if($_SESSION['roletype']=="senior")

	{

	$fieldnames=array('name'=>$ressec->name,'email'=>$ressec->email,'comments'=>mysql_real_escape_string($post['comments']),'answers'=>mysql_real_escape_string($post['answers']),'status'=>$post['status']);

     }

	 else

	 {

	  $fieldnames=array('name'=>$ressec->name,'email'=>$ressec->email,'comments'=>mysql_real_escape_string($post['comments']),'answers'=>mysql_real_escape_string($post['answers']));

	 }

	$res=$callConfig->updateRecord(TPREFIX.TBL_RELATIONSHIPADVICE,$fieldnames,'rid',$post['hdn_id']);

	if($res==1)

	{

		sitesettingsClass::recentActivities('Home   Relationship Advice updated successfully on   '.DATE_TIME_FORMAT.'','g',$_SESSION['roletype']);

		$callConfig->headerRedirect("index.php?option=com_relationadvice&err=Home   Relationship Advice updated successfully");

	}

	else

	{

		sitesettingsClass::recentActivities('Home   Relationship Advice updation failed on   '.DATE_TIME_FORMAT.'','e',$_SESSION['roletype']);

		$callConfig->headerRedirect("index.php?option=com_relationadvice&ferr=Home   Relationship Advice updation failed");

	}

	}

	

	function RelationAdviceDelete($id)

	{

	global $callConfig;

	$res=$callConfig->deleteRecord(TPREFIX.TBL_RELATIONSHIPADVICE,'rid',$id);

	if($res==1)

	{

		sitesettingsClass::recentActivities('Home Relationship Advice deleted successfully on   '.DATE_TIME_FORMAT.'','g',$_SESSION['roletype']);

		$callConfig->headerRedirect("index.php?option=com_relationadvice&err=Home   Relationship Advice deleted successfully");

	}

	else

	{

		sitesettingsClass::recentActivities('Home   Relationship Advice deletion failed on   '.DATE_TIME_FORMAT.'','e',$_SESSION['roletype']);

		$callConfig->headerRedirect("index.php?option=com_relationadvice&ferr=Home   Relationship Advice deletion failed");

	}

	}

	function getCategoryFullName($id)

   {

		global $callConfig;

		$query=$callConfig->selectQuery(TPREFIX.TBL_CONTACTUS,'title','id ='.$id,'','','');

		$res=$callConfig->getRow($query);

		return stripslashes($res->title);

   }

   

 // ip addresss ///

   function getAllIpsList($sortfield,$order,$start,$limit)

  {

	global $callConfig;

	if($sortfield!="" && $order!="") $order=$sortfield.' '.$order;

	$query=$callConfig->selectQuery(TPREFIX.TBL_IPADDRESSTRACE,'*','',$order,$start,$limit);

	return $callConfig->getAllRows($query);

  } 

  function getAllIpsListCount()

  {

	global $callConfig;

	$query=$callConfig->selectQuery(TPREFIX.TBL_IPADDRESSTRACE,'id','','','','');

	return $callConfig->getCount($query);

  } 

  function ipaddressStatusChanging($get){

	global $callConfig;

	if($get['st']=="Block")

	$statusbe='Unblock';

	else

	$statusbe='Block';

	$fieldnames=array('status'=>$statusbe);

	$res=$callConfig->updateRecord(TPREFIX.TBL_IPADDRESSTRACE,$fieldnames,'id',$get['id']);

	if($res==1)

	{

		sitesettingsClass::recentActivities('IP Address Status changed successfully on   '.DATE_TIME_FORMAT.'','g',$_SESSION['roletype']);

		$callConfig->headerRedirect("index.php?option=com_iptrace&err=IP Address Status changed successfully");

	}

	else

	{

		sitesettingsClass::recentActivities('IP Address Status changing failed on   '.DATE_TIME_FORMAT.'','e',$_SESSION['roletype']);

		$callConfig->headerRedirect("index.php?option=com_iptrace&ferr=IP Address Status changing failed");

	}

	}

	function ipaddressDelete($id)

	{

	global $callConfig;

	$res=$callConfig->deleteRecord(TPREFIX.TBL_IPADDRESSTRACE,'id',$id);

	if($res==1)

	{

		sitesettingsClass::recentActivities('IP Address deleted successfully on   '.DATE_TIME_FORMAT.'','g',$_SESSION['roletype']);

		$callConfig->headerRedirect("index.php?option=com_iptrace&err=IP Address deleted successfully");

	}

	else

	{

		sitesettingsClass::recentActivities('IP Address deletion failed on   '.DATE_TIME_FORMAT.'','e',$_SESSION['roletype']);

		$callConfig->headerRedirect("index.php?option=com_iptrace&ferr=IP Address deletion failed");

	}

	}

	

	function ipAddressPostingsandCommentsTracing($ipaddress){

	global $callConfig;

	$queryhome=$callConfig->selectQuery(TPREFIX.TBL_BLOGCOMMENTS,'ip_address',"type='home' and ip_address='".$ipaddress."'",'','','');

	$homeartcnt=$callConfig->getCount($queryhome);

	$querycountrylist=$callConfig->selectQuery(TPREFIX.TBL_BLOGCOMMENTS,'ip_address',"type='countrylist' and ip_address='".$ipaddress."'",'','','');

	$countrylistcnt=$callConfig->getCount($querycountrylist);

	$queryforumtopics=$callConfig->selectQuery(TPREFIX.TBL_FORUMTOPICS,'ip_address',"ip_address='".$ipaddress."'",'','','');

	$forumtopicscnt=$callConfig->getCount($queryforumtopics);

	$queryforumcmnts=$callConfig->selectQuery(TPREFIX.TBL_FORUMCOMMENTS,'ip_address',"ip_address='".$ipaddress."'",'','','');

	$forumcmntscnt=$callConfig->getCount($queryforumcmnts);

	$queryrelationadvice=$callConfig->selectQuery(TPREFIX.TBL_RELATIONSHIPADVICE,'ip_address',"ip_address='".$ipaddress."'",'','','');

	$relationadvicecnt=$callConfig->getCount($queryrelationadvice);

	return "Home Articles Comments &nbsp;&nbsp;- $homeartcnt<br />Contact List Comments&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- $countrylistcnt<br />Forum Topics&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- $forumtopicscnt<br />Forum Posts/Replies&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- $forumcmntscnt<br />Relationship Advice&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- $relationadvicecnt";

	//return $homeartcnt+$countrylistcnt+$forumtopicscnt+$forumcmntscnt+$relationadvicecnt;

	}

	 function getAllMenuItemList($sortfield,$order,$start,$limit)

  {

	global $callConfig;

	if($sortfield!="" && $order!="") $order=$sortfield.' '.$order;

	$query=$callConfig->selectQuery(TPREFIX.TBL_CATEGORY,'*','',$order,$start,$limit);

	return $callConfig->getAllRows($query);

  } 
  	
				function getAllCountryList()
				
				{
					global $callConfig;
			
				    $query=$callConfig->selectQuery(TPREFIX.TBL_COUNTRIES,'*','status="Active"','','','');
				
				    return $callConfig->getAllRows($query);
					
					}
					
			function getStateList($id)
				{
					global $callConfig;
			
				    $query=$callConfig->selectQuery(TPREFIX.TBL_STATES,'*','c_id='.$id,'','','');
				
				    return $callConfig->getAllRows($query);
					
					}
					
			  function getCityList($id)
				{
					global $callConfig;
			
				    $query=$callConfig->selectQuery(TPREFIX.TBL_CITIES,'*','s_id='.$id,'','','');
				
				    return $callConfig->getAllRows($query);
					
					}
				
				function getCountryData($id)
				{
				
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