<?php include "includes/header.php";
include 'includes/'.LEFTNAV;
if($_SESSION['frontend_id']!=""){
	//$front_Obj->checkuserverification($userdetails->user_verify);
}
if($_POST['firstname']!="" && $_POST['verify_submit']=='VERIFY ME'){
	$front_Obj->insertremainingdetails($_POST);
}?>
<?php /*?><div class="dashboardright">
    <div class="logowrap"><img src="<?php echo SITEURL;?>/images/safe2meetlogo_03.png"></div>
    <div class="username"><img src="<?php echo SITEURL;?>/images/user_03.png"> 
    	<span style="position:relative; top:-40px;">User Name</span>
    </div>
    <div class="clear_fix"></div><?php */?>
    <h3>Tell Us More About Yourself</h3>
    <p>Thank you for registering with us!</p>
    <p>We just need a few basic pieces of information to begin the verification process. Please enter the information below – it is very important that you provide accurate information so that we can find your specific data in our system to get you certified.</p>
    <p>Ready to take the first step? Fill out the fields below.</p>
    <form name="verifyme_form" method="post" enctype="multipart/form-data">
        <ul class="fieldslist">
            <li>
                <div>First Name</div>
                <input type="text" name="firstname" value="<?php echo $userdetails->user_first_name;?>" required="required"/>
            </li>
            <li>
                <div>Middle Name</div>
                <input type="text" name="middlename" value="<?php echo $userdetails->user_middle_initial;?>" />
            </li>
            <li>
                <div>Last Name</div>
                <input type="text" name="lastname" value="<?php echo $userdetails->user_last_name;?>" required="required"/>
            </li>
            <li>
                <div>Address 1</div>
                <input type="text" name="address1" value="<?php echo $userdetails->user_address_1;?>" required="required"/>
            </li>
            
          <!--  <li>
                <div>Address 2</div>
                <input type="text" name="address2" value="" required="required"/>
            </li>-->
            <li>
                <div>City</div>
                <input type="text" name="cityofbirth" value="" required="required"/>
            </li>
            <li>
                <div>State</div>
                <input type="text" name="stateofbirth" value="" required="required"/>
            </li>
            <li>
                <div>Zip Code</div>
                <input type="text" name="zipcode" required="required"/>
            </li>
            <li>
                <div>SSN</div>
                <input type="text" name="snn" required="required"/>
            </li>
            
            <li>
                <div>Date Of Birth</div>
                <!--<input type="text" name="dob" class="date_picker" required="required"/>-->
                <input type="text" class="fieldwidth" name="dob_date" required="required">
                <input type="text" class="fieldwidth" name="dob_month" required="required"/>
                <input type="text" class="fieldwidth" name="dob_year" required="required"/>
                <div class="clear_fix"></div>
            </li>
            <div class="clear_fix"></div>
        </ul>
        <div style="margin-top:20px; text-align:center;">
            <input type="checkbox" name="verify_check" required="required"/> 
            Yes, I want to verify that I am safe to meet and I have read the <a href="#">Terms and Conditions</a>
        </div>
        <div style="margin-top:20px; text-align:center;">
        	<input type="submit" name="verify_submit" value="VERIFY ME" />
            <?php /*?><a href="javascript:void(0);" onclick="submitform();"><img src="<?php echo SITEURL;?>/images/verifyme_04.png" /></a><?php */?>
        </div>
    </form>
</div><!--dashboardright-->
<div class="clear_fix"></div>
</body>
</html>
<script>
	function submitform()
	{
		document.verifyme_form.submit();
	}
</script>