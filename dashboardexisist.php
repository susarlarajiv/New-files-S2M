<?php include "includes/header.php";
include 'includes/'.LEFTNAV;
if($_GET['action']=='del' && $_GET['id']!=''){
	$front_Obj->deleteactivity($_GET['id']);
}
$getusersubscription=$front_Obj->getusersubscription($_SESSION['frontend_id']);
$getactivitybyuserId=$front_Obj->getactivitybyuserId($_SESSION['frontend_id']);?>
<?php /*?><div class="dashboardright">
	<div class="dashboardheader">
		<div class="dashboardlogo"><img src="<?php echo SITEURL;?>/images/safe2meetlogo_03.png" /></div>
		<div class="menuicon"><img src="<?php echo SITEURL;?>/images/menu-icon_03.png" /></div>
    	<div class="clear_fix"></div>
    </div><!--dashboardheader--><?php */?>

    <div class="successmsg scoreboard">
        <h2>Credibility Score</h2>
        <div style="text-align:center;" class="topmargin"><img src="<?php echo SITEURL;?>/images/scoreboard_03.png" /></div>
    </div><!--successmsg-->

	<div class="dashboardexisiting">
    	<div class="leftlogo"><img src="<?php echo SITEURL;?>/images/header-logo_03.png" /></div>
    	<div class="rightbtn"><img src="<?php echo SITEURL;?>/images/dashboard_existing-btns_03.png" /></div>
   		<div class="midoontent">
    		<div class="mystatus">My Status:</div>
    		<div class="certified">
                <span style="position:relative; top:15px;">
                    <img src="<?php echo SITEURL;?>/images/certifiedlogo_31.png" />
                </span> Certified 
            </div>
            <div class="certifieddate">Until January 24, 2016</div>
            <div class="clear_fix"></div>
    	</div>
    	<div class="clear_fix"></div>
    </div>
	<?php if($getusersubscription->Subscription_Type_subscription_type_id=='1'){?>
        <h3>My Activities</h3>
        <table class="myactivitytable" cellpadding="0" cellspacing="0">
            <tr> 
                <th width="20%"><span class="leftpadding">Date</span></th>
                <th width="18%">Source</th>
                <th width="40%">URL</th>
                <th width="22%">&nbsp;</th>
            </tr>
            <?php foreach($getactivitybyuserId as $getdata){
                $getsourcedata=$front_Obj->getsourcedata($getdata->Activity_Source_activity_source_id);?>
                <tr> 
                    <td><span class="leftpadding"><?php echo date('m/d/Y',strtotime($getdata->activity_date));?></span></td>
                    <td><?php echo $getsourcedata->s2m_activity_source_desc;?></td>
                    <td><?php echo $getdata->activity_url;?></td>
                    <td>
                        <ul class="editpage">
                            <li><a href="<?php echo SITEURL.'/'.VIEWACTIVITY.'?id='.$getdata->activity_id;?>">View</a></li>
                            <li><a href="<?php echo SITEURL.'/'.EDITACTIVITY.'?id='.$getdata->activity_id;?>">Edit</a></li>
                            <li>
                                <a href="<?php echo SITEURL.'/'.DASHBOARDEXIST.'?action=del&id='.$getdata->activity_id;?>">
                                    Delete
                                </a>
                            </li>
                            <div class="clear_fix"></div>
                        </ul>
                    </td>
                </tr>
            <?php }?>
        </table>
		<?php /*?><ul class="myactivitylist">
            <li>
                <div class="myactivityleft">
                    <p>Internet Dating</p>
                    <p>www.match.com/unbelievableprofile</p>
                </div>
                <div class="myactivityright">
                    <p>1/23/2015    </p>
                    <ul class="editpage">
                        <li><a href="">View</a></li>
                        <li><a href="#">Edit</a></li>
                        <li><a href="#">Delete</a></li>
                        <div class="clear_fix"></div>
                    </ul>
                </div>
                <div class="clear_fix"></div>
            </li>
        </ul><?php */?>
    
        <div class="btnright">
            <a href="#">
                <img src="<?php echo SITEURL;?>/images/dashboard_existing-btns_07.png" />
            </a>
            <a href="<?php echo SITEURL.'/'.ADDACTIVITY;?>">
                <img src="<?php echo SITEURL;?>/images/dashboard_existing-btns_09.png" />
            </a>
        </div> 
        <div class="clear_fix"></div> 
    
        <div class="linkedaccounts">
            <h3>My Linked Accounts</h3>
            <div>
                <a href="#"><img src="<?php echo SITEURL;?>/images/social-icons_31.png" /></a>&nbsp;&nbsp;&nbsp;
                <a href="#"><img src="<?php echo SITEURL;?>/images/social-icons_33.png" /></a>&nbsp;&nbsp;&nbsp;
                <a href="#"><img src="<?php echo SITEURL;?>/images/social-icons_35.png" /></a>
            </div>
        </div><!--linkedaccounts-->
     <?php }?>
</div><!--dashboardright-->
<div class="clear_fix"></div>
</body>
</html>