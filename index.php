<?php 
include("includes/header.php");
if($_SESSION['frontend_id']!=""){
	$front_Obj->checkuserverification($userdetails->user_verify);
}
if($_POST['login']=="Login"){
	$name=$front_Obj->getlogindetails();
}
if($_GET['ver_key']!="" && $_GET['email']!=""){
	$ver_link=$front_Obj->verifyemilcode($_GET['email'],$_GET['ver_key']);
	if($ver_link->id!=""){		
		$ss = mysql_query("update user set user_status_id='1' where user_id=".$ver_link->user_id."");
		global $callConfig;
		$temp_fiednames=array('verified_date'=>date('Y-m-d H:i:s'),'verify_status'=>'yes');
		$callConfig->updateRecord(TBL_USER_TEMP,$temp_fiednames,'id',$ver_link->id);
	}
}?>


<script type="text/javascript">

function trim(stringToTrim)

{

return stringToTrim.replace(/^\s+|\s+$/g,"");

}

function validate()

{
	
	var emailRegEx = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    var M=document.login.email.value.match(emailRegEx);
    var t=document.login.email.value !="";
	var g= document.login.email.value;
	var h=document.login.email.emailConfirm;
	
	if(document.login.email.value =="")
	{
	
			alert("please enter your email ");
			return false;
			}	

	if(document.login.password.value=="")
	{ 
		alert("Please Enter your password ");
		
		document.login.password.focus();
		return false;
	}
	
	return true;
}

</script>

<div class="full_wrapper">
 <div class="site_container">
 
  <div class="logincontainer">
   
  <form name="login" method="post" enctype="multipart/form-data" onsubmit="return validate();">
     <div class="loginwrap">
       <div><img src="images/logo_03.png" /></div>
       <p>Login to get started managing your online identity!</p>
       <h4 style="color:#98c73d;">Know Before You Go</h4>
      <?php 
	   if($_GET['msg']){ ?> 
	   <samp ><h5 style="color:#FC1111">!..login failed</h5>
   <h5 style="color:#FC1111">please enter email and password correctly</h5>
   </samp>
	   <?php }else if($_GET[msgS]){?>
	   <samp ><h5 style="color:#9fcb4b">!..login Successfully</h5>
   
	   <?php } ?>
       <input type="text" placeholder="Email" name="email" id="email"  style="background:url(images/login-icon_03.png) no-repeat 95% 50%;" />
        <div id="emailFailMsg" style="font-size:12px;color:red;font-family:Arial, Helvetica, sans-serif"></div>
       <input type="password" placeholder="Password" name="password" style="background:url(images/login-icon_06.png) no-repeat 95% 50%;"  />
       <div class="rememberme" ><input type="checkbox"/><span style="color:#000"> Remember Me </span> |  <a href="forgot.php">Forgot Password</a></div>
       <input type="submit" name="login" value="Login" />
                                (or)
     <?php /*?>  <div style="margin:7px 0px;">Or Sign In with one of these Social Networks</div><?php */?>
       <div class="margintop"><a href="http://192.254.233.173/~rajeshch/safe2meet1/facebook/hybridauth/login-with.php"><img src="images/socialsitebtns_13.png" /></a></div>
      <?php /*?>  <div class="margintop"><a href="#"><img src="images/socialsitebtns_16.png" /></a></div>
        <div class="margintop"><a href="#"><img src="images/socialsitebtns_18.png" /></a></div><?php */?>
       <div class="donthaveacc"><a href="register.php">Don’t have an account? Sign Up</a></div>
     </div>
     </form>
  </div>
  
  
   <!----- pop up code -->
    <link rel="stylesheet" type="text/css" href="css/popupstyle.css" />
    <script src="http://code.jquery.com/jquery-latest.js" type="text/javascript"></script>
    <div id="pop1" class="simplePopup">
    	<ul  id="pop3" class="successmsg">
           <!-- <h1>Registration Successful!</h1>-->
            <p><span style="color:#a0c96b;"><a href="confirm.php?user_id=<?php echo $_GET['user_id']?>" style="color:#0F0;"><h4 align="center">Almost Done – Check Your Email to Confirm Your Account</h4></a> </span></p>
        <!--< ?php echo $_GET['msgreg'];?>-->
        </ul>
    </div>
    <div id="pop12" class="simplePopup">
    	<ul id="pop3" class="successmsg">
            <h1></h1>
            <p><span style="color:#a0c96b;">
            <a href="<?php echo SITEURL.'/index.php'?>" style="color:#0F0;">A link to reset your password has been sent to you. Please check your email <br />(don’t forget to check the spam folder if you don’t see it!).</a> </span></p>
        <!--< ?php echo $_GET['msgreg'];?>-->
        </ul>
    </div>
<script src="js/jquery.simplePopup.js" type="text/javascript"></script>
<script type="text/javascript">
var jq = $.noConflict();
jq(document).ready(function(){
/* jq('.show1').click(function(){
	
	});*/
	 <?php if($_GET['cnf_type']=='email' && $_GET['msgreg']!=''){?>
	jq('#pop1').simplePopup();
	<?php }
	if($_GET['msg']=='Password Sent To your Email'){?>
	jq('#pop12').simplePopup();
	<?php }?>

	
});



</script>
  <!----- pop up code -->
  
  
  <script type="text/javascript">

 function emailvalid(str)
		{
			var xmlhttp=new XMLHttpRequest();
			xmlhttp.onreadystatechange=function() {
				if (xmlhttp.readyState==4 && xmlhttp.status==200) {
					//alert(xmlhttp.responseText);
					if(xmlhttp.responseText=="")
					{
						
					document.getElementById("email").value=str;
					document.getElementById("emailFailMsg").innerHTML= "";
					}
					else
					{
						
						document.getElementById("email").value="";
						document.getElementById("emailFailMsg").innerHTML="Email Id Does Not Exist ,Please Register";
					}
				}
			}
			//alert("working");
			xmlhttp.open("GET","checkemail.php?q="+str,true);
			//alert("working");
			xmlhttp.send();
			
		}
</script>

<?php include("includes/footer.php");?>
