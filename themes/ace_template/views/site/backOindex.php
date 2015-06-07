<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<div class="page-content-area">
		<?php
			if ((Yii::app()->user->user_type)==2) {
		?>

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

								<div class="widget-toolbar no-border">
									<ul class="nav nav-tabs" id="recent-tab">
										<li class="active">
											<a data-toggle="tab" href="#yesterday-tab">Yesterday <span class="badge badge-success">15</span></a>
										</li>

										<li>
											<a data-toggle="tab" href="#today-tab">Today <span class="badge badge-info">13</span></a>
										</li>

										<li>
											<a data-toggle="tab" href="#tomorrow-tab">Tomorrow <span class="badge badge-important">10</span></a>
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
															<i class="ace-icon fa fa-caret-right blue"></i>Store Name
														</th>

														<th>
															<i class="ace-icon fa fa-caret-right blue"></i>Total Booking
														</th>

														<th class="hidden-480">
															<i class="ace-icon fa fa-caret-right blue"></i>status
														</th>
													</tr>
												</thead>

												<tbody>
													<tr>
														<td>Store One</td>
														<small>
															<s class="red"></s>
														</small>
														<td> 
															<b class="green">4</b>
														</td>
														<td class="hidden-480">
															<span class="label label-success arrowed-right arrowed-in">Completed</span>
														</td>
													</tr>
													<tr>
														<td>Store Two</td>
														<small>
															<s class="red"></s>
														</small>
														<td> 
															<b class="green">4</b>
														</td>
														<td class="hidden-480">
															<span class="label label-warning arrowed-right arrowed-in">1 appointment missed</span>
														</td>
													</tr>
													<tr>
														<td>Doctors Chambers</td>
														<small>
															<s class="red"></s>
														</small>
														<td> 
															<b class="green">7</b>
														</td>
														<td class="hidden-480">
															<span class="label label-success arrowed-right arrowed-in">Completed</span>
														</td>
													</tr>

												</tbody>
											</table>
										</div>

										<div id="today-tab" class="tab-pane">
											<table class="table table-bordered table-striped">
												<thead class="thin-border-bottom">
													<tr>
														<th>
															<i class="ace-icon fa fa-caret-right blue"></i>Store Name
														</th>

														<th>
															<i class="ace-icon fa fa-caret-right blue"></i>Total Booking
														</th>

														<th class="hidden-480">
															<i class="ace-icon fa fa-caret-right blue"></i>status
														</th>
													</tr>
												</thead>

												<tbody>
													<tr>
														<td>Store One</td>
														<small>
															<s class="red"></s>
														</small>
														<td> 
															<b class="green">4</b>
														</td>
														<td class="hidden-480">
															<span class="label label-success arrowed-right arrowed-in">On Service</span>
														</td>
													</tr>
													<tr>
														<td>Store Two</td>
														<small>
															<s class="red"></s>
														</small>
														<td> 
															<b class="green">4</b>
														</td>
														<td class="hidden-480">
															<span class="label label-success arrowed-right arrowed-in">On Service</span>
														</td>
													</tr>
													<tr>
														<td>Doctors Chambers</td>
														<small>
															<s class="red"></s>
														</small>
														<td> 
															<b class="green">5</b>
														</td>
														<td class="hidden-480">
															<span class="label label-warning arrowed-right arrowed-in">Launch Hour</span>
														</td>
													</tr>

												</tbody>
											</table>
										</div><!-- /.#member-tab -->

										<div id="tomorrow-tab" class="tab-pane">
											<table class="table table-bordered table-striped">
												<thead class="thin-border-bottom">
													<tr>
														<th>
															<i class="ace-icon fa fa-caret-right blue"></i>Store Name
														</th>

														<th>
															<i class="ace-icon fa fa-caret-right blue"></i>Total Booking
														</th>

														 
													</tr>
												</thead>

												<tbody>
													<tr>
														<td>Store One</td>
														<small>
															<s class="red"></s>
														</small>
														<td> 
															<b class="green">2</b>
														</td>
														 
													</tr>
													<tr>
														<td>Store Two</td>
														<small>
															<s class="red"></s>
														</small>
														<td> 
															<b class="green">3</b>
														</td>
														 
													</tr>
													<tr>
														<td>Doctors Chambers</td>
														<small>
															<s class="red"></s>
														</small>
														<td> 
															<b class="green">5</b>
														</td>
														 
													</tr>

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
		<?php 
			}else if   ((Yii::app()->user->user_type)==6) { 
		?>
			<div class="page-header">
			<h1>
				Dashboard
				<small>
					<i class="ace-icon fa fa-angle-double-right"></i>
					Store Owner <strong>(Store One)</strong>
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

								<div class="widget-toolbar no-border">
									<ul class="nav nav-tabs" id="recent-tab">
										<li class="active">
											<a data-toggle="tab" href="#yesterday-tab">Yesterday <span class="badge badge-success">4</span></a>
										</li>

										<li>
											<a data-toggle="tab" href="#today-tab">Today <span class="badge badge-info">4</span></a>
										</li>

										<li>
											<a data-toggle="tab" href="#tomorrow-tab">Tomorrow <span class="badge badge-important">3</span></a>
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
													<tr>
														<td>Jashim Uddin</td>
														<td> <b class="green">Round Shape Cutting(Hair Cut)</b></td>
														<td> <b class="blue">12.00 PM</b></td>
														<td class="hidden-480"><span class="label label-success arrowed-right arrowed-in">Paid</span></td>
													</tr>
													<tr>
														<td>Disen Chakma</td>
														<td> <b class="green">Acupressure(Body Massage)</b></td>
														<td> <b class="blue">02.00 PM</b></td>
														<td class="hidden-480"><span class="label label-success arrowed-right arrowed-in">Paid</span></td>
													</tr>
													<tr>
														<td>James PK</td>
														<td> <b class="green">Lomi Lomi(Body Massage)</b></td>
														<td> <b class="blue">04.00 PM</b></td>
														<td class="hidden-480"><span class="label label-success arrowed-right arrowed-in">Paid</span></td>
													</tr>
													<tr>
														<td>Naoshin Ahmed</td>
														<td> <b class="green">Shampoo & hair cut(Hair Cut)</b></td>
														<td> <b class="blue">06.00 PM</b></td>
														<td class="hidden-480"><span class="label label-success arrowed-right arrowed-in">Canceled</span></td>
													</tr>
													<tr><td colspan="4"><a href="">view all </a></td></tr>
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
													<tr>
														<td>Debal Ch.</td>
														<td> <b class="green">Acupressure(Body Massage)</b></td>
														<td> <b class="blue">11.00 AM</b></td>
														<td class="hidden-480"><span class="label label-success arrowed-right arrowed-in">Pending</span></td>
													</tr>
													<tr>
														<td>Chinmoy R.</td>
														<td> <b class="green">Shampoo & hair cut(Hair Cut)</b></td>
														<td> <b class="blue">02.00 PM</b></td>
														<td class="hidden-480"><span class="label label-success arrowed-right arrowed-in">Advanced</span></td>
													</tr>
													<tr>
														<td>Ovishonkorain</td>
														<td> <b class="green">Lomi Lomi(Body Massage)</b></td>
														<td> <b class="blue">04.00 PM</b></td>
														<td class="hidden-480"><span class="label label-success arrowed-right arrowed-in">Paid</span></td>
													</tr>
													<tr>
														<td>Imrad zulkarnine</td>
														<td> <b class="green">Shampoo & hair cut(Hair Cut)</b></td>
														<td> <b class="blue">06.00 PM</b></td>
														<td class="hidden-480"><span class="label label-success arrowed-right arrowed-in">Advanced</span></td>
													</tr>
													<tr><td colspan="4"><a href="">view all </a></td></tr>
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
													<tr>
														<td>Shishir Ch.</td>
														<td> <b class="green">Acupressure(Body Massage)</b></td>
														<td> <b class="blue">11.00 AM</b></td>
														<td class="hidden-480"><span class="label label-success arrowed-right arrowed-in">Pending</span></td>
													</tr>
													<tr>
														<td>Shumet Ch.</td>
														<td> <b class="green">Shampoo & hair cut(Hair Cut)</b></td>
														<td> <b class="blue">02.00 PM</b></td>
														<td class="hidden-480"><span class="label label-success arrowed-right arrowed-in">Advanced</span></td>
													</tr>
													<tr>
														<td>Kamarun </td>
														<td> <b class="green">Lomi Lomi(Body Massage)</b></td>
														<td> <b class="blue">04.00 PM</b></td>
														<td class="hidden-480"><span class="label label-success arrowed-right arrowed-in">Paid</span></td>
													</tr>
													
													<tr><td colspan="4"><a href="">view all </a></td></tr>
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
						<div class="widget-box widget-color-blue">
											<div class="widget-header"  style="padding-bottom:10px;">
												<h5 class="widget-title bigger lighter">
													<i class="ace-icon fa fa-table"></i>
													Regular Customers/Visitors
												</h5>
											</div>

											<div class="widget-body">
												<div class="widget-main no-padding">
													<table class="table table-striped table-bordered table-hover">
														<thead class="thin-border-bottom">
															<tr>
																<th>
																	<i class="ace-icon fa fa-user"></i>
																	User
																</th>

																<th>
																	<i>@</i>
																	Email
																</th>
																<th class="hidden-480">Total Paid</th>
															</tr>
														</thead>

														<tbody>
															<tr>
																<td class="">James PK</td>
																<td><a href="#">james.pk@gmail.com</a></td>
																<td class="hidden-480">
																	<span class="label label-info">$1000.00</span>
																</td>
															</tr>

															<tr>
																<td class="">Fardin H.</td>
																<td><a href="#">fardin_020@gmail.com</a></td>
																<td class="hidden-480">
																	<span class="label label-info">$800.00</span>
																</td>
															</tr>

															<tr>
																<td class="">Jack</td>

																<td>
																	<a href="#">jack_forever@yahoo.com</a>
																</td>

																<td class="hidden-480">
																	<span class="label label-info">$500.00</span>
																</td>
															</tr>

															<tr>
																<td class="">John</td>

																<td>
																	<a href="#">john_jonathen@gmail.com</a>
																</td>

																<td class="hidden-480">
																	<span class="label label-info">$400.00</span>
																</td>
															</tr>

															<tr>
																<td colspan="3" class=""><a href="#" />view all</a></td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
										</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
				<div class="hr hr32 hr-dotted"></div>
				<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="row">
									<div class="col-sm-9">
										<div class="space"></div>

										<div id="calendar"></div>
									</div>

									<div class="col-sm-3">
										<div class="widget-box transparent">
											<div class="widget-header">
												<h4>Draggable events</h4>
											</div>

											<div class="widget-body">
												<div class="widget-main no-padding">
													<div id="external-events">
														<div class="external-event label-grey" data-class="label-grey">
															<i class="ace-icon fa fa-arrows"></i>
															My Event 1
														</div>

														<div class="external-event label-success" data-class="label-success">
															<i class="ace-icon fa fa-arrows"></i>
															My Event 2
														</div>

														<div class="external-event label-danger" data-class="label-danger">
															<i class="ace-icon fa fa-arrows"></i>
															My Event 3
														</div>

														<div class="external-event label-purple" data-class="label-purple">
															<i class="ace-icon fa fa-arrows"></i>
															My Event 4
														</div>

														<div class="external-event label-yellow" data-class="label-yellow">
															<i class="ace-icon fa fa-arrows"></i>
															My Event 5
														</div>

														<div class="external-event label-pink" data-class="label-pink">
															<i class="ace-icon fa fa-arrows"></i>
															My Event 6
														</div>

														<div class="external-event label-info" data-class="label-info">
															<i class="ace-icon fa fa-arrows"></i>
															My Event 7
														</div>

														<label>
															<input type="checkbox" class="ace ace-checkbox" id="drop-remove" />
															<span class="lbl"> Remove after drop</span>
														</label>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
				<!-- PAGE CONTENT ENDS -->
			</div><!-- /.col -->
		</div><!-- /.row -->


		<?php	} 	?>

	</div><!-- /.page-content-area -->

