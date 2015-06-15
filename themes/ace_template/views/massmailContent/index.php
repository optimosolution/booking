<?php
/* @var $this MassmailContentController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Massmail Contents',
);

$this->menu=array(
	array('label'=>'Create MassmailContent', 'url'=>array('create')),
	array('label'=>'Manage MassmailContent', 'url'=>array('admin')),
);
?>

<h1>Massmail Contents</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
