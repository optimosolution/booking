<?php
/* @var $this CustomerController */
/* @var $model Customer */
?>

<?php
$this->breadcrumbs=array(
	'Customers'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Customer', 'url'=>array('index')),
	array('label'=>'Create Customer', 'url'=>array('create')),
	array('label'=>'Update Customer', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Customer', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Customer', 'url'=>array('admin')),
);
?>

<h1>View Customer #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'name',
		'username',
		'email',
		'password',
		'registerDate',
		'lastvisitDate',
		'activation',
		'group_id',
		'address',
		'country',
		'state',
		'city',
		'phone',
		'mobile',
		'fax',
		'website',
		'profile_picture',
		'company',
		'shop_id',
		'storeowner',
		'user_type',
		'status',
	),
)); ?>