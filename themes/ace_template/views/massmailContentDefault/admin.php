<?php
/* @var $this MassmailContentDefaultController */
/* @var $model MassmailContentDefault */

$this->breadcrumbs=array(
	'Massmail Content Defaults'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List MassmailContentDefault', 'url'=>array('index')),
	array('label'=>'Create MassmailContentDefault', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#massmail-content-default-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Default templates</h1>

<p>You may use these templates for your purpose by editing them.</p>

<?php/* echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
*/?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'massmail-content-default-grid',
	'dataProvider'=>$model->search(),
	'htmlOptions'=>array('style'=>'cursor: pointer;'),
    'selectionChanged'=>"function(id){window.location='" . Yii::app()->urlManager->createUrl('massmailContentDefault/view', array('id'=>'')) . "' + $.fn.yiiGridView.getSelection(id);}",

	'filter'=>$model,
	'columns'=>array(
		'id',
		'subject',
		//'massmail_body',
		//'entry_date',
		//'update_date',
		'status',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
