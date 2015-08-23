<?php
/* @var $this MassmailContentDefaultController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Massmail Content Defaults',
);

$this->menu=array(
	array('label'=>'Create MassmailContentDefault', 'url'=>array('create')),
	array('label'=>'Manage MassmailContentDefault', 'url'=>array('admin')),
);
?>

<h1>Sample Email Templates</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