<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.easypiechart.min.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/flot/jquery.flot.min.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/flot/jquery.flot.pie.min.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/flot/jquery.flot.resize.min.js"></script>
<!-- /.page-content-area -->
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/date-time/moment.min.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/fullcalendar.min.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootbox.min.js"></script>
<!-- inline scripts related to this page -->
<script type="text/javascript">
	jQuery(function($) {
		$('.easy-pie-chart.percentage').each(function(){
			var $box = $(this).closest('.infobox');
			var barColor = $(this).data('color') || (!$box.hasClass('infobox-dark') ? $box.css('color') : 'rgba(255,255,255,0.95)');
			var trackColor = barColor == 'rgba(255,255,255,0.95)' ? 'rgba(255,255,255,0.25)' : '#E2E2E2';
			var size = parseInt($(this).data('size')) || 50;
			$(this).easyPieChart({
				barColor: barColor,
				trackColor: trackColor,
				scaleColor: false,
				lineCap: 'butt',
				lineWidth: parseInt(size/10),
				animate: /msie\s*(8|7|6)/.test(navigator.userAgent.toLowerCase()) ? false : 1000,
				size: size
			});
		})
	
		$('.sparkline').each(function(){
			var $box = $(this).closest('.infobox');
			var barColor = !$box.hasClass('infobox-dark') ? $box.css('color') : '#FFF';
			$(this).sparkline('html',
							 {
								tagValuesAttribute:'data-values',
								type: 'bar',
								barColor: barColor ,
								chartRangeMin:$(this).data('min') || 0
							 });
		});
	
	
	  //flot chart resize plugin, somehow manipulates default browser resize event to optimize it!
	  //but sometimes it brings up errors with normal resize event handlers
	  $.resize.throttleWindow = false;
	
	  var placeholder = $('#piechart-placeholder').css({'width':'90%' , 'min-height':'150px'});
	  var data = [
		{ label: "Doctors Chambers",  data: 45, color: "#68BC31"},
		{ label: "Store One",  data: 35, color: "#2091CF"},
		{ label: "Store Two",  data: 25, color: "#AF4E96"},
	  ]
	  function drawPieChart(placeholder, data, position) {
	 	  $.plot(placeholder, data, {
			series: {
				pie: {
					show: true,
					tilt:0.8,
					highlight: {
						opacity: 0.25
					},
					stroke: {
						color: '#fff',
						width: 2
					},
					startAngle: 2
				}
			},
			legend: {
				show: true,
				position: position || "ne", 
				labelBoxBorderColor: null,
				margin:[-30,15]
			}
			,
			grid: {
				hoverable: true,
				clickable: true
			}
		 })
	 }
	 drawPieChart(placeholder, data);
	
	 /**
	 we saved the drawing function and the data to redraw with different position later when switching to RTL mode dynamically
	 so that's not needed actually.
	 */
	 placeholder.data('chart', data);
	 placeholder.data('draw', drawPieChart);
	
	
	  //pie chart tooltip example
	  var $tooltip = $("<div class='tooltip top in'><div class='tooltip-inner'></div></div>").hide().appendTo('body');
	  var previousPoint = null;
	
	  placeholder.on('plothover', function (event, pos, item) {
		if(item) {
			if (previousPoint != item.seriesIndex) {
				previousPoint = item.seriesIndex;
				var tip = item.series['label'] + " : " + item.series['percent']+'%';
				$tooltip.show().children(0).text(tip);
			}
			$tooltip.css({top:pos.pageY + 10, left:pos.pageX + 10});
		} else {
			$tooltip.hide();
			previousPoint = null;
		}
		
	 });
	
	
	
	
	
	
		var d1 = [];
		for (var i = 0; i < Math.PI * 2; i += 0.5) {
			d1.push([i, Math.sin(i)]);
		}
	
		var d2 = [];
		for (var i = 0; i < Math.PI * 2; i += 0.5) {
			d2.push([i, Math.cos(i)]);
		}
	
		var d3 = [];
		for (var i = 0; i < Math.PI * 2; i += 0.2) {
			d3.push([i, Math.tan(i)]);
		}
		
	
		var sales_charts = $('#sales-charts').css({'width':'100%' , 'height':'220px'});
		$.plot("#sales-charts", [
			{ label: "Domains", data: d1 },
			{ label: "Hosting", data: d2 },
			{ label: "Services", data: d3 }
		], {
			hoverable: true,
			shadowSize: 0,
			series: {
				lines: { show: true },
				points: { show: true }
			},
			xaxis: {
				tickLength: 0
			},
			yaxis: {
				ticks: 10,
				min: -2,
				max: 2,
				tickDecimals: 3
			},
			grid: {
				backgroundColor: { colors: [ "#fff", "#fff" ] },
				borderWidth: 1,
				borderColor:'#555'
			}
		});
	
	
		$('#recent-box [data-rel="tooltip"]').tooltip({placement: tooltip_placement});
		function tooltip_placement(context, source) {
			var $source = $(source);
			var $parent = $source.closest('.tab-content')
			var off1 = $parent.offset();
			var w1 = $parent.width();
	
			var off2 = $source.offset();
			//var w2 = $source.width();
	
			if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
			return 'left';
		}
	
	
		$('.dialogs,.comments').ace_scroll({
			size: 300
	    });
		
		
		//Android's default browser somehow is confused when tapping on label which will lead to dragging the task
		//so disable dragging when clicking on label
		var agent = navigator.userAgent.toLowerCase();
		if("ontouchstart" in document && /applewebkit/.test(agent) && /android/.test(agent))
		  $('#tasks').on('touchstart', function(e){
			var li = $(e.target).closest('#tasks li');
			if(li.length == 0)return;
			var label = li.find('label.inline').get(0);
			if(label == e.target || $.contains(label, e.target)) e.stopImmediatePropagation() ;
		});
	
		$('#tasks').sortable({
			opacity:0.8,
			revert:true,
			forceHelperSize:true,
			placeholder: 'draggable-placeholder',
			forcePlaceholderSize:true,
			tolerance:'pointer',
			stop: function( event, ui ) {
				//just for Chrome!!!! so that dropdowns on items don't appear below other items after being moved
				$(ui.item).css('z-index', 'auto');
			}
			}
		);
		$('#tasks').disableSelection();
		$('#tasks input:checkbox').removeAttr('checked').on('click', function(){
			if(this.checked) $(this).closest('li').addClass('selected');
			else $(this).closest('li').removeClass('selected');
		});
	
	
		//show the dropdowns on top or bottom depending on window height and menu position
		$('#task-tab .dropdown-hover').on('mouseenter', function(e) {
			var offset = $(this).offset();
	
			var $w = $(window)
			if (offset.top > $w.scrollTop() + $w.innerHeight() - 100) 
				$(this).addClass('dropup');
			else $(this).removeClass('dropup');
		});


		/* initialize the external events
	-----------------------------------------------------------------*/

	$('#external-events div.external-event').each(function() {

		// create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
		// it doesn't need to have a start or end
		var eventObject = {
			title: $.trim($(this).text()) // use the element's text as the event title
		};

		// store the Event Object in the DOM element so we can get to it later
		$(this).data('eventObject', eventObject);

		// make the event draggable using jQuery UI
		$(this).draggable({
			zIndex: 999,
			revert: true,      // will cause the event to go back to its
			revertDuration: 0  //  original position after the drag
		});
		
	});




	/* initialize the calendar
	-----------------------------------------------------------------*/

	var date = new Date();
	var d = date.getDate();
	var m = date.getMonth();
	var y = date.getFullYear();

	
	var calendar = $('#calendar').fullCalendar({
		//isRTL: true,
		 buttonHtml: {
			prev: '<i class="ace-icon fa fa-chevron-left"></i>',
			next: '<i class="ace-icon fa fa-chevron-right"></i>'
		},
	
		header: {
			left: 'prev,next today',
			center: 'title',
			right: 'month,agendaWeek,agendaDay'
		},
		events: [
		  {
			title: 'All Day Event',
			start: new Date(y, m, 1),
			className: 'label-important'
		  },
		  {
			title: 'Long Event',
			start: new Date(y, m, d-5),
			end: new Date(y, m, d-2),
			className: 'label-success'
		  },
		  {
			title: 'Some Event',
			start: new Date(y, m, d-3, 16, 0),
			allDay: false
		  }
		]
		,
		editable: true,
		droppable: true, // this allows things to be dropped onto the calendar !!!
		drop: function(date, allDay) { // this function is called when something is dropped
		
			// retrieve the dropped element's stored Event Object
			var originalEventObject = $(this).data('eventObject');
			var $extraEventClass = $(this).attr('data-class');
			
			
			// we need to copy it, so that multiple events don't have a reference to the same object
			var copiedEventObject = $.extend({}, originalEventObject);
			
			// assign it the date that was reported
			copiedEventObject.start = date;
			copiedEventObject.allDay = allDay;
			if($extraEventClass) copiedEventObject['className'] = [$extraEventClass];
			
			// render the event on the calendar
			// the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
			$('#calendar').fullCalendar('renderEvent', copiedEventObject, true);
			
			// is the "remove after drop" checkbox checked?
			if ($('#drop-remove').is(':checked')) {
				// if so, remove the element from the "Draggable Events" list
				$(this).remove();
			}
			
		}
		,
		selectable: true,
		selectHelper: true,
		select: function(start, end, allDay) {
			
			bootbox.prompt("New Event Title:", function(title) {
				if (title !== null) {
					calendar.fullCalendar('renderEvent',
						{
							title: title,
							start: start,
							end: end,
							allDay: allDay
						},
						true // make the event "stick"
					);
				}
			});
			

			calendar.fullCalendar('unselect');
		}
		,
		eventClick: function(calEvent, jsEvent, view) {

			//display a modal
			var modal = 
			'<div class="modal fade">\
			  <div class="modal-dialog">\
			   <div class="modal-content">\
				 <div class="modal-body">\
				   <button type="button" class="close" data-dismiss="modal" style="margin-top:-10px;">&times;</button>\
				   <form class="no-margin">\
					  <label>Change event name &nbsp;</label>\
					  <input class="middle" autocomplete="off" type="text" value="' + calEvent.title + '" />\
					 <button type="submit" class="btn btn-sm btn-success"><i class="ace-icon fa fa-check"></i> Save</button>\
				   </form>\
				 </div>\
				 <div class="modal-footer">\
					<button type="button" class="btn btn-sm btn-danger" data-action="delete"><i class="ace-icon fa fa-trash-o"></i> Delete Event</button>\
					<button type="button" class="btn btn-sm" data-dismiss="modal"><i class="ace-icon fa fa-times"></i> Cancel</button>\
				 </div>\
			  </div>\
			 </div>\
			</div>';
		
		
			var modal = $(modal).appendTo('body');
			modal.find('form').on('submit', function(ev){
				ev.preventDefault();

				calEvent.title = $(this).find("input[type=text]").val();
				calendar.fullCalendar('updateEvent', calEvent);
				modal.modal("hide");
			});
			modal.find('button[data-action=delete]').on('click', function() {
				calendar.fullCalendar('removeEvents' , function(ev){
					return (ev._id == calEvent._id);
				})
				modal.modal("hide");
			});
			
			modal.modal('show').on('hidden', function(){
				modal.remove();
			});


			//console.log(calEvent.id);
			//console.log(jsEvent);
			//console.log(view);

			// change the border color just for fun
			//$(this).css('border-color', 'red');

		}
		
	});



	
	})



</script>