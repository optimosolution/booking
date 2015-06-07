<?php
/* @var $this StaffController */
/* @var $model Staff */

$this->breadcrumbs=array(
	'Staff'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Staff', 'url'=>array('index')),
	array('label'=>'Create Staff', 'url'=>array('create')),
	array('label'=>'Update Staff', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Staff', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Staff', 'url'=>array('admin')),
);
?>

<h1>View Staff #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'profile_picture',
		'id',
		'name',
		'username',
		'email',
		array(
                'name' => 'company',
                'type' => 'raw',
                'value' => Company::get_company_name($model->company), 
                 'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Company Name'),
                ),
 		array(
                'name' => 'Store Name',
                'type' => 'raw',
                'value' => Shop::get_shop($model->shop_id), 
                 'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Store Name'),
                ),
  		array(
                'name' => 'Employee Type',
                'type' => 'raw',
                'value' => UserGroup::get_user_group($model->group_id), 
                 'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Employee Type'),
                ),
		'address',
 			array(
                'name' => 'Country',
                'type' => 'raw',
                'value' => Country::get_user_group($model->country), 
                 'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Country Name'),
                ),
		'state',
		'city',
		'phone',
		'mobile',
		'fax',
		'website',
		
		
		'registerDate',
		'lastvisitDate',
		'status',
		//'storeowner','user_type','password','activation',
	),
)); ?>
