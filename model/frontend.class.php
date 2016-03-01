<?php
class frontendClass
{ 
	function getsitesettings()
	{
		global $callConfig;
		$query=$callConfig->selectQuery(TBL_SITESETTINGS,'*','','','','');
		return $callConfig->getRow($query);
	}
	
	function getblogdetails()
  	{
		global $callConfig;
		$query=$callConfig->selectQuery(TBL_TESTIMONIAL,'*','','','','');
		return $callConfig->getAllRows($query);
  	}
	
   	function getblogabout($id)
  	{
		global $callConfig;
		$whr = "id".$id."";
		$query=$callConfig->selectQuery(TBL_CONTENTPAGE,'*',$whr,'','','');
		return $callConfig->getRow($query);
  	}
   	function userregister()
  	{
		global $callConfig;
		$i=date("Y-M-d");
		$ran_key=substr(md5(rand()), 0, 25).time();
		$fields=array(
			'user_first_name'=>$_POST['fname'],
			'user_last_name'=>$_POST['lname'],
			'user_email_address'=>$_POST['email'],
			'User_Type_user_type_id'=>'1',
			'user_Role_user_role_id'=>'3',
			'user_password'=>$callConfig->passwordEncrypt($_POST['password']),
			'user_create_date'=>$i,
			'user_confirm_type'=>$_POST['comfirm_type'],
			'user_status_id'=>'2',
			'user_verify'=>'not verified',
			'user_3rd_verifcation'=>'not verified'
		);
		$res=$callConfig->insertRecord(TBL_USER,$fields); 
		$uid = mysql_insert_id();
		if($res!=""){
			$field=array(
						'user_status_id'=>'2',
						'user_status_desc'=>'Inactive',
						'user_type_is_active'=>'2',
						'user_status_id'=>$uid,
					);
			if($_POST['comfirm_type']=='email'){
				$add_url="&cnf_type=email";
				$ress=$callConfig->insertRecord(TBL_USER_STATUS,$field); 	
				$fields_temp=array(	'user_id'=>$res,
									'user_email'=>$_POST['email'],
									'verificartion_key'=>$ran_key,
									'type'=>'reg',
									'verify_status'=>'no'
							);
				$callConfig->insertRecord(TBL_USER_TEMP,$fields_temp);
			}
			if($ress!=""){
				$callConfig->headerRedirect("index.php?user_id=".$uid.$add_url."&msgreg=successfully");
			}
		}
		else{	
			 $callConfig->headerRedirect("register.php?&msgreg=failed");
		}
  	}
	function getlogindetails($post)
	{
		global $callConfig;
		$raj="select * from ".TBL_USER." where user_email_address='".$_POST['email']."' and user_password='".$callConfig->passwordEncrypt($_POST['password'])."' and user_status_id='1'";  
		$qq1=mysql_query($raj);
		$res=mysql_fetch_array($qq1);
		$rows=mysql_num_rows($qq1);
		if($rows>=1){ 
			$_SESSION['frontend_id']=$res['user_id']; 
			$_SESSION['user_username']=$res['user_username'];
			$_SESSION['user_email_address']=$res['user_email_address'];
			if($res['user_ssn']!="" && $res['user_verify']=='not verified'){
				header("location:".DASHBOARDNEWUSER."?msgS='LogIn Successfully'" );
			}else if($res['user_3rd_verifcation']=='not verified'){
				header("location:".DASHBOARDNEWUSER."?msgS='LogIn Successfully'" );
			}else{
				header("location:".DASHBOARDEXIST."?msg='LogIn Successfully'" );
			}
		}
		else {
			header("location:".LOGIN."?msg='LogIn Failed'" );	
		}
  	}
  
	function getaccountdetails()
	{
		global $callConfig;
		$where = "user_id='".$_SESSION['frontend_id']."'";
		$query=$callConfig->selectQuery(TBL_USER,'*',$where,'','','');
		return $callConfig->getRow($query);
	}
  
