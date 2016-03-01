<?php
class userClass
{ 
  function homepageserch($post)
  {
	 // print_r($post);exit;
	global $callConfig;
$whr="zipcode='".$post['zipcode']."' and  cat_id='".$post['category']."' and  subcat_id='".$post['subcat']."' and distance <=".$post['Distance']." and price BETWEEN ".$post['minprice']." and ".$post['maxprice']." "; 
  
	$query=$callConfig->selectQuery(TPREFIX.TBL_EVENTS,'*',$whr,'','','');
    return $callConfig->getAllRows($query);
	  
  }  
  
  
   function insertpostyouradd($post)
  {
	 //print_r($post);exit;
	global $callConfig;
	
	
	 $orgfieldnames=array(
		//'place'=>$_POST['place'],
		
		$_SESSION['firstname']=$_POST['firstname'],
		$_SESSION['email']=$_POST['email'],
		
		'organiser_name'=>$post['org_name'],
		'phone'=>$post['org_pnoe'],
		'email'=>$post['org_email'],
		//'address'=>$post['address'],
		'description'=>mysql_real_escape_string($post['org_description']),
		'image_upload'=>$post['image'],
		//'website'=>$post['website'],
		'status'=>"Active");
		//print_r($orgfieldnames);exit;
  $orgres=$callConfig->insertRecord(TPREFIX.TBL_ORGANISER,$orgfieldnames); 
	  $orgid=mysql_insert_id();
	//print_r($orgid);exit;	

	if($orgres!=0){
	//echo 'hiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii';exit;
	$titleslug=$callConfig->remove_special_symbols($post['event_title']);
	
	$fieldnames=array(
	    'event_type'=>$post['type'],
		'org_id'=>$orgid,
		'cat_id'=>$post['cate'],
		'subcat_id'=>$post['subcat'],
		'title'=>$post['event_title'],
		'image'=>$eventimg,
		'video'=>$post['youtubelink'],
		'start_date'=>$post['startdate'],
		'end_date'=>$post['enddate'],
		'age'=>$post['age'],
		'gender'=>$gender,
		'sexuality'=>$sexuality,
		'tickets'=>$post['free_ticket'],
		'gallery'=>$post['free_gall'],
		'price'=>$post['free_price'],
		'location'=>$post['location'],
		'zipcode'=>$post['zipcode'],
		'address'=>$post['address'],
		'distance'=>$post['distance'],
		'city'=>$post['city'],
		'description'=>mysql_real_escape_string($post['eventdescription']),
		'payment'=>$post['payment'],
		'title_slug'=>$titleslug,
		'status'=>"Active");  
		
		//print_r($fieldnames);exit;
		
		$eventres=$callConfig->insertRecord(TPREFIX.TBL_EVENTS,$fieldnames);
		
		//print_r($eventres);exit;
		
		$eventid=mysql_insert_id();
		
		if($eventres!=0)
			{
			echo $freecount = sizeof($post['free_gall']); 
			$paidcount = sizeof($post['paid_gall']);
			$charcount = sizeof($post['char_gall']);
			
			
			/*event images*/
			$eventimagescount=sizeof($_FILES['eventimage']['name']);
			if($eventimagescount!=""){
			for($ii=0;$ii<$eventimagescount;$ii++)
			{
			if($_FILES['eventimage']['name'][$ii]!="")
			{
			$new_image=$callConfig->freeimageUploadcomncodearray('events','eventimage',$ii,"uploads/events/","uploads/events/thumbs/",'','176','115');
			$fieldnames=array('event_id'=>$eventid,'image'=>$new_image);
			$res1=$callConfig->insertRecord(TPREFIX.TBL_EVENT_IMAGES,$fieldnames);
			}
			}
			}
			/* End event images*/
			}
	
    $callConfig->headerRedirect("index.php"); exit;
	  
  } 
  
  else
  {
	 $callConfig->headerRedirect("signin.php"); exit; 
	  }
 
   
  
  }

function insertrating($post)
	{
		//print_r($_POST);exit;
		global $callConfig;
		
			//print_r($post); exit;	
						
		$fieldnames=array(
		'event'=>mysql_real_escape_string($post['event_title']),
		'review_provider_name'=>$post['review_name'],
		'review_email'=>$post['review_email'],
		'review_title'=>$post['reviewtitle'],
		'description'=>mysql_real_escape_string($post['reviewdescription']),
		'rating'=>$post['stars']);
		
		//print_r($fieldnames);//exit;
		 $res=$callConfig->insertRecord(TPREFIX.TBL_RATINGS,$fieldnames);
		//echo $res;exit;

		if($res!="")
		{
			$callConfig->headerRedirect("index.php"); exit;
		}
		else
		{
			$callConfig->headerRedirect("searchres_left.php"); exit;
		}

	}
	
