<?php
/* @var $this CompanyController */
/* @var $model Company */
/* @var $form TbActiveForm */
?>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
    'id' => 'company-form',
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

<div class="form-group marginBot10px">
    <?php echo $form->labelEx($model,'company_name', array('class' =>'col-sm-2 control-label no-padding-right')); ?>
    <div class="col-sm-9">
        <?php echo $form->textField($model, 'company_name', array('span' => 5, 'maxlength' => 100)); ?>
        <?php echo $form->error($model,'company_name'); ?>       
    </div>
</div>

<div class="form-group marginBot10px">
    <?php echo $form->labelEx($model,'country', array('class' =>'col-sm-2 control-label no-padding-right')); ?>
    <div class="col-sm-9">
        <?php echo $form->dropDownList($model, 'country', CHtml::listData(Country::model()->findAll(array('condition' => 'published=1', "order" => "country_name")), 'id', 'country_name'), array('empty' => '--please select--', 'class' => 'span5')); ?>
        <?php echo $form->error($model,'country'); ?>       
    </div>
</div>

<div class="form-group marginBot10px">
    <?php echo $form->labelEx($model,'state', array('class' =>'col-sm-2 control-label no-padding-right')); ?>
    <div class="col-sm-9">
        <?php State::get_sate_edit('Company', 'state', $model->state); ?>        
         <?php echo $form->error($model,'state'); ?>       
    </div>
</div>
 

<div class="form-group marginBot10px">
    <?php echo $form->labelEx($model,'city', array('class' =>'col-sm-2 control-label no-padding-right')); ?>
    <div class="col-sm-9">
        <?php City::get_city_edit('Company', 'city', $model->city); ?>       
         <?php echo $form->error($model,'city'); ?>       
    </div>
</div>
 

 
<div class="form-group marginBot10px">
  
    <?php echo $form->labelEx($model,'address', array('class' =>'col-sm-2 control-label no-padding-right')); ?>
    <div class="col-sm-9">
         <?php echo $form->textArea($model, 'address', array('rows' => 2, 'span' => 5, 'maxlength' => 255)); ?>
        <?php echo $form->error($model,'address'); ?>       
    </div>
</div>


<div class="form-group marginBot10px">
    <?php echo $form->labelEx($model,'email', array('class' =>'col-sm-2 control-label no-padding-right')); ?>
    <div class="col-sm-9">
         <?php echo $form->textField($model, 'email', array('rows' => 2, 'span' => 5, 'maxlength' => 255)); ?>
        <?php echo $form->error($model,'email'); ?>       
    </div>
</div>



<div class="form-group marginBot10px">
    <?php echo $form->labelEx($model,'phone', array('class' =>'col-sm-2 control-label no-padding-right')); ?>
    <div class="col-sm-9">
         <?php echo $form->textField($model, 'phone', array('rows' => 2, 'span' => 5, 'maxlength' => 255)); ?>
        <?php echo $form->error($model,'phone'); ?>       
    </div>
</div>


<div class="form-group marginBot10px">
    <?php echo $form->labelEx($model,'fax', array('class' =>'col-sm-2 control-label no-padding-right')); ?>
    <div class="col-sm-9">
         <?php echo $form->textField($model, 'fax', array('rows' => 2, 'span' => 5, 'maxlength' => 255)); ?>
        <?php echo $form->error($model,'fax'); ?>       
    </div>
</div>


<div class="form-group marginBot10px">
    <?php echo $form->labelEx($model,'website', array('class' =>'col-sm-2 control-label no-padding-right')); ?>
    <div class="col-sm-9">
         <?php echo $form->textField($model, 'website', array('rows' => 2, 'span' => 5, 'maxlength' => 255)); ?>
        <?php echo $form->error($model,'website'); ?>       
    </div>
</div>

<div class="form-group marginBot10px">
    <?php echo $form->labelEx($model,'paypal username/email', array('class' =>'col-sm-2 control-label no-padding-right')); ?>
    <div class="col-sm-9">
         <?php echo $form->textField($model, 'paypal_username', array('rows' => 2, 'span' => 5, 'maxlength' => 255)); ?>
        <?php echo $form->error($model,'paypal_username'); ?>       
    </div>
</div>

<div class="form-group marginBot10px">
    <?php echo $form->labelEx($model,'paypal_password', array('class' =>'col-sm-2 control-label no-padding-right')); ?>
    <div class="col-sm-9">
         <?php echo $form->textField($model, 'paypal_password', array('rows' => 2, 'span' => 5, 'maxlength' => 255)); ?>
        <?php echo $form->error($model,'paypal_password'); ?>       
    </div>
