<?php
/* @var $this CustomerController */
/* @var $model Customer */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

                    <?php echo $form->textField($model,'id',array('span'=>5)); ?>

                    <?php echo $form->textField($model,'name',array('span'=>5,'maxlength'=>255)); ?>

                    <?php echo $form->textField($model,'username',array('span'=>5,'maxlength'=>150)); ?>

                    <?php echo $form->textField($model,'email',array('span'=>5,'maxlength'=>100)); ?>

                            <?php echo $form->textField($model,'registerDate',array('span'=>5)); ?>

                    <?php echo $form->textField($model,'lastvisitDate',array('span'=>5)); ?>

                    <?php echo $form->textField($model,'activation',array('span'=>5,'maxlength'=>100)); ?>

                    <?php echo $form->textField($model,'group_id',array('span'=>5)); ?>

                    <?php echo $form->textField($model,'address',array('span'=>5,'maxlength'=>250)); ?>

                    <?php echo $form->textField($model,'country',array('span'=>5)); ?>

                    <?php echo $form->textField($model,'state',array('span'=>5)); ?>

                    <?php echo $form->textField($model,'city',array('span'=>5)); ?>

                    <?php echo $form->textField($model,'phone',array('span'=>5,'maxlength'=>100)); ?>

                    <?php echo $form->textField($model,'mobile',array('span'=>5,'maxlength'=>100)); ?>

                    <?php echo $form->textField($model,'fax',array('span'=>5,'maxlength'=>100)); ?>

                    <?php echo $form->textField($model,'website',array('span'=>5,'maxlength'=>150)); ?>

                    <?php echo $form->textField($model,'profile_picture',array('span'=>5,'maxlength'=>250)); ?>

                    <?php echo $form->textField($model,'company',array('span'=>5)); ?>

                    <?php echo $form->textField($model,'shop_id',array('span'=>5)); ?>

                    <?php echo $form->textField($model,'storeowner',array('span'=>5)); ?>

                    <?php echo $form->textField($model,'user_type',array('span'=>5)); ?>

                    <?php echo $form->textField($model,'status',array('span'=>5)); ?>

        <div class="form-actions">
        <?php echo CHtml::submitButton('Search'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->