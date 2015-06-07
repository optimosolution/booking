<?php
/* @var $this StaffServiceController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Staff Services',
);

$this->menu=array(
	array('label'=>'Create StaffService', 'url'=>array('create')),
	array('label'=>'Manage StaffService', 'url'=>array('admin')),
);
?>

<h1>Staff Services</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
