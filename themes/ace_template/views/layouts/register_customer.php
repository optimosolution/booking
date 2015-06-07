<!DOCTYPE html>
<html lang="en">
	
<!-- Mirrored from responsiweb.com/themes/preview/ace/1.3.1/blank.html by HTTrack Website Copier/3.x [XR&CO'2010], Wed, 08 Oct 2014 05:37:28 GMT -->
<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<!-- Title and other stuffs -->
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="Mohammad Raihanul Hoque Sabuj">
        <meta name="generator" content="R&and;D Informatics" />
        <!-- Stylesheets -->
        <?php //Yii::app()->bootstrap->register(); ?>
        
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/style/style.css" id="main-style" />
        <!-- Form  styles -->
		<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/style/form.css" id="form-style" />
		<!-- bootstrap & fontawesome ##########Using this css as the yiistrap package's bootstrap.css is lower version -->
		<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/style/bootstrap.min.css" />

		<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/fonts/font-awesome/4.1.0/css/font-awesome.min.css" />
 
		<!-- text fonts -->
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />

		<!-- ace styles -->
		<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/style/ace.min.css" id="main-ace-style" />
		

	</head>
	<?php
/* @var $this UserController */
/* @var $model User */
?>

<?php
$this->breadcrumbs=array(
	'Customer'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>

 <body class="login-layout">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="register-container">
							<div class="center">
								<h1>
									<i class="ace-icon fa fa-leaf green"></i>
									<span class="red">Booking</span>
									<span class="white" id="id-text2">Application</span>
								</h1>
								<!--<h4 class="blue" id="id-company-text">&copy; Company Name</h4> -->
							</div>

							<div class="space-6"></div>

							<div class="position-relative">
								 
								<div id="signup-box" class="signup-box widget-box no-border visible">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header green lighter bigger">
												<i class="ace-icon fa fa-users blue"></i>
												Customer Registration
											</h4>

											<div class="space-6"></div>
											<p> Enter your details to begin: </p>

												<?php echo $content; ?>

											</div>

										<div class="toolbar center">
											<i class="ace-icon fa fa-arrow-left back-to-login-link"></i>											
											<?php echo CHtml::link('Back to Login',array('site/login'), array('class'=>"back-to-login-link")); ?>
											  
										</div>
									</div><!-- /.widget-body -->
								</div><!-- /.signup-box -->
							</div><!-- /.position-relative -->
 
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.main-content -->
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<![endif]-->

		<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='assets/js/jquery.min.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='assets/js/jquery1x.min.js'>"+"<"+"/script>");
</script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		
		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			/*
			jQuery(function($) {
			 $(document).on('click', '.toolbar a[data-target]', function(e) {
				e.preventDefault();
				var target = $(this).data('target');
				$('.widget-box.visible').removeClass('visible');//hide others
				$(target).addClass('visible');//show target
			 });
			});
			*/
			
			
			//you don't need this, just used for changing background
			jQuery(function($) {
			 $('#btn-login-dark').on('click', function(e) {
				$('body').attr('class', 'login-layout');
				$('#id-text2').attr('class', 'white');
				$('#id-company-text').attr('class', 'blue');
				
				e.preventDefault();
			 });
			 $('#btn-login-light').on('click', function(e) {
				$('body').attr('class', 'login-layout light-login');
				$('#id-text2').attr('class', 'grey');
				$('#id-company-text').attr('class', 'blue');
				
				e.preventDefault();
			 });
			 $('#btn-login-blur').on('click', function(e) {
				$('body').attr('class', 'login-layout blur-login');
				$('#id-text2').attr('class', 'white');
				$('#id-company-text').attr('class', 'light-blue');
				
				e.preventDefault();
			 });
			 
			});
		</script>
	</body>


<!-- Mirrored from responsiweb.com/themes/preview/ace/1.3.1/blank.html by HTTrack Website Copier/3.x [XR&CO'2010], Wed, 08 Oct 2014 05:37:28 GMT -->
</html>
