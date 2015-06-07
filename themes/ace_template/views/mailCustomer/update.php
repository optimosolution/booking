<?php
/* @var $this MailCustomerController */
/* @var $model MailCustomer */

$this->breadcrumbs=array(
	'Mail Customers'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List MailCustomer', 'url'=>array('index')),
	array('label'=>'Create MailCustomer', 'url'=>array('create')),
	array('label'=>'View MailCustomer', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage MailCustomer', 'url'=>array('admin')),
);
?>

<h1>Update MailCustomer <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>