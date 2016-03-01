<?php 
ini_set("display_errors",0);
define(HOSTNAME,"localhost");
define(USERNAME,"rajeshch_s2m");
define(PASSWORD,"media3");
define(DBNAME,  "rajeshch_safe2meetpat");
###################################################################

######### TABLE CONSTANTS 

###################################################################

/********* Table Prefix *********/

define('SANDBOXURL', 'https://www.sandbox.paypal.com/cgi-bin/webscr');
define('BUSINESSEMAIL', 'rk004@gmail.com');

//define('TPREFIX', 'tb_');


/********* Table Names *********/

define('TBL_ACTIVITY'				,'s2m_activity');
define('TBL_SUBSCRIPTION_TYPE'		,'s2m_subscription_type');
define('TBL_ACTIVITY_SOURCE'		,'s2m_activity_source');
define('TBL_ACTIVITY_TYPE'			,'s2m_activity_type');
define('TBL_USER'					,'user');
define('TBL_USER_ROLE'				,'user_role');
define('TBL_USER_STATUS'			,'user_status');
define('TBL_USER_TYPE'				,'user_type');
define('TBL_SUBSCRIPTION_PAYMENNT'	,'s2m_subscription');
define('TBL_USER_TEMP'				,'s2m_user_temp');






define('TBL_ADMIN','admin');

define('TBL_SITESETTINGS','sitesettings');

define('TBL_RECENTACTIVITIES','recentactivities');

define('TBL_BLOG','blog');

define('TBL_MENU','menu');

define('TBL_SUBMENU','submenu');

define('TBL_FAQ','faq');



define('TBL_NEWSLETTERS','newsletter');

//define('TBL_USERTEMP','usertemp');
define('TBL_VIDEOS','video');
define('TBL_COMMENTS','comments');
define('TBL_SUBSCRIBE','sub');
define('TBL_CONTACTUS','contactus');							
define('TBL_SEO','seo');
define('TBL_CONTENTPAGE','contentpages');
define('TBL_LIKEDISLIKE','likes_dislikes');
define('TBL_BANNERS','banners');
define('TBL_CLIENTLIST','clientlist');
define('TBL_TESTIMONIAL','testimonial');
define('TBL_TRANSACTIONDETAILS','testimonial');/**/
define('TBL_TEAMS','teams');
define('TBL_CITIES','cities');
define('TBL_MATCHES','matches');

define('TBL_ORDERS','orders');
define('TBL_PROMOCODE','promocode');
define('TBL_NEWS','news');
define('TBL_NEWSLETTER_SUBSCRIBER','newsletter');
define('TBL_REVIEW','review');
define('TBL_ATTRIBUTES','attributes');
define('TBL_CART_ORDER','cart_order');
define('TBL_CART_TRANSACTIONS','cart_transcation');
define('TBL_COUPON','coupon');
define('TBL_GALLERY','gallery');
define('TBL_ALBUMS','albums');
define('TBL_APPLYFORMS','applyforms');
define('TBL_DIRECTORIES','directories');
define('TBL_BLOGCOMMENTS','blog_comments');
define('TBL_PRODUCTS','products');
define('TBL_PHERMOUSER','phermousers');
define('TBL_ACTIVITYPROCESSING','activityprocessing');
define('TBL_PAYMENT','payment');
define('TBL_NEWSLETTERSSUBSCRIBERS','newslettersubscribers');
/********* END  Table Names *********/

define('ADMINROOT','administrator');




define('LOGIN'					,'index.php');
define('LEFTNAV'				,'leftnav.php');
define('DASHBOARDNEWUSER'		,'dashboardnewuser.php');
define('DASHBOARDEXIST'			,'dashboardexisist.php');

define('SELFVERFICATIONSUCCESS'	,'selfverificationsucess.php');
define('BASICCERTIFICATE'		,'basiccertification.php');
define('COMPLETE_VERIFICATION'	,'completeverification.php');
define('ADDACTIVITY'			,'logonactivity.php');
define('VIEWACTIVITY'			,'viewactivity.php');
define('EDITACTIVITY'			,'editanctivity.php');
define('MANAGEPROFILE'         	,'manageprofile.php');



define('STR_TO_TIME',strtotime(date("Y-m-d H:i:s")));

define('ONLY_DATE',date("m-d-Y"));

define('DATE_TIME',date("m-d-Y H:i:s"));

define('DATE_TIME_FORMAT',date("l dS F Y, H:i:s A", STR_TO_TIME));

define('DATETIMEFORMAT',date("l-dS-F-Y-H-i-s-A", STR_TO_TIME));

define('DBIN','INSERT INTO ');

define('DBUP','UPDATE ');

define('DBWHR',' WHERE ');

define('DBDEL','DELETE ');

define('DBFROM',' FROM ');

define('DBSELECT',' SELECT ');

define('DBSET',' SET ');

define('HEAD_LTN','location:');

define('DB_LMT',' LIMIT ');

define('DB_ORDER',' ORDER BY ');

define('DB_LIKE',' LIKE ');
###################################################################

######### Physical Path Constants 

###################################################################

//define(SITEROOT, 				$_SERVER['DOCUMENT_ROOT']."/beta");

define(SITEURLM					,"http://".$_SERVER['HTTP_HOST']);
define(SITEURL					,SITEURLM."/~rajeshch/safe2meet1");

/*define(LISTINGIMAGESROOT, 		SITEROOT."/images/listings");

define(UPLOADSROOT, 			SITEROOT."/uploads/");

define(USER_IMAGE_ROOT,	        SITEROOT."/images/");

*/

###################################################################

######### Url Constants 

###################################################################

//define(SITEURL, 				"http://".$_SERVER['HTTP_HOST']);





//define(SITEPATH_URL,'http://'.$_SERVER['HTTP_HOST']);

?>