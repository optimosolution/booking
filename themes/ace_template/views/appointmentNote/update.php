<?php
/* @var $this AppointmentNoteController */
/* @var $model AppointmentNote */

$this->breadcrumbs=array(
	'Appointment Notes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List AppointmentNote', 'url'=>array('index')),
	array('label'=>'Create AppointmentNote', 'url'=>array('create')),
	array('label'=>'View AppointmentNote', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage AppointmentNote', 'url'=>array('admin')),
);
?>

<h1>Update AppointmentNote <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>