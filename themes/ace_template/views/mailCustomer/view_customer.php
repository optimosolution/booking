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
            'lebel'=>'You',
            'value' => User::get_user_name($model->customer_id),
        ),
		'subject',
		'message_body',
		//'created_by',
		//'created_on',
		//'modified_by',
		//'modified_on',
		//'customer_id',

		array('label'=>'Attached File', 
			'type'=>'raw', 
			'value'=>CHtml::link($model->attached_file, array("mailCustomer/download/",'id'=> $model->id)),
			'htmlOptions' => array(
			        'style' => 'font-weight:bold !important;',
			    ),
			),
	),
)); ?>


	<?php 
	/*                               
	    $arrayY = Yii::app()->db->createCommand()
	    ->select('*')
	    ->from('{{mail_customer}}')
	     ->where('id='.$model->id)
 	    ->queryAll();
	    foreach ($arrayY as $key => $valuesY) {

	    if (!empty($valuesY['attached_file'])) {
	    	echo "<p style='font-weight:bold;'>Attached File:</p><a target='_blank' href='uploads/email_attachment/".$valuesY['attached_file']."'>".$valuesY['attached_file']."</a>";
	    }
	} */
	?>
 

<div class="widget-foot">
    <!-- Footer goes here -->
    <?php //echo CHtml::link('<i class="icon-plus"></i> Reply', array('create', 'store_owner'=>$model->store_owner), array('class' => 'btn btn btn-success', 'style'=>'width:150px; float:left; margin-right:10px; margin-top:20px;')); ?>
    <?php echo CHtml::link('<i class="icon-plus"></i> Create New Message', array('create'), array('class' => 'btn btn btn-primary', 'style'=>' float:left; margin-right:10px; margin-top:20px;')); ?>
     

</div>
