<?php
/* @var $this ServiceController */
/* @var $model Service */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

                    <?php echo $form->textField($model,'id',array('span'=>5)); ?>

                    <?php echo $form->textField($model,'company',array('span'=>5)); ?>

                    <?php echo $form->textField($model,'owner',array('span'=>5)); ?>

                    <?php echo $form->textField($model,'shop',array('span'=>5)); ?>

                    <?php echo $form->textField($model,'category',array('span'=>5)); ?>

                    <?php echo $form->textField($model,'title',array('span'=>5,'maxlength'=>200)); ?>

                    <?php echo $form->textArea($model,'details',array('rows'=>6,'span'=>8)); ?>

                    <?php echo $form->textField($model,'cost',array('span'=>5)); ?>

                    <?php echo $form->textField($model,'required_time',array('span'=>5,'maxlength'=>50)); ?>

                    <?php echo $form->textField($model,'model_photo',array('span'=>5,'maxlength'=>250)); ?>

                    <?php echo $form->textField($model,'barber',array('span'=>5,'maxlength'=>100)); ?>

                    <?php echo $form->textField($model,'published',array('span'=>5)); ?>

        <div class="form-actions">
        <?php echo CHtml::submitButton('Search'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->