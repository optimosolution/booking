<?php
/* @var $this ShopController */
/* @var $model Shop */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

                    <?php echo $form->textField($model,'id',array('span'=>5,'maxlength'=>10)); ?>

                    <?php echo $form->textField($model,'company',array('span'=>5)); ?>

                    <?php echo $form->textField($model,'title',array('span'=>5,'maxlength'=>150)); ?>

                    <?php echo $form->textField($model,'start_hour',array('span'=>5)); ?>

                    <?php echo $form->textField($model,'end_hour',array('span'=>5)); ?>

                    <?php echo $form->textField($model,'country',array('span'=>5)); ?>

                    <?php echo $form->textField($model,'state',array('span'=>5)); ?>

                    <?php echo $form->textField($model,'city',array('span'=>5)); ?>

                    <?php echo $form->textField($model,'address',array('span'=>5,'maxlength'=>250)); ?>

                    <?php echo $form->textField($model,'email',array('span'=>5,'maxlength'=>150)); ?>

                    <?php echo $form->textField($model,'phone',array('span'=>5,'maxlength'=>100)); ?>

                    <?php echo $form->textField($model,'fax',array('span'=>5,'maxlength'=>100)); ?>

                    <?php echo $form->textField($model,'website',array('span'=>5,'maxlength'=>150)); ?>

                    <?php echo $form->textField($model,'shop_picture',array('span'=>5,'maxlength'=>250)); ?>

                    <?php echo $form->textField($model,'published',array('span'=>5)); ?>

        <div class="form-actions">
        <?php echo CHtml::submitButton('Search'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->