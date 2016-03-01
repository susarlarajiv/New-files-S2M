<?php include("includes/header.php");
if($_POST['forgotpassword']=="Reset Password")
{
	$forgotpassword = $front_Obj->forgot($_POST);
}?>

<style>
.buttonclas  { background-color:#9fcb4b; border:none; font-family: 'SportsWorld'; font-size:18px; 
                                   color:#fff; padding:12px 15px; margin-top:12px; -moz-appearance:none;  
								   -webkit-appearance:none; appearance:none; width:100%; border-radius:7px; font-family: 'TrebuchetMS-Bold';  }									 								


</style>

<div class="full_wrapper">
 <div class="site_container">

  <div class="logincontainer">
<form name="forgotform" id="forgotform" method="post" onSubmit="return validationforgot()">
     <div class="loginwrap">
       <div><img src="images/logo_03.png" /></div>
       <h4>Know Before You Go</h4>
       <h1>Forgot Password</h1>
       <span style="color:#9fcb4b;;"><b>Note:<b>Enter your email address and we'll send you a link to reset your password.</span>
      <!-- <p>Enter email address you used to register and we will re-send your confirmation link</p>-->
       <input type="text" placeholder="Email Address" name="email" style="background:url(images/msg-icon_03.png) no-repeat 95% 50%;" />
       <!--<div class="margintop1"><a href="index.php"><input type="button"  value="Login"  class="buttonclas"/></a></div>-->
       <div class="margintop1"><input type="submit" name="forgotpassword" value="Reset Password" /></div>
	   <br />

       <a href="index.php">Login to Safe2Meet</a>
       <br />
       
      </div>
      
      </form>
  </div>
  
  
  
  
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