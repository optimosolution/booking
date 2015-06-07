<?php
/* @var $this StaffController */
/* @var $model Staff */
/* @var $form CActiveForm */
?>

<div class="form">

 
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'staff-form',
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
	<p class="note help-block">Fields with <span class="required">*</span> are required.</p>

	<?php //echo $form->errorSummary($model, $second_contact); 
		echo $form->errorSummary($model); 
	?>
	 <?php 
     	if(!empty($_GET['shop_id'])){
    ?> 
 		<?php echo $form->textField($model,'shop_id',array('size'=>30, 'value'=>$_GET['shop_id'], 'style'=>'')); ?> 
    <?php } else {?> 
	<div class="control-group marginBot10px">
        <label class="control-label" for="shop_id"><?php echo $form->labelEx($model, 'shop_id'); ?></label> </br>
       <?php echo $form->dropDownList($model, 'shop_id', CHtml::listData(Shop::model()->findAll(array('condition' => 'published=1 AND company=' . Yii::app()->user->company, "order" => "title")), 'id', 'title'), array('empty' => '--please select--', 'class' => 'span12 input-large' , 'options' => array('38' => array('selected' => true)), 'label' => false)); ?> <span class=" ">*</span>
    </div>
	 <?php } ?>
	<div class="control-group marginBot10px">
 		<?php echo $form->textField($model,'name',array('size'=>30, 'placeholder'=>'Name')); ?> <span class="">*</span>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="control-group marginBot10px">
 		<?php echo $form->textField($model,'username',array('size'=>30,  'placeholder'=>'Username')); ?> <span class=" ">*</span>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="control-group marginBot10px">
 		<?php echo $form->textField($model,'email',array('size'=>30, 'placeholder'=>'Email')); ?> <span class=" ">*</span>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="control-group marginBot10px">
 		<?php echo $form->passwordField($model,'password',array('size'=>30, 'placeholder'=>'Password')); ?> <span class=" ">*</span>
		<?php echo $form->error($model,'password'); ?>
	</div>
 

	<div class="control-group marginBot10px">
		<?php echo $form->labelEx($model,''); ?>
		<?php echo $form->textField($model,'phone',array('size'=>30, 'placeholder'=>'Phone')); ?> 
		<?php echo $form->error($model,'phone'); ?>
	</div>

	<div class="control-group marginBot10px">
 		<?php echo $form->textarea($model,'address',array('size'=>40, 'placeholder'=>'Address')); ?>
		<?php echo $form->error($model,'address'); ?>
	</div>
 	
 	<div class="control-group marginBot10px">
        <label class="control-label" for="country"><?php echo $form->labelEx($model, 'Country'); ?></label> </br>
        <?php echo $form->dropDownList($model, 'country', CHtml::listData(Country::model()->findAll(array('condition' => 'published=1', "order" => "country_name")), 'id', 'country_name'), array('empty' => '--please select--', 'class' => 'span12 input-large', 'options' => array('38' => array('selected' => true)), 'label' => false)); ?>
    </div>
    

    <div class="control-group marginBot10px">
        <label class="control-label" for="state"><?php echo $form->labelEx($model, 'state'); ?></label>
        <div class="controls">                               
            <?php State::get_sate_new('User', 'state'); ?> 
        </div>
    </div>
    <div class="control-group marginBot10px">
        <label class="control-label" for="city"><?php echo $form->labelEx($model, 'city'); ?></label>
        <div class="controls">                               
            <?php City::get_city_new('User', 'city'); ?> 
        </div>
    </div>
   
 
	<div class="control-group marginBot10px">
		<?php echo $form->labelEx($model,'profile_picture'); ?>
		<?php echo $form->fileField($model,'profile_picture',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'profile_picture'); ?>
	</div>
 <?php  ?> 
 	<fieldset>
 	<LEGEND><b>Secondary Contact Person Information</b></LEGEND>

	<div class="control-group marginBot10px">
 		<?php echo $form->textField($second_contact,'name_second_contact',array('size'=>30, 'placeholder'=>'Second Contact Person Name')); ?> <span class=" ">*</span>
		<?php echo $form->error($second_contact,'name_second_contact'); ?>
	</div>

	<div class="control-group marginBot10px">
 		<?php echo $form->textField($second_contact,'email_second_contact',array('size'=>30, 'placeholder'=>'Email of Contact Person')); ?> <span class=" ">*</span>
		<?php echo $form->error($second_contact,'email'); ?>
	</div>

	<div class="control-group marginBot10px">
 		<?php echo $form->textField($second_contact,'phone_second_contact',array('size'=>30, 'placeholder'=>'Contact Persons Phone Number')); ?> <span class=" ">*</span>
		<?php echo $form->error($second_contact,'email'); ?>
	</div>

	<div class="control-group marginBot10px">
 		<?php echo $form->textArea($second_contact,'address_second_contact',array('size'=>30, 'placeholder'=>'Contact Person Address')); ?> <span class=" ">*</span>
		<?php echo $form->error($second_contact,'email'); ?>
	</div>

	</fieldset>
  
	<div class="row buttons control-group marginBot10px ">
		<?php echo CHtml::submitButton(($model->isNewRecord)? 'Create' : 'Save', array('class' => 'btn btn-primary btn-mini iframe', 'style' => 'margin-left: 12px; margin-top: 20px; padding: 6px 35px;')); ?>
	</div>
 
	<?php //echo CHtml::submitButton('Login', array('class' => 'submitClass', 'style' => 'width: 120px; border-radius: 10px;')); ?>


<?php $this->endWidget(); ?>

</div><!-- form -->