<?php
/* @var $this StaffController */
/* @var $model Staff */

//Find the Company Name of Current user:
$company_id=Yii::app()->user->company;


$this->breadcrumbs=array(
	'Staff'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Staff', 'url'=>array('index')),
	array('label'=>'Create Staff', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#staff-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Staff</h1>

 

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php 
 if(!empty($_GET['group_id'])) { 	
	$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'staff-grid',
	//'dataProvider'=>$model->search(),
	'dataProvider'=>$model->search(array('condition'=>'company='.$company_id.' AND group_id='.$_GET['group_id'] )),
	'htmlOptions'=>array('style'=>'cursor: pointer;'),
	'selectionChanged'=>"function(id){window.location='" . Yii::app()->urlManager->createUrl('staff/view', array('id'=>'')) . "' + $.fn.yiiGridView.getSelection(id);}",
	
	'filter'=>$model,
	'columns'=>array(
		array(
                'header'=>'Sl.',
                'value'=>'$this->grid->dataProvider->pagination->offset + $row+1',       //  row is zero based
                'htmlOptions' => array('style' => "text-align:center; width:50px !important;", 'title' => 'ID'),
        ),
		array(
                    'name' => 'profile_picture',
                    'type' => 'raw',
                    'value' => 'Staff::get_profile_picture($data->id)',
                    'htmlOptions' => array('style' => "text-align:left;width:50px;", 'title' => 'Profile Pic', 'class' => 'img-rounded'),
                ),
		'name',
		array(
                'name' => 'company',
                'type' => 'raw',
                'value' => 'Company::get_company_name($data->company)',  
                //'filter' => CHtml::activeDropDownList($model, 'company', CHtml::listData(Company::model()->findAll(array("order" => "company_name")), 'id', 'company_name'), array('empty' => 'All')),
                'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Company'),
                ),
		array(
                'name' => 'shop_id',
                'type' => 'raw',
                'value' => 'Shop::get_shop($data->shop_id)',  
                'filter' => CHtml::activeDropDownList($model, 'shop_id', CHtml::listData(Shop::model()->findAll(array('condition' => 'published=1 AND company=' . Yii::app()->user->company, "order" => "id")), 'id', 'title'), array('empty' => 'All')),
                'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Shop Name'),
                ),
		array(
                'name' => 'Employee Type',
                'type' => 'raw',
                'value' => 'UserGroup::get_user_group($data->group_id)',  
                'filter' => CHtml::activeDropDownList($model, 'group_id', CHtml::listData(UserGroup::model()->findAll(array("order" => "id")), 'id', 'title'), array('empty' => 'All')),
                'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Employee Type'),
                ),
		'email',
		'phone',
		/*'status',
		'username',
		'password',
		'registerDate',
		'lastvisitDate',
		'activation',
		'group_id',
		'address',
		'country',
		'state',
		'city',
		
		'mobile',
		'fax',
		'website',
		
		'company',
		'shop_id',
		'storeowner',
		'user_type',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
));
}else{
	$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'staff-grid',
	//'dataProvider'=>$model->search(),
	'dataProvider'=>$model->search(array('condition'=>'company='.$company_id )),
	'filter'=>$model,
	'columns'=>array(
		array(
                    'name' => 'profile_picture',
                    'type' => 'raw',
                    'value' => 'Staff::get_profile_picture($data->id)',
                    'htmlOptions' => array('style' => "text-align:left;width:50px;", 'title' => 'Profile Pic', 'class' => 'img-rounded'),
                ),
		'name',
		array(
                'name' => 'company',
                'type' => 'raw',
                'value' => 'Company::get_company_name($data->company)', //This part is Not working
                //'filter' => CHtml::activeDropDownList($model, 'company', CHtml::listData(Company::model()->findAll(array("order" => "company_name")), 'id', 'company_name'), array('empty' => 'All')),
                'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Company'),
                ),
		array(
                'name' => 'shop_id',
                'type' => 'raw',
                'value' => 'Shop::get_shop($data->shop_id)', //This part is Not working
                'filter' => CHtml::activeDropDownList($model, 'shop_id', CHtml::listData(Shop::model()->findAll(array('condition' => 'published=1 AND company=' . Yii::app()->user->company, "order" => "id")), 'id', 'title'), array('empty' => 'All')),
                'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Shop Name'),
                ),
		array(
                'name' => 'Employee Type',
                'type' => 'raw',
                'value' => 'UserGroup::get_user_group($data->group_id)', //This part is Not working
                'filter' => CHtml::activeDropDownList($model, 'group_id', CHtml::listData(UserGroup::model()->findAll(array("order" => "id")), 'id', 'title'), array('empty' => 'All')),
                'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Employee Type'),
                ),
		'email',
		'phone',
		/*'status',
		'username',
		'password',
		'registerDate',
		'lastvisitDate',
		'activation',
		
		'address',
		'country',
		'state',
		'city',
		
		'mobile',
		'fax',
		'website',
		
		'company',
		'shop_id',
		'storeowner',
		'user_type',
		
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
));
} ?>
