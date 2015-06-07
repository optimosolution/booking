<?php
/* @var $this AppointmentController */
/* @var $model Appointment */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'appointment-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

            <?php echo $form->textField($model,'company_id',array('span'=>5)); ?>

            <?php echo $form->textField($model,'shop_id',array('span'=>5)); ?>

            <?php echo $form->textField($model,'customer_id',array('span'=>5)); ?>

            <?php echo $form->textField($model,'staff_id',array('span'=>5)); ?>

            <?php echo $form->textField($model,'service_category',array('span'=>5)); ?>

            <?php echo $form->textField($model,'service_id',array('span'=>5)); ?>

            <?php echo $form->textField($model,'start_time',array('span'=>5)); ?>

            <?php echo $form->textField($model,'ent_time',array('span'=>5)); ?>

            <?php echo $form->textField($model,'total_cost',array('span'=>5)); ?>

            <?php echo $form->textArea($model,'note',array('rows'=>6,'span'=>8)); ?>

        <div class="form-actions">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
        
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->