  function forgot($post)
  {
	global $callConfig;
	$queryman=$callConfig->selectQuery(TBL_SITESETTINGS,'*','','','','');
	$sitedata=$callConfig->getRow($queryman);
 	$query=$callConfig->selectQuery(TBL_USER,'*',"user_email_address='".$_POST['email']."' ",'','',''); 
	$row=$callConfig->getRow($query);
	if($row->user_email_address!="" && $row->user_password!=""){
		$for_key=substr(md5(rand()), 0, 25).time();
		$fieldnames=array('user_id'=>$row->user_id,'user_email'=>$row->user_email_address,'verificartion_key'=>$for_key,'type'=>'for','verify_status'=>'no');
		$res=$callConfig->insertRecord(TBL_USER_TEMP,$fieldnames);
		$message="<table width='100%' border='0' style='border:1px solid #CCCCCC; border-collapse:collapse;font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#89806e; font-weight:bold;'>
					<tr>
					<td colspan='2' align='left' valign='top'><img src='".SITEURL."/uploads/site/site_image_145450242656b1f21a43cc9.png' width='303' height='65'/></td>
					</tr>
					<tr>
					<td >
					<table cellspacing='0' cellpadding='5'  align='center' width='100%' border='0' style=' font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px;'>
					<tr>
					<td  colspan='2' align='left' valign='top'>Dear<strong> ".$row->user_username.",</strong></td>
					</tr>
					<tr>
					<td valign='top' colspan='2' align='left'>
					Please find below the summary of your Safe2meet Information:</td>
					</tr>
					<tr>
					<td valign='top' colspan='2' align='left'><table width='100%' border='1' cellspacing='0' cellpadding='0' style='border:1px solid #eeeeee; border-collapse:collapse;font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px;'>
					<tr>
					<td width='32%' height='23' align='left' valign='middle'><a href='".SITEURL."/resetpassword.php?user_email_address=".$row->user_email_address."&key=".$for_key."'>Click here</a> to reset your password</td>
					</tr>
					<tr>
					<td valign='top' colspan='2' align='left'>Please contact our customer support team at support@safe2meet.com if you have questions. </td>
					</tr>
					</table>
					</td>
					</tr>
					<tr>
					<td height='35' >
					<br >
					<br >
					Sincerely <br >
					Safe2meet <br > <br >
					
					Where the pursuit of looking good ends in doing good! <br >
					support@safe2meet.com <br >
					
					</td>
					</tr>
					
					</table>";
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers .= 'From:Safe2meet <info@safe2meet.com>' . "\r\n";
			if(mail($row->user_email_address,"Forgot Password",$message,$headers)){
				header("Location:index.php?msg=Password Sent To your Email");
			}else{
				header("Location:index.php?msg=Your Entered Details Doesnot Match With Our Database");
			}
		}
	}
	
/*Confirm Your Account is Active*/

	function getemaildetails($id,$email)
	{
		global $callConfig;
		$whr="user_email='".$email."' and user_id='".$id."' and type='reg' and verify_status='no'";
		$query=$callConfig->selectQuery(TBL_USER_TEMP,'*',$whr,'','','');
		return $callConfig->getRow($query);
	}
	function confirmyouraccountactivation($post)
	{
		global $callConfig;
		$i=date("Y-M-d");
		$getemaildetails=$this->getemaildetails($post['uid'],$post['email']);
		if($post['email']!=''){
			$qu = "select * from sitesettings where user_id = '1'";
			$siteim =  mysql_query($qu);
			$imgres = mysql_fetch_assoc($siteim);
			$siteimagelogo = $imgres['site_image']; 
			$AdminEmail = $imgres['mail_frommail']; 
			$pwd=$callConfig->passwordDecrypt($res->user_password);
			$to=$_POST['email'];
			$subject ="Safe2meet Registration Success Mail";
			$message="	<div style=\"width:565px; border:3px solid #096580; margin-top:20px; height:380px; color: #0000;\">
						<p><a href='".SITEURL."'><img src='".SITEURL."/uploads/site/site_image_145450242656b1f21a43cc9.png' width='250' height='30'/></a></p>
						<div style=\"padding:10px; color: #000000;\">
						<p style=\"background-color:rgb(244,243,243); margin:-10px; padding:10px; border-bottom:2px solid #cdcdcd;\"><strong></strong></p>
						<br>
						<p>Thanks for signing up for Safe2Meet</p>
						<p>Hi<p>".$user_name."</p> You've just joined a large community of people who are coming together to make the world a safer place to meet and do business.<br />
						<a href='".SITEURL."/index.php?email=".$post['email']."&ver_key=".$getemaildetails->verificartion_key."'><p style=\"padding:10px; color: #FF0000;\">CONFIRM SIGN-UP<p></a></p>
						<p style=\"text-align:center;\"></p>
						<p>Regards,&nbsp;Safe2meet Team</p>
						</div>
						</div>";
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers .= "From:Safe2meet <".$AdminEmail.">"." "."\r\n";
			$headers .= "Reply-To: Safe2meet <".$contact_person.">"." "."\r\n";
			$headers .= "Return-Path:  Safe2meet <".$contact_person.">"." "."\r\n";
			mail($to, $subject, $message, $headers,'-fexample@gmail.com');
			echo $message; exit;
			$_SESSION['mailsucessmsgbre']="success";
			if($_SESSION['mailsucessmsgbre']!=""){
				$callConfig->headerRedirect("index.php?srgreg=successfully");
			}
		}else{
			$callConfig->headerRedirect("register.php?srgreg=failed");
		}
	}	

