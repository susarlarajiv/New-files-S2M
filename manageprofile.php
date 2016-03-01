<?php include "includes/header.php";
include 'includes/'.LEFTNAV;
if($_POST['firstname']!=""){
	$front_Obj->updateuserdetails($_POST);
}?>

<?php /*?><div class="dashboardright">
  <div class="logowrap"><img src="<?php echo SITEURL;?>/images/safe2meetlogo_03.png"></div>
    <div class="username"><img src="<?php echo SITEURL;?>/images/user_03.png"> 
    <span style="position:relative; top:-40px;">User Name</span></div>
 <div class="clear_fix"></div><?php */?>
<h1 >My Profile</h1>
<form name="update_form" method="post" enctype="multipart/form-data">
    <ul class="fieldslist">
        <li>
            <div>First Name</div>
            <input type="text" name="firstname" value="<?php echo $userdetails->user_first_name;?>" required="required"/>
        </li>
    
        <li>
            <div>Middle Name</div>
            <input type="text" name="middlename" value="<?php echo $userdetails->user_middle_initial;?>"/>
        </li>
    
        <li>
            <div>Last Name</div>
            <input type="text" name="lastname" value="<?php echo $userdetails->user_last_name;?>" required="required"/>
        </li>
    
    
        <li>
            <div>Address 1</div>
            <input type="text" name="address1" value="<?php echo $userdetails->user_address_1;?>" required="required"/>
        </li>
    
        <li>
            <div>Address 2</div>
            <input type="text" name="address2" value="<?php echo $userdetails->user_address_2;?>" required="required"/>
        </li>
    
        <li>
            <div>City</div>
            <input type="text" name="cityofbirth" value="<?php echo $userdetails->user_cityofbirth;?>" required="required"/>
        </li>
    
        <li>
            <div>State</div>
            <input type="text" name="stateofbirth" value="<?php echo $userdetails->user_stateofbirth;?>" required="required"/>
        </li>
    
        <li>
            <div>Zip Code</div>
            <input type="text" name="zipcode" value="<?php echo $userdetails->user_zipcode;?>"required="required"/>
        </li>
    
        <li>
            <div>SSN</div>
            <input type="text" name="snn" value="<?php echo $userdetails->user_ssn;?>"required="required"/>
        </li>
    
        <li>
            <div>Date Of Birth</div>
            	 <input type="text" name="dob" class="date_picker" required="required" value="<?php echo $userdetails->user_dob;?>"/>
            	<?php /*?><input type="text" class="fieldwidth" name="dob_date" id="date" required="required">
                <input type="text" class="fieldwidth" name="dob_month" required="required"/>
                <input type="text" class="fieldwidth" name="dob_year" required="required"/><?php */?>
            <div class="clear_fix"></div>
        </li>
        <div class="clear_fix"></div>
    </ul>
    <div class="aligncenter"><input type="submit" name="update_profile" value="Save Profile" /></div>
    <div style="margin-top:20px; text-align:center;"><a href="<?php echo SITEURL;?>" class="anchorwrap">Cancel My Account</a></div>
</form>
</div><!--dashboardright-->
<div class="clear_fix"></div>
</body>
</html>