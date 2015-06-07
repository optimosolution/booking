<?php
/* @var $this AppointmentController */
/* @var $model Appointment */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

                    <?php echo $form->textField($model,'id',array('span'=>5)); ?>

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
        <?php echo CHtml::submitButton('Search'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->