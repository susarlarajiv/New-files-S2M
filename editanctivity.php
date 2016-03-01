<?php include "includes/header.php";
include 'includes/'.LEFTNAV;
$id=$_GET['id'];
$getallsourcedata=$front_Obj->getallsourcedata();
$getalltypedetails=$front_Obj->getalltypedetails();
$getdetails=$front_Obj->getactivitydetailsbyId($id);
$getsourcedata=$front_Obj->getsourcedata($getdetails->Activity_Source_activity_source_id);
$gettypedetailsbyId=$front_Obj->gettypedetailsbyId($getdetails->S2M_Activity_Type_S2M_Activity_Type_ID);
if($_POST['activity_submit']=="Update Activity"){
	$front_Obj->updateactivity($_POST);
}?>
<?php /*?><div class="dashboardright">
	<div class="logowrap">
    	<img src="<?php echo SITEURL;?>/images/safe2meetlogo_03.png" />
    </div>
	<div class="username">
    	<img src="<?php echo SITEURL;?>/images/user_03.png" /> <span style="position:relative; top:-40px;">User Name</span>
    </div>
	<div class="clear_fix"></div><?php */?>
	<h1 style="margin-bottom:20px;">Edit An Activity</h1>
	<p>
    	On and offline activities help bolster your credibility score. Add a new activity, and we ll generate a QR code for      you to identify this activity!
	</p>
    <form action="" method="post" name="update_form" enctype="multipart/form-data">
        <ul class="historyverifylist" style="float:none; max-width:300px; margin:auto;">
            <li>Online/Offline?</li>
            <li><input type="radio" name="logon_type" value="1" required="required" <?php echo ($getdetails->activity_onoroff=='1')?'checked':''; ?>> Online</li>
            <li><input type="radio" name="logon_type" value="0" required="required" <?php echo ($getdetails->activity_onoroff=='0')?'checked':''; ?>> Offlline</li>
            <div class="clear_fix"></div>
        </ul>
        <div class="selfverification" style="margin-top:30px;">
            <div class="verificationform" style=" padding:15px 0px;">
                <div class="fieldname">
                    Activity Name:
                </div><!--fieldname-->
                <div class="fieldtype">
                    <input type="text" placeholder="Activity Name" required="required" name="activity_name" value="<?php echo $getdetails->activity_name; ?>"/>
                </div><!--fieldtype-->
                <div class="clear_fix"></div>
    
                <div class="fieldname">
                    Activity Type:
                </div><!--fieldname-->
                <div class="fieldtype">
                	<div class="select-style">
                         <select name="activity_type" required="required">
                            <option value="">Activity Type</option>
                            <?php foreach($getalltypedetails as $data){?>
                                <option value="<?php echo $data->s2m_activity_type_id;?>" 
								<?php if($getdetails->S2M_Activity_Type_S2M_Activity_Type_ID==$data->s2m_activity_type_id)
								{echo 'selected="selected"';}?>>
                                    <?php echo $front_Obj->capatalize($data->s2m_activity_type_id_desc);?>
                                </option>
                            <?php }?>
                        </select>
                   	</div>
                </div><!--fieldtype-->
                <div class="clear_fix"></div>
    
                <div class="fieldname">
                    Activity Source:
                </div><!--fieldname-->
                <div class="fieldtype">
                    <div class="select-style">
                        <select name="activity_source" required="required">
                             <option value="">Activity Souce</option>
                             <?php foreach($getallsourcedata as $data){?>
                            	<option value="<?php echo $data->s2m_activity_source_id;?>" <?php if($getdetails->Activity_Source_activity_source_id==$data->s2m_activity_source_id){echo 'selected="selected"';}?>>
                               		<?php echo $front_Obj->capatalize($data->s2m_activity_source_desc);?>
                                </option>
                            <?php }?>
                         </select>
                    </div>
                </div><!--fieldtype-->
                <div class="clear_fix"></div>
                
                <div class="fieldname">
                    Activity URL:
                </div><!--fieldname-->
                <div class="fieldtype">
                    <span style="position:relative; top:6px; padding-right:5px;">
                    <img src="<?php echo SITEURL;?>/images/help.png" /></span>
                    <input type="text" class="fieldwidth1" placeholder="Activity URL" required="required" name="activity_url" value="<?php echo $getdetails->activity_url;?>"/>
                </div><!--fieldtype-->
                <div class="clear_fix"></div>
    
                <div class="fieldname">
                    Activity Unique ID:
                </div><!--fieldname-->
                <div class="fieldtype">
                    <span style="position:relative; top:6px; padding-right:5px;">
                        <img src="<?php echo SITEURL;?>/images/help.png" />
                    </span>
                    <input type="text" class="fieldwidth1" placeholder="Activity Unique ID" required="required" name="activity_uniqueid" value="<?php echo $getdetails->activity_unique_id;?>"/>
                </div><!--fieldtype-->
                <div class="clear_fix"></div>
                
                <div class="fieldname">
                    Email Address
                </div><!--fieldname-->
                <div class="fieldtype">
                    <span style="position:relative; top:6px; padding-right:5px;">
                        <img src="<?php echo SITEURL;?>/images/help.png" />
                    </span>
                    <input type="text" class="fieldwidth1" placeholder="Activity Email Address" required="required" name="activity_email" value="<?php echo $getdetails->activity_email;?>"/>
                </div><!--fieldtype-->
                <div class="clear_fix"></div>
                
                <div class="fieldname">
                    Activity Date:
                </div><!--fieldname-->
                <div class="fieldtype">
                    <input type="text" placeholder="Activity Date" class="date_picker"  name="activity_date" required="required" value="<?php echo $getdetails->activity_date;?>"/>
                </div><!--fieldtype-->
                <div class="clear_fix"></div>
    
                <div class="fieldname">
                    Activity Time:
                </div><!--fieldname-->
                <div class="fieldtype">
                    <input type="text" placeholder="Activity Time" name="activity_time" class="time_picker"  required="required" value="<?php $time_exp=explode(':',$getdetails->activity_time);echo $time_exp[0].':'.$time_exp[1];?>"/>
                </div><!--fieldtype-->
                <div class="clear_fix"></div>
                
                <div class="fieldname">
                    Activity Description:
                </div><!--fieldname-->
                <div class="fieldtype paddingtop">
                    <textarea placeholder="Activity Description" required="required" name="activity_description"><?php echo $getdetails->activity_message;?></textarea>
                </div><!--fieldtype-->
                <div class="clear_fix"></div>
            </div><!--verificationform-->
            <div class="requestbtn">
            	<input type="hidden" name="hid_id" value="<?php echo $getdetails->activity_id;?>">
                <input type="submit" value="Update Activity" name="activity_submit"/>
                <input type="button" value="Cancel" onClick="cancel_fun()"/>
            </div>
            <div style="text-align:center; margin-top:10px;">
                <a href="<?php echo SITEURL.'/'.DASHBOARDEXIST.'?action=del&id='.$getdetails->activity_id;?>" class="anchorwrap">Delete This Activity</a>
                <span style="position:relative; top:7px;"><img src="images/help.png" /></span>
            </div>
		</div><!--selfverification-->
    </form>
</div><!--dashboardright-->
<div class="clear_fix"></div>
</body>
</html>
<script>
function cancel_fun()
{
	window.location="<?php echo SITEURL.'/'.DASHBOARDEXIST;?>";
}
</script>