	 function stripepaymet($post)
	 {
		global $callConfig;
		$date=date('Y-m-d');
		$fields=array(
						's2m_subscription_start_date'=>$date,	
						's2m_subscription_card_token'=>$_POST['stripeToken'],
						'User_user_id'=>$_SESSION['frontend_id'],
						'Subscription_Type_subscription_type_id'=>$_POST['subscription'],
						's2m_subscription_create_date'=>$date,
						's2m_subscription_street'=>$_POST['street'],
						's2m_subscription_zip'=>$_POST['zip'],
						's2m_subscription_country'=>$_POST['country'],
						's2m_subscription_state'=>$_POST['state']
		);
		$payment=$callConfig->insertRecord(TBL_SUBSCRIPTION_PAYMENNT,$fields);
		if($payment!=""){
			$callConfig->headerRedirect(SELFVERFICATIONSUCCESS."?payment=successfully");
		}else{	
			$callConfig->headerRedirect(SELFVERFICATIONSUCCESS."?payment=failed");
		}
	  }
	  
	  function verifyemilcode($email,$key)
	  {
		  global $callConfig;
		  $whr="user_email='".$email."' and verificartion_key='".$key."' and type='reg' and verify_status='no'";
		  $query=$callConfig->selectQuery(TBL_USER_TEMP,'*',$whr,'','','');
		  return $callConfig->getRow($query);
	  }
  
	  function verifycode($email,$key)
	  {
		  global $callConfig;
		  $whr="user_email='".$email."' and verificartion_key='".$key."' and type='for' and verify_status='no'";
		  $query=$callConfig->selectQuery(TBL_USER_TEMP,'*',$whr,'','','');
		  return $callConfig->getRow($query);
	  }
	  
  
	  function resetpassword($post)
	  {
		 global $callConfig;
		 if($post['new_password']==$post['cnf_password']){
			 $temp_fiednames=array('verified_date'=>date('Y-m-d H:i:s'),'verify_status'=>'yes');
			 $callConfig->updateRecord(TBL_USER_TEMP,$temp_fiednames,'id',$post['hdn_id']);
			 
			 $user_fiednames=array('user_password'=>$callConfig->passwordEncrypt($post['new_password']));
			  $res=$callConfig->updateRecord(TBL_USER,$user_fiednames,'user_id',$post['hdn_user_id']);
			  if($res>0){
				 $callConfig->headerRedirect(SITEURL."/index.php");exit;
			  }
		 }
	  }
  