	function updateUserPwd($post)
	{	  
		 //print_r($post);exit;
		 global $callConfig;
		 echo $query="update tb_regusers set password='".$callConfig->passwordEncrypt($post['newpwd'])."',confirmpassword='".$callConfig->passwordEncrypt($post['newpwd'])."' where id='".$_SESSION['frontend_id']."'";
		 $store=mysql_query($query)	;
		 if($store!="")
		 {
			   $where="id='".$_SESSION['frontend_id']."'";
			   $query1=$callConfig->selectQuery(TPREFIX.TBL_REGUSERS,'*',$where,'','','');
			   $details= $callConfig->getRow($query1);
			   $password = $callConfig->passwordDecrypt($details->password); 
			   if($details!="")
			   {
				   	
					   //getting the body of the particular email function by id
	 				   $where="id='3'";
					   $query1=$callConfig->selectQuery(TPREFIX.TBL_MAILFUNCTIONS,'*',$where,'','','');
					   $body =$callConfig->getRow($query1);
					   
					   //getting the  email template(header and footer) from the id stored in tb_mailfunction
						$sql1="select * from  tb_mail_template where id='".$body->templateid."'";
						$template=$callConfig->getRow($sql1);
					   
					   
					    $msg=$body->description;
					
					
						$head=$template->header1;
						$msg=str_replace("{user_name}",$details->firstname." ".$details->lastname,$msg);
						$msg=str_replace("{user_email}",$details->email,$msg);
						$msg=str_replace("{user_pass}",$password,$msg);
						$foot=$template->footer;
					
						$message=$head.$msg.$foot;
					    
						//echo $message;exit; 
						$subject="huvvy | Forgot Password";
						$headers  = 'MIME-Version: 1.0' . "\r\n";
						$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
						$headers .= 'From:'.Huvvy. "\r\n";
					    $subject="huvvy.com | Account Password Changed Sucessfully";
						
					
				       if(mail($details->email, $subject, $message, $headers, '-f huvvy@huvvy.com'))
				
						  {
							 //$callConfig->headerRedirect("account.php?$msg=sucess");
							 $callConfig->headerRedirect("".SITEURL."/accountinformation.php?$msg=sucess");
							 
						  }
				
				 
	 
			   }
			  // header('Location:account.php?$msg=sucess');
			   header("Location:".SITEURL."/accountinformation.php?$msg=sucess");
			  		   
		 
		 }
		 else
		 {
			//header('Location:account.php?$msg=failed'); 
			header("Location:".SITEURL."/accountinformation.php?$msg=failed");
		 }
	}
 
function updateUserAccount($post)
		{   
		
			  $fieldnames=array('firstname'=>$post['firstname'],'lastname'=>$post['lastname'],'email'=>$post['email']);
			  
			  $query="update tb_regusers set firstname='".$post['firstname']."',lastname='".$post['lastname']."', email='".$post['email']."' where id ='".$_SESSION['frontend_id']."'";
			  $res= mysql_query($query);
				
			   if($res!="")
			   {
				  $_SESSION['firstname']=$post['firstname'];
				  //header('Location:account.php?sinfo=sucess');
				  header("Location:".SITEURL."/accountinformation.php?sinfo=sucess");
			   }
			   else
			   {
					//header('Location:account.php?sinfo=failed');
					header("Location:".SITEURL."/accountinformation.php?sinfo=failed"); 
			   }
		}
		
 
 function insertUserAddress($post)
	{
		//print_r($post);
		
		 $address=$post['streetAddrOne']." ".$post['streetAddrTwo'];
		 global $callConfig;
		 $query="update tb_regusers set b_firstname ='".$post['firstname']."',b_lastname='".$post['lastname']."',b_company_name='".$post['companyname']."',b_mob_no='".$post['mobno']."',b_fax_no='".$post['faxno']."',b_address='".$address."',b_city_name='".$post['cityName']."',b_state_name='".$post['state']."',b_pincode='".$post['zip_code']."',b_country_name='".$post['country']."',s_firstname ='".$post['firstname']."',s_lastname='".$post['lastname']."',s_company_name='".$post['companyname']."',s_mob_no='".$post['mobno']."',s_fax_no='".$post['faxno']."',s_address='".$address."',s_city_name='".$post['cityName']."',s_state_name='".$post['state']."',s_pincode='".$post['zip_code']."',s_country_name='".$post['countryName']."' where id='".$_SESSION['frontend_id']."'";
		 $update=mysql_query($query);
          
		 if($update!="")
		 { 
		 			
		   			$where="id='".$_SESSION['frontend_id']."'";
		            $query=$callConfig->selectQuery(TPREFIX.TBL_REGUSERS,'*',$where,'','','');
		            $row = $callConfig->getRow($query);
					if($row!="")
					 {
						 //getting state name by id
						 $where="id='".$row->b_state_name."'";
						 $queryState=$callConfig->selectQuery(TPREFIX.TBL_STATELIST,'*',$where,'','','');
		                 $stateRow= $callConfig->getRow($queryState);
						  
						 //getting country name by id
						 $where="id='".$row->b_country_name."'";
						 $queryCountry=$callConfig->selectQuery(TPREFIX.TBL_COUNTRYLIST,'*',$where,'','','');
		                 $countryRow= $callConfig->getRow($queryCountry);
						 
					  
						
				       //getting the body of the particular email function by id
					  /* $where="id='9'";
					   $query1=$callConfig->selectQuery(TPREFIX.TBL_MAILFUNCTIONS,'*',$where,'','','');
					   $body =$callConfig->getRow($query1);*/
					   
					   //getting the  email template(header and footer) from the id stored in tb_mailfunction
						/*$sql1="select * from  tb_mail_template where id='".$body->templateid."'";
						$template=$callConfig->getRow($sql1);
					   
					   $msg=$body->description;
	 					
						//adding header,body and footer with respective field values
						$head=$template->header1;
						$msg=str_replace("{user_name}",$row->first_name." ".$row->last_name,$msg);
						$msg=str_replace("{user_company}",$row->b_company_name,$msg);
						$msg=str_replace("{user_mob}",$row->b_mob_no,$msg);
						$msg=str_replace("{user_fax}",$row->b_fax_no,$msg);
						$msg=str_replace("{user_address}",$row->b_address,$msg);
						$msg=str_replace("{user_country}",$countryRow->country,$msg);
						$msg=str_replace("{user_state}",$stateRow->state_name,$msg);
						$msg=str_replace("{user_city}",$row->b_city_name,$msg);
						$msg=str_replace("{user_pincode}",$row->b_pincode,$msg);
						$foot=$template->footer;
					
						$message=$head.$msg.$foot;
						
						//echo $message;exit; 
						
						$subject="huvvy.com | Address Updated Sucessfully ";
						
						$headers  = 'MIME-Version: 1.0' . "\r\n";
						$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
						$headers .= 'From:Huvvy <Huvvy@huvvy.com>' . "\r\n";
						
						 if(mail($row->emailadress, $subject, $message, $headers, '-f huvvy@huvvy.com'))
						 {	 
							//$callConfig->headerRedirect("dashboard.php?msg=sucess");*/
							
							
							
							$callConfig->headerRedirect("".SITEURL."/dashboard.php?msg=sucess");
						 }
	
						 else
						 {
							//$callConfig->headerRedirect("addressbook.php?msg=sendingfailed");
							$callConfig->headerRedirect("".SITEURL."/addressbook.php?msg=sendingfailed");
						  }
	
	       			}
	     
		 else
		 {
			//header('Location:addressbook.php?msg=failed'); 
			header("Location:".SITEURL."/addressbook.php?msg=failed");
		 }
	}
  
