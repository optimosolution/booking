<?php
/* @var $this AppointmentNoteController */
/* @var $model AppointmentNote */

$this->breadcrumbs=array(
	'Appointment Notes'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List AppointmentNote', 'url'=>array('index')),
	array('label'=>'Create AppointmentNote', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#appointment-note-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Appointment Notes</h1>

 

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'appointment-note-grid',
	'dataProvider'=>$model->search(),
		'htmlOptions'=>array('style'=>'cursor: pointer;'),
	'selectionChanged'=>"function(id){window.location='" . Yii::app()->urlManager->createUrl('appointmentNote/view', array('id'=>'')) . "' + $.fn.yiiGridView.getSelection(id);}",

	'filter'=>$model,
	'columns'=>array(
		'id',
		'appointment_id',
		'note_by',
		'time',
		'ip',
		'note',
		/*
		'file_name',
		'status',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
