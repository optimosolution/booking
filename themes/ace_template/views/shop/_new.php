<?php
/* @var $this ShopController */
/* @var $model Shop */
/* @var $form TbActiveForm */
?>
<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'shop-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation' => false,
    'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
        'class' => 'form-horizontal',
    ), //uni
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>
<?php echo $form->textField($model, 'title', array('span' => 5, 'maxlength' => 150)); ?>
<?php echo $form->textField($model, 'start_hour', array('span' => 5)); ?>
<?php echo $form->textField($model, 'end_hour', array('span' => 5)); ?>
<?php echo $form->dropDownList($model, 'country', CHtml::listData(Country::model()->findAll(array('condition' => 'published=1', "order" => "country_name")), 'id', 'country_name'), array('empty' => '--please select--', 'class' => 'span5')); ?>
<div class="control-group">
    <label class="control-label" for="state"><?php echo $form->labelEx($model, 'state'); ?></label>
    <div class="controls">                               
        <?php State::get_sate_new('Shop', 'state'); ?> 
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="city"><?php echo $form->labelEx($model, 'city'); ?></label>
    <div class="controls">                               
        <?php City::get_city_new('Shop', 'city'); ?> 
    </div>
</div>
<?php echo $form->textField($model, 'address', array('span' => 5, 'maxlength' => 250)); ?>
<?php echo $form->textField($model, 'email', array('span' => 5, 'maxlength' => 150)); ?>
<?php echo $form->textField($model, 'phone', array('span' => 5, 'maxlength' => 100)); ?>
<?php echo $form->textField($model, 'fax', array('span' => 5, 'maxlength' => 100)); ?>
<?php echo $form->textField($model, 'website', array('span' => 5, 'maxlength' => 150)); ?>
<?php echo $form->fileField($model, 'shop_picture', array('span' => 5, 'maxlength' => 250)); ?>
<?php echo $form->dropDownList($model, 'published', array('1' => 'Yes', '0' => 'No'), array('class' => 'span2')); ?>
<div class="form-actions">
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
</div>
<?php $this->endWidget(); ?>