  function updateShippingAddress($post)
	{
		//echo 'hiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii'; //exit;
		//print_r($post); exit;
		 $address=$post['streetAddrOne']." ".$post['streetAddrTwo'];
		 global $callConfig;
		  $query="update tb_regusers set `s_firstname` ='".$post['firstname']."',`s_lastname`='".$post['lastname']."',`s_company_name`='".$post['companyname']."',`s_mob_no`='".$post['mobno']."',`s_fax_no`='".$post['faxno']."',`s_address`='".$address."',`s_city_name`='".$post['cityName']."',`s_state_name`='".$post['stateName']."',`s_country_name`='".$post['countryName']."',`s_pincode`='".$post['zipCode']."' where id='".$_SESSION['frontend_id']."'"; //exit;
		 
		  $res= mysql_query($query);
		
		 if($res!="")
		 {  
			 
			  
		 			
		   			$where="id='".$_SESSION['frontend_id']."'";
		            $query=$callConfig->selectQuery(TPREFIX.TBL_REGUSERS,'*',$where,'','','');
		            $row = $callConfig->getRow($query);
					if($row!="")
					 {
						 //getting state name by id
						 $where="id='".$row->s_state_name."'";
						 $queryState=$callConfig->selectQuery(TPREFIX.TBL_STATELIST,'*',$where,'','','');
		                 $stateRow= $callConfig->getRow($queryState); 
						 
						 //getting country name by id 
						 $where="id='".$row->s_country_name."'";
						 $queryCountry=$callConfig->selectQuery(TPREFIX.TBL_COUNTRYLIST,'*',$where,'','','');
		                 $countryRow= $callConfig->getRow($queryCountry);
						 
						
						
						//getting the body of the particular email function by id
					   /*$where="id='11'";
					   $query1=$callConfig->selectQuery(TPREFIX.TBL_MAILFUNCTIONS,'*',$where,'','','');
					   $body =$callConfig->getRow($query1);
					   */
					   //getting the  email template(header and footer) from the id stored in tb_mailfunction
						/*$sql1="select * from  tb_mail_template where id='".$body->templateid."'";
						$template=$callConfig->getRow($sql1);
					   
					   
					   
					    $msg=$body->description;
					   
					    $head=$template->header1;
						
						$msg=str_replace("{name}",$row->first_name." ".$row->last_name,$msg);
						$msg=str_replace("{user_name}",$row->s_firstname." ".$row->s_lastname,$msg);
						$msg=str_replace("{user_company}",$row->s_company_name,$msg);
						$msg=str_replace("{user_mob}",$row->s_mob_no,$msg);
						$msg=str_replace("{user_fax}",$row->s_fax_no,$msg);
						$msg=str_replace("{user_address}",$row->s_address,$msg);
						$msg=str_replace("{user_country}",$countryRow->country,$msg);
						$msg=str_replace("{user_state}",$stateRow->state_name,$msg);
						$msg=str_replace("{user_city}",$row->s_city_name,$msg);
						$msg=str_replace("{user_pincode}",$row->s_pincode,$msg);
						$foot=$template->footer;
					
						$message=$head.$msg.$foot;
						
						 //echo $message;exit;
	 
		 			$subject="huvvy.com | Shipping Address Updated Sucessfully ";
			 		$headers  = 'MIME-Version: 1.0' . "\r\n";
					$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				    $headers .= 'From:huvvy <huvvy@huvvy.com>' . "\r\n";
	 
					 if(mail($row->emailadress, $subject, $message, $headers, '-f huvvy@huvvy.com'))
					 {	 
						//$callConfig->headerRedirect("dashboard.php?sestr=sucess");*/
						
						
						$callConfig->headerRedirect("".SITEURL."/dashboard.php?sestr=sucess");
					  }
					 else
					 {
						//$callConfig->headerRedirect("dashboard.php?sestr=sendingfailed");
						$callConfig->headerRedirect("".SITEURL."/dashboard.oho?sestr=sendingfailed");
					 }
	
			}

			
		 
		 else
		 {
			  //header('Location:dashboard.php?update=s_failed');
			  header("Location:".SITEURL."/dashboard.php?update=s_failed");
		 }
	}
  
