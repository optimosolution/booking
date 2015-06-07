<?php
/* @var $this StaffServiceController */
/* @var $model StaffService */

$this->breadcrumbs=array(
	'Staff Services'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List StaffService', 'url'=>array('index')),
	array('label'=>'Manage StaffService', 'url'=>array('admin')),
);
?>

<h1>Create StaffService</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>