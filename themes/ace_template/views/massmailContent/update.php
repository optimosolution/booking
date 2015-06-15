<?php
/* @var $this MassmailContentController */
/* @var $model MassmailContent */

$this->breadcrumbs=array(
	'Massmail Contents'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List MassmailContent', 'url'=>array('index')),
	array('label'=>'Create MassmailContent', 'url'=>array('create')),
	array('label'=>'View MassmailContent', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage MassmailContent', 'url'=>array('admin')),
);
?>

<h1>Update MassmailContent <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>