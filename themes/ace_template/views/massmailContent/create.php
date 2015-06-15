<?php
/* @var $this MassmailContentController */
/* @var $model MassmailContent */

$this->breadcrumbs=array(
	'Massmail Contents'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List MassmailContent', 'url'=>array('index')),
	array('label'=>'Manage MassmailContent', 'url'=>array('admin')),
);
?>

<h1>Create MassmailContent</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>