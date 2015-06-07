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
        <?php /* Yii::app()->bootstrap->register(); */ ?>
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
	/* @var $this SiteController */
	/* @var $model LoginForm */
	/* @var $form CActiveForm  */

	$this->pageTitle=Yii::app()->name . ' - Login';
	/*
		$this->breadcrumbs=array(
		'Login',
	); */
	?>

	<body class="login-layout">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
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
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<div class="padd">
		                                    <?php
		                                    	/*
			                                    $this->widget('bootstrap.widgets.TbAlert', array(
			                                        'block' => true,
			                                        'fade' => true,
			                                        'closeText' => '&times;',
			                                    ));
			                                    */
		                                    ?>
			                                                                    
			                                </div>
											<h4 class="header blue lighter bigger">
												<i class="ace-icon fa fa-coffee green"></i>
												Please Enter Your Information
											</h4>

											<div class="space-6"></div>

											 <?php echo $content; ?>   
											<!-- 
											<div class="social-or-login center">
												<span class="bigger-110">Or Login Using</span>
											</div>

											<div class="space-6"></div>

											<div class="social-login center">
												<a class="btn btn-primary">
													<i class="ace-icon fa fa-facebook"></i>
												</a>

												<a class="btn btn-info">
													<i class="ace-icon fa fa-twitter"></i>
												</a>

												<a class="btn btn-danger">
													<i class="ace-icon fa fa-google-plus"></i>
												</a>
											</div>
										-->
										</div><!-- /.widget-main -->

										<div class="toolbar clearfix">
											<div>
												<a href="#" data-target="#forgot-box" class="forgot-password-link">
													<i class="ace-icon fa fa-arrow-left"></i>
													I forgot my password
												</a>
											</div>

											<div>
												 <i class="ace-icon fa fa-arrow-right user-signup-link"></i>
												<?php echo CHtml::link('I want to Register',array('user/create'), array('class'=>"user-signup-link")); ?>
												
											</div>
										</div>
									</div><!-- /.widget-body -->
								</div><!-- /.login-box -->

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
			jQuery(function($) {
			 $(document).on('click', '.toolbar a[data-target]', function(e) {
				e.preventDefault();
				var target = $(this).data('target');
				$('.widget-box.visible').removeClass('visible');//hide others
				$(target).addClass('visible');//show target
			 });
			});
			
			
			
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
