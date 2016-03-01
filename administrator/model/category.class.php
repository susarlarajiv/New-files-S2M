<?php
class categoryClass



{ 



	function inserttestimonial($post)

	{

		global $callConfig;
$eventimage = $callConfig->freeimageUploadcomncode("banners",'image',"../uploads/blog/","../uploads/blog/thumbs/",$post['hdn_image'],'','');

$fieldnames=array('title'=>mysql_real_escape_string($post['title']),
                  'image'=>$eventimage,
                  'description'=>$post['description'],
				  'status'=>$post['status'],
				  'productid'=>$post['productid'],
				  'productprize'=>$post['productprize']);

		//print_r($fieldnames);exit;

	$res=$callConfig->insertRecord(TPREFIX.TBL_PRODUCTS,$fieldnames);

		//echo $res;exit;



	if($res!="")



	{
      //print_r($res);exit;


		sitesettingsClass::recentActivities('Content created successfully on >> '.DATE_TIME_FORMAT.'','g',$_SESSION['roletype']);



		$callConfig->headerRedirect("index.php?option=com_products&err=blog created successfully");



	}



	else



	{



		sitesettingsClass::recentActivities('Content creation failed on >> '.DATE_TIME_FORMAT.'','e',$_SESSION['roletype']);



		$callConfig->headerRedirect("index.php?option=com_products&ferr=blog creation failed");



	}



	}

	

	function updatetestimonial($post)



	{

//print_r($post);exit;

	global $callConfig;

	if($_POST['id']!="");

	{



$eventimage = $callConfig->freeimageUploadcomncode("banners",'image',"../uploads/blog/","../uploads/blog/thumbs/",$post['hdn_image'],'','');
		$fieldnames=array('title'=>mysql_real_escape_string($post['title']),
		'description'=>$post['description'],
		'image'=>$eventimage,
        'status'=>$post['status'],
		'productid'=>$post['productid'],
		'productprize'=>$post['productprize']);

        //print_r($fieldnames);exit;
 	$res=$callConfig->updateRecord(TPREFIX.TBL_PRODUCTS,$fieldnames,'id',$_POST['id']);



	if($res==1)



	{
		sitesettingsClass::recentActivities('News updated successfully on >> '.DATE_TIME_FORMAT.'','g',$_SESSION['roletype']);



		$callConfig->headerRedirect("index.php?option=com_products&err=blog updated successfully");



	}



	else



	{



		sitesettingsClass::recentActivities('News updation failed on >> '.DATE_TIME_FORMAT.'','e',$_SESSION['roletype']);



		$callConfig->headerRedirect("index.php?option=com_products&ferr=blog updation failed");



	}

		}



	}

	

	

	function testimonialDelete($id)



	{



	global $callConfig;



	$res=$callConfig->deleteRecord(TPREFIX.TBL_PRODUCTS,'id',$id);



	if($res==1)



	{



		sitesettingsClass::recentActivities('News deleted successfully on >> '.DATE_TIME_FORMAT.'','e',$_SESSION['roletype']);



		$callConfig->headerRedirect("index.php?option=com_products&err=blog deleted successfully");



	}



	else



	{



		sitesettingsClass::recentActivities('News deletion failed on >> '.DATE_TIME_FORMAT.'','e',$_SESSION['roletype']);



		$callConfig->headerRedirect("index.php?option=com_products&ferr=blog deletion failed");



	}



	}

	function gettestimonials()

	{

		global $callConfig;

		$query=$callConfig->selectQuery(TPREFIX.TBL_PRODUCTS,'*','','','','');

		return $callConfig->getAllRows($query);

	}

	function gettestimonial($id)

    {



	global $callConfig;



	$query=$callConfig->selectQuery(TPREFIX.TBL_PRODUCTS,'*','id='.$id,'','','');



	return $callConfig->getRow($query);



    }

	

	

	function getTemplates()

	{

		//echo "hai";

	global $callConfig;



	$status="Active";

	//echo $status;

	$query=$callConfig->selectQuery(TPREFIX.TBL_PRODUCTS,'*','status='.$status,'','','');

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