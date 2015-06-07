<?php
/* @var $this UserGroupController */
/* @var $model UserGroup */


$this->breadcrumbs=array(
	'User Groups'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List UserGroup', 'url'=>array('index')),
	array('label'=>'Create UserGroup', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#user-group-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage User Groups</h1>

<?php $this->widget('zii.widgets.grid.CGridView',array(
	'id'=>'user-group-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'title',
		'details',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>