<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <!-- Title and other stuffs -->
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="S.M. Saidur Rahman">
        <meta name="generator" content="Optimo Solution" />
        <!-- Stylesheets -->
        <?php Yii::app()->bootstrap->register(); ?>
        <!-- Font awesome icon -->
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/style/font-awesome.css"> 
        <!-- jQuery UI -->
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/style/jquery-ui.css"> 
        <!-- Calendar -->
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/style/fullcalendar.css">
        <!-- prettyPhoto -->
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/style/prettyPhoto.css">   
        <!-- Star rating -->
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/style/rateit.css">
        <!-- Date picker -->
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/style/bootstrap-datetimepicker.min.css">
        <!-- CLEditor -->
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/style/jquery.cleditor.css"> 
        <!-- Uniform -->
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/style/uniform.default.css"> 
        <!-- Bootstrap toggle -->
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/style/bootstrap-toggle-buttons.css">
        <!-- Main stylesheet -->
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/style/style.css" rel="stylesheet">
        <!-- Widgets stylesheet -->
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/style/widgets.css" rel="stylesheet">   
        <!-- Responsive style (from Bootstrap) -->
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/style/bootstrap-responsive.css" rel="stylesheet">
        <!-- HTML5 Support for IE -->
        <!--[if lt IE 9]>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/html5shim.js"></script>
        <![endif]-->
        <!-- Favicon -->
        <link rel="shortcut icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/img/favicon/favicon.png">
    </head>
    <body>
        <!-- Main content starts -->
        <div class="content">
            <div class="container-fluid">
                <?php echo $content; ?>                         
            </div>
        </div>
        <!-- Content ends --> 
        <!-- JS -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery-ui-1.9.2.custom.min.js"></script> <!-- jQuery UI -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/fullcalendar.min.js"></script> <!-- Full Google Calendar - Calendar -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.rateit.min.js"></script> <!-- RateIt - Star rating -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.prettyPhoto.js"></script> <!-- prettyPhoto -->
        <!-- jQuery Flot -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/excanvas.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.flot.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.flot.resize.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.flot.pie.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.flot.stack.js"></script>
        <!-- jQuery Notification - Noty -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.noty.js"></script> <!-- jQuery Notify -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/themes/default.js"></script> <!-- jQuery Notify -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/layouts/bottom.js"></script> <!-- jQuery Notify -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/layouts/topRight.js"></script> <!-- jQuery Notify -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/layouts/top.js"></script> <!-- jQuery Notify -->
        <!-- jQuery Notification ends -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/sparklines.js"></script> <!-- Sparklines -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.cleditor.min.js"></script> <!-- CLEditor -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap-datetimepicker.min.js"></script> <!-- Date picker -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.uniform.min.js"></script> <!-- jQuery Uniform -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.toggle.buttons.js"></script> <!-- Bootstrap Toggle -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/filter.js"></script> <!-- Filter for support page -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/custom.js"></script> <!-- Custom codes -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/charts.js"></script> <!-- Custom codes -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.livequery.js"></script>
    </body>
</html>