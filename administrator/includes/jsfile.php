<?php
include('../dbconfig.php');
$site_settings_disp=sitesettingsClass::getsitesettings();
include('includes/session.php');

//print_r($_SESSION);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $site_settings_disp->title;?></title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <link href="css/morris/morris.css" rel="stylesheet" type="text/css" />
        <link href="css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <link href="css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" />
        <link href="css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
        
                
        <?php if($_SESSION['roletype']=="1"){?>
		  <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
		<?php } ?>
        <?php if($_SESSION['roletype']=="National"){?>
         <link href="css/nAdminLTE.css" rel="stylesheet" type="text/css" />
        <?php } ?>
        <?php if($_SESSION['roletype']=="State"){?>
         <link href="css/sAdminLTE.css" rel="stylesheet" type="text/css" />
        <?php } ?>
        <?php if($_SESSION['roletype']=="City"){?>
          <link href="css/cAdminLTE.css" rel="stylesheet" type="text/css" />
        <?php } ?>
        
        
      
        
        
        <script src="js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="js/plugins/morris/morris.min.js" type="text/javascript"></script>
        <script src="js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
        <script src="js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
        <script src="js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
        <script src="js/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
        <script src="js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
        <script src="js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <script src="js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>
        <script src="js/AdminLTE/dashboard.js" type="text/javascript"></script>  
		<script src="js/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>   
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <!--<script src="js/AdminLTE/app.js" type="text/javascript"></script>
        <script src="js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>-->
        <!--<script src="css/auto/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>-->
    
        
        
        
        <script type="text/javascript">
            $(function() {
                CKEDITOR.replace('editor1');
                $(".textarea").wysihtml5();
            });
        </script>
        
        
        
    </head>
    <body class="skin-blue">