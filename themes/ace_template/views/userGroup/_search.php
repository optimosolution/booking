<?php
/* @var $this UserGroupController */
/* @var $model UserGroup */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

                    <?php echo $form->textField($model,'id',array('span'=>5,'maxlength'=>10)); ?>

                    <?php echo $form->textField($model,'title',array('span'=>5,'maxlength'=>100)); ?>

                    <?php echo $form->textArea($model,'details',array('rows'=>6,'span'=>8)); ?>

        <div class="form-actions">
        <?php echo CHtml::submitButton('Search'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->