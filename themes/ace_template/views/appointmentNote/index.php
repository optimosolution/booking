<?php
/* @var $this AppointmentNoteController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Appointment Notes',
);

$this->menu=array(
	array('label'=>'Create AppointmentNote', 'url'=>array('create')),
	array('label'=>'Manage AppointmentNote', 'url'=>array('admin')),
);
?>

<h1>Appointment Notes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
