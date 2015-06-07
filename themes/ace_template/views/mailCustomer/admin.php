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

<h1>Manage Mail Customers</h1>

 

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
	'dataProvider'=>$model->search(array('condition'=>'company='.$company_id.' AND shop_id='.$shop_id)),
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
                'type' => 'raw',
                'value' => 'User::get_user_name($data->customer_id)', //This part is Not working
                'filter' => CHtml::activeDropDownList($model, 'customer_id', CHtml::listData(User::model()->findAll(array("order" => "name")), 'id', 'name'), array('empty' => 'All')),
                'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Sent By'),
                ),
  		 array(
                'name' => 'send_on',
                'type' => 'raw',
                'value' => '$data->send_on', //This part is Not working
                'filter' => CHtml::activeDropDownList($model, 'send_on', CHtml::listData(MailCustomer::model()->findAll(array("order" => "send_on")), 'id', 'send_on'), array('empty' => 'All')),
                'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Sent By'),
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
			'class'=>'CButtonColumn',
		),
		
	),
)); ?>
