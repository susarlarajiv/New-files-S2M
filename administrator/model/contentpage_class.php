<?php



class contentpageClass



{ 



	function insertcontentpage($post)

	{

		global $callConfig;

		

		if($post['title_slug']!="")



		$titleslug=$callConfig->remove_special_symbols($post['title_slug']);

	

		else

	

		$titleslug=$callConfig->remove_special_symbols($post['title']);

		$eventimage = $callConfig->freeimageUploadcomncode("banners",'image',"../uploads/contentpages/","../uploads/contentpages/thumbs/",$post['hdn_image'],'','');

		$fieldnames=array('title'=>mysql_real_escape_string($post['title']),'image'=>$eventimage,'description'=>$post['description'],'page_title'=>mysql_real_escape_string($post['page_title']),'title_slug'=>$titleslug,'meta_keyword'=>mysql_real_escape_string($post['meta_keyword']),'meta_description'=>mysql_real_escape_string($post['meta_description']),'status'=>$post['status']);

		//print_r($fieldnames);exit;

		$res=$callConfig->insertRecord(TPREFIX.TBL_CONTENTPAGE,$fieldnames);

		//echo $res;exit;



	if($res!="")



	{



		sitesettingsClass::recentActivities('Content created successfully on >> '.DATE_TIME_FORMAT.'','g',$_SESSION['roletype']);



		$callConfig->headerRedirect("index.php?option=com_contentpage&err=contentpage created successfully");



	}



	else



	{



		sitesettingsClass::recentActivities('Content creation failed on >> '.DATE_TIME_FORMAT.'','e',$_SESSION['roletype']);



		$callConfig->headerRedirect("index.php?option=com_contentpage&ferr=contentpage creation failed");



	}



	}

	

	function updatecontentpage($post)



	{

//print_r($post);exit;

	global $callConfig;

	if($_POST['id']!="");

	{

		if($post['title_slug']!="")

		{

			$titleslug=$callConfig->remove_special_symbols($post['title_slug']);

		}

		else

		{

			$titleslug=$callConfig->remove_special_symbols($post['title']);

		}

		$eventimage = $callConfig->freeimageUploadcomncode("banners",'image',"../uploads/contentpages/","../uploads/contentpages/thumbs/",$post['hdn_image'],'','');

		$fieldnames=array('title'=>$post['title'],'image'=>$eventimage,'description'=>$post['description'],'page_title'=>mysql_real_escape_string($post['page_title']),'title_slug'=>$titleslug,'meta_keyword'=>mysql_real_escape_string($post['meta_keyword']),'meta_description'=>mysql_real_escape_string($post['meta_description']),'status'=>$post['status']);



	$res=$callConfig->updateRecord(TPREFIX.TBL_CONTENTPAGE,$fieldnames,'id',$_POST['id']);



	if($res==1)



	{



		sitesettingsClass::recentActivities('News updated successfully on >> '.DATE_TIME_FORMAT.'','g',$_SESSION['roletype']);



		$callConfig->headerRedirect("index.php?option=com_contentpage&err=contentpage updated successfully");



	}



	else



	{



		sitesettingsClass::recentActivities('News updation failed on >> '.DATE_TIME_FORMAT.'','e',$_SESSION['roletype']);



		$callConfig->headerRedirect("index.php?option=com_contentpage&ferr=contentpage updation failed");



	}

		}



	}

	

	

	function contentpageDelete($id)



	{



	global $callConfig;



	$res=$callConfig->deleteRecord(TPREFIX.TBL_CONTENTPAGE,'id',$id);



	if($res==1)



	{



		sitesettingsClass::recentActivities('News deleted successfully on >> '.DATE_TIME_FORMAT.'','e',$_SESSION['roletype']);



		$callConfig->headerRedirect("index.php?option=com_contentpage&err=contentpage deleted successfully");



	}



	else



	{



		sitesettingsClass::recentActivities('News deletion failed on >> '.DATE_TIME_FORMAT.'','e',$_SESSION['roletype']);



		$callConfig->headerRedirect("index.php?option=com_contentpage&ferr=contentpage deletion failed");



	}



	}

	function getcontentpages()

	{

		global $callConfig;

		$query=$callConfig->selectQuery(TPREFIX.TBL_CONTENTPAGE,'*','','','','');

		return $callConfig->getAllRows($query);

	}

	function getcontentpage($id)

    {



	global $callConfig;



	$query=$callConfig->selectQuery(TPREFIX.TBL_CONTENTPAGE,'*','id='.$id,'','','');



	return $callConfig->getRow($query);



    }

	

	

	function getTemplates()

	{

		//echo "hai";

	global $callConfig;



	$status="Active";

	//echo $status;

	$query=$callConfig->selectQuery(TPREFIX.TBL_CONTENTPAGE,'*','status='.$status,'','','');

	//print_r($query);//exit;

	return $callConfig->getRow($query);

	}

	function addmetags()

	{

		global $callConfig;

		$fields=array('page_name'=>$_POST['pagename'],'meta_keyword'=>$_POST['meta_keyword'],'meta_description'=>$_POST['meta_description'],'meta_title'=>$_POST['page_title'],'slug'=>$_POST['title_slug'],'status'=>$_POST['status']);

		$res=$callConfig->insertRecord(TPREFIX.TBL_META_INFO,$fields);

		if($res>0)

		{

			$callConfig->headerRedirect("index.php?option=com_meta_tag&ferr=Adding meta tags success");

		}

		else

		{

			$callConfig->headerRedirect("index.php?option=com_meta_tag&ferr=Adding meta tags failed");

		}

		

		

	}

	function updateMetadata($id)

	{

	global $callConfig;

		$fields=array('page_name'=>$_POST['pagename'],'meta_keyword'=>$_POST['meta_keyword'],'meta_description'=>$_POST['meta_description'],'meta_title'=>$_POST['page_title'],'slug'=>$_POST['title_slug'],'status'=>$_POST['status']);

		$res=$callConfig->updateRecord(TPREFIX.TBL_META_INFO,$fields,'id',$id);

		if($res>0)

		{

			$callConfig->headerRedirect("index.php?option=com_meta_tag&ferr=Updating meta tags success");

		}

		else

		{

			$callConfig->headerRedirect("index.php?option=com_meta_tag&ferr=Updating meta tags failed");

		}

			

	}

	function getMetadata()

	{

	global $callConfig;

	$query=$callConfig->selectQuery(TPREFIX.TBL_META_INFO,'*','','','','');

	return $callConfig->getAllRows($query);	

	}

	function getsMetadata($id)

	{

	global $callConfig;

	$query=$callConfig->selectQuery(TPREFIX.TBL_META_INFO,'*','id='.$id,'','','');

	return $callConfig->getRow($query);	

	}

	

}



?>