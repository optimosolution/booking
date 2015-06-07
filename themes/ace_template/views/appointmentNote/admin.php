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

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'appointment-note-grid',
	'dataProvider'=>$model->search(),
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
