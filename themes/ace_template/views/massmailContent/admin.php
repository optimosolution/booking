<?php
/* @var $this MassmailContentController */
/* @var $model MassmailContent */

$this->breadcrumbs=array(
	'Massmail Contents'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List MassmailContent', 'url'=>array('index')),
	array('label'=>'Create MassmailContent', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#massmail-content-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Massmail Contents</h1>

 

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'massmail-content-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
                'header'=>'Sl.',
                'value'=>'$this->grid->dataProvider->pagination->offset + $row+1',       //  row is zero based
                'htmlOptions' => array('style' => "text-align:center; width:50px !important;", 'title' => 'ID'),
        ),
	/*	'id', */
		//'subject',
		array(
	                'name' => 'subject',
	                'value' => '$data->subject',
	                'htmlOptions' => array('style' => "text-align:left; width:350px;"),
        ),
		array(
	                'name' => 'subject',
	                'value' => '$data->massmail_body',
	                'type' => 'html',
	                'htmlOptions' => array('style' => "text-align:left; width:350px;"),
        ),
		 
		'entry_date',
		'update_date',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
