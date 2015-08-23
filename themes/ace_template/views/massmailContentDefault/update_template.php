<?php
/* @var $this MassmailContentDefaultController */
/* @var $model MassmailContentDefault */

$this->breadcrumbs=array(
	'Massmail Content Defaults'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List MassmailContentDefault', 'url'=>array('index')),
	array('label'=>'Create MassmailContentDefault', 'url'=>array('create')),
	array('label'=>'View MassmailContentDefault', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage MassmailContentDefault', 'url'=>array('admin')),
);
?>

<h1>Update default email template for your use</h1>

<?php echo $this->renderPartial('update_template_form', array('model'=>$model)); ?>