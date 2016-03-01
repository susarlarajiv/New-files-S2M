<?php

class newletterSubsribe

{
	function insertnewletterSubsribe($post)

	{

		global $callConfig;
$eventimage = $callConfig->freeimageUploadcomncode("banners",'image',"../uploads/blog/","../uploads/blog/thumbs/",$post['hdn_image'],'','');

$fieldnames=array('title'=>mysql_real_escape_string($post['title']),
                  'image'=>$eventimage,
                  'description'=>$post['description'],
				  'status'=>$post['status']);

		//print_r($fieldnames);exit;

	$res=$callConfig->insertRecord(TPREFIX.TBL_NEWSLETTER_SUBSCRIBER,$fieldnames);

		//echo $res;exit;



	if($res!="")



	{
      //print_r($res);exit;


		sitesettingsClass::recentActivities('newsletter subscribers created successfully on >> '.DATE_TIME_FORMAT.'','g',$_SESSION['roletype']);



		$callConfig->headerRedirect("index.php?option=com_newsletter_subscribers&err=newsletter subscribers created successfully");



	}



	else



	{



		sitesettingsClass::recentActivities('newsletter subscribers creation failed on >> '.DATE_TIME_FORMAT.'','e',$_SESSION['roletype']);



		$callConfig->headerRedirect("index.php?option=com_newsletter_subscribers&ferr=blog creation failed");



	}



	}

	


function updatenewletterSubsribe($post)



	{

//print_r($post);exit;

	global $callConfig;

	if($_POST['id']!="");

	{



$eventimage = $callConfig->freeimageUploadcomncode("banners",'image',"../uploads/blog/","../uploads/blog/thumbs/",$post['hdn_image'],'','');
		$fieldnames=array('title'=>mysql_real_escape_string($post['title']),
		'description'=>$post['description'],
		'image'=>$eventimage,
        'status'=>$post['status']);

        //print_r($fieldnames);exit;
 	$res=$callConfig->updateRecord(TPREFIX.TBL_NEWSLETTER_SUBSCRIBER,$fieldnames,'id',$_POST['id']);



	if($res==1)



	{
		sitesettingsClass::recentActivities('newsletter subscribers updated successfully on >> '.DATE_TIME_FORMAT.'','g',$_SESSION['roletype']);



		$callConfig->headerRedirect("index.php?option=com_newsletter_subscribers&err=newsletter subscribers updated successfully");



	}



	else



	{



		sitesettingsClass::recentActivities('newsletter subscribers updation failed on >> '.DATE_TIME_FORMAT.'','e',$_SESSION['roletype']);



		$callConfig->headerRedirect("index.php?option=com_newsletter_subscribers&ferr=newsletter subscribers updation failed");



	}

		}



	}

	function getsubscribers()

	{

		global $callConfig;

		$query=$callConfig->selectQuery(TPREFIX.TBL_NEWSLETTER_SUBSCRIBER,'*','','','','');

		return $callConfig->getAllRows($query);

	}

	function subscriberDelete($id)

	{

	global $callConfig;

	$res=$callConfig->deleteRecord(TPREFIX.TBL_NEWSLETTER_SUBSCRIBER,'id',$id);

	if($res==1)

	{

		$callConfig->headerRedirect("index.php?option=com_newsletter_subscribers&err=subscriber deleted successfully");

	}

	else

	{

		$callConfig->headerRedirect("index.php?option=com_newsletter_subscribers&ferr=subscriber deletion failed");

	}

	}

	function massmails($post)

	{

	  global $callConfig;

	  $queryuser=$callConfig->selectQuery(TPREFIX.TBL_SITESETTINGS,'*','','','','');

	  $sitedata=$callConfig->getRow($queryuser);

	  foreach($post['list'] as $to)

  	     {

		 $subject= "News letter subscription";//$res->mailsubject;

		 $message="<table cellspacing='0' cellpadding='5'  align='center' width='100%' border='0' style='border:1px solid #CCCCCC; border-collapse:collapse; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px;color: #000;'>

				  <tr>

				  <td colspan='2' align='left' valign='top'><img src='../uploads/site/thumbs/".$sitedata->site_image."' width='303' height='65'/></td>

				  </tr>

				  <tr>

				  <td  colspan='2' align='left' valign='top'>Dear<strong> ".$to."</strong></td>

				  </tr>

				  <tr>

				  <td valign='top' colspan='2' align='left'>We thank you for your newslettersubcription. Here we can provide the Required news letter.<br><br>

				Please find below the summary of news letter Info:</td>

				  </tr>

				  <tr>

				  <td valign='top' colspan='2' align='left'><table width='100%' border='1' cellspacing='0' cellpadding='0' style='border:1px solid #eeeeee; border-collapse:collapse;font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px;'>

				 <tr>

				 <td width='15%' height='23' align='left' valign='middle' colspan=2 ><strong>User Details:</strong></td>

				 </tr>

				 <tr>

				 <td width='15%' height='23' align='left' valign='middle'><strong>Email:</strong></td>

				 <td width='32%' height='23' align='left' valign='middle'>".$to."</td>

				 </tr>

				 <tr>

				 <td valign='top' colspan='2' align='left'>This dummy data for testing the news letter.<br><br>

				Testing the newsletter:</td>

				 </tr>

				 </tr>

				 </table></td>

				 </tr>

				 <tr>

				 <td valign='top' colspan='2' align='left'>&nbsp;</td>

				 </tr>

				 <tr>

				 <td valign='top' colspan='2' align='left'>&nbsp;</td>

				 </tr>

				 <tr>

				 <td valign='top' colspan='2' align='left'>Please contact our customer support team on 18004253547 for any clarifications.<br>Thank you for crowdcube with us!</td>

				 </tr>

				 <tr>

				 <td valign='top' colspan='2' align='left'>Thank You,<br />

					  Support Team, crowdcube</td>

				 </tr>

				 <tr>

				 <td valign='top' colspan='2' align='left'>".$sitedata->email_sign."</td>

				 </tr>

				 </table>";

				// print_r($message);exit;

		$headers  = 'MIME-Version: 1.0' . "\r\n";

		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

		$headers .= 'From:crowdcube <crowdcube@gmail.com>' . "\r\n";

		if(mail($to, $subject, $message, $headers))

		{	

			header("location:index.php?option=com_newsletter&err=Mail sent successfully");

		}

		else

		{

			header("location:index.php?option=com_newsletter&ferr=Mail sending Failed");

		}

		}

	}
	
	
	


	

}

?>