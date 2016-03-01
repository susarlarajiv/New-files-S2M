<?php include "includes/header.php";
include 'includes/'.LEFTNAV;
$id=$_GET['id'];
$getdetails=$front_Obj->getactivitydetailsbyId($id);
$getsourcedata=$front_Obj->getsourcedata($getdetails->Activity_Source_activity_source_id);
$gettypedetailsbyId=$front_Obj->gettypedetailsbyId($getdetails->S2M_Activity_Type_S2M_Activity_Type_ID);?>

<?php /*?><div class="dashboardright">
    <div class="logowrap">
    	<img src="<?php echo SITEURL;?>/images/safe2meetlogo_03.png" />
    </div>
    <div class="username">
    	<img src="<?php echo SITEURL;?>/images/user_03.png" />
        <span style="position:relative; top:-40px;">User Name</span>
    </div>
    <div class="clear_fix"></div><?php */?>
    <h1 style="margin-bottom:20px;">View An Activity</h1>
    <p>
        On and offline activities help bolster your credibility score. Add a new activity, and
        we ll generate a QR code for you to identify this activity!
    </p>
    <ul class="historyverifylist" style="float:none; max-width:300px; margin:auto;">
        <li>Online/Offline?</li>
        <li><?php echo ($getdetails->activity_onoroff=='1')?'Online':'Offline';?></li>
        <div class="clear_fix"></div>
    </ul>
	<div class="selfverification" style="margin-top:30px;">
		<div class="verificationform" style="padding:15px 0px;">
            <div class="fieldname paddingnone">
             	Activity Name:
            </div><!--fieldname-->
            <div class="fieldtype">
            	<?php echo $front_Obj->capatalize($getdetails->activity_name);?>
            </div><!--fieldtype-->
  			<div class="clear_fix"></div>

        	<div class="fieldname paddingnone">
           		Activity Type:
            </div><!--fieldname-->
            <div class="fieldtype">
        		<?php echo $gettypedetailsbyId->s2m_activity_type_id_desc;?>
        	</div><!--fieldtype-->
  			<div class="clear_fix"></div>

            <div class="fieldname paddingnone">
               Activity Source:
			</div><!--fieldname-->
            <div class="fieldtype">
           		<?php echo $getsourcedata->s2m_activity_source_desc;?>
            </div><!--fieldtype-->
   			<div class="clear_fix"></div>

            <div class="fieldname paddingnone">
            	Activity URL:
            </div><!--fieldname-->
            <div class="fieldtype">
            	<?php echo $getdetails->activity_url;?>
            </div><!--fieldtype-->
            <div class="clear_fix"></div>
            
            <div class="fieldname paddingnone">
            	Activity Unique ID:
            </div><!--fieldname-->
            <div class="fieldtype">
            	<?php echo $getdetails->activity_unique_id;?>
            </div><!--fieldtype-->
            <div class="clear_fix"></div>

            <div class="fieldname paddingnone">
            	Email Address
            </div><!--fieldname-->
            <div class="fieldtype">
            	<span style="position:relative; top:3px;"><img src="images/help.png" /></span>
				<?php echo $getdetails->activity_email;?>
            </div><!--fieldtype-->
            <div class="clear_fix"></div>
            
            <div class="fieldname paddingnone">
            	Activity Date:
            </div><!--fieldname-->
            <div class="fieldtype">
            	<?php echo date('m/d/Y',strtotime($getdetails->activity_date));?>
            </div><!--fieldtype-->
    		<div class="clear_fix"></div>

      		<div class="fieldname paddingnone">
           		Activity Time:
            </div><!--fieldname-->
            <div class="fieldtype">
           		<?php $time_exp=explode(':',$getdetails->activity_time);echo $time_exp[0].':'.$time_exp[1];?>
            </div><!--fieldtype-->
            <div class="clear_fix"></div>
            
            <div class="fieldname paddingnone">
            	Activity Description:
            </div><!--fieldname-->
            <div class="fieldtype">
            	<?php echo $getdetails->activity_message;?>
            </div><!--fieldtype-->
   			<div class="clear_fix"></div>
    	</div><!--verificationform-->
        <div class="requestbtn">
            <a href="<?php echo SITEURL.'/'.EDITACTIVITY.'?id='.$getdetails->activity_id;?>">
            <input type="submit" value="Edit Activity" />
            </a>
            <a href="<?php echo SITEURL.'/'.ADDACTIVITY;?>"><input type="submit" value="Add New" /></a>
        </div>
        <div style="text-align:center; margin-top:10px;">
        	<a href="<?php echo SITEURL.'/'.DASHBOARDEXIST.'?action=del&id='.$getdetails->activity_id;?>" class="anchorwrap">Delete This Activity</a>
        	<span style="position:relative; top:7px;"><img src="images/help.png" /></span>
        </div>
	</div><!--selfverification-->
</div><!--dashboardright-->
<div class="clear_fix"></div>
</body>
</html>