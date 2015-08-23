<?php
/* @var $this MassmailContentDefaultController */
/* @var $model MassmailContentDefault */

$this->breadcrumbs=array(
	'Massmail Content Defaults'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List MassmailContentDefault', 'url'=>array('index')),
	array('label'=>'Manage MassmailContentDefault', 'url'=>array('admin')),
);
?>

<h1>Create Default Templates</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>