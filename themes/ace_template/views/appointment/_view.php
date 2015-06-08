<?php
/* @var $this AppointmentController */
/* @var $data Appointment */
?>

<div class="view" style="margin-bottom:10px; border-bottom:1px dotted; padding:10px;">

    	
	<b><?php echo CHtml::encode($data->getAttributeLabel('customer_id')); ?>:</b>
	<?php echo CHtml::encode(User::get_user_name($data->customer_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('company_id')); ?>:</b>
	<?php echo CHtml::encode(Company::get_company_name($data->company_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('shop_id')); ?>:</b>
	<?php echo CHtml::encode(Shop::get_shop($data->shop_id)); ?>
	<br />

	
	<b><?php echo CHtml::encode($data->getAttributeLabel('staff_id')); ?>:</b>
	<?php echo CHtml::encode(Staff::get_user_name($data->staff_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('service_id')); ?>:</b>
	<?php echo CHtml::encode(Service::get_service_name($data->service_id)); ?>
	<br />

	
	<b><?php echo CHtml::encode($data->getAttributeLabel('appoint_date')); ?>:</b>
	<?php echo CHtml::encode($data->appoint_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('appoint_time')); ?>:</b>
	<?php echo CHtml::encode($data->appoint_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total_cost')); ?>:</b>
	<?php echo CHtml::encode($data->total_cost)." .".Currency::get_currency_short_code(Shop::get_currency_id($data->shop_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('note')); ?>:</b>
	<?php echo CHtml::encode($data->note); ?>
	<br />
<?php /*

	<b><?php echo CHtml::encode($data->getAttributeLabel('service_category')); ?>:</b>
	<?php echo CHtml::encode($data->service_category); ?>
	<br />

<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	

	*/ ?>

</div>