</div>


<div class="form-group marginBot10px">
    <?php echo $form->labelEx($model,'paypal_signature', array('class' =>'col-sm-2 control-label no-padding-right')); ?>
    <div class="col-sm-9">
         <?php echo $form->textField($model, 'paypal_signature', array('rows' => 2, 'span' => 5, 'maxlength' => 255)); ?>
        <?php echo $form->error($model,'paypal_signature'); ?>       
    </div>
</div>


<div class="form-group marginBot10px">
    <?php echo $form->labelEx($model,'paypal_app_id', array('class' =>'col-sm-2 control-label no-padding-right')); ?>
    <div class="col-sm-9">
         <?php echo $form->textField($model, 'paypal_app_id', array('rows' => 2, 'span' => 5, 'maxlength' => 255)); ?>
        <?php echo $form->error($model,'paypal_app_id'); ?>       
    </div>
</div>



<div class="form-group marginBot10px">
    <?php echo $form->labelEx($model,'currency', array('class' =>'col-sm-2 control-label no-padding-right')); ?>
    <div class="col-sm-9">
        <?php echo $form->dropDownList($model, 'currency', CHtml::listData(Currency::model()->findAll(array('condition' => 'published=1', 'order' => 'currency_name')), 'id', 'currency_name'), array('empty' => '--please select--', 'class' => 'span5')); ?>
        <?php echo $form->error($model,'currency'); ?>       
    </div>
</div>


<div class="form-group marginBot10px">
    <?php echo $form->labelEx($model,'time_zone', array('class' =>'col-sm-2 control-label no-padding-right')); ?>
    <div class="col-sm-9">
         <?php echo $form->dropDownList($model, 'time_zone', CHtml::listData(Timezone::model()->findAll(array('condition' => '', 'order' => 'title')), 'id', 'title'), array('empty' => '--please select--', 'class' => 'span5')); ?>
        <?php echo $form->error($model,'time_zone'); ?>       
    </div>
</div>

<div class="form-group marginBot10px">
    <?php echo $form->labelEx($model,'company_logo', array('class' =>'col-sm-2 control-label no-padding-right')); ?>
    <div class="col-sm-9">
         <?php echo $form->fileField($model, 'company_logo', array('maxlength' => 255, 'class' => 'span12')); ?>
        <?php echo $form->error($model,'company_logo'); ?>       
    </div>
</div>

<div class="form-group marginBot10px">
    <?php echo $form->labelEx($model,'summary', array('class' =>'col-sm-2 control-label no-padding-right')); ?>
    <div class="col-sm-9">
         <?php echo $form->textArea($model, 'summary', array('rows' => 6, 'span' => 8)); ?>
        <?php echo $form->error($model,'summary'); ?>       
    </div>
</div>

<?php /* echo $form->textField($model, '', array('span' => 5, 'maxlength' => 100)); ?>
<?php echo $form->textField($model, '', array('span' => 5, 'maxlength' => 250)); ?>
<?php echo $form->textField($model, 'mobile', array('span' => 5, 'maxlength' => 250)); ?>
<?php echo $form->textField($model, '', array('span' => 5, 'maxlength' => 100)); ?>
<?php echo $form->textField($model, '', array('span' => 5, 'maxlength' => 150)); ?>
<?php echo $form->textField($model, 'paypal_username', array('span' => 5, 'maxlength' => 100)); ?>
<?php echo $form->textField($model, 'paypal_password', array('span' => 5, 'maxlength' => 100)); ?>
<?php echo $form->textField($model, 'paypal_signature', array('span' => 5, 'maxlength' => 150)); ?>
<?php echo $form->textField($model, 'paypal_app_id', array('span' => 5, 'maxlength' => 100)); ?>
<?php echo $form->fileField($model, 'company_logo', array('maxlength' => 255, 'class' => 'span12')); ?>
<?php echo $form->textArea($model, 'summary', array('rows' => 6, 'span' => 8)); */ ?>
<div class="" style="width:66%; margin:0 auto !important;" >
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Send' : 'Save', array('class' => 'btn btn-info btn-mini marginTop10px')); ?>
</div>

<div class="form-actions">
    <?php //echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-primary btn-mini iframe', 'style' => 'margin-left: 12px; margin-top: 20px; padding: 6px 35px;')); ?>
</div>

<?php $this->endWidget(); ?>