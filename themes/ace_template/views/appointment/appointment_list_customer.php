<?php
/* @var $this AppointmentController */
/* @var $model Appointment */


$this->breadcrumbs=array(
	'Appointments'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Appointment', 'url'=>array('index')),
	array('label'=>'Create Appointment', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search_appointment', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#appointment-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<h1>Lists of Your Appointments</h1>
 

<?php
$user_id=Yii::app()->user->id;
/*$shop_id=Yii::app()->user->shop_id;
$group_id=Yii::app()->user->group_id;
$company_id=Yii::app()->user->company; */
	 
		$this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'appointment-grid',
		'dataProvider'=>$model->search(array('condition'=>'status=1 AND customer_id='.$user_id)),
		//'dataProvider'=>$model->search_appointment(),
		'filter'=>$model,
		'columns'=>array(
			array(
                'header'=>'Sl.',
                'value'=>'$this->grid->dataProvider->pagination->offset + $row+1',       //  row is zero based
                'htmlOptions' => array('style' => "text-align:center; width:50px !important;", 'title' => 'ID'),
       	 ),
			array(
	                'name' => 'customer_id',
	                'value' => 'User::get_user_name($data->customer_id)',
	                //'filter' => CHtml::activeDropDownList($model, 'customer_id', CHtml::listData(User::model()->findAll(array('condition' => 'group_id=8 AND company=' . Yii::app()->user->company.' AND shop_id=' . Yii::app()->user->shop_id, "order" => "name")), 'id', 'name'), array('empty' => 'All')),
	                'htmlOptions' => array('style' => "text-align:left; width:200px;"),
	            ),
			array(
	                'name' => 'shop_id',
	                'value' => 'Shop::get_shop($data->shop_id)',
	                //'filter' => CHtml::activeDropDownList($model, 'shop_id', CHtml::listData(Shop::model()->findAll(array('condition' => 'company=' . Yii::app()->user->company, "order" => "title")), 'id', 'title'), array('empty' => 'All')),
	                'htmlOptions' => array('style' => "text-align:left; width:150px;"),
	            ),
			array(
	                'name' => 'staff_id',
	                'value' => 'User::get_user_name($data->staff_id)',
	                'filter' => CHtml::activeDropDownList($model, 'staff_id', CHtml::listData(User::model()->findAll(array('condition' => 'group_id=7 AND company=' . Yii::app()->user->company.' AND shop_id=' . Yii::app()->user->shop_id, "order" => "name")), 'id', 'name'), array('empty' => 'All')),
	                'htmlOptions' => array('style' => "text-align:left; width:150px;"),
	            ),
	 		array(
	                'name' => 'service_id',
	                'value' => 'Service::get_service_name($data->service_id)',
	                 'filter' => CHtml::activeDropDownList($model, 'service_id', CHtml::listData(Service::model()->findAll(array('condition' => 'company=' . Yii::app()->user->company.' AND shop=' . Yii::app()->user->shop_id, "order" => "title")), 'id', 'title'), array('empty' => 'All')),
	                'htmlOptions' => array('style' => "text-align:left; width:150px;"),
	            ),
			'appoint_date',
			'appoint_time',
			'total_cost',
			/*array(
                    'name' => 'status',
                    'value' => '$data->status?Yii::t(\'app\',\'Active\'):Yii::t(\'app\', \'Inactive\')', //need to use this fileld from database table
                   //'filter' => array('' => Yii::t('app', 'All'), '0' => Yii::t('app', 'Inactive'), '1' => Yii::t('app', 'Active'), '2' => Yii::t('app', 'Done')),
                    'htmlOptions' => array('style' => "text-align:center;"),
                ),
			'id','company_id','end_time',
			'service_category',
			'note',
			*/
			array(
				 'header' => '',
				 'class' => 'CButtonColumn',
				 'htmlOptions' => array('style' => "text-align:center;width:100px;", 'class' => ''),
				 'template' => '{view} {update} {delete}',
				 'buttons' => array(
				  'view' => array(
				   'label' => '',
				   'imageUrl' => '',
				   'url' => 'Yii::app()->createUrl("/appointment/detailViewCustomer", array("id"=>$data["id"]))',
				   'options' => array('class' => 'btn btn-xs btn-info fa fa-eye'),
				  ),
				  'update' => array(
				   'label' => '',
				   'imageUrl' => '',
				   'url' => 'Yii::app()->createUrl("/appointment/update", array("id"=>$data["id"]))',
				   'options' => array('class' => 'btn btn-xs btn-info fa fa-pencil', 'style'=>' '),
				  ),
				  'delete' => array(
				   'label' => '',
				   'imageUrl' => '',
				   'url' => 'Yii::app()->createUrl("/appointment/delete", array("id"=>$data["id"]))',
				   'options' => array('class' => 'btn btn-xs btn-danger fa fa-trash-o' ,'style'=>' '),
				  ),
				 ),
				),	
		),
	)); 
 
?>	
 <?php echo CHtml::link('<i class="icon-plus"></i> Create New Appointment', array('create'), array('class' => 'btn btn-info btn-mini marginTop10px')); ?>

<?php /* echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
*/ ?>
<?php 
?>