	  function insertremainingdetails($post)
	  {
		 global $callConfig;
		 if($post['firstname']!="" && $post['lastname']!="" && $post['address1']!="" && /*$post['address2']!="" && */$post['cityofbirth']!="" && $post['stateofbirth']!="" && $post['zipcode']!="" && $post['dob_year']!="" && $post['dob_month']!="" && $post['dob_date']!="")  {
			$fieldnames=array(	'user_first_name'=>$post['firstname'],
								'user_middle_initial'=>$post['middlename'],
								'user_last_name'=>$post['lastname'],
								'user_address_1'=>$post['address1'],
								'user_address_2'=>$post['address2'],
								'user_cityofbirth'=>$post['cityofbirth'],
								'user_stateofbirth'=>$post['stateofbirth'],
								'user_zipcode'=>$post['zipcode'],
								'user_ssn'=>$post['snn'],
								'user_dob'=>$post['dob_year'].'-'.$post['dob_month'].'-'.$post['dob_date'],
								'user_verify'=>'verified'
							);//print_r($post);exit;//$post['dob'],
			$res=$callConfig->updateRecord(TBL_USER,$fieldnames,'user_id',$_SESSION['frontend_id']);
			if($res>0){
				$callConfig->headerRedirect(SITEURL."/".COMPLETE_VERIFICATION);exit;
			}else{
				$callConfig->headerRedirect(SITEURL."/".BASICCERTIFICATE);exit;
			}
		 }else{
			$callConfig->headerRedirect(SITEURL."/".BASICCERTIFICATE);exit;
		 }
	  }
  
	function insertactivity($post)
	{
		global $callConfig;
		$fieldnames=array(	'activity_email'=>$post['activity_email'],
							'activity_name'=>$post['activity_name'],
							'S2M_Activity_Type_S2M_Activity_Type_ID'=>$post['activity_type'],
							'Activity_Source_activity_source_id'=>$post['activity_source'],
							'activity_url'=>$post['activity_url'],
							'activity_unique_id'=>$post['activity_uniqueid'],
							'activity_date'=>$post['activity_date'],
							'activity_time'=>$post['activity_time'].':00',
							'activity_onoroff'=>$post['logon_type'],
							'activity_message'=>$post['activity_description'],
							'User_user_id'=>$_SESSION['frontend_id'],
							'activity_create_date'=>date('Y-m-d')
						);
		$res=$callConfig->insertRecord(TBL_ACTIVITY,$fieldnames);
		if($res>0){
			$callConfig->headerRedirect(SITEURL.'/'.DASHBOARDEXIST);exit;
		}else{
			$callConfig->headerRedirect(SITEURL.'/'.ADDACTIVITY);exit;
		}
	}
	
	function updateactivity($post)
	{
		global $callConfig;
		$fieldnames=array(	'activity_email'=>$post['activity_email'],
							'activity_name'=>$post['activity_name'],
							'S2M_Activity_Type_S2M_Activity_Type_ID'=>$post['activity_type'],
							'Activity_Source_activity_source_id'=>$post['activity_source'],
							'activity_url'=>$post['activity_url'],
							'activity_unique_id'=>$post['activity_uniqueid'],
							'activity_date'=>$post['activity_date'],
							'activity_time'=>$post['activity_time'].':00',
							'activity_onoroff'=>$post['logon_type'],
							'activity_message'=>$post['activity_description'],
							'User_user_id'=>$_SESSION['frontend_id'],
							'activity_create_date'=>date('Y-m-d')
						); 
		$res=$callConfig->updateRecord(TBL_ACTIVITY,$fieldnames,'activity_id',$post['hid_id']);
		if($res>0){
			$callConfig->headerRedirect(SITEURL.'/'.DASHBOARDEXIST);exit;
		}else{
			$callConfig->headerRedirect(SITEURL.'/'.EDITACTIVITY.'?id='.$post['hid_id']);exit;
		}
	}
	
	function deleteactivity($id)
	{
		global $callConfig;
		$res=$callConfig->deleteRecord(TBL_ACTIVITY,'activity_id',$id);
		if($res>0){
			$callConfig->headerRedirect(SITEURL.'/'.DASHBOARDEXIST);exit;
		}else{
			$callConfig->headerRedirect(SITEURL.'/'.DASHBOARDEXIST);exit;
		}
	}
	
	function getactivitybyuserId($id)
	{
		global $callConfig;
		$whr="User_user_id='".$id."'";
		$query=$callConfig->selectQuery(TBL_ACTIVITY,'*',$whr,'activity_create_date DESC','','');
		return $callConfig->getAllRows($query); 
	}
	
