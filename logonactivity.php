<?php include "includes/header.php";
include 'includes/'.LEFTNAV;
$getallsourcedata=$front_Obj->getallsourcedata();
$getalltypedetails=$front_Obj->getalltypedetails();
if($_POST['activity_submit']=="Add Activity"){
	$front_Obj->insertactivity($_POST);
}?>
<?php /*?><div class="dashboardright">
	<div class="logowrap"><img src="<?php echo SITEURL;?>/images/safe2meetlogo_03.png" /></div>
	<div class="username">
    	<img src="<?php echo SITEURL;?>/images/user_03.png" /> 
        <span style="position:relative; top:-40px;">User Name</span>
	</div>
	<div class="clear_fix"></div>
<?php */?>	
<h1 style="margin-bottom:20px;">Log An Activity</h1>
	<p>On and offline activities help bolster your credibility score. Add a new activity, and we ll generate a QR code for you to identify this activity!</p>
	<form method="post" name="addactivity_form" enctype="multipart/form-data">
        <ul class="historyverifylist" style="float:none; max-width:300px; margin:auto;">
            <li>Online/Offline?</li>
            <li><input type="radio" name="logon_type" value="1" required="required"> Online</li>
            <li><input type="radio" name="logon_type" value="0" required="required"> Offlline</li>
            <div class="clear_fix"></div>
        </ul>
        <div class="clear_fix"></div>
        <div class="selfverification" style="margin-top:30px;">
            <div class="verificationform" style=" padding:15px 0px;">
                <div class="fieldname">
                    Activity Name:
                </div><!--fieldname-->	
                
                <div class="fieldtype">
                    <input type="text" placeholder="Activity Name" name="activity_name" required="required"/>
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
                                <option value="<?php echo $data->s2m_activity_type_id;?>">
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
                            	<option value="<?php echo $data->s2m_activity_source_id;?>">
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
                        <img src="<?php echo SITEURL;?>/images/help.png" />
                    </span>
                    <input type="text" class="fieldwidth1" placeholder="Activity URL" name="activity_url" required="required"/>
                </div><!--fieldtype-->
                <div class="clear_fix"></div>
                
                <div class="fieldname">
                    Activity Unique ID:
                </div><!--fieldname-->
                <div class="fieldtype">
                    <span style="position:relative; top:6px; padding-right:5px;">
                        <img src="<?php echo SITEURL;?>/images/help.png" />
                    </span>
                    <input type="text" class="fieldwidth1" placeholder="Activity Unique ID"  name="activity_uniqueid" required="required"/>
                </div><!--fieldtype-->
                <div class="clear_fix"></div>
                
                <div class="fieldname">
                    Email Address
                </div><!--fieldname-->
                <div class="fieldtype">
                    <span style="position:relative; top:6px; padding-right:5px;">
                        <img src="<?php echo SITEURL;?>/images/help.png" />
                    </span>
                    <input type="text" class="fieldwidth1" placeholder="Activity Email Address"  name="activity_email" required="required"/>
                </div><!--fieldtype-->
                <div class="clear_fix"></div>
                
                <div class="fieldname">
                    Activity Date:
                </div><!--fieldname-->
                <div class="fieldtype">
                    <input type="text" placeholder="Activity Date" class="date_picker" name="activity_date" required="required"/>
                </div><!--fieldtype-->
                <div class="clear_fix"></div>
                
                <div class="fieldname">
                    Activity Time:
                </div><!--fieldname-->
                <div class="fieldtype">
                    <input type="text" placeholder="Activity Time"  name="activity_time" class="time_picker" required="required"/>
                </div><!--fieldtype-->
                <div class="clear_fix"></div>
                
                <div class="fieldname">
                    Activity Description:
                </div><!--fieldname-->
                <div class="fieldtype paddingtop">
                    <textarea placeholder="Activity Description"  name="activity_description" required="required"></textarea>
                </div><!--fieldtype-->
                <div class="clear_fix"></div>
            </div><!--verificationform-->
            <div class="aligncenter">
                <input type="submit" name="activity_submit" value="Add Activity"/>
            </div>
        </div><!--selfverification-->
    </form>
</div><!--dashboardright-->
<div class="clear_fix"></div>
</body>
</html>