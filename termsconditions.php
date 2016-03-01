<?php 
//ob_start();
include("includes/header.php");

if($_POST['login']=="Login")
{
	
	//print_r($_POST);exit;
	
	$name=$front_Obj->getlogindetails();
	
	
}

?>
<div class="full_wrapper">
 <div class="site_container">
 
  <div style="margin-top:150px;">
   <div style="margin-left:0px; margin-top:-70px;">
 <h2 style="color:#a0c96b">Terms And Conditions</h2>
 </div>
 <br />
 <div style="margin-right:5px;">
 <h5>Acceptance of Terms</h5>
 </div>

 <div>
 <p>Building a geodesic dome as a do-it-yourself project can be a real challenge. It’s difficult to know where to begin even for those with considerable building experience. If you dig deep enough, you can find plenty of information describing the geometry of domes, although most of it is rather technical and theoretical and often lacks the kind of practical hands on advice needed to turn theory into a finished product.</p>

<p>
This plan book is designed to fill that void by focusing almost entirely on simple, detailed shop drawings that show how geodesic domes are built with virtually no need for higher math. In fact, the only math you’ll see in these plans are the 4 basic functions used in a list of formulas for calculating the length of various parts. </p>
<p>The underlying geometry describes carbon 60, the third stable form of pure carbon after graphite and diamond called buckminsterfullerene or buckyballs. Its shape is a 3 frequency (3v) icosahedron which is an industry-standard for dome homes. If that sounds complicated, and I’m pretty sure it does, I guarantee you it doesn’t matter. Understanding the complex geodesic math involved in the design of domes is completely unnecessary when it comes to the actual process of building one. All you’ll need are basic woodworking skills and a little patience. With that, you should have little trouble building your own dome.
</p>
 </div>
 </div>
  
  
   <!----- pop up code -->
    <link rel="stylesheet" type="text/css" href="css/popupstyle.css" />
    <script src="http://code.jquery.com/jquery-latest.js" type="text/javascript"></script>
		<div id="pop1" class="simplePopup">
    <ul  id="pop3" class="successmsg">
  
   
    <h1>Registration Successful!</h1>
    <p><span style="color:#a0c96b;"><a href="confirm.php?id=<?php echo $_GET['id']?>" style="color:#0F0;">Click Here To Confirm Your Account is Active</a> </span></p>

 
	
	<!--< ?php echo $_GET['msgreg'];?>-->
  </ul>
          
        
 
		  
		  
</div>
<script src="js/jquery.simplePopup.js" type="text/javascript"></script>
<script type="text/javascript">
var jq = $.noConflict();
jq(document).ready(function(){
/* jq('.show1').click(function(){
	
	});*/
	 <?php if($_GET['msgreg']!=''){?>
	jq('#pop1').simplePopup();
	<?php }?>

	
});



</script>
  <!----- pop up code -->
  
  
  <!--<script type="text/javascript">

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
  -->
  
  
  
  
  <?php include("includes/footer.php");?>
