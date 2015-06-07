<?php
/* @var $this StaffServiceController */
/* @var $model StaffService */

$this->breadcrumbs=array(
	'Staff Services'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List StaffService', 'url'=>array('index')),
	array('label'=>'Create StaffService', 'url'=>array('create')),
	array('label'=>'View StaffService', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage StaffService', 'url'=>array('admin')),
);
?>

<h1>Update StaffService <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>