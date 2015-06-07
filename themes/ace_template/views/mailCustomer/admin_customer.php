<?php
/* @var $this MailCustomerController */
/* @var $model MailCustomer */

$this->breadcrumbs=array(
	'Mail Customers'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List MailCustomer', 'url'=>array('index')),
	array('label'=>'Create MailCustomer', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#mail-customer-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Your Messages</h1>

 

<?php
$user_id=Yii::app()->user->id;
$shop_id=Yii::app()->user->shop_id;
$group_id=Yii::app()->user->group_id;
$company_id=Yii::app()->user->company;

 echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'mail-customer-grid',
	'dataProvider'=>$model->search(array('condition'=>'customer_id='.$user_id.' AND mail_status=1')),
	//'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
                'header'=>'Sl.',
                'value'=>'$this->grid->dataProvider->pagination->offset + $row+1',       //  row is zero based
                'htmlOptions' => array('style' => "text-align:center; width:50px !important;", 'title' => 'ID'),
        ),
		 array(
                'name' => 'customer_id',
                //'label'=>'Customer Name',
                'type' => 'raw',
                'value' => 'User::get_user_name($data->customer_id)', //This part is Not working
                //'filter' => CHtml::activeDropDownList($model, 'customer_id', CHtml::listData(User::model()->findAll(array("order" => "name")), 'id', 'name'), array('empty' => 'All')),
                'htmlOptions' => array('style' => "text-align:left;", 'label' => 'Customer Name'),
                ),
		  array(
                'name' => 'store_owner',
                'type' => 'raw',
                'value' => 'User::get_user_name($data->store_owner)', //This part is Not working
                'filter' => CHtml::activeDropDownList($model, 'store_owner', CHtml::listData(User::model()->findAll(array("order" => "name")), 'id', 'name'), array('empty' => 'All')),
                'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Sent By'),
                ),
  		 array(
                'name' => 'send_on',
                'type' => 'raw',
                'value' => '$data->send_on', //This part is Not working
                'filter' => CHtml::activeDropDownList($model, 'send_on', CHtml::listData(MailCustomer::model()->findAll(array("order" => "send_on")), 'id', 'send_on'), array('empty' => 'All')),
                'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Send on'),
                ),
			
		'subject',
		'message_body',
		
		/*
		'store_owner',	'created_by',
		'created_on',
		'modified_by',
		'modified_on',
		'user_status',
		
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
			   'url' => 'Yii::app()->createUrl("/mailCustomer/viewCustomer", array("id"=>$data["id"]))',
			   'options' => array('class' => 'btn btn-xs btn-info fa fa-eye'),
			  ),
			  'update' => array(
			   'label' => '',
			   'imageUrl' => '',
			   'url' => 'Yii::app()->createUrl("/mailCustomer/update", array("id"=>$data["id"]))',
			   'options' => array('class' => 'btn btn-xs btn-info fa fa-pencil', 'style'=>'display:none;'),
			  ),
			  'delete' => array(
			   'label' => '',
			   'imageUrl' => '',
			   'url' => 'Yii::app()->createUrl("/mailCustomer/delete", array("id"=>$data["id"]))',
			   'options' => array('class' => 'btn btn-xs btn-danger fa fa-trash-o' ,'style'=>'display:none;'),
			  ),
			 ),
			),
	),
)); ?>
