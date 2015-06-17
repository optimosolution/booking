<?php
/* @var $this MassmailController */
/* @var $model Massmail */
/* @var $form TbActiveForm */
?>

<div class="form">
    <?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'massmail-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation'=>false,
    'action' => Yii::app()->createUrl('massmail/mailSend'),
    'htmlOptions' => array(
                    'enctype' => 'multipart/form-data',
                    'class' => 'form-horizontal',
                ), //uni
));     
 ?>
    <p class="help-block">Fields with <span class="required">*</span> are required.</p>
    <?php  echo $form->errorSummary($model); ?>
    <br/> <br/>
    <div class="form-group marginBot10px">
        <?php echo $form->labelEx($model,'Select Email Subject', array('class' =>'col-sm-2 control-label no-padding-right')); ?>
        <div class="col-sm-9">
        <?php echo $form->dropDownList($model, 'mail_content_id', CHtml::listData(MassMailContent::model()->findAll(array('condition' => 'status=1 AND shop_id='.Yii::app()->user->shop_id, "order" => "subject")), 'id', 'subject'), array('empty' => '--please select--', 'class' => 'span12 input-large', 'options' => array(), 'label' => false)); ?>
       
        <?php echo $form->error($model,'mail_content_id'); ?>       
        </div>
    </div>

    <div class="form-group marginBot10px">
     <?php echo $form->labelEx($model, 'message_body', array('class' =>'col-sm-2 control-label no-padding-right')); ?>
     <div class="col-sm-9">
    <?php
        $this->widget('application.extensions.yii-ckeditor.CKEditorWidget', array(
            'model' => $model,
            'attribute' => 'message_body',
            // editor options http://docs.ckeditor.com/#!/api/CKEDITOR.config
            'config' => array(
                'language' => 'en',
            //'toolbar' => 'Basic',
            ),
        ));
        
        ?>
       </div>
    </div>  
        
    <div class="form-actions">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Send Email to All' : 'Save' , array('class' => 'btn btn-primary btn-mini iframe', 'style' => 'margin-left: 12px; margin-top: 0; padding: 6px 35px;')); ?>
    </div>
    <?php $this->endWidget(); ?>
</div><!-- form -->