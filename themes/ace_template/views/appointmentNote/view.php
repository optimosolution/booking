<?php
/* @var $this AppointmentNoteController */
/* @var $model AppointmentNote */

$this->breadcrumbs=array(
	'Appointment Notes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List AppointmentNote', 'url'=>array('index')),
	array('label'=>'Create AppointmentNote', 'url'=>array('create')),
	array('label'=>'Update AppointmentNote', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete AppointmentNote', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AppointmentNote', 'url'=>array('admin')),
);
?>

<h1>View AppointmentNote #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'appointment_id',
		'note_by',
		'time',
		'ip',
		'note',
		'file_name',
		'status',
	),
)); ?>