 function updateBillingAddress($post)
	{
		/*echo "<pre>";
		
		exit;*/
		//print_r($post);
		 $address=$post['streetAddrOne']." ".$post['streetAddrTwo'];
		 global $callConfig;
		 $query="update tb_regusers set b_firstname ='".$post['firstname']."',b_lastname='".$post['lastname']."',b_company_name='".$post['companyname']."',b_mob_no='".$post['mobno']."',b_fax_no='".$post['faxno']."',b_address='".$address."',b_city_name='".$post['cityName']."',b_state_name='".$post['stateName']."',b_pincode='".$post['zipCode']."',b_country_name='".$post['countryName']."' where id='".$_SESSION['frontend_id']."'";
		 $res= mysql_query($query);
		 if($res!="")
		 {
			 //echo "hii";exit;
		   			 $where="id='".$_SESSION['frontend_id']."'";
		            $query=$callConfig->selectQuery(TPREFIX.TBL_REGUSERS,'*',$where,'','','');
		            $row = $callConfig->getRow($query);
					if($row!="")
					 {
						  //getting state name by id
						 $where="id='".$row->b_state_name."'";
						 $queryState=$callConfig->selectQuery(TPREFIX.TBL_STATELIST,'*',$where,'','','');
		                 $stateRow= $callConfig->getRow($queryState); 
						
						 //getting country name by id 
						 $where="id='".$row->b_country_name."'";
						 $queryCountry=$callConfig->selectQuery(TPREFIX.TBL_COUNTRYLIST,'*',$where,'','','');
		                 $countryRow= $callConfig->getRow($queryCountry);
						 
						
						
				       //getting the body of the particular email function by id
					   /*$where="id='10'";
					   $query1=$callConfig->selectQuery(TPREFIX.TBL_MAILFUNCTIONS,'*',$where,'','','');
					   $body =$callConfig->getRow($query1);*/
					   
					   //getting the  email template(header and footer) from the id stored in tb_mailfunction
						/*$sql1="select * from  tb_mail_template where id='".$body->templateid."'";
						$template=$callConfig->getRow($sql1);
					  
					   
					   $msg=$body->description;
						
	 					$head=$template->header1;
						$msg=str_replace("{name}",$row->first_name." ".$row->last_name,$msg);
						$msg=str_replace("{user_name}",$row->b_firstname." ".$row->b_lastname,$msg);;
						$msg=str_replace("{user_company}",$row->b_company_name,$msg);
						$msg=str_replace("{user_mob}",$row->b_mob_no,$msg);
						$msg=str_replace("{user_fax}",$row->b_fax_no,$msg);
						$msg=str_replace("{user_address}",$row->b_address,$msg);
						$msg=str_replace("{user_country}",$countryRow->country,$msg);
						$msg=str_replace("{user_state}",$stateRow->state_name,$msg);
						$msg=str_replace("{user_city}",$row->b_city_name,$msg);
						$msg=str_replace("{user_pincode}",$row->b_pincode,$msg);
						$foot=$template->footer;
					
						$message=$head.$msg.$foot;
						
						//echo $message;exit; 
	 					
						$subject="huvvy.com | Billing Address Updated Sucessfully ";
						$headers  = 'MIME-Version: 1.0' . "\r\n";
						$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
						$headers .= 'From:Huvvy <Huvvy@huvvy.com>' . "\r\n";
	 
						 if(mail($row->emailadress, $subject, $message, $headers, '-f huvvy@huvvy.com'))
						 {	 
							 
							//$callConfig->headerRedirect("dashboard.php?bestr=sucess"); */
							$callConfig->headerRedirect("".SITEURL."/dashboard.php?bestr=sucess");
						  }
						 else
						  {
							//$callConfig->headerRedirect("dashboard.php?bestr=sendingfailed");
							$callConfig->headerRedirect("".SITEURL."/dashboard.php?bestr=sendingfailed");
						  }
	
	        		}
	 
			 else
			 {
				 // header('Location:dashboard.php?bupdate=b_failed');
				  header("Location:".SITEURL."/dashboard.php?bupdate=b_failed");
			 }
	}
 
 
 function updateOrgDetails($post)
		{   
		
			  $fieldnames=array('image_upload'=>$post['imageupload'],'organiser_name'=>$post['orgname'],'description'=>$post['description'],'website'=>$post['website']);
			  
			  $query="update tb_organiser set image_upload='".$post['imageupload']."',organiser_name='".$post['orgname']."', description='".$post['description']."' website='".$post['website']."' where id ='".$_SESSION['frontend_id']."'";
			  $res= mysql_query($query);
				
			   if($res!="")
			   {
				  //$_SESSION['firstname']=$post['orgname'];
				  //header('Location:account.php?sinfo=sucess');
				  header("Location:".SITEURL."/organiserdetails.php?sinfo=sucess");
			   }
			   else
			   {
					//header('Location:account.php?sinfo=failed');
					header("Location:".SITEURL."/organiserdetails.php?sinfo=failed"); 
			   }
		}
		
  
}	
?>