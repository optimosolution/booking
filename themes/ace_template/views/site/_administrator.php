<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
$company=Yii::app()->user->company;
//$group_id=Yii::app()->user->group_id;
?>

<div class="page-content-area">

	
<div class="page-header">
			<h1>
				Dashboard
				<small>
					<i class="ace-icon fa fa-angle-double-right"></i>
					Administrator 
				</small>
			</h1>
		</div><!-- /.page-header -->
		
		<div class="row">
			<div class="col-xs-12">
				<!-- PAGE CONTENT BEGINS -->
				<div class="alert alert-block alert-success">
					<button type="button" class="close" data-dismiss="alert">
						<i class="ace-icon fa fa-times"></i>
					</button>

					<i class="ace-icon fa fa-check green"></i>

					Welcome to
					<strong class="green">
						<?php echo CHtml::encode(Yii::app()->name); ?>
						<small>(v 0.1)</small>
					</strong>
				</div>

				 
				<div class="row">
					<div class="col-sm-7">
						<div class="widget-box transparent" id="recent-box">
							<div class="widget-header">
								<h4 class="widget-title lighter smaller">
									<i class="ace-icon fa fa-rss orange"></i>Booking Summary
								</h4>
								<?php
									$today=date('Y-m-d');
									$yesterday= date('Y-m-d',strtotime("-1 days"));;
									$tomorrow= date('Y-m-d',strtotime("+1 days"));;

									
								?>
								<div class="widget-toolbar no-border">
									<ul class="nav nav-tabs" id="recent-tab">
										<li class="active">
											<a data-toggle="tab" href="#yesterday-tab">Yesterday <span class="badge badge-success"><?php  print	$count_valYesterday = Appointment::model()->countByAttributes(array('company_id'=>$company, 'appoint_date'=>$yesterday, 'status'=>1)); ?></span></a>
										</li>

										<li>
											<a data-toggle="tab" href="#today-tab">Today <span class="badge badge-info"><?php  print	$count_valYesterday = Appointment::model()->countByAttributes(array('company_id'=>$company, 'appoint_date'=>$today, 'status'=>1)); ?></span></a>
										</li>

										<li>
											<a data-toggle="tab" href="#tomorrow-tab">Tomorrow <span class="badge badge-important"><?php  print	$count_valYesterday = Appointment::model()->countByAttributes(array('company_id'=>$company, 'appoint_date'=>$tomorrow, 'status'=>1)); ?></span></a>
										</li>
									</ul>
								</div>
							</div>

							<div class="widget-body">
								<div class="widget-main padding-4">
									<div class="tab-content padding-8">
										<div id="yesterday-tab" class="tab-pane active">
											<table class="table table-bordered table-striped">
												<thead class="thin-border-bottom">
													<tr>
														<th>
															<i class="ace-icon fa fa-caret-right blue"></i>Booking
														</th>

														<th>
															<i class="ace-icon fa fa-caret-right blue"></i>Service
														</th>

														
														<th class="hidden-480">
															<i class="ace-icon fa fa-caret-right blue"></i>Time
														</th>
														<th class="hidden-480">
															<i class="ace-icon fa fa-caret-right blue"></i>Payment
														</th>
													</tr>
												</thead>

												<tbody>
												<?php
													
													$arrayY = Yii::app()->db->createCommand()
									                ->select('*')
									                ->from('{{appointment}}')
									                 ->where('company_id='.$company.' AND status=1 AND appoint_date="'.$yesterday.'"')
									                 ->limit(4)
									                 ->order('appoint_time')  
									                ->queryAll();
									                foreach ($arrayY as $key => $valuesY) {  
												?>
													<tr>
														<td><?php echo User::get_user_name($valuesY['customer_id']) ; ?></td>
														<td> <b class="green"><?php echo Service::get_service_name($valuesY['service_id']); ?></b></td>
														<td> <b class="blue"><?php echo $valuesY['appoint_time']; ?></b></td>
														<td class="hidden-480"><span class="label label-success arrowed-right arrowed-in">Locally</span></td>
													</tr>
												<?php } ?>	
													<tr><td colspan="4">
														<?php echo CHtml::link('<i class="icon-plus"></i> view all', array('Appointment/admin', 'date'=>$yesterday), array('class' => 'btn btn-info btn-mini marginTop10px')); ?>
													</td></tr>
												
												</tbody>
											</table>
										</div>

										<div id="today-tab" class="tab-pane">
											<table class="table table-bordered table-striped">
												<thead class="thin-border-bottom">
													<tr>
														<th>
															<i class="ace-icon fa fa-caret-right blue"></i>Booking
														</th>

														<th>
															<i class="ace-icon fa fa-caret-right blue"></i>Service
														</th>

														
														<th class="hidden-480">
															<i class="ace-icon fa fa-caret-right blue"></i>Time
														</th>
														<th class="hidden-480">
															<i class="ace-icon fa fa-caret-right blue"></i>Payment
														</th>
													</tr>
												</thead>

												<tbody>
													<?php
													
													$arrayY = Yii::app()->db->createCommand()
									                ->select('*')
									                ->from('{{appointment}}')
									                 ->where(' company_id='.$company.' AND status=1 AND appoint_date="'.$today.'"')
									                 ->limit(4)
									                 ->order('appoint_time')    
									                ->queryAll();
									                foreach ($arrayY as $key => $valuesY) {  
												?>
													<tr>
														<td><?php echo User::get_user_name($valuesY['customer_id']) ; ?></td>
														<td> <b class="green"><?php echo Service::get_service_name($valuesY['service_id']); ?></b></td>
														<td> <b class="blue"><?php echo $valuesY['appoint_time']; ?></b></td>
														<td class="hidden-480"><span class="label label-success arrowed-right arrowed-in">Locally</span></td>
													</tr>
												<?php } ?>	
													<tr><td colspan="4">
														<?php echo CHtml::link('<i class="icon-plus"></i> view all', array('Appointment/admin', 'date'=>$yesterday), array('class' => 'btn btn-info btn-mini marginTop10px')); ?>
													</td></tr>
												
												</tbody>
											</table>
										</div><!-- /.#member-tab -->

										<div id="tomorrow-tab" class="tab-pane">
											<table class="table table-bordered table-striped">
												<thead class="thin-border-bottom">
													<tr>
														<th>
															<i class="ace-icon fa fa-caret-right blue"></i>Booking
														</th>

														<th>
															<i class="ace-icon fa fa-caret-right blue"></i>Service
														</th>

														
														<th class="hidden-480">
															<i class="ace-icon fa fa-caret-right blue"></i>Time
														</th>
														<th class="hidden-480">
															<i class="ace-icon fa fa-caret-right blue"></i>Payment
														</th>
													</tr>
												</thead>

												<tbody>
													<?php
													
													$arrayY = Yii::app()->db->createCommand()
									                ->select('*')
									                ->from('{{appointment}}')
									                 ->where('company_id='.$company.' AND status=1 AND appoint_date="'.$tomorrow.'"')
									                 ->limit(4)
									                 ->order('appoint_time')  
									                ->queryAll();
									                foreach ($arrayY as $key => $valuesY) {  
												?>
													<tr>
														<td><?php echo User::get_user_name($valuesY['customer_id']) ; ?></td>
														<td> <b class="green"><?php echo Service::get_service_name($valuesY['service_id']); ?></b></td>
														<td> <b class="blue"><?php echo $valuesY['appoint_time']; ?></b></td>
														<td class="hidden-480"><span class="label label-success arrowed-right arrowed-in">Locally</span></td>
													</tr>
												<?php } ?>	
													<tr><td colspan="4">
														<?php echo CHtml::link('<i class="icon-plus"></i> view all', array('Appointment/admin', 'date'=>$yesterday), array('class' => 'btn btn-info btn-mini marginTop10px')); ?>
													</td></tr>
												
												</tbody>
											</table>
										</div>
									</div>
								</div><!-- /.widget-main -->
							</div><!-- /.widget-body -->
						</div><!-- /.widget-box -->
					</div><!-- /.col -->

					<div class="vspace-12-sm"></div>

					<div class="col-sm-5">
						<div class="widget-box">
							<div class="widget-header widget-header-flat widget-header-small">
								<h5 class="widget-title">
									<i class="ace-icon fa fa-signal"></i>
									Booking Report
								</h5>

								<div class="widget-toolbar no-border">
									<div class="inline dropdown-hover">
										<button class="btn btn-minier btn-primary">
											This Week
											<i class="ace-icon fa fa-angle-down icon-on-right bigger-110"></i>
										</button>

										<ul class="dropdown-menu dropdown-menu-right dropdown-125 dropdown-lighter dropdown-close dropdown-caret">
											<li class="active">
												<a href="#" class="blue">
													<i class="ace-icon fa fa-caret-right bigger-110">&nbsp;</i>
													This Week
												</a>
											</li>

											<li>
												<a href="#">
													<i class="ace-icon fa fa-caret-right bigger-110 invisible">&nbsp;</i>
													Last Week
												</a>
											</li>

											<li>
												<a href="#">
													<i class="ace-icon fa fa-caret-right bigger-110 invisible">&nbsp;</i>
													This Month
												</a>
											</li>

											<li>
												<a href="#">
													<i class="ace-icon fa fa-caret-right bigger-110 invisible">&nbsp;</i>
													Last Month
												</a>
											</li>
										</ul>
									</div>
								</div>
							</div>

							<div class="widget-body">
								<div class="widget-main">
									<div id="piechart-placeholder"></div>

									<div class="hr hr8 hr-double"></div>

									<div class="clearfix">
										<div class="grid3">
											<span class="grey">
												Doctors Chambers
											</span>
											<h4 class="bigger">50</h4>
										</div>

										<div class="grid3">
											<span class="grey">
												Store One
											</span>
											<h4 class="bigger">40</h4>
										</div>

										<div class="grid3">
											<span class="grey">
												Store Two
											</span>
											<h4 class="bigger">20</h4>
										</div>
									</div>
								</div><!-- /.widget-main -->
							</div><!-- /.widget-body -->
						</div><!-- /.widget-box -->
					</div><!-- /.col -->
				</div><!-- /.row -->
				<div class="hr hr32 hr-dotted"></div>

				<div class="row">
					<div class="col-sm-12">
						<div class="widget-box transparent">
							<div class="widget-header widget-header-flat">
								<h4 class="widget-title lighter">
									<i class="ace-icon fa fa-signal"></i>
									Sale Stats
								</h4>

								<div class="widget-toolbar">
									<a href="#" data-action="collapse">
										<i class="ace-icon fa fa-chevron-up"></i>
									</a>
								</div>
							</div>

							<div class="widget-body">
								<div class="widget-main padding-4">
									<div id="sales-charts"></div>
								</div><!-- /.widget-main -->
							</div><!-- /.widget-body -->
						</div><!-- /.widget-box -->
					</div><!-- /.col -->
				</div><!-- /.row -->

				<!-- PAGE CONTENT ENDS -->
			</div><!-- /.col -->
		</div><!-- /.row -->

</div><!-- /.page-content-area -->