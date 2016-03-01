<?php include("includes/header.php");

if($_POST['register']=="Create Account")
{
	$front_Obj->userregister($_POST);
}

?>

<div class="full_wrapper">
 <div class="site_container">

  <div class="logincontainer">
     <div class="loginwrap">
       <div><img src="images/logo_03.png" /></div>
       <p>Create your account and get certified right away  ! </p>
       <h4 style="color:#98c73d;">Know Before You Go</h4>
       <form method="post" name="register" id="mahe" enctype="multipart/form-data" onsubmit="return validate();">
       <input type="text" placeholder="First Name" name="fname" style="background:url(images/login-icon_03.png) no-repeat 95% 50%;" />
       <input type="text" placeholder="Last Name" name="lname" style="background:url(images/login-icon_03.png) no-repeat 95% 50%;" />
       <input type="text" placeholder="Email" name="email" id="email" onchange="return emailvalid(this.value);" style="background:url(images/msg-icon_03.png) no-repeat 95% 50%;" value="" />
       <div id="emailFailMsg" style="font-size:12px;color:red;font-family:Arial, Helvetica, sans-serif"></div>
       <input type="text" placeholder="Confirm email" name="emailConfirm" id="emailConfirm"  style="background:url(images/msg-icon_03.png) no-repeat 95% 50%;" value="" />

       <input type="password" placeholder="Password" name="password"  style="background:url(images/login-icon_06.png) no-repeat 95% 50%;"  />
       <input type="password" placeholder="Confirm Password" name="cpassword" style="background:url(images/login-icon_06.png) no-repeat 95% 50%;"  />
       <div class="rememberme"><input type="checkbox"  name="checkvalu" required="required" /> <span style="color:#000;"> You agree to Safe2Meet's</span> <a href="termsconditions.php">Terms and Conditions</a> <span style="color:#000;"> and</span> <a href="#">Privacy Policy</a></div><br />
<p>How Would You Like to Confirm Your Account?</p>
       <input type="radio" name="comfirm_type" required="required" value="mobile"/> <a href="#">Mobile Phone</a> 
       <input type="radio" name="comfirm_type" src="confirmsms.php" required="required" value="email"/> <a href="#">Email Address</a>
	   <br />
	   <br />

       <input type="submit" name="register" value="Create Account" />
     </div>
      
 
       </form>
    
     </div>
  </div>
  
  
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<link rel="stylesheet" href="css/jquery-ui.css">
<script type="text/javascript">
 $(function() {
	
  $("#fromdate").datepicker({
   dateFormat: 'dd-mm-yy',
   // dateFormat: 'yy-mm-dd',
   changeMonth: true,
   changeYear: true,
   minDate:-30
  // maxDate: 0
  });
   
 });
  </script>
<script src="js/jquery-ui.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script type="text/javascript">
/*****Disable Copying and Pasting****/
$('#emailConfirm').bind('copy paste', function(e) {
 e.preventDefault();
// alert("please don't copy and paste confirm email");
});
</script>
<script type="text/javascript">

function trim(stringToTrim)

{

return stringToTrim.replace(/^\s+|\s+$/g,"");

}

function validate()

{

	if(document.register.fname.value=="")
	{ 
		alert("Please Enter First Name ");
		document.register.fname.value='';
		document.register.fname.focus();
		return false;
	}

	<?php if($company_disp->fname==""){?>
	
	
	
	
	if(document.register.lname.value=="")
	{ 
		alert("Please Enter Last Name ");
		document.register.lname.value='';
		document.register.lname.focus();
		return false;
	}

		
	
	<?php }?>

    var emailRegEx = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    var M=document.register.email.value.match(emailRegEx);
    var t=document.register.email.value !="";
	var g= document.register.email.value;
	var h=document.register.email.emailConfirm;
	if(document.register.email.value =="")
	{
	
		
			alert("Please enter a valid email address ");
			document.register.email.focus(); 
			//document.register.emailConfirm.focus();
			return false;
			}
	if(document.register.email.value==document.register.emailConfirm.value && M)
	{
	
		//return true;
		}else{
			alert("email and confirm email should match ");
			return false;
			}
			
			
			
    

    if(document.register.password.value != "" && document.register.password.value == document.register.cpassword.value) {
 
      if(document.register.password.value.length < 8) {
        alert(" Password must contain at least eight(8) characters!");
        document.register.password.focus();
        return false;
      }
      if(document.register.password.value == document.register.fname.value) {
        alert("Password must be different from Username!");
        document.register.password.focus();
        return false;
      }
	  if(document.register.password.value != document.register.cpassword.value) {
        alert("Password and confirm password don’t match  ");
        document.register.password.focus();
        return false;
      }
      re = /[0-9]/;
      if(!re.test(document.register.password.value)) {
        alert(" password must contain at least one number (0-9)!");
        document.register.password.focus();
        return false;
      }
      re = /[a-z]/;
      if(!re.test(document.register.password.value)) {
        alert(" password must contain at least one lowercase letter (a-z)!");
        document.register.password.focus();
        return false;
      }
      re = /[A-Z]/;
      if(!re.test(document.register.password.value)) {
        alert("password must contain at least one uppercase letter (A-Z)!");
        document.register.password.focus();
        return false;
      }
    } else {
      alert(" Please check that you've entered and confirmed your password!");
      document.register.password.focus();
      return false;
    }
	
	var chkd = document.register.checkvalu.checked

       if (chkd == true)
      {
       }
       else
   {
      alert ("Please Accept Terms and Conditions");
       return false;
   }

    //alert("You entered a valid password: " + document.register.password.value);
    return true;
  }

 
 
 
  
   
 
 
   /* var chkd = document.register.checkvalu.checked

       if (chkd == true)
      {
       }
       else
   {
      alert ("Please Accept Terms and Conditions");
       return false;
   }


	
		return true;*/



	

</script>

 <script type="text/javascript">

 function emailvalid(str)
		{
			var xmlhttp=new XMLHttpRequest();
			xmlhttp.onreadystatechange=function() {
				if (xmlhttp.readyState==4 && xmlhttp.status==200) {
					//alert(xmlhttp.responseText);
					if(xmlhttp.responseText>=1)
					{
						
					document.getElementById("email").value="";
					document.getElementById("emailFailMsg").innerHTML= "An account exists for this email address – please try again, or ";
					}
					else
					{
						
						document.getElementById("email").value=str;
						document.getElementById("emailFailMsg").innerHTML="";
					}
				}
			}
			//alert("working");
			xmlhttp.open("GET","checkemail2.php?q="+str,true);
			//alert("working");
			xmlhttp.send();
			
		}

</script>

 <?php include("includes/footer.php");?>