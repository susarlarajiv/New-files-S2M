<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Safe2Meet</title>
<link type="text/css" rel="stylesheet" href="file:///E|/xampp/htdocs/safe2meethtmlstotal/css/style.css" />
<link type="text/css" rel="stylesheet" href="file:///E|/xampp/htdocs/safe2meethtmlstotal/css/responsive.css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
	$(".mobileicon").click(function() { 
	$(".dashboardlist").slideToggle();
	});
 });
 </script>
</head>
<body>

<div class="dashboardleft">
 <div class="logo1"><img src="file:///E|/xampp/htdocs/safe2meethtmlstotal/images/dashboard-pics_03.png" /></div>
 <div class="accname">
 <h1>Jonathon Williams</h1>
 <div><a href="#" class="anchorwrap">Replace Photo</a></div>
 </div>
 <div class="clear_fix"></div>
 <div class="mobileicon"><img src="file:///E|/xampp/htdocs/safe2meethtmlstotal/images/menu-icon_04.png" /></div>
 <ul class="dashboardlist">
   <li>
   <a href="#">
   <span style="position:relative; top:3px;"><img src="file:///E|/xampp/htdocs/safe2meethtmlstotal/images/dashboard_existing-icons_03.png" /></span> Contact Info  <img src="file:///E|/xampp/htdocs/safe2meethtmlstotal/images/dashboard_existing-icons_06.png" class="arrowicon" /></a>
    <div class="clear_fix"></div>
   </li>

   <li>
   <a href="#">
   <span style="position:relative; top:1px;"><img src="file:///E|/xampp/htdocs/safe2meethtmlstotal/images/dashboard_existing-icons_11.png" /></span>&nbsp;&nbsp;My Wallet 
   <img src="file:///E|/xampp/htdocs/safe2meethtmlstotal/images/dashboard_existing-icons_06.png" class="arrowicon" /></a>
    <div class="clear_fix"></div>
   </li>
 </ul>
</div><!--dashboardleft-->

<div class="dashboardright">
 <div class="logowrap"><img src="file:///E|/xampp/htdocs/safe2meethtmlstotal/images/safe2meetlogo_03.png"></div>
 <div class="username"><img src="file:///E|/xampp/htdocs/safe2meethtmlstotal/images/user_03.png"> <span style="position:relative; top:-40px;">User Name</span></div>
 <div class="clear_fix"></div>
<h1>My Profile</h1>
 <ul class="fieldslist">

 <li>
  <div>First Name</div>
  <input type="text" />
 </li>

 <li>
  <div>Middle Name</div>
  <input type="text" />
 </li>

 <li>
  <div>Last Name</div>
  <input type="text" />
 </li>


 <li>
  <div>Address 1</div>
  <input type="text" />
 </li>

 <li>
  <div>Address 2</div>
  <input type="text" />
 </li>


 <li>
  <div>City</div>
  <input type="text" />
 </li>

 <li>
  <div>State</div>
  <input type="text" />
 </li>

 <li>
  <div>Zip Code</div>
  <input type="text" />
 </li>
 
 <li>
  <div>SSN</div>
  <input type="text" />
 </li>

 <li>
  <div>Date Of Birth</div>
  <input type="text" class="fieldwidth" />
  <input type="text" class="fieldwidth" />
  <input type="text" class="fieldwidth" />
  <div class="clear_fix"></div>
 </li>
 
<div class="clear_fix"></div>
</ul>
<div class="aligncenter"><input type="submit" value="Save Profile" /></div>
<div style="margin-top:20px; text-align:center;"><a href="#" class="anchorwrap">Cancel My Account</a></div>

 </div><!--dashboardright-->
<div class="clear_fix"></div>
</body>
</html>