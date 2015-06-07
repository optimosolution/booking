<?php
/* @var $this AppointmentNoteController */
/* @var $model AppointmentNote */
/* @var $form CActiveForm */
?>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'appointment-note-form',
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
 
	<?php  
    	if(!empty($_GET['appointment_id'])) { 
    ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	
	
	<div class="form-group marginBot10px">
 	<div class="col-sm-9">
   <?php 	
    	$appointment_id=$_GET['appointment_id'];
 	 	//echo $form->labelEx($model,'reference_mail', array('class' =>'col-sm-2 control-label no-padding-right'));
		echo $form->hiddenField($model,'appointment_id', array('size'=>60,'maxlength'=>250, 'class' =>'col-xs-10 col-sm-5', 'value'=>$appointment_id));
	?>
	</div>
	</div>


	<div class="form-group marginBot10px">
		<?php echo $form->labelEx($model,'note', array('class' =>'col-sm-2 control-label no-padding-right')); ?>
		<div class="col-sm-9">
		<?php echo $form->textArea($model,'note',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'note'); ?>
		</div>
	</div>

	<div class="form-group marginBot10px">
		<?php echo $form->labelEx($model,'file_name', array('class' =>'col-sm-2 control-label no-padding-right')); ?>
		<div class="col-sm-9">
		<?php echo $form->fileField($model,'file_name',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'file_name'); ?>
		</div>
	</div>


	  
	<?php /*
	<div class="form-group marginBot10px">
		<?php echo $form->labelEx($model,'status', array('class' =>'col-sm-2 control-label no-padding-right')); ?>
		<div class="col-sm-9">
		<?php echo $form->file($model,'status',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'status'); ?>
		</div>
	</div>
	*/ ?>
<div class="" style="width:66%; margin:0 auto !important;" >
	<?php echo CHtml::submitButton($model->isNewRecord ? 'Send' : 'Save', array('class' => 'btn btn-info btn-mini marginTop10px')); ?>
</div>

	<?php
	     }else{
	 ?>	
	<div class="form-group marginBot10px" style="padding:30px">
		<?php if( (Yii::app()->user->group_id)==8 ){ ?>
		 	<h4 class="" style="color:blue; margin-bottom:10px;">Please Go to Your Appointment List and select an appiontment's detail view page. After that you will be able to make a note for that appointment.</h4>
		 	<?php echo CHtml::link('<i class="icon-plus"></i> Appointment List', array('appointment/adminCustomer', 'user_id'=>Yii::app()->user->id), array('class' => 'btn btn-primary btn-mini')); ?>
	 	<?php }else{ ?>
	 		<h4 class="" style="color:blue; margin-bottom:10px;">Please Go to manage appiontments and select an appointment detail view page. After that you will be able to make a note for that appointment.</h4>
		 	<?php echo CHtml::link('<i class="icon-plus"></i> Appointment List', array('appointment/admin'), array('class' => 'btn btn-primary btn-mini')); ?>
	 	<?php } ?>
	</div>
	<?php } ?>	
<?php $this->endWidget(); ?>

</div><!-- form -->