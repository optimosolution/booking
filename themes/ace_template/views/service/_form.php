<?php
/* @var $this ServiceController */
/* @var $model Service */
/* @var $form TbActiveForm */
?>
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'service-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation'=>false,
    'htmlOptions' => array(
                    'enctype' => 'multipart/form-data',
                    'class' => 'form-horizontal',
                ), //uni
));     
 ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<div class="form-group marginBot10px">
     
    <?php  
    if(!empty($_GET['shop_id'])) { 
        echo $form->hiddenField($model, 'shop', array('value'=>$_GET['shop_id'],'span' => 5, 'maxlength' => 200)); 
        }else{ 
        echo $form->labelEx($model,'shop', array('class' =>'col-sm-2 control-label no-padding-right'));
        echo '<div class="col-sm-9">';
        echo $form->dropDownList($model, 'shop', CHtml::listData(Shop::model()->findAll(array('condition' => 'published=1 AND company=' . Yii::app()->user->company, "order" => "title")), 'id', 'title'), array('empty' => '--please select--', 'class' => 'span12'));

        echo CHtml::link('<i class="icon-plus"></i> Add Shop', array('shop/create'), array('id' => 'popup', 'class' => 'btn btn-mini iframe','style'=>'margin-left:10px !important;'));
    } ?>
        <?php echo $form->error($model,'shop'); ?>   
        
    </div>
 


<div class="form-group marginBot10px">
    <?php echo $form->labelEx($model,'category', array('class' =>'col-sm-2 control-label no-padding-right')); ?>
    <div class="col-sm-9">
        <?php echo $form->dropDownList($model, 'category', CHtml::listData(ServiceCategory::model()->findAll(array('condition' => 'published=1 AND company=' . Yii::app()->user->company, "order" => "title")), 'id', 'title'), array('empty' => '--please select--', 'class' => 'span5')); ?>
        <?php echo $form->error($model,'category'); ?>   
        <?php echo CHtml::link('<i class="icon-plus"></i> Add Category', array('serviceCategory/create'), array('id' => 'popup','class' => 'btn  btn-mini iframe','style'=>'margin-left:10px !important;')); ?>

     </div>
</div>
  
<div class="form-group marginBot10px">
    <?php echo $form->labelEx($model,'title', array('class' =>'col-sm-2 control-label no-padding-right')); ?>
    <div class="col-sm-9">
        <?php echo $form->textField($model, 'title', array('span' => 5, 'maxlength' => 200)); ?>
        <?php echo $form->error($model,'title'); ?>   
      </div>
</div>

<div class="form-group marginBot10px">
    <?php echo $form->labelEx($model,'cost', array('class' =>'col-sm-2 control-label no-padding-right')); ?>
    <div class="col-sm-9">
        <?php echo $form->textField($model, 'cost', array('span' => 5, 'maxlength' => 200)); ?>
        <?php echo $form->error($model,'cost'); ?>   
      </div>
</div>

<div class="form-group marginBot10px">
    <?php echo $form->labelEx($model,'required_time', array('class' =>'col-sm-2 control-label no-padding-right')); ?>
    <div class="col-sm-9">
        <?php echo $form->textField($model, 'required_time', array('span' => 5, 'maxlength' => 200)); ?>
        <?php echo $form->error($model,'required_time'); ?>   
      </div>
</div>

<div class="form-group marginBot10px">
    <?php echo $form->labelEx($model,'Sample Photo', array('class' =>'col-sm-2 control-label no-padding-right')); ?>
    <div class="col-sm-9">
        <?php echo $form->fileField($model, 'model_photo', array('span' => 5, 'maxlength' => 200)); ?>
        <?php echo $form->error($model,'model_photo'); ?>   
      </div>
</div>

<div class="form-group marginBot10px">
    <?php echo $form->labelEx($model,'published', array('class' =>'col-sm-2 control-label no-padding-right')); ?>
    <div class="col-sm-9">
       <?php echo $form->dropDownList($model, 'published', array('1' => 'Yes', '0' => 'No'), array('class' => 'span2')); ?>
        <?php echo $form->error($model,'published'); ?>   
      </div>
</div>
<div class="form-group marginBot10px">
    <?php echo $form->labelEx($model,'details', array('class' =>'col-sm-2 control-label no-padding-right')); ?>
    <div class="col-sm-9">
        <?php echo $form->textArea($model, 'details', array('rows' => 6, 'span' => 5)); ?>
        <?php echo $form->error($model,'details'); ?>   
      </div>
</div>
 
<div class="form-actions">
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-primary btn-mini iframe', 'style' => 'margin-left: 12px; margin-top: 20px; padding: 6px 35px;')); ?>
</div>
<?php $this->endWidget(); ?>