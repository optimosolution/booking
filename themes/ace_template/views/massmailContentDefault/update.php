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

<h1>Update MassmailContentDefault <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>