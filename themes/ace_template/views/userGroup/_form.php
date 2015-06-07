<?php
/* @var $this UserGroupController */
/* @var $model UserGroup */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-group-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

            <?php echo $form->textField($model,'title',array('span'=>5,'maxlength'=>100)); ?>

            <?php echo $form->textArea($model,'details',array('rows'=>6,'span'=>8)); ?>

        <div class="form-actions">
       <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
        
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->