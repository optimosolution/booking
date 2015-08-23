<?php
/* @var $this MassmailContentDefaultController */
/* @var $model MassmailContentDefault */

$this->breadcrumbs=array(
	'Massmail Content Defaults'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MassmailContentDefault', 'url'=>array('index')),
	array('label'=>'Create MassmailContentDefault', 'url'=>array('create')),
	array('label'=>'Update MassmailContentDefault', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MassmailContentDefault', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MassmailContentDefault', 'url'=>array('admin')),
);
?>

<h1>View MassmailContentDefault #<?php echo $model->id; ?></h1>

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
		'status',
	),
)); ?>

<div class="widget-foot">
    <!-- Footer goes here -->
     <?php echo CHtml::link('<i class="icon-plus"></i>Update Template', array('update', 'id'=>$model->id), array('class' => 'btn btn btn-primary', 'style'=>' float:left; margin-right:10px; margin-top:20px;')); ?>
    <?php //echo CHtml::link('<i class="icon-edit"></i> Edit', array('Reply', 'id' => $model->id), array('class' => 'btn btn-info btn-mini')); ?>
    

</div>
