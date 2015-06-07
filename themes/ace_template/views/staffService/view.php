<?php
/* @var $this StaffServiceController */
/* @var $model StaffService */

$this->breadcrumbs=array(
	'Staff Services'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List StaffService', 'url'=>array('index')),
	array('label'=>'Create StaffService', 'url'=>array('create')),
	array('label'=>'Update StaffService', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete StaffService', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage StaffService', 'url'=>array('admin')),
);
?>

<h1>View StaffService #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'company_id',
		'shop_id',
		'user_id',
		'servic_id',
		'time_required',
		'price',
		'note',
	),
)); ?>
