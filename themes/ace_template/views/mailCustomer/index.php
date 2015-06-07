<?php
/* @var $this MailCustomerController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Mail Customers',
);

$this->menu=array(
	array('label'=>'Create MailCustomer', 'url'=>array('create')),
	array('label'=>'Manage MailCustomer', 'url'=>array('admin')),
);
?>

<h1>Mail Customers</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
