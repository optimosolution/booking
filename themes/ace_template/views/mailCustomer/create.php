<?php
/* @var $this MailCustomerController */
/* @var $model MailCustomer */

$this->breadcrumbs=array(
	'Mail Customers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List MailCustomer', 'url'=>array('index')),
	array('label'=>'Manage MailCustomer', 'url'=>array('admin')),
);
?>

<h1>Send Message</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>