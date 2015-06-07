
<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
$company=Yii::app()->user->company;
$shop_id=Yii::app()->user->shop_id;
$group_id=Yii::app()->user->group_id;
?>
<div class="page-content-area">

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
										<?php
											$today=date('Y-m-d');
											$yesterday= date('Y-m-d',strtotime("-1 days"));;
											$tomorrow= date('Y-m-d',strtotime("+1 days"));;

											
										?>
										<div class="widget-toolbar no-border">
											<ul class="nav nav-tabs" id="recent-tab">
												<li class="active">
													<a data-toggle="tab" href="#yesterday-tab">Yesterday <span class="badge badge-success"><?php  print	$count_valYesterday = Appointment::model()->countByAttributes(array('shop_id'=> $shop_id, 'company_id'=>$company, 'appoint_date'=>$yesterday, 'status'=>1)); ?></span></a>
												</li>

												<li>
													<a data-toggle="tab" href="#today-tab">Today <span class="badge badge-info"><?php  print	$count_valYesterday = Appointment::model()->countByAttributes(array('shop_id'=> $shop_id, 'company_id'=>$company, 'appoint_date'=>$today, 'status'=>1)); ?></span></a>
												</li>

												<li>
													<a data-toggle="tab" href="#tomorrow-tab">Tomorrow <span class="badge badge-important"><?php  print	$count_valYesterday = Appointment::model()->countByAttributes(array('shop_id'=> $shop_id, 'company_id'=>$company, 'appoint_date'=>$tomorrow, 'status'=>1)); ?></span></a>
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
											                 ->where('shop_id='.$shop_id.' AND company_id='.$company.' AND status=1 AND appoint_date="'.$yesterday.'"')
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
											                 ->where('shop_id='.$shop_id.' AND company_id='.$company.' AND status=1 AND appoint_date="'.$today.'"')
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
											                 ->where('shop_id='.$shop_id.' AND company_id='.$company.' AND status=1 AND appoint_date="'.$tomorrow.'"')
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
																<?php
																/*
																SELECT
																  userid,
																  SUM(col1) AS col1_total,
																  SUM(col2) AS col2_total
																FROM table
																GROUP BY userid
																*/
																	$arrayZ = Yii::app()->db->createCommand()
													                ->select('customer_id, SUM(total_cost) AS total')
													                ->from('{{appointment}}')
													                ->group('customer_id')
													                 ->where('shop_id='.$shop_id.' AND company_id='.$company.' AND status=1')
													                 ->limit(4)
													                 ->order('total DESC')  
													                ->queryAll();
													                foreach ($arrayZ as $keyZ => $valuesZ) {  
																?>
																	<tr>
																		<td>
																			<?php echo User::get_user_name($valuesZ['customer_id']) ; ?>
																		</td>
																		<td>
																			<?php echo User::get_user_email($valuesZ['customer_id']) ; ?>
																		</td>
																		<td class="hidden-480">
																			<span class="label label-info">
													<?php 
														echo Currency::get_currency_symbol(Shop::get_currency_id($shop_id)).'. '	; 
														echo $valuesZ['total']; 
													?>
																</span>

																		</td>
																		  
																	</tr>
																<?php } ?>	
																	 

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
							<div class="col-sm-8">
								<div class="space"></div>

								<div id="calendar"></div>
							</div>

							<div class="col-sm-4">
							<div class="widget-box transparent">
								<div class="widget-header">
									<h4>Availabel Services</h4>
								</div>

								<div class="widget-body">
									<div class="widget-main no-padding">
										<div id="external-events">
											<?php
												$array = Yii::app()->db->createCommand()
								                ->select('*')
								                ->from('{{service}}')
								                ->where('shop='.$shop_id.' AND company='.$company.' AND published=1')
								                ->queryAll();

								                foreach ($array as $key => $values) {  
											?>
											<a href="index.php?r=appointment/create&service_id=<?php print $values['id']; ?>" class="serviceListLink" style="cursor:pointer !important;" >
											<div class="external-event label-success" data-class="label-grey">
												<i class="ace-icon fa fa-arrows"></i>
												<?php print $values['title']; ?>

												<i class="ace-icon fa fa-sign-in fright linkServiceFontIco" style=""></i>
											</div></a>
											<?php } ?> 
 
										</div>
									</div>
								</div>
							</div>
						</div>
						</div>

					<!-- PAGE CONTENT ENDS -->
					</div><!-- /.col -->
				</div><!-- /.row --><!-- /.row -->
						<!-- PAGE CONTENT ENDS -->
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.page-content-area -->




<!-- /.page-content-area -->

<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery-ui.custom.min.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.ui.touch-punch.min.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/date-time/moment.min.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/fullcalendar.min.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootbox.min.js"></script>

 
<!-- inline scripts related to this page -->
	<script type="text/javascript">
	jQuery(function($) {

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