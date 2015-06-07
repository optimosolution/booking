<?php
/* @var $this UserController */
/* @var $model User */


$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#user-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1 style="width:70%">List of Users</h1>

<?php /* echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn ')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<?php */ ?>

<?php $this->widget('zii.widgets.grid.CGridView',array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
                'header'=>'Sl.',
                'value'=>'$this->grid->dataProvider->pagination->offset + $row+1',       //  row is zero based
                'htmlOptions' => array('style' => "text-align:center; width:50px !important;", 'title' => 'ID'),
        ),
		'id',
		'name',
		'username',
		'email',
		//'group_id',
		 array(
                'name' => 'group_id',
                'type' => 'raw',
                'value' => 'UserGroup::get_user_group($data->group_id)',
                'filter' => CHtml::activeDropDownList($model, 'group_id', CHtml::listData(UserGroup::model()->findAll(array("order" => "title")), 'id', 'title'), array('empty' => 'All')),
                'htmlOptions' => array('style' => "text-align:left;", 'title' => 'User Group'),
                ),
		//'company',
		 array(
                'name' => 'company',
                'type' => 'raw',
                'value' => 'Company::get_company_name($data->company)', //This part is Not working
                'filter' => CHtml::activeDropDownList($model, 'company', CHtml::listData(Company::model()->findAll(array("order" => "company_name")), 'id', 'company_name'), array('empty' => 'All')),
                'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Company'),
                ),
		//'storeowner',
		array(
                    'name' => 'storeowner',
                    'value' => '$data->storeowner?Yii::t(\'app\',\'Yes\'):Yii::t(\'app\', \'No\')',
                    'filter' => array('' => Yii::t('app', 'All'), '0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')),
                    'htmlOptions' => array('style' => "text-align:center;"),
                ),
		//'status',
		array(
                    'name' => 'status',
                    'value' => '$data->status?Yii::t(\'app\',\'Active\'):Yii::t(\'app\', \'InActive\')',
                    'filter' => array('' => Yii::t('app', 'All'), '0' => Yii::t('app', 'InActive'), '1' => Yii::t('app', 'Active')),
                    'htmlOptions' => array('style' => "text-align:center;"),
                ),
		/*
		'password',
		'registerDate',
		'lastvisitDate',
		'activation',
		'address',
		'country',
		'state',
		'city',
		'phone',
		'mobile',
		'fax',
		'website',
		'profile_picture',
		'user_type',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>