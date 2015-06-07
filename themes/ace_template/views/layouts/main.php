<?php
	$company=Yii::app()->user->company;
	$shop_id=Yii::app()->user->shop_id;
	$group_id=Yii::app()->user->group_id;
?>

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

		<!-- bootstrap & fontawesome ########## Using this css as the yiistrap package's bootstrap.css is lower version -->
		<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/style/bootstrap.min.css" />

		<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/fonts/font-awesome/4.1.0/css/font-awesome.min.css" />
 
		<!-- text fonts -->
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />

		<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/style/style.css" id="main-style" />

		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/style/jquery-ui.custom.min.css" />
		<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/style/fullcalendar.css" />

        
		<!-- ace styles -->
		<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/style/ace.min.css" id="main-ace-style" />
		<!-- Form  styles -->
		<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/style/form.css" id="form-style" />
		<!--[if lte IE 9]>
			<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/style/ace-part2.min.css" />
		<![endif]-->
		<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/style/ace-skins.min.css" />
		<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/style/ace-rtl.min.css" />
 		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/style/ace-ie.min.css" />
		<![endif]-->
 		<!-- inline styles related to this page -->
 		<!-- ace settings handler -->
		<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/ace-extra.min.js"></script>
 		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->
 		<!--[if lte IE 8]>
		<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/html5shiv.min.js"></script>
		<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/respond.min.js"></script>
		<![endif]-->
	</head>

	<body class="no-skin">

		<?php echo $content; ?>

		<!-- basic scripts -->
		<!--[if !IE]> -->
		<!--<script src="<?php //echo Yii::app()->theme->baseUrl; ?>/js/jquery.min.js"></script> -->
		<!-- <![endif]-->
		<!--[if IE]>
			<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<![endif]-->
		<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.min.js'>"+"<"+"/script>");
		</script><!---->
		<!-- <![endif]-->
		<!--[if IE]>
		<script type="text/javascript">
		 window.jQuery || document.write("<script src='<?php //echo Yii::app()->theme->baseUrl; ?>/js/jquery1x.min.js'>"+"<"+"/script>");
		</script>
		<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		
		<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->
		<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery-ui.custom.min.js"></script>
		<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.ui.touch-punch.min.js"></script>
		<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/date-time/moment.min.js"></script>
		<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/fullcalendar.min.js"></script>
		<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootbox.min.js"></script>

		<!-- ace scripts -->
		<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/ace-elements.min.js"></script>
		<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/ace.min.js"></script>



		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
			/*----------- initialize the external events ----------*/

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

			/*---------- initialize the calendar---------*/

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
				  	<?php
						$array1 = Yii::app()->db->createCommand()
		                ->select('appoint_date')
		                ->from('{{appointment}}')
		                 ->where('shop_id='.$shop_id.' AND company_id='.$company)
		                 ->group('appoint_date')
		                ->queryAll();
		                foreach ($array1 as $key => $values) {  
		                	$date= $values['appoint_date'];

		                		$array2 = Yii::app()->db->createCommand()
				                ->select('appoint_date')
				                ->from('{{appointment}}')
				                 ->where('shop_id='.$shop_id.' AND company_id='.$company.' AND appoint_date="'.$date.'"  AND status=1')
				                 ->group('appoint_date')
				                ->queryAll();
				                
				                //both are working...
				               /*	$count_val = Appointment::model()->countByAttributes(array(
        'shop_id'=> $shop_id, 'company_id'=>$company, 'appoint_date'=>$date
        )); */
				                $count_val = Yii::app()->db->createCommand()
						        ->select('COUNT(*)')
						        ->from('{{appointment}}')
						         ->where('shop_id='.$shop_id.' AND company_id='.$company.' AND appoint_date="'.$date.'" AND status=1')
						        ->queryScalar();

				                foreach ($array2 as $key => $values2) { 
				                     echo "{
				                    title  : '".$count_val." appointments',
				                    start  : '".$values2['appoint_date']."'
				                },";
				                    }
		                }

		                /*
							// this codes are for if we want to shwo all events on the page in calendar.
						
						$array1 = Yii::app()->db->createCommand()
		                ->select('appoint_date')
		                ->from('{{appointment}}')
		                 ->where('shop_id='.$shop_id.' AND company_id='.$company)
		                 ->group('appoint_date')
		                ->queryAll();
		                foreach ($array1 as $key => $values) {  
		                	$date= $values['appoint_date'];

		                		$array2 = Yii::app()->db->createCommand()
				                ->select('appoint_date')
				                ->from('{{appointment}}')
				                 ->where('shop_id='.$shop_id.' AND company_id='.$company.' AND appoint_date="'.$date.'"')
				                 
				                ->queryAll();

				                $count_val=count($array2);//$count_val has the value of number of rows in the output.
				                foreach ($array2 as $key => $values2) { 
				                     echo "{
				                    title  : '".$count_val." appointments',
				                    start  : '".$values2['appoint_date']."'
				                },";
				                    }
		                }



		                */
					?>
					
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
				

				<!-- inline scripts related to this page -->
	</body>

</html>
