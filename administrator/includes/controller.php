<?php

if($_GET['option']!="")

$option=$_GET['option'];

else

$option="com_login";

switch($option)

		{
			case "com_dbbackup":
			$disptemp="views/dbbackup.php";
			$left_sitesettings_focus='class="selected"'; 
			break;
			
  
			case "com_login":

			$disptemp="views/login.php";

			break;

			case "com_dashboard":

			$disptemp="views/dashboard.php"; 

			$left_dashboard_focus='class="selected"'; 

			break;

			case "com_sitesettings":

			$disptemp="views/sitesettings.php"; 

			$left_dashboard_focus='class="selected"'; 

			break;


			case "com_logout":

			$disptemp="views/logout.php";

			break;

			

			case "com_adminlist":

			$disptemp="views/adminlist.php"; 

			$left_dashboard_focus='class="selected"'; 

			break;

			

			case "com_adminlist_insert":

			$disptemp="views/adminlist.php"; 

			$left_dashboard_focus='class="selected"'; 

			break;

			

			case "com_contentpage":

			$disptemp="views/contentpage.php"; 

			$left_dashboard_focus='class="selected"'; 

			break;

			case "com_contentpage_insert":

			$disptemp="views/contentpage.php"; 

			$left_dashboard_focus='class="selected"'; 

			break;
			
			
			case "com_regusers":

			$disptemp="views/users.php"; 

			$left_dashboard_focus='class="selected"'; 
			

			break;

			case "com_regusers_insert":

			$disptemp="views/users.php"; 

			$left_dashboard_focus='class="selected"'; 

			break;
			case "com_regusers_view":

			$disptemp="views/users.php"; 

			$left_dashboard_focus='class="selected"'; 
			
			
			case "com_socialmedia":

			$disptemp="views/socialmedia.php"; 

			$left_dashboard_focus='class="selected"'; 
			

			break;
			case "com_socialmedia_view":

			$disptemp="views/socialmedia.php"; 

			$left_dashboard_focus='class="selected"'; 
			


			

			break;
			case "com_cities":
			$disptemp="views/citiesmanagement.php"; 
			$left_teams_focus='class="selected"'; 
			break;
			case "com_cities_insert":
			$disptemp="views/citiesmanagement.php"; 
			$left_teams_focus='class="selected"'; 
			break;
			case "com_cities_view":
			$disptemp="views/citiesmanagement.php"; 
			$left_teams_focus='class="selected"'; 
			break;
			
			
			
			case "com_tutor":

			$disptemp="views/tutor.php"; 

			$left_dashboard_focus='class="selected"'; 
			

			break;

			case "com_tutor_insert":

			$disptemp="views/tutor.php"; 

			$left_dashboard_focus='class="selected"'; 

			break;
			
			case "com_categories":

			$disptemp="views/categories.php"; 

			$left_jobs_focus='class="selected"'; 

			break;

			case "com_categories_insert":

			$disptemp="views/categories.php"; 

			$left_jobs_focus='class="selected"'; 

			break;
			
			
			
			case "com_videos":

			$disptemp="views/videos.php"; 

			$left_jobs_focus='class="selected"'; 

			break;

			

			case "com_videos_insert":

			$disptemp="views/videos.php"; 

			$left_jobs_focus='class="selected"'; 

			break;
			
			
			case "com_rating":
			$disptemp="views/rating.php"; 
			$left_rating_focus='class="selected"'; 
			break;
			case "com_rating_insert":
			$disptemp="views/rating.php"; 
			$left_rating_focus='class="selected"'; 
			break;
			
			
			case "com_sub":

			$disptemp="views/subscribe.php"; 

			$left_subscribe_focus='class="selected"'; 
			
			break;

			case "com_sub_insert":

			$disptemp="views/subscribe.php"; 

			$left_subscribe_focus='class="selected"'; 

			break;
			
			
			case "com_subscribe":
			$disptemp="views/subscribe.php"; 
			$left_sub_focus='class="selected"'; 
			break;
			case "com_subscribe_insert":
			$disptemp="views/subscribe.php"; 
			$left_sub_focus='class="selected"'; 
			break;
			
			
			case "com_contactus":
			$disptemp="views/contactus.php"; 
			$left_jobs_focus='class="selected"'; 
			break;
			case "com_contactus_insert":
			$disptemp="views/contactus.php"; 
			$left_jobs_focus='class="selected"'; 
			break;
			
			
			case "com_paysection":
			$disptemp="views/paysection.php"; 
			$left_jobs_focus='class="selected"'; 
			break;
			case "com_paysection_insert":
			$disptemp="views/paysection.php"; 
			$left_jobs_focus='class="selected"'; 
			break;
			
			
			case "com_invitation":
			$disptemp="views/invitation.php"; 
			$left_jobs_focus='class="selected"'; 
			break;
			case "com_invitation_insert":
			$disptemp="views/invitation.php"; 
			$left_jobs_focus='class="selected"'; 
			break;
			
			
			case "com_testimonial":
			$disptemp="views/testimonial.php"; 
			$left_testimonial_focus='class="selected"'; 
			break;
			case "com_testimonial_insert":
			$disptemp="views/testimonial.php"; 
			$left_testimonial_focus='class="selected"'; 
			break;
			
			
			
			case "com_blog":
			$disptemp="views/blog.php"; 
			$left_testimonial_focus='class="selected"'; 
			break;
			case "com_blog_insert":
			$disptemp="views/blog.php"; 
			$left_testimonial_focus='class="selected"'; 
			break;
			
			
			
			case "com_teams":
			$disptemp="views/teams.php"; 
			$left_teams_focus='class="selected"'; 
			break;
			case "com_teams_insert":
			$disptemp="views/teams.php"; 
			$left_teams_focus='class="selected"'; 
			break;
			case "com_teams_view":
			$disptemp="views/teams.php"; 
			$left_teams_focus='class="selected"'; 
			break;
			
			
			case "com_matches":
			$disptemp="views/matches.php"; 
			$left_matches_focus='class="selected"'; 
			break;
			
			case "com_matches_insert":
			$disptemp="views/matches.php"; 
			$left_matches_focus='class="selected"'; 
			break;
		
			case "com_orders":
			$disptemp="views/orders.php";
			$left_dashboard_focus='class="selected"';
			break;
			case "com_orders_insert":
			$disptemp="views/orders.php";
			$left_dashboard_focus='class="selected"'; 
			break;
			case "com_orders_display":
			$disptemp="views/orderviews.php";
			$left_dashboard_focus='class="selected"';
			break;	
			
			case "com_orders_mail":
			$disptemp="views/orders.php";
			$left_dashboard_focus='class="selected"';
			break;
		
		
			
/*checked*/			
			
			

			case "com_headerbanners":

			$disptemp="views/headerbanners.php"; 

			$left_dashboard_focus='class="selected"'; 

			break;

			case "com_headerbanners_insert":

			$disptemp="views/headerbanners.php"; 

			$left_dashboard_focus='class="selected"'; 

			break;
			case "com_faq":
			$disptemp="views/faq.php"; 
			$left_jobs_focus='class="selected"'; 
			break;
			case "com_faq_insert":
			$disptemp="views/faq.php"; 
			$left_jobs_focus='class="selected"'; 
			break;

			
            
			

			/*case "com_contentpages_insert":



			$disptemp="views/franchisecontentpages.php"; 



			$left_franchisor_focus='class="selected"'; 



			break;

			case "com_contentpages":



			$disptemp="views/franchisecontentpages.php"; 



			$left_franchisor_focus='class="selected"'; 



			break; */

			

			

			case "com_country":



			$disptemp="views/countries_list.php";



			$left_regions_focus='class="selected"'; 



			break;						

			

			case "com_country_insert":



			$disptemp="views/countries_list.php";



			$left_regions_focus='class="selected"'; 



			break;

			

			case "com_state":



			$disptemp="views/states_list.php";



			$left_regions_focus='class="selected"'; 



			break;

						

			case "com_state_insert":



			$disptemp="views/states_list.php";



			$left_regions_focus='class="selected"'; 



			break;

						

			case "com_city":



			$disptemp="views/cities_list.php";



			$left_regions_focus='class="selected"'; 



			break;

						

			case "com_city_insert":



			$disptemp="views/cities_list.php";



			$left_regions_focus='class="selected"'; 



			break;

			

			

			

			/*-------Posts---------*/

			

			case "com_testimonials":

			

			$disptemp="views/testimonials.php";

			

			$left_posts_focus='class="selected"';

			

			break;

			

			case "com_testimonials_insert":

			

			$disptemp="views/testimonials.php";

			

			$left_posts_focus='class="selected"';

			

			break;

			

			

			case "com_email":

			

			$disptemp="views/mail.php";

			

			$left_posts_focus='class="selected"';

			

			break;

			

			case "com_email_insert":

			

			$disptemp="views/mail.php";

			

			$left_posts_focus='class="selected"';

			

			break;

			

			case "com_articles":



			$disptemp="views/articles.php";



			$left_posts_focus='class="selected"';  



			break;

			

			case "com_articles_insert":



			$disptemp="views/articles.php";



			$left_posts_focus='class="selected"';  



			break;

			

			case "com_compevents":



			$disptemp="views/competitions.php";



			$left_competition_focus='class="selected"';  



			break;

			case "com_compevents_insert":



			$disptemp="views/competitions.php";



			$left_competition_focus='class="selected"';  



			break;

			
			

			case "com_faq":



			$disptemp="views/faq.php";



			$left_posts_focus='class="selected"';  



			break;

			

			case "com_faq_insert":



			$disptemp="views/faq.php";



			$left_posts_focus='class="selected"';  



			break;

			

			

			case "com_seo":



			$disptemp="views/seo.php";



			$left_posts_focus='class="selected"';  



			break;

			

			case "com_seo_insert":



			$disptemp="views/seo.php";



			$left_posts_focus='class="selected"';  



			break;

			

			case "com_notificationsend":



			$disptemp="views/notificationsend.php";



			$left_posts_focus='class="selected"';  



			break;

			case "com_notificationsent":



			$disptemp="views/sentnotification.php";



			$left_posts_focus='class="selected"';  



			break;

			

			case "com_notificationemail":



			$disptemp="views/notificationemail.php";



			$left_posts_focus='class="selected"';  



			break;

			

			

			case "com_eventssend":



			$disptemp="views/eventssend.php";



			$left_posts_focus='class="selected"';  



			break;

			case "com_franchisenotification":



			$disptemp="views/franchisenotification.php";



			$left_posts_focus='class="selected"';  



			break;

			case "com_franchiseevents":



			$disptemp="views/franchiseevents.php";



			$left_posts_focus='class="selected"';  



			break;

			case "com_franchisenotification1":



			$disptemp="views/subfranchiseenotification.php";



			$left_posts_focus='class="selected"';  



			break;

			case "com_franchiseevents1":



			$disptemp="views/subfranchiseeevents.php";



			$left_posts_focus='class="selected"';  



			break;

			

			

			/*-------Menu List---------*/
	

			

			

			case "com_subcategory":

			$disptemp="views/subcategories.php"; 

			$left_jobs_focus='class="selected"'; 

			break;

			

			case "com_subcategory_insert":

			$disptemp="views/subcategories.php"; 

			$left_jobs_focus='class="selected"'; 

			break;

			

			case "com_subsubcategory":

			$disptemp="views/subsubcategories.php"; 

			$left_jobs_focus='class="selected"'; 

			break;

			

			case "com_subsubcategory_insert":

			$disptemp="views/subsubcategories.php"; 

			$left_jobs_focus='class="selected"'; 

			break;



			/***/
			case "com_menu":

			$disptemp="views/menu.php"; 

			$left_jobs_focus='class="selected"'; 

			break;

			

			case "com_menu_insert":

			$disptemp="views/menu.php"; 

			$left_jobs_focus='class="selected"'; 

			break;

			

			case "com_submenu":

			$disptemp="views/submenu.php"; 

			$left_jobs_focus='class="selected"'; 

			break;

			

			case "com_submenu_insert":

			$disptemp="views/submenu.php"; 

			$left_jobs_focus='class="selected"'; 

			break;


			/*-------Petgallery---------*/

			

			case "com_petgallery":

			$disptemp="views/petsgallery.php"; 

			$left_jobs_focus='class="selected"'; 

			break;

            case "com_petgallery_insert":

			$disptemp="views/petsgallery.php"; 

			$left_jobs_focus='class="selected"'; 

			break;

			

			case "com_messages":

			$disptemp="views/messages.php"; 

			$left_jobs_focus='class="selected"'; 

			break;

			

			case "com_messages_insert":

			$disptemp="views/messages.php"; 

			$left_jobs_focus='class="selected"'; 

			break;

			/*-------Notification---------*/

			

			case "com_notification":

			$disptemp="views/notification.php"; 

			$left_jobs_focus='class="selected"'; 

			break;

			/*-------Blogs---------*/

			

			case "com_blogpost":

			$disptemp="views/blog.php"; 

			$left_jobs_focus='class="selected"'; 

			break;

			case "com_blogpost_insert":

			$disptemp="views/blog.php"; 

			$left_jobs_focus='class="selected"'; 

			break;

			case "com_blogcomments":

			$disptemp="views/blognew.php"; 

			$left_jobs_focus='class="selected"'; 

			break;

			

			/*-------crowrdcube---------*/

			
			

			

			/*case "com_newsletters":

			$disptemp="views/newsletters.php"; 

			$left_dashboard_focus='class="selected"'; 

			break;
			
			case "com_newsletter_subscribers":

			$disptemp="views/newsletter_subscribers.php"; 

			$left_dashboard_focus='class="selected"'; 

			break;
			case "com_newsletter_subscribers_insert":

			$disptemp="views/newsletter_subscribers.php"; 

			$left_dashboard_focus='class="selected"'; 

			break;
			case "com_newsletter_subscribers_view":

			$disptemp="views/newsletter_subscribers.php"; 

			$left_dashboard_focus='class="selected"'; 

			break;*/
			
				/*Subscribers or newsletters*/
			case "com_newsletters":

			$disptemp="views/newsletters.php"; 

			$left_dashboard_focus='class="selected"'; 

			break;
			
			
			
			case "com_promocode":

			$disptemp="views/promocode.php"; 

			$left_dashboard_focus='class="selected"'; 

			break;
			case "com_promocode_insert":

			$disptemp="views/promocode.php"; 

			$left_dashboard_focus='class="selected"'; 

			break;


			

			/*..........documents.................*/

			case "com_documents":

			$disptemp="views/documents.php"; 

			$left_jobs_focus='class="selected"'; 

			break;

			/*................................... */

			

			case "com_faq_categories":

			$disptemp="views/faq_category.php"; 

			$left_jobs_focus='class="selected"'; 

			break;

			case "com_faq_categories_insert":

			$disptemp="views/faq_category.php"; 

			$left_jobs_focus='class="selected"'; 

			break;

			case "com_changepwd":

			$disptemp="views/changepwd.php"; 

			$left_jobs_focus='class="selected"'; 

			break;

			

			

			

			/*---------------News---------------*/

			case "com_news":

			$disptemp="views/news.php"; 

			$left_news_focus='class="selected"'; 

			break;

			case "com_news_insert":

			$disptemp="views/news.php"; 

			$left_news_focus='class="selected"'; 

			break;

			

			/*---------------chairty--------------*/

			case "com_charity":

			$disptemp="views/charity.php"; 

			$left_jobs_focus='class="selected"'; 

			break;

			case "com_charity_insert":

			$disptemp="views/charity.php"; 

			$left_jobs_focus='class="selected"'; 

			break;

			case "com_messages":

			$disptemp="views/messages.php"; 

			$left_jobs_focus='class="selected"'; 

			break;

			case "com_messages_insert":

			$disptemp="views/messages.php"; 

			$left_jobs_focus='class="selected"'; 

			break;

			

			/*---------------Pledgeamount--------------*/

			case "com_pledgeamount":

			$disptemp="views/pledgeamount.php"; 

			$left_jobs_focus='class="selected"'; 

			break;

			

			

			/*---------------waste--------------*/

			case "com_faq_insert_test":

			$disptemp="views/faq1.php"; 

			$left_jobs_focus='class="selected"'; 

			break;	

			case "com_faq_insert_tes":

			$disptemp="views/faq1.php"; 

			$left_jobs_focus='class="selected"'; 

			break;	

			case "com_popuppdf":

			$disptemp="views/popuppdf.php"; 

			$left_jobs_focus='class="selected"'; 

			break;

			case "com_auto_test":

			$disptemp="views/auto.php"; 

			$left_jobs_focus='class="selected"'; 

			break;
			
			
			
			
			case "com_clientlist":

			$disptemp="views/clientlist.php"; 

			$left_jobs_focus='class="selected"'; 

			break;

			case "com_clientlist_insert":

			$disptemp="views/clientlist.php"; 

			$left_jobs_focus='class="selected"'; 

			break;
			case "com_products":

			$disptemp="views/products.php"; 

			$left_jobs_focus='class="selected"'; 

			break;

			case "com_products_insert":

			$disptemp="views/products.php"; 

			$left_jobs_focus='class="selected"'; 

			break;
			case "com_category":

			$disptemp="views/category.php"; 

			$left_jobs_focus='class="selected"'; 

			break;

			case "com_category_insert":

			$disptemp="views/category.php"; 

			$left_jobs_focus='class="selected"'; 

			break;
			
			case "com_phermouser":

			$disptemp="views/phermousers.php"; 

			$left_dashboard_focus='class="selected"'; 
			

			break;

			case "com_phermouser_insert":

			$disptemp="views/phermousers.php"; 

			$left_dashboard_focus='class="selected"'; 

			break;
			case "com_phermouser_view":

			$disptemp="views/phermousers.php"; 

			$left_dashboard_focus='class="selected"'; 

			case "com_subcategory":
			
			$disptemp="views/subcategory.php"; 
			
			$left_dashboard_focus='class="selected"'; 
			
			
			break;
			
			case "com_subcategory_insert":
			
			$disptemp="views/subcategory.php"; 
			
			$left_dashboard_focus='class="selected"'; 
			break;
			


/*********************** calling for new changes done on dashboard *********************************/

			case "com_reguserss":
			
			$disptemp="views/dashboard.php"; 
			
			$left_dashboard_focus='class="selected"'; 
			
			
			break;
			
			case "com_reguserss_insert":
			
			$disptemp="views/dashboard.php"; 
			
			$left_dashboard_focus='class="selected"'; 
			break;
			
			case "com_reguserss_view":
			
			$disptemp="views/dashboard.php"; 
			
			$left_dashboard_focus='class="selected"'; 
			break;
			
			
						
			case "com_newsletters_subscribers":

			$disptemp="views/dashboard.php"; 

			$left_dashboard_focus='class="selected"'; 

			break;
			case "com_newsletters_subscribers_insert":

			$disptemp="views/dashboard.php"; 

			$left_dashboard_focus='class="selected"'; 

			break;
			case "com_newsletters_subscribers_view":

			$disptemp="views/newsletter_subscribers.php"; 

			$left_dashboard_focus='class="selected"'; 

			break;

			
			
/********************* calling for new changes done on dashboard **************************************/			
			
			
			case "com_userrequestdata":
			
			$disptemp="views/userrequestdata.php"; 
			
			$left_dashboard_focus='class="selected"'; 
			
			
			break;
			
			
			case "com_userrequestdata_insert":
			
			$disptemp="views/userrequestdata.php"; 
			
			$left_dashboard_focus='class="selected"'; 
			break;
			
			case "com_userrequestdata_view":
			
			$disptemp="views/userrequestdata.php"; 
			
			$left_dashboard_focus='class="selected"'; 
			break;
			
			
			case "com_activityprocess":
			
			$disptemp="views/activityprocessing.php"; 
			
			$left_dashboard_focus='class="selected"'; 
			
			
			break;
			
			case "com_activityprocess_insert":
			
			$disptemp="views/activityprocessing.php"; 
			
			$left_dashboard_focus='class="selected"'; 
			break;
			
			case "com_activityprocess_view":
			
			$disptemp="views/activityprocessing.php"; 
			
			$left_dashboard_focus='class="selected"'; 
			break;



		}		

?>