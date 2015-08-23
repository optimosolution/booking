<?php
/* @var $this MassmailContentController */
/* @var $model MassmailContent */

$this->breadcrumbs=array(
	'Massmail Contents'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MassmailContent', 'url'=>array('index')),
	array('label'=>'Create MassmailContent', 'url'=>array('create')),
	array('label'=>'Update MassmailContent', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MassmailContent', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MassmailContent', 'url'=>array('admin')),
);
?>
<div>
<h1 style="width:70%; float:left;">View MassmailContent #<?php echo $model->id; ?></h1>
<?php echo CHtml::link('<i class="icon-edit"></i> Edit', array('update', 'id' => $model->id), array('class' => 'btn btn-info btn-mini', 'style'=>'width:10%; float:right; margin:10px 10px 00;')); ?>
</div>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'subject',
 		array(
            'name'=> 'details',
            'type'=> 'raw',
            'value'=> $model->massmail_body,
            'type'=>'html',
        ),
		'entry_date',
		'update_date',
	),
)); ?>
