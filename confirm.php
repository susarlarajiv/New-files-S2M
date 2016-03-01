<?php include("includes/header.php");
if($_POST['accountactvation']=="Re-send confirmation link")
{
	$accountactvation = $front_Obj->confirmyouraccountactivation($_POST);
}?>
<script type="text/javascript">
function validationforgot()

       {

        var emailRegEx = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		var M=document.activation.email.value.match(emailRegEx);
		var t=document.activation.email.value !="";
		var g= document.activation.email.value;
		var h=document.activation.email.emailConfirm;
		if(document.activation.email.value =="" && M )
		{
		alert("Please enter a valid email address ");
		document.activation.email.focus(); 
		//document.register.emailConfirm.focus();
		return false;
	    }
        return true;
      }
function trim(stringToTrim)
		{
		return stringToTrim.replace(/^\s+|\s+$/g,"");
		}


 function emailvalid(str)
		{
			var xmlhttp=new XMLHttpRequest();
			xmlhttp.onreadystatechange=function() {
				if (xmlhttp.readyState==4 && xmlhttp.status==200) {
					//alert(xmlhttp.responseText);
					if(xmlhttp.responseText<1)
					{
						
					document.getElementById("email").value="";
					document.getElementById("emailFailMsg").innerHTML= "please give a email-id that you registered with";
					}
					else
					{
						
					document.getElementById("email").value=str;
					document.getElementById("emailFailMsg").innerHTML="Ok";
					}
				}
			}
			//alert("working");
			xmlhttp.open("GET","checkemail2.php?q="+str,true);
			//alert("working");
			xmlhttp.send();
			
		}

</script>
<div class="full_wrapper">
 <div class="site_container">
  <div class="logincontainer">
  <form name="activation" id="activation" method="post" onSubmit="return validationforgot()">
     <div class="loginwrap">
       <div><img src="images/logo_03.png" /></div>
       <h4>Know Before You Go</h4>
       <h1>Confirm Your Account</h1>
       <p><b>Enter email address you used to register and we will re-send your confirmation link</b></p>
       <input type="text" placeholder="Email Address" name="email" id="email" style="background:url(images/msg-icon_03.png) no-repeat 95% 50%;" onchange="return emailvalid(this.value)" required="required" onblur="return validationforgot(this.value);"/>
	   <div id="emailFailMsg" style="font-size:12px;color:red;font-family:Arial, Helvetica, sans-serif"></div>
       <div class="margintop1"><input type="submit" name="accountactvation" value="Re-send confirmation link"  /></div>
	   
	   <input type="hidden" name="uid" value="<?php echo $_GET['user_id']; ?>" />
      </div>
      </form>
  </div>
  
  
  
 <?php include("includes/footer.php");?>