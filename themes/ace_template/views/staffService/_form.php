

<?php
/* @var $this StaffServiceController */
/* @var $model StaffService */
/* @var $form CActiveForm */



$shop_id=Yii::app()->user->shop_id;

?>

<div class="form">
 
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'staff-service-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions' => array(
                    'enctype' => 'multipart/form-data',
                    'class' => 'form-horizontal',
                ), //uni
)); ?>


	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

 
	<div class="form-group marginBot10px">
	    <?php echo $form->labelEx($model,'user_id', array('class' =>'col-sm-2 control-label no-padding-right')); ?>
	    <div class="col-sm-9">
	        <?php echo $form->dropDownList($model, 'user_id', CHtml::listData(Staff::model()->findAll(array('condition' => 'shop_id='.$shop_id, "order" => "name")), 'id', 'name'), array('empty' => '--please select--', 'class' => 'span5')); ?>
	        <?php echo $form->error($model,'user_id'); ?>       
	    </div>
	</div>
 
	<div class="form-group marginBot10px">
		<?php echo $form->labelEx($model,'servic_id', array('class' =>'col-sm-2 control-label no-padding-right')); ?>
		<div class="col-sm-9">
	        <?php echo $form->dropDownList($model, 'servic_id', CHtml::listData(Service::model()->findAll(array('condition' => 'shop='.$shop_id, "order" => "title")), 'id', 'title'), array('empty' => '--please select--', 'class' => 'span5')); ?>
		<?php echo $form->error($model,'servic_id'); ?>	
		</div>
	</div>

	<div class="form-group marginBot10px">
		<?php echo $form->labelEx($model,'note', array('class' =>'col-sm-2 control-label no-padding-right')); ?>
		<div class="col-sm-9">
		<?php echo $form->textArea($model,'note',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'note'); ?>	
		</div>
	</div>
	 
 <?php /*

	<div class="form-group marginBot10px">
		<?php echo $form->labelEx($model,'time_required', array('class' =>'col-sm-2 control-label no-padding-right')); ?>
		<div class="col-sm-9">
		<?php echo $form->textField($model,'time_required',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'time_required'); ?>	
		</div>
	</div>
	

	<div class="form-group marginBot10px">
		<?php echo $form->labelEx($model,'price', array('class' =>'col-sm-2 control-label no-padding-right')); ?>
		<div class="col-sm-9">
		<?php echo $form->textField($model,'price',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'price'); ?>	
		</div>
	</div>
	 
 */  ?>  

	<div class="row buttons">
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-primary btn-mini iframe', 'style' => 'margin-left: 12px; margin-top: 20px; padding: 6px 35px;')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->