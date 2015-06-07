<?php
/* @var $this MailCustomerController */
/* @var $model MailCustomer */

$this->breadcrumbs=array(
	'Mail Customers'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MailCustomer', 'url'=>array('index')),
	array('label'=>'Create MailCustomer', 'url'=>array('create')),
	array('label'=>'Update MailCustomer', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MailCustomer', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MailCustomer', 'url'=>array('admin')),
);
?>

<h1>View Email Details <?php //echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		'send_on',
		array(
            'name' => 'store_owner',
            'type' => 'raw',
            'lebel'=>'Message for',
            'value' => User::get_user_name($model->store_owner),
        ),
		//'user_status',
		array(
            'name' => 'customer_id',
            'type' => 'raw',
            'lebel'=>'Message Send By',
            'value' => User::get_user_name($model->customer_id),
        ),
		'subject',
		'message_body',
		//'created_by',
		//'created_on',
		//'modified_by',
		//'modified_on',
		array('label'=>'Attached File', 
			'type'=>'raw', 
			'value'=>CHtml::link($model->attached_file, array("mailCustomer/download/",'id'=> $model->id)),
			 'htmlOptions' => array(
			        'style' => 'font-weight:bold !important;',
			    ),
			),
	),
)); ?>

<div class="widget-foot">
    <!-- Footer goes here -->
    <?php echo CHtml::link('<i class="icon-plus"></i> Reply', array('createSowner', 'reference_mail'=>$model->id, 'reply_to'=>$model->customer_id), array('class' => 'btn btn btn-success', 'style'=>'width:150px; float:left; margin-right:10px; margin-top:20px;')); ?>
    <?php echo CHtml::link('<i class="icon-plus"></i> Create New Message', array('create'), array('class' => 'btn btn btn-primary', 'style'=>' float:left; margin-right:10px; margin-top:20px;')); ?>
    <?php //echo CHtml::link('<i class="icon-edit"></i> Edit', array('Reply', 'id' => $model->id), array('class' => 'btn btn-info btn-mini')); ?>
    

</div>
