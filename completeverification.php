<?php include "includes/header.php";
include 'includes/'.LEFTNAV;?>
<?php /*?><div class="dashboardright">
 <div class="logowrap"><img src="<?php echo SITEURL;?>/images/safe2meetlogo_03.png"></div>
 <div class="username"><img src="<?php echo SITEURL;?>/images/user_03.png"> <span style="position:relative; top:-40px;">User Name</span></div>
 <div class="clear_fix"></div><?php */?>
 
 <div class="completeverification">
   <div><img src="<?php echo SITEURL;?>/images/header-logo_03.png" /></div>
   <div style="margin-top:10px;"><img src="<?php echo SITEURL;?>/images/safe2meetlogo_03.png" /></div>
   <h3>Verification Complete</h3>
   <form action="<?php echo SITEURL.'/'.DASHBOARDNEWUSER;?>" method="post">
   	<input type="submit" value="View Your Results"/>
   </form>
</div>
 </div><!--dashboardright-->
<div class="clear_fix"></div>
</body>
</html>