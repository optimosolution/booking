<?php
/* @var $this AppointmentNoteController */
/* @var $model AppointmentNote */

$this->breadcrumbs=array(
	'Appointment Notes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AppointmentNote', 'url'=>array('index')),
	array('label'=>'Manage AppointmentNote', 'url'=>array('admin')),
);
?>

<h1>Create AppointmentNote</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>