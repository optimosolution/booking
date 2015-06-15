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

<h1>View MassmailContent #<?php echo $model->id; ?></h1>

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
