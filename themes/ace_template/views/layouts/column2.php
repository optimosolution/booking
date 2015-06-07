<?php
$this->beginContent('//layouts/main');
//$status = new Status;
$user_id=Yii::app()->user->id;
$company_id=Yii::app()->user->company;
$shop_id=Yii::app()->user->shop_id;
$group_id=Yii::app()->user->group_id;
?>
<div id="navbar" class="navbar navbar-default">
			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>

			<div class="navbar-container" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="#" class="navbar-brand">
						<small>
							<i class="fa fa-leaf"></i>
							Booking Application
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<!--<li class="grey">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-tasks"></i>
								<span class="badge badge-grey">4</span>
							</a>

							<ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-check"></i>
									4 Demo Task  Notification
								</li>

								<li>
									<a href="#">
										<div class="clearfix">
											<span class="pull-left">Demo Update</span>
											<span class="pull-right">65%</span>
										</div>

										<div class="progress progress-mini">
											<div style="width:65%" class="progress-bar"></div>
										</div>
									</a>
								</li>

								<li>
									<a href="#">
										<div class="clearfix">
											<span class="pull-left">Hardware Upgrade</span>
											<span class="pull-right">35%</span>
										</div>

										<div class="progress progress-mini">
											<div style="width:35%" class="progress-bar progress-bar-danger"></div>
										</div>
									</a>
								</li>

								<li>
									<a href="#">
										<div class="clearfix">
											<span class="pull-left">Unit Testing</span>
											<span class="pull-right">15%</span>
										</div>

										<div class="progress progress-mini">
											<div style="width:15%" class="progress-bar progress-bar-warning"></div>
										</div>
									</a>
								</li>

								<li>
									<a href="#">
										<div class="clearfix">
											<span class="pull-left">Bug Fixes</span>
											<span class="pull-right">90%</span>
										</div>

										<div class="progress progress-mini progress-striped active">
											<div style="width:90%" class="progress-bar progress-bar-success"></div>
										</div>
									</a>
								</li>

								<li class="dropdown-footer">
									<a href="#">
										See tasks with details
										<i class="ace-icon fa fa-arrow-right"></i>
									</a>
								</li>
							</ul> 
						</li>-->
						<!--
						<li class="purple">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-bell icon-animated-bell"></i>
								<span class="badge badge-important">4</span>
							</a>

							<ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-exclamation-triangle"></i>
									4 Notifications
								</li>

								<li>
									<a href="#">
										<div class="clearfix">
											<span class="pull-left">
												<i class="btn btn-xs no-hover btn-pink fa fa-comment"></i>
												New Comments
											</span>
											<span class="pull-right badge badge-info">+12</span>
										</div>
									</a>
								</li>

								<li>
									<a href="#">
										<i class="btn btn-xs btn-primary fa fa-user"></i>
										Bob just signed up as an Admin
									</a>
								</li>

								<li>
									<a href="#">
										<div class="clearfix">
											<span class="pull-left">
												<i class="btn btn-xs no-hover btn-success fa fa-shopping-cart"></i>
												New Appointments
											</span>
											<span class="pull-right badge badge-success">5</span>
										</div>
									</a>
								</li>

								 

								<li class="dropdown-footer">
									<a href="#">
										See all notifications
										<i class="ace-icon fa fa-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>

						<li class="green">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-envelope icon-animated-vertical"></i>
								<span class="badge badge-success">5</span>
							</a>
							<!--
							<ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-envelope-o"></i>
									5 Messages
								</li>

								<li class="dropdown-content">
									<ul class="dropdown-menu dropdown-navbar">
										<li>
											<a href="#">
												<img src="<?php echo Yii::app()->theme->baseUrl; ?>/avatars/avatar.png" class="msg-photo" alt="Alex's Avatar" />
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">Alex:</span>
														Ciao sociis natoque penatibus et auctor ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>a moment ago</span>
													</span>
												</span>
											</a>
										</li>

										<li>
											<a href="#">
												<img src="<?php echo Yii::app()->theme->baseUrl; ?>/avatars/avatar3.png" class="msg-photo" alt="Susan's Avatar" />
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">Susan:</span>
														Vestibulum id ligula porta felis euismod ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>20 minutes ago</span>
													</span>
												</span>
											</a>
										</li>

										<li>
											<a href="#">
												<img src="<?php echo Yii::app()->theme->baseUrl; ?>/avatars/avatar4.png" class="msg-photo" alt="Bob's Avatar" />
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">Bob:</span>
														Nullam quis risus eget urna mollis ornare ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>3:15 pm</span>
													</span>
												</span>
											</a>
										</li>

										<li>
											<a href="#">
												<img src="<?php echo Yii::app()->theme->baseUrl; ?>/avatars/avatar2.png" class="msg-photo" alt="Kate's Avatar" />
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">Kate:</span>
														Ciao sociis natoque eget urna mollis ornare ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>1:33 pm</span>
													</span>
												</span>
											</a>
										</li>

										<li>
											<a href="#">
												<img src="<?php echo Yii::app()->theme->baseUrl; ?>/avatars/avatar5.png" class="msg-photo" alt="Fred's Avatar" />
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">Fred:</span>
														Vestibulum id penatibus et auctor  ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>10:09 am</span>
													</span>
												</span>
											</a>
										</li>
									</ul>
								</li>

								<li class="dropdown-footer">
									<a href="inbox.html">
										See all messages
										<i class="ace-icon fa fa-arrow-right"></i>
									</a>
								</li>
							</ul>
						 
						</li>
						-->
						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="<?php echo Yii::app()->theme->baseUrl; ?>/avatars/user.jpg" alt="Jason's Photo" />
								<span class="user-info"><?php echo $this->getFullname(); ?></span>
								<i class="ace-icon fa fa-caret-down"></i>
							</a>
							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
 									<?php echo CHtml::link('<i class="ace-icon fa fa-user"></i> <span>' . Yii::t('Common', 'profile') . '</span>', array('/user/view', 'id' => Yii::app()->user->id)); ?>
 								</li>
								<li>
									<?php echo CHtml::link('<i class="ace-icon fa fa-cog"></i><span>' . Yii::t('Settings', 'edit_profile') . '</span>', array('/user/update', 'id' => Yii::app()->user->id)); ?>
 								</li>

 								<li>
									<?php echo CHtml::link('<i class="ace-icon fa fa-cog"></i><span>' . Yii::t('Settings', 'change_password') . '</span>', array('/user/changePassword', 'id' => Yii::app()->user->id)); ?>
 								</li>
 								<li class="divider"></li>
								<li>
									<?php echo CHtml::link('<i class="ace-icon fa fa-power-off"> </i> <span>' . Yii::t('Common', 'logout') . '</span>', array('/site/logout')); ?>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>

		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar                  responsive">
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
				</script>

				<div dclass="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<button class="btn btn-success">
							<i class="ace-icon fa fa-signal"></i>
						</button>

						<button class="btn btn-info">
							<i class="ace-icon fa fa-pencil"></i>
						</button>

						<button class="btn btn-warning">
							<i class="ace-icon fa fa-users"></i>
						</button>

						<button class="btn btn-danger">
							<i class="ace-icon fa fa-cogs"></i>
						</button>
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div><!-- /.sidebar-shortcuts -->

				<ul class="nav nav-list">
					<li class="">
						
						<?php echo CHtml::link('<i class="menu-icon fa fa-tachometer"> </i> <span class="menu-text" >' . Yii::t('Common', 'Dashboard') . '</span>', array('/site/index')); ?>
						<b class="arrow"></b>
					</li>
 					<?php 
 						if ($group_id=='1'){ // We / Software Owners

 					?>
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-users"></i>
							<span class="menu-text"> Users </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<?php echo CHtml::link('<i class="menu-icon fa fa-caret-right"> </i> <span class="menu-text" >' . Yii::t('Common', 'User Groups') . '</span>', array('/userGroup/admin')); ?>
								<b class="arrow"></b>
							</li>							 
							<li class="">
								<?php echo CHtml::link('<i class="menu-icon fa fa-caret-right"> </i> <span class="menu-text" >' . Yii::t('Common', 'Users') . '</span>', array('/user/admin')); ?>
								<b class="arrow"></b>
							</li>
							<li class="">
								<?php echo CHtml::link('<i class="menu-icon fa fa-caret-right"> </i> <span class="menu-text" >' . Yii::t('Common', 'New User') . '</span>', array('/user/create')); ?>
								<b class="arrow"></b>
							</li>
						</ul>
					</li>
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-list"></i>
							<span class="menu-text"> Companies &amp; Stores </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<?php echo CHtml::link('<i class="menu-icon fa fa-caret-right"> </i> <span class="menu-text" >' . Yii::t('Common', 'Company List') . '</span>', array('/company/admin')); ?>

								<b class="arrow"></b>
							</li>
							 <li class="">
								<?php echo CHtml::link('<i class="menu-icon fa fa-caret-right"> </i> <span class="menu-text" >' . Yii::t('Common', 'Shop/Store List') . '</span>', array('/shop/admin')); ?>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>

					<dli class="">
						<a href="#" class="dropdown-toggle" style="color:#CCC;">
							<i class="menu-icon fa fa-cogs"></i>
							<span class="menu-text"> Settings </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="form-elements.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Packages
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="form-elements.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Paypal Setting
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="form-wizard.html">
									<i class="menu-icon fa fa-caret-right"></i>
									status
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="wysiwyg.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Companies
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="dropzone.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Transaction_Type
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="dropzone.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Currencies
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="dropzone.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Country_Management
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="dropzone.html">
									<i class="menu-icon fa fa-caret-right"></i>
									State_Management
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="dropzone.html">
									<i class="menu-icon fa fa-caret-right"></i>
									City_Management
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>
					<li class="">
						<a href="#" class="dropdown-toggle"  style="color:#CCC;">
							<i class="menu-icon fa fa-tag"></i>
							<span class="menu-text"> Payment</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="profile.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Tax_Rates
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="inbox.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Payment Response
								</a>

								<b class="arrow"></b>
							</li>
 						</ul>
					</li>

					<li class="" style="color:#CCC;">
						<?php echo CHtml::link('<i class="menu-icon fa fa-envelope"> </i> <span class="menu-text" >' . Yii::t('Common', 'message') . '</span>', array('messageSupperAdmin/create')); ?>
						<b class="arrow"></b>
					</li>
					<?php 
 						}

 						if ($group_id=='2'){ //Company Owner

 					?>	
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-users"></i>
							<span class="menu-text"> Employee/Staff </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<?php echo CHtml::link('<i class="menu-icon fa fa-caret-right"> </i> <span class="menu-text" >' . Yii::t('Common', 'Staff/Employee') . '</span>', array('staff/admin')); ?>
								<b class="arrow"></b>
							</li>
							
							<li class="">
								<?php echo CHtml::link('<i class="menu-icon fa fa-caret-right"> </i> <span class="menu-text" >' . Yii::t('Common', 'Create Store Owner') . '</span>', array('/staff/sownerCreate')); ?>
								<b class="arrow"></b>
							</li>
							<li class="">
								<?php echo CHtml::link('<i class="menu-icon fa fa-caret-right"> </i> <span class="menu-text" >' . Yii::t('Common', 'Create Staff') . '</span>', array('/staff/create')); ?>
								<b class="arrow"></b>
							</li>
						</ul>
					</li>
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-users"></i>
							<span class="menu-text"> Customers </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<?php /*
							<li class="">
								<?php echo CHtml::link('<i class="menu-icon fa fa-caret-right"> </i> <span class="menu-text" >' . Yii::t('Common', 'Filter Customers') . '</span>', array('appointment/customerFilter')); ?>
								<b class="arrow"></b>
							</li>
							*/ ?>
							<li class="">
								<?php echo CHtml::link('<i class="menu-icon fa fa-caret-right"> </i> <span class="menu-text" >' . Yii::t('Common', 'Customers/Registered Members') . '</span>', array('Customer/admin')); ?>
								<b class="arrow"></b>
							</li>
							<?php /*<li class="">
								<?php echo CHtml::link('<i class="menu-icon fa fa-caret-right"> </i> <span class="menu-text" >' . Yii::t('Common', 'Top Paid Customers') . '</span>', array('Customer/topPaid')); ?>
								<b class="arrow"></b>
							</li>
							*/ ?>
							<li class="">
								<?php echo CHtml::link('<i class="menu-icon fa fa-caret-right"> </i> <span class="menu-text" >' . Yii::t('Common', 'New Customer') . '</span>', array('/Customer/create')); ?>
								<b class="arrow"></b>
							</li>
							 
						</ul>
					</li>
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-list"></i>
							<span class="menu-text"> Company &amp; Stores </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<?php echo CHtml::link('<i class="menu-icon fa fa-caret-right"> </i> <span class="menu-text" >' . Yii::t('Common', 'Update Company') . '</span>', array('/company/update&id='.$company_id)); ?>

								<b class="arrow"></b>
							</li>
							 <li class="">
								<?php echo CHtml::link('<i class="menu-icon fa fa-caret-right"> </i> <span class="menu-text" >' . Yii::t('Common', 'Shop/Store List') . '</span>', array('/shop/admin')); ?>

								<b class="arrow"></b>
							</li>
							<li class="">
								<?php echo CHtml::link('<i class="menu-icon fa fa-caret-right"> </i> <span class="menu-text" >' . Yii::t('Common', 'New Store') . '</span>', array('/shop/create')); ?>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-tasks"></i>
							<span class="menu-text"> Services Settings </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<?php echo CHtml::link('<i class="menu-icon fa fa-caret-right"> </i> <span class="menu-text" >' . Yii::t('Common', 'Service Categories') . '</span>', array('serviceCategory/admin')); ?>

								<b class="arrow"></b>
							</li>

							 <li class="">
								<?php echo CHtml::link('<i class="menu-icon fa fa-caret-right"> </i> <span class="menu-text" >' . Yii::t('Common', 'Services') . '</span>', array('service/admin')); ?>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-tasks"></i>
							<span class="menu-text"> Appointments</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<?php echo CHtml::link('<i class="menu-icon fa fa-caret-right"> </i> <span class="menu-text" >' . Yii::t('Common', 'Check Appointments') . '</span>', array('appointment/calender')); ?>

								<b class="arrow"></b>
							</li>
 							<li class="">
								<?php echo CHtml::link('<i class="menu-icon fa fa-caret-right"> </i> <span class="menu-text" >' . Yii::t('Common', 'Manage Appointments') . '</span>', array('appointment/admin')); ?>

								<b class="arrow"></b>
							</li>
							 <li class="">
								<?php echo CHtml::link('<i class="menu-icon fa fa-caret-right"> </i> <span class="menu-text" >' . Yii::t('Common', 'New appointment') . '</span>', array('appointment/create')); ?>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>
					<li class="">
						<?php echo CHtml::link('<i class="menu-icon fa fa-calendar"> </i> <span class="menu-text" >' . Yii::t('Common', 'Calendar') . '</span>', array('appointment/calender')); ?>
						<b class="arrow"></b>
					</li>
					<li class="">
						<a href="#" class="dropdown-toggle"  style="color:#CCC;">
							<i class="menu-icon fa fa-tag"></i>
							<span class="menu-text"> Payment</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="form-elements.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Paypal Setting
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="profile.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Tax_Rates
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="inbox.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Payment Response
								</a>

								<b class="arrow"></b>
							</li>
 						</ul>
					</li>

				 
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-tasks"></i>
							<span class="menu-text"> Message</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<?php echo CHtml::link('<i class="menu-icon fa fa-caret-right"> </i> <span class="menu-text" >' . Yii::t('Common', 'Check Messages') . '</span>', array('mailCustomer/admin')); ?>

								<b class="arrow"></b>
							</li>
 							<li class="">
								<?php echo CHtml::link('<i class="menu-icon fa fa-caret-right"> </i> <span class="menu-text" >' . Yii::t('Common', 'Manage Appointments') . '</span>', array('mailCustomer/admin')); ?>

								<b class="arrow"></b>
							</li>
							 <li class="">
								<?php echo CHtml::link('<i class="menu-icon fa fa-caret-right"> </i> <span class="menu-text" >' . Yii::t('Common', 'New appointment') . '</span>', array('mailCustomer/create')); ?>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>
					<?php
						}

						 if ($group_id=='6'){ // Store owner

 					?>	
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-users"></i>
							<span class="menu-text"> Employee/Staff </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<?php echo CHtml::link('<i class="menu-icon fa fa-caret-right"> </i> <span class="menu-text" >' . Yii::t('Common', 'Staff/Employee') . '</span>', array('staff/admin', 'group_id'=>'7' )); ?>
								<b class="arrow"></b>
							</li>
							<li class="">
								<?php echo CHtml::link('<i class="menu-icon fa fa-caret-right"> </i> <span class="menu-text" >' . Yii::t('Common', 'Assign Service') . '</span>', array('/staff/assignService')); ?>
								<b class="arrow"></b>
							</li>
							<li class="">
								<?php echo CHtml::link('<i class="menu-icon fa fa-caret-right"> </i> <span class="menu-text" >' . Yii::t('Common', 'New Staff') . '</span>', array('/staff/create' ,'shop_id'=>$shop_id)); ?>
								<b class="arrow"></b>
							</li>
						</ul>
					</li>
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-users"></i>
							<span class="menu-text"> Customers </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<?php echo CHtml::link('<i class="menu-icon fa fa-caret-right"> </i> <span class="menu-text" >' . Yii::t('Common', 'Filter Customers') . '</span>', array('appointment/customerFilter')); ?>
								<b class="arrow"></b>
							</li>
							<li class="">
								<?php echo CHtml::link('<i class="menu-icon fa fa-caret-right"> </i> <span class="menu-text" >' . Yii::t('Common', 'Customers/Registered Members') . '</span>', array('Customer/adminsw')); ?>
								<b class="arrow"></b>
							</li>
							<li class="">
								<?php echo CHtml::link('<i class="menu-icon fa fa-caret-right"> </i> <span class="menu-text" >' . Yii::t('Common', 'Top Paid Customers') . '</span>', array('Customer/topPaid')); ?>
								<b class="arrow"></b>
							</li>
							<li class="">
								<?php echo CHtml::link('<i class="menu-icon fa fa-caret-right"> </i> <span class="menu-text" >' . Yii::t('Common', 'New Customer') . '</span>', array('/Customer/create')); ?>
								<b class="arrow"></b>
							</li>
							<li class="">
								<?php echo CHtml::link('<i class="menu-icon fa fa-caret-right"> </i> <span class="menu-text" >' . Yii::t('Common', 'External link for New Customer') . '</span>', array('/Customer/regCustomer', 'company'=>Yii::app()->user->company, 'shop_id'=>Yii::app()->user->shop_id), array('target'=>'_blank')); ?>
								<b class="arrow"></b>
							</li>
						</ul>
					</li>
					
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-tasks"></i>
							<span class="menu-text"> Services Settings </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<?php echo CHtml::link('<i class="menu-icon fa fa-caret-right"> </i> <span class="menu-text" >' . Yii::t('Common', 'Service Categories') . '</span>', array('serviceCategory/admin','shop_id'=>$shop_id)); ?>

								<b class="arrow"></b>
							</li>

							 <li class="">
								<?php echo CHtml::link('<i class="menu-icon fa fa-caret-right"> </i> <span class="menu-text" >' . Yii::t('Common', 'Services') . '</span>', array('service/admin','shop_id'=>$shop_id)); ?>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-tasks"></i>
							<span class="menu-text"> Appointments</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							 
 							<li class="">
								<?php echo CHtml::link('<i class="menu-icon fa fa-caret-right"> </i> <span class="menu-text" >' . Yii::t('Common', 'Manage Appointments') . '</span>', array('appointment/admin')); ?>

								<b class="arrow"></b>
							</li>
							 <li class="">
								<?php echo CHtml::link('<i class="menu-icon fa fa-caret-right"> </i> <span class="menu-text" >' . Yii::t('Common', 'New appointment') . '</span>', array('appointment/create')); ?>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>
					<!--
					<li class="">
						<?php //echo CHtml::link('<i class="menu-icon fa fa-calendar"> </i> <span class="menu-text" >' . Yii::t('Common', 'Calendar') . '</span>', array('appointment/calender')); ?>
						<b class="arrow"></b>
					</li>
				-->
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-tasks"></i>
							<span class="menu-text"> Message</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<?php echo CHtml::link('<i class="menu-icon fa fa-caret-right"> </i> <span class="menu-text" >' . Yii::t('Common', 'Check Messages') . '</span>', array('mailCustomer/adminSowner')); ?>

								<b class="arrow"></b>
							</li>
 							<li class="">
								<?php echo CHtml::link('<i class="menu-icon fa fa-caret-right"> </i> <span class="menu-text" >' . Yii::t('Common', 'Message to Selected Customers') . '</span>', array('mailAdmin/create')); ?>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-list"></i>
							<span class="menu-text">Store Detail</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<?php echo CHtml::link('<i class="menu-icon fa fa-caret-right"> </i> <span class="menu-text" >' . Yii::t('Common', 'View Detail') . '</span>', array('/shop/view','id'=>$shop_id )); ?>

								<b class="arrow"></b>
							</li>
							<li class="">
								<?php echo CHtml::link('<i class="menu-icon fa fa-caret-right"> </i> <span class="menu-text" >' . Yii::t('Common', 'Update Store/Shop') . '</span>', array('/shop/update','id'=>$shop_id)); ?>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>
					<?php
						}
						if ($group_id=='7'){ //Generel Employee

 					?>	
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-tasks"></i>
							<span class="menu-text"> Services Settings </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<?php echo CHtml::link('<i class="menu-icon fa fa-caret-right"> </i> <span class="menu-text" >' . Yii::t('Common', 'Service Categories') . '</span>', array('serviceCategory/admin')); ?>

								<b class="arrow"></b>
							</li>

							 <li class="">
								<?php echo CHtml::link('<i class="menu-icon fa fa-caret-right"> </i> <span class="menu-text" >' . Yii::t('Common', 'Services') . '</span>', array('service/admin')); ?>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-tasks"></i>
							<span class="menu-text"> Appointments</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<?php echo CHtml::link('<i class="menu-icon fa fa-caret-right"> </i> <span class="menu-text" >' . Yii::t('Common', 'Check Appointments') . '</span>', array('appointment/calender')); ?>

								<b class="arrow"></b>
							</li>
 							<li class="">
								<?php echo CHtml::link('<i class="menu-icon fa fa-caret-right"> </i> <span class="menu-text" >' . Yii::t('Common', 'Manage Appointments') . '</span>', array('appointment/admin')); ?>

								<b class="arrow"></b>
							</li>
							 <li class="">
								<?php echo CHtml::link('<i class="menu-icon fa fa-caret-right"> </i> <span class="menu-text" >' . Yii::t('Common', 'New appointment') . '</span>', array('appointment/create')); ?>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>
					<li class="">
						<?php echo CHtml::link('<i class="menu-icon fa fa-calendar"> </i> <span class="menu-text" >' . Yii::t('Common', 'Calendar') . '</span>', array('appointment/calender')); ?>
						<b class="arrow"></b>
					</li>

					<li class="" style="color:#EEE;">
						<?php echo CHtml::link('<i class="menu-icon fa fa-envelope"> </i> <span class="menu-text" >' . Yii::t('Common', 'message') . '</span>', array('messageEmployee/create')); ?>
						<b class="arrow"></b>
					</li>

 					<?php } 
 						if ($group_id=='8'){ // Customer

 					?>	
					 
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-tasks"></i>
							<span class="menu-text"> Appointments</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							 

							 <li class="">
								<?php echo CHtml::link('<i class="menu-icon fa fa-caret-right"> </i> <span class="menu-text" >' . Yii::t('Common', 'Create appointment') . '</span>', array('appointment/create')); ?>

								<b class="arrow"></b>
							</li>
							<li class="">
								<?php echo CHtml::link('<i class="menu-icon fa fa-caret-right"> </i> <span class="menu-text" >' . Yii::t('Common', 'Your Appointments') . '</span>', array('appointment/adminCustomer')); ?>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>
					<?php /*
					<li class="">
						<?php echo CHtml::link('<i class="menu-icon fa fa-calendar"> </i> <span class="menu-text" >' . Yii::t('Common', 'Calendar') . '</span>', array('appointment/calender')); ?>
						<b class="arrow"></b>
					</li> http://localhost/booking_new/booking_yii/without_yiistrap_processing/index.php?r=mailCustomer/admin
					*/ ?>
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-tasks"></i>
							<span class="menu-text"> Message</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="" style="color:#EEE;">
								<?php echo CHtml::link('<i class="menu-icon fa fa-envelope"> </i> <span class="menu-text" >' . Yii::t('Common', 'New Message') . '</span>', array('mailCustomer/create')); ?>
								<b class="arrow"></b>
							</li>
							 
 							<li class="">
								<?php echo CHtml::link('<i class="menu-icon fa fa-caret-right"> </i> <span class="menu-text" >' . Yii::t('Common', 'Your Messages') . '</span>', array('mailCustomer/adminCustomer')); ?>

								<b class="arrow"></b>
							</li>
							 
						</ul>
					</li>
					

 					<?php } ?>
 		
					<!--
					<li class=" open">
						<a href="#" class="dropdown-toggle"  style="color:#CCC;">
							<i class="menu-icon fa fa-file-o"></i>

							<span class="menu-text">
								Other Pages

								<span class="badge badge-primary">5</span>
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="faq.html">
									<i class="menu-icon fa fa-caret-right"></i>
									FAQ
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="error-404.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Error 404
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="error-500.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Error 500
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="grid.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Grid
								</a>

								<b class="arrow"></b>
							</li>

							<li class="active">
								<a href="blank.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Blank Page
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>
					-->
				</ul><!-- /.nav-list -->

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>

				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
				</script>
			</div>

			<div class="main-content">
 				<div class="breadcrumbs" id="breadcrumbs">
					<?php /* if (isset($this->breadcrumbs)): ?>
			            <?php
			            $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
			                'links' => $this->breadcrumbs,
			                'separator' => '',
			                    //'separator' => '/',
			                    //'separator' => '&DoubleRightArrow;',
			            ));
			            ?>
			        <?php endif */ ?>
			        <div class="breadcrumb">
				        <?php if(isset($this->breadcrumbs)):?>
				        <i class="ace-icon fa fa-home home-icon"></i>
						<?php $this->widget('zii.widgets.CBreadcrumbs', array(
							'links'=>$this->breadcrumbs,
						)); ?><!-- breadcrumbs -->
						<?php endif?>

						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>
					</div><!-- /.breadcrumb -->
					


					<div class="nav-search" id="nav-search">
						<form class="form-search">
							<span class="input-icon">
								<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
								<i class="ace-icon fa fa-search nav-search-icon"></i>
							</span>
						</form>
					</div><!-- /.nav-search -->
				</div>
				<div class="page-content">
					 
					<div class="page-content-area">
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<?php echo $content; ?>	
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content-area -->
				</div><!-- /.page-content -->
			</div><!-- /.main-content -->
			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder"></span>
							Application &copy; 2014-2015
						</span>

						&nbsp; &nbsp;
						<span class="action-buttons">
							<a href="#">
								<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-rss-square orange bigger-150"></i>
							</a>
						</span>
					</div>
				</div>
			</div>
			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->
  <?php $this->endContent(); ?>
