<?php if($userdetails->user_verify=='verified' && $userdetails->user_3rd_verifcation=="verified"){
	$user_img='<img src="'.SITEURL.'/images/profile-pic_03.png" />';
	$user_ver_img='<div class="smalllogo"><img src="'.SITEURL.'/images/dashboard-icons_03.png" /></div>
   				<div class="mobileicon"><img src="'.SITEURL.'/images/menu-icon_04.png" /></div>';
	$dash_path=SITEURL.'/'.DASHBOARDEXIST;
	$ver='Verified';
}else{
	$user_img='<img src="'.SITEURL.'/images/dashboard-pics_03.png" />';
	$user_ver_img='';
	$dash_path=SITEURL.'/'.DASHBOARDNEWUSER;
	$ver='Not Verified';
}?>
<div class="dashboardleft minheight">
	<div class="logo1">
    	<?php echo $user_img;?>
    </div>
    <div class="accname">
    	<h1>
			<?php echo $front_Obj->capatalize($userdetails->user_first_name).' '.$front_Obj->capatalize($userdetails->user_last_name);?>
        </h1>
    	<h2><?php echo $ver;//$front_Obj->capatalize($userdetails->user_verify);?></h2>
    </div>
    <div class="clear_fix"></div>
    <?php echo $user_ver_img;?>
    <ul class="dashboardlist paddingnone">
     	<?php if($userdetails->user_verify=='verified' && $userdetails->user_3rd_verifcation=="not verified"){?>
            <li>
              <a href="#">
                    <span style="position:relative; top:3px;">
                        <img src="<?php echo SITEURL;?>/images/dashboard_existing-icons_03.png" />
                    </span> 3rd Party Verifications   
                    <img src="<?php echo SITEURL;?>/images/dashboard_existing-icons_06.png" class="arrowicon" />
                </a>
                <div class="clear_fix"></div>
            </li>
        <?php }?>
        <?php if($userdetails->user_verify=='verified' && $userdetails->user_3rd_verifcation=="verified"){?>
             <li>
                <a href="<?php echo SITEURL.'/'.MANAGEPROFILE;?>">
                    <span style="position:relative; top:1px;">
                        <img src="<?php echo SITEURL;?>/images/dashboard_existing-icons_11.png" />
                    </span> My Profile 
                    <img src="<?php echo SITEURL;?>/images/dashboard_existing-icons_06.png" class="arrowicon" />
                </a>
                <div class="clear_fix"></div>
            </li>
		<?php }else {?>
        	<li>
                <a href="">
                    <span style="position:relative; top:1px;">
                        <img src="<?php echo SITEURL;?>/images/dashboard_existing-icons_11.png" />
                    </span> Help Center 
                    <img src="<?php echo SITEURL;?>/images/dashboard_existing-icons_06.png" class="arrowicon" />
                </a>
                <div class="clear_fix"></div>
            </li>
		<?php }?>
        <li>
            <a href="logout.php">
                <span style="position:relative; top:2px;"><img src="images/dashboard_existing-icons_15.png" /></span> Logout 
                <img src="images/dashboard_existing-icons_06.png" class="arrowicon" />
            </a>
            <div class="clear_fix"></div>
        </li>
    </ul>
</div>
<div class="dashboardright">
	<div class="dashboardheader">
        <div class="dashboardlogo">
        	<a href="<?php echo $dash_path;?>">
            	<img src="<?php echo SITEURL;?>/images/safe2meetlogo_03.png" />
            </a>
        </div>
		<div class="menuicon">
        	<a href="<?php echo $dash_path;?>">
            	<img src="<?php echo SITEURL;?>/images/menu-icon_03.png" />
            </a>
        </div>
		<div class="clear_fix"></div>
	</div><!--dashboardheader-->
    <div class="clear_fix"></div>