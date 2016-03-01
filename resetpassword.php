<?php
include("includes/header.php");
if(isset($_GET['user_email_address']) && $_GET['key']!=''){
	$errr=$front_Obj->verifycode($_GET['user_email_address'],$_GET['key']);	
}
if($_POST['resetpassword']=='Reset Password'){
	$front_Obj->resetpassword($_POST);
	
	
}
if($errr->id!=''){
	?>
<style>
.buttonclas  { background-color:#9fcb4b; border:none; font-family: 'SportsWorld'; font-size:18px; 
                                   color:#fff; padding:12px 15px; margin-top:12px; -moz-appearance:none;  
								   -webkit-appearance:none; appearance:none; width:100%; border-radius:7px; font-family: 'TrebuchetMS-Bold';  }									 								


</style>

<div class="full_wrapper">
 <div class="site_container">

  <div class="logincontainer">
<form name="resetfrom" id="resetfrom" method="post" onSubmit="return validationreset()">
     <div class="loginwrap">
       <div><img src="images/logo_03.png" /></div>
       <h4>Know Before You Go</h4>
       <h1>Forgot Password</h1>
       <span style="color:#9fcb4b;;"><b>Note:<b>Enter your email address and we'll send you a link to reset your password.</span>
      <!-- <p>Enter email address you used to register and we will re-send your confirmation link</p>-->
       <input type="password" placeholder="New Password" name="new_password" style="background:url(images/msg-icon_03.png) no-repeat 95% 50%;" />
       <input type="password" placeholder="Confirm Password" name="cnf_password" style="background:url(images/msg-icon_03.png) no-repeat 95% 50%;" />
       <input type="hidden" name="hdn_id" value="<?php echo $errr->id;?>"/>
       <input type="hidden" name="hdn_user_id" value="<?php echo $errr->user_id;?>"/>
       <div class="margintop1"><input type="submit" name="resetpassword" value="Reset Password" /></div>
       
       <br />
       
      </div>
      
      </form>
  </div>
  
  
 <?php }else {
	 header('Location:index.php');}?> 
  
  <script type="text/javascript">

function validationforgot()
{

var emailRegEx = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

	if(document.forgotform.email.value=="")

	{ 

		alert("Please Enter  Email ");

		document.forgotform.email.value='';

		document.forgotform.email.focus();

		return false;

	}
}

</script>
<?php include("includes/footer.php");?>