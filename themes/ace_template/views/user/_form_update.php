<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form TbActiveForm */
?>
<div class="form">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'user-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array('enctype' => 'multipart/form-data', 'class' => 'form-horizontal'), //uni
    ));
    ?>
    <!-- If you like to use the jQuery Uniform plugin style, then add the class "uni" to the form --> 
    <p class="help-block">Fields with <span class="required">*</span> are required.</p>
    <?php echo $form->errorSummary($model); ?>
    <?php echo $form->textField($model, 'name', array('span' => 5, 'maxlength' => 255)); ?>
    <?php echo $form->textField($model, 'email', array('span' => 5, 'maxlength' => 100)); ?>
    <?php echo $form->textField($model, 'address', array('span' => 5)); ?>
    <?php echo $form->dropDownList($model, 'country', CHtml::listData(Country::model()->findAll(array('condition' => 'published=1', "order" => "country_name")), 'id', 'country_name'), array('empty' => '--please select--', 'class' => 'span5')); ?>
    <div class="control-group">
        <label class="control-label" for="state"><?php echo $form->labelEx($model, 'state'); ?></label>
        <div class="controls">                               
            <?php State::get_sate_edit('User', 'state', $model->state); ?> 
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="city"><?php echo $form->labelEx($model, 'city'); ?></label>
        <div class="controls">                               
            <?php City::get_city_edit('User', 'city', $model->city); ?> 
        </div>
    </div>
    <?php echo $form->textField($model, 'phone', array('span' => 5, 'maxlength' => 100)); ?>
    <?php echo $form->textField($model, 'mobile', array('span' => 5, 'maxlength' => 100)); ?>
    <?php echo $form->textField($model, 'fax', array('span' => 5, 'maxlength' => 100)); ?>
    <?php echo $form->textField($model, 'website', array('span' => 5, 'maxlength' => 150)); ?>
    <?php echo $form->fileField($model, 'profile_picture', array('maxlength' => 255, 'class' => 'span12')); ?>
    <div class="form-actions">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
		<?php echo CHtml::resetButton('Reset'); ?>
        
    </div>
    <?php $this->endWidget(); ?>
</div><!-- form -->