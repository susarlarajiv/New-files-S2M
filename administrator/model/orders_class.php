<?php

class ordersClass

{ 

function getMemberDetails($userid)
  {
	 global $callConfig;
	 $where="id='".$userid."' and status ='Active'";
	 $query=$callConfig->selectQuery(TPREFIX.TBL_REGUSERS,'*',$where,'','','');
	 return $callConfig->getRow($query);
  }
		  
		  function getMyOrderDetailstransacview()
			{
				global $callConfig;
				//print"<pre>";
				$whr="unique_id!='' and transactionid!='' and delivary_status!=''";
				$query=$callConfig->selectQuery(TPREFIX.TBL_TRANSACTIONDETAILS,'*',$whr,'','',''); 
				return $callConfig->getAllRows($query);			
			}
			
			function getMyOrderDetailstransac($id)
			{
				global $callConfig;
				//print"<pre>";
				$whr="unique_id='".$id."'";
				$query=$callConfig->selectQuery(TPREFIX.TBL_TRANSACTIONDETAILS,'*',$whr,'','',''); 
				return $callConfig->getRow($query);			
			}
			
			
			
			
			
			 function getMyOrderDetails($id)
			{
				global $callConfig;
				//print"<pre>";
				$whr="id='".$id."'  and payment_status='Success'";
				$query=$callConfig->selectQuery(TPREFIX.TBL_CART,'*',$whr,'','',''); 
				return $callConfig->getRow($query);			
			}
			
			function getStateListById($id)
			{
			global $callConfig;
			$where = "id='".$id."'";
			$query=$callConfig->selectQuery(TPREFIX.TBL_STATELIST,'*',$where,'','','');
			return $callConfig->getRow($query);
			}
			
			function getCountryListById($id)
			{
			global $callConfig;
			$where = "id='".$id."'";
			$query=$callConfig->selectQuery(TPREFIX.TBL_COUNTRYLIST,'*',$where,'','','');
			return $callConfig->getRow($query);
			}
			
			
			function getmyordersdetails($id)
				{
					global $callConfig;
					//print"<pre>";
					$whr="id='".$id."' ";
	 				$query=$callConfig->selectQuery(TPREFIX.TBL_CART,'*',$whr,'','',''); 
					return $callConfig->getAllRows($query);
					
				}
				
			function getordersdetailinvoice($id)
			{
			global $callConfig;
			$whr="unique_id='".$id."'  and payment_status='Success'";
			$query=$callConfig->selectQuery(TPREFIX.TBL_CART,'*',$whr,'','','');
			return $callConfig->getAllRows($query);
			
			}
			
			function getordersdetail($id)
			{	
			global $callConfig;
			
			// ************** getting the data from the tb_order *********** 
			$query=$callConfig->selectQuery(TPREFIX.TBL_CART,'*','id='.$_GET['id'],'','','');
			$orderTbData = $callConfig->getRow($query);
			// print_r($orderTbData);exit;
			
			// **************** getting the data from the tb_members by id  ****************
			$where="id='".$orderTbData->userid."'"; 
			$query=$callConfig->selectQuery(TPREFIX.TBL_REGUSERS,'*',$where,'','','');
			$membersTbData = $callConfig->getRow($query);
			return $membersTbData;
			// print_r($membersTbData);exit;
			
			}
			
			function geteventorder($id)
			{
				global $callConfig;
				$whr="id='".$id."' and  status='Active'";
				$query=$callConfig->selectQuery(TPREFIX.TBL_EVENTS,'*',$whr,'','','');
				return $callConfig->getRow($query);
			}
			
			function ordersDelete($id)
			{
			//echo hai;exit;
			global $callConfig;
			$res=$callConfig->deleteRecord(TPREFIX.TBL_CART,'unique_id',$id);
			$res1=$callConfig->deleteRecord(TPREFIX.TBL_TRANSACTIONDETAILS,'unique_id',$id);
			//print_r($res);exit;
			if($res==1)
			{
			sitesettingsClass::recentActivities('Mail deleted successfully on >> '.DATE_TIME_FORMAT.'','g');
			$callConfig->headerRedirect("index.php?option=com_orders&ferr=Order Details deleted successfully");
			}
			else
			{
			sitesettingsClass::recentActivities('Mail deletion failed on >> '.DATE_TIME_FORMAT.'','e');
			$callConfig->headerRedirect("index.php?option=com_orders&err=Order Details deletion failed");
			}
			}
			
	
	function sendMailToUser($post)
	{
		
					  global $callConfig;
		              //print_r($post);exit;
					  $where="email='".$post['email']."'";
					  $query=$callConfig->selectQuery(TPREFIX.TBL_REGUSERS,'*',$where,'','','');
					  $row= $callConfig->getRow($query);
					 // print_r($row);exit;
					 if($row!="")
					 {
					 $message="<table width='100%' border='0' style='border:1px solid #CCCCCC; border-collapse:collapse;font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#89806e; font-weight:bold;'>
					   <tr  height='100px' >
						 <td style='float:left; margin-left:10px;'>
							<a href='#'><img src='../images/site_logo_03.png' alt=''  border='0' /></a>
						 </td>
					   </tr>
					   
					   <tr>
					   <td >
						<table cellspacing='0' cellpadding='5'  align='center' width='100%' border='0' style=' font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px;'>
					  <tr>
					 <td  colspan='2' align='left' valign='top'>Dear <strong>".$row->firstname.",</strong></td>
					  </tr>
					  
					  <tr>
					 <td valign='top' colspan='2' align='left'>
					  ".$post['description']."</td>
					  </tr>
						 
					</table>
					   </td>
					   </tr>
					   <tr  >
						 <td height='35' >
						 
						 <br >
						 <br >
						 Sincerely <br >
						 Huvvy Events <br > <br >
				  
						  
						 
						 </td>
					   </tr>
					 
					</table>
				
				";
				//echo $message; exit;
	                $subject="Huvvy.com |".$post['subject'];
					$headers  = 'MIME-Version: 1.0' . "\r\n";
					$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
					$headers .= 'From:Huvvy <info@huvvy.com>' . "\r\n";
					//$headers .= 'From:PrintBanners <PrintBanners@printbanners.com>' . "\r\n";
					
					if(mail($post['email'], $subject, $message, $headers, '-f info@huvvy.com'))
						{
	 
							$callConfig->headerRedirect("index.php?option=com_orders&err= Mail Sent successfully");
 						 }

 					else
						{
							$callConfig->headerRedirect("index.php?option=com_orders&ferr= Mail Sending failed");
  						}

 					}
				else
				{
   							$callConfig->headerRedirect("index.php?option=com_orders&ferr= Mail Sending failed");
 							 exit;
  				}
  
	
	}

}	

	?>