	function getallsourcedata()
	{
		global $callConfig;
		$whr="s2m_activity_source_is_active='1'";
		$query=$callConfig->selectQuery(TBL_ACTIVITY_SOURCE,'*',$whr,'','','');
		return $callConfig->getAllRows($query); 
	}
	
	function getsourcedata($id)
	{
		global $callConfig;
		$whr="s2m_activity_source_id='".$id."'";
		$query=$callConfig->selectQuery(TBL_ACTIVITY_SOURCE,'*',$whr,'','','');
		return $callConfig->getRow($query); 
	}
	
	function getalltypedetails()
	{
		global $callConfig;
		$whr="s2m_activvity_type_is_active='1'";
		$query=$callConfig->selectQuery(TBL_ACTIVITY_TYPE,'*',$whr,'','','');
		return $callConfig->getAllRows($query); 
	}
	
	function gettypedetailsbyId($id)
	{
		global $callConfig;
		$whr="s2m_activity_type_id='".$id."'";
		$query=$callConfig->selectQuery(TBL_ACTIVITY_TYPE,'*',$whr,'','','');
		return $callConfig->getRow($query); 
	}
	/*sumanth  new functons*/
	function getusersubscription($id)
 {
  global $callConfig;
  $where = "User_user_id='".$id."'";
  $query=$callConfig->selectQuery(TBL_SUBSCRIPTION_PAYMENNT,'*',$where,'','','');
  return $callConfig->getRow($query);
 }
	
	
	
	
	function getactivitydetailsbyId($id)
	{
		global $callConfig;
		$whr="activity_id='".$id."'";
		$query=$callConfig->selectQuery(TBL_ACTIVITY,'*',$whr,'','','');
		return $callConfig->getRow($query); 
	}
	
	function capatalize($name)
	{
		return ucwords(strtolower($name));
	}
	
	function getsubscriptiontype()
	{
		global $callConfig; 
		$whr="subscription_type_is_active='1'";
		$query=$callConfig->selectQuery(TBL_SUBSCRIPTION_TYPE,'*',$whr,'','','');
		return $callConfig->getAllRows($query);
	}
	
	function updateuserdetails($post)
	{
		global $callConfig;
		if($post['firstname']!="" && $post['lastname']!="" && $post['address1']!=""/* && $post['address2']!="" */&& $post['cityofbirth']!="" && $post['stateofbirth']!="" && $post['zipcode']!="" && $post['dob_year']!="" && $post['dob_month']!="" && $post['dob_date']!=""){
			$fieldnames=array(	'user_first_name'=>$post['firstname'],
								'user_middle_initial'=>$post['middlename'],
								'user_last_name'=>$post['lastname'],
								'user_address_1'=>$post['address1'],
								'user_address_2'=>$post['address2'],
								'user_cityofbirth'=>$post['cityofbirth'],
								'user_stateofbirth'=>$post['stateofbirth'],
								'user_zipcode'=>$post['zipcode'],
								'user_ssn'=>$post['snn'],
								'user_dob'=>$post['dob_year'].'-'.$post['dob_month'].'-'.$post['dob_date'],
							);
			$res=$callConfig->updateRecord(TBL_USER,$fieldnames,'user_id',$_SESSION['frontend_id']);
			if($res>0){
				$callConfig->headerRedirect(SITEURL."/".MANAGEPROFILE);exit;
			}else{
				$callConfig->headerRedirect(SITEURL."/".MANAGEPROFILE);exit;
			}
		 }else{
			$callConfig->headerRedirect(SITEURL."/".MANAGEPROFILE);exit;
		 }
	}
	
	function checkuserverification($type)
	{
		global $callConfig;
		if($type=='verified'){
	 		$callConfig->headerRedirect(SITEURL.'/'.DASHBOARDEXIST);
	 	}else if($type=='not verified'){
	 		$callConfig->headerRedirect(SITEURL.'/'.DASHBOARDNEWUSER);
	 	}
	}
}?>

	  
 
 
  
  
  

