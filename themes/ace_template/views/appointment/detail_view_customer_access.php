<?php
/* @var $this AppointmentController */
/* @var $model Appointment */
?>

<?php
$this->breadcrumbs=array(
	'Appointments'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Appointment', 'url'=>array('index')),
	array('label'=>'Create Appointment', 'url'=>array('create')),
	array('label'=>'Update Appointment', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Appointment', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Appointment', 'url'=>array('admin')),
);
?>

<h1>View Appointment :<?php echo $model->appoint_date; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		//'id',
		
		//'company_id',
		//'shop_id',
		array(
            'name' => 'shop_id',
            'type' => 'raw',
            'value' => Shop::get_shop($model->shop_id),
        ),
		array(
            'name' => 'customer_id',
            'type' => 'raw',
            'value' => User::get_user_name($model->customer_id),
        ),
        array(
            'name' => 'staff_id',
            'type' => 'raw',
            'value' => User::get_user_name($model->staff_id),
        ),
 		array(
            'name' => 'service_id',
            'type' => 'raw',
            'value' => Service::get_service_name($model->service_id),
        ),
		'appoint_time',
		'appoint_date',


		//'end_time',
		//'total_cost','service_category',
		'note',
	),
)); ?>

<div class="widget-foot">
    <!-- Footer goes here -->
    <?php echo CHtml::link('<i class="icon-plus"></i> Add Note', array('appointmentNote/create', 'appointment_id' => $model->id, 'user_id'=>Yii::app()->user->id), array('class' => 'btn btn-primary btn-mini')); ?>
    <?php echo CHtml::link('<i class="icon-edit"></i> Edit', array('update', 'id' => $model->id), array('class' => 'btn btn-info btn-mini')); ?>
</div>

<div class="appointmentsNote" style="padding:20px; margin:20px 0;">
    <h3 style="background:#CCC; padding:10px">Notes</h3>
    <?php                                
        $arrayY = Yii::app()->db->createCommand()
        ->select('*')
        ->from('{{appointment_note}}')
         ->where('appointment_id='.$model->id.' AND status=1')
         ->order('time DESC')  
        ->queryAll();
        foreach ($arrayY as $key => $valuesY) {  
    
    $user_group_id=User::get_group_id($valuesY['note_by']);

    ?>
    <?php  if ($user_group_id==8){ ?>
    <div class="col-sm-8 left" style="float:left; margin-bottom:10px; padding-bottom:10px; border-bottom:1px dotted;">
        <div class="col-sm-2" style="float:left;">
           <?php /*  <img src="<?php echo Staff::get_profile_picture($note_by); ?>" alt="<?php echo User::get_user_name($note_by); ?>" /> */ ?>
            <?php echo User::get_profile_picture90px($valuesY['note_by']); ?> <br/>
            <?php echo User::get_user_name($valuesY['note_by']); ?> <br/>
            
        </div>
    <?php }else{ ?>
    <div class="col-sm-8 right" style="float:right; margin-bottom:10px; padding-bottom:10px; border-bottom:1px dotted;">
        <div class="col-sm-2" style="float:right;">
           <?php /*  <img src="<?php echo Staff::get_profile_picture($note_by); ?>" alt="<?php echo User::get_user_name($note_by); ?>" /> */ ?>
            <?php echo User::get_profile_picture90px($valuesY['note_by']); ?> <br/>
            <?php echo User::get_user_name($valuesY['note_by']); ?> <br/>
            
        </div>
    <?php } ?>
        
        <div class="col-sm-6" style="padding-top:30px; padding-left:10px;">
            <p><strong>Note: </strong><br/><?php echo $valuesY['note']; ?></p>
            <p><strong>Added Time:</strong> <?php echo $valuesY['time']; ?></p>
             
            <?php if (!empty($valuesY['file_name'])) { ?>
            <p style=" font-weight:bold;">Attached File:</p><a target="_blank" href="uploads/appointent_noteFile/<?php echo $valuesY['file_name']; ?>" title=""> <?php echo $valuesY['file_name']; ?></a> <br/><br/>
            <?php } ?>
            <?php  if ($user_group_id==8){ ?>
            <?php echo CHtml::link('<i class="icon-edit"></i> Edit', array('appointmentNote/update', 'id' => $valuesY['id'], 'appointment_id'=>$model->id), array('class' => 'btn btn-info btn-mini')); ?>
            <?php } ?>
        </div>
    </div>
    

    <?php } ?>
</div>