<?php
/* @var $this MailCustomerController */
/* @var $model MailCustomer */
/* @var $form CActiveForm */
?>
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'mail-customer-form',
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
	<p class="note">Fields with <span class="required">*</span> are required.</p>
	<?php echo $form->errorSummary($model); ?>
 	<?php  
    if(!empty($_GET['reference_mail'])) { 
    ?>
	<div class="form-group marginBot10px">
 	<div class="col-sm-9">
   <?php 	
    	$reference_mail=$_GET['reference_mail'];
    	$reply_to=$_GET['reply_to'];
	 	//echo $form->labelEx($model,'reference_mail', array('class' =>'col-sm-2 control-label no-padding-right'));
		echo $form->hiddenField($model,'reference_mail', array('size'=>60,'maxlength'=>250, 'class' =>'col-xs-10 col-sm-5', 'value'=>$reference_mail));
		
 		$subject_prev= MailCustomer::get_subject($reference_mail);
		$subject='RE: '.$subject_prev;

		$customer_name= User::get_user_name($reply_to);
	?>
	</div>
	</div>
	<div class="form-group marginBot10px">
		<?php echo $form->labelEx($model,'Reply To', array('class' =>'col-sm-2 control-label no-padding-right')); ?>
		<div class="col-sm-9">
		<?php echo $form->hiddenField($model,'customer_id', array('size'=>60,'maxlength'=>250, 'class' =>'col-xs-10 col-sm-5', 'value'=>$reply_to));
			  echo $form->textField($model,'replied_customer', array('size'=>60,'maxlength'=>250, 'class' =>'col-xs-10 col-sm-5','disabled'=>'disabled', 'value'=>$customer_name)); 
			
		?>
		<?php echo $form->error($model,'customer_id'); ?>		
		</div>
	</div>
	<div class="form-group marginBot10px">
		<?php echo $form->labelEx($model,'subject', array('class' =>'col-sm-2 control-label no-padding-right')); ?>
		<div class="col-sm-9">
		<?php echo $form->textField($model,'subject',array('size'=>60,'maxlength'=>250, 'class' =>'col-xs-10 col-sm-5', 'disabled'=>'disabled', 'value'=>$subject)); ?>
			<?php echo $form->error($model,'subject'); ?>		
		</div>
	</div>
<?php
     }else{
 ?>	
<div class="form-group marginBot10px">
	<?php echo $form->labelEx($model,'subject', array('class' =>'col-sm-2 control-label no-padding-right')); ?>
	<div class="col-sm-9">
	<?php echo $form->textField($model,'subject',array('size'=>60,'maxlength'=>250, 'class' =>'col-xs-10 col-sm-5', 'placeholder'=>'Subject')); ?>
		<?php echo $form->error($model,'subject'); ?>		
	</div>
</div>
<?php } ?>	
<div class="form-group marginBot10px">
	<?php echo $form->labelEx($model,'message_body', array('class' =>'col-sm-2 control-label no-padding-right')); ?>
	<div class="col-sm-9">
	<?php echo $form->textArea($model,'message_body',array('rows'=>6, 'cols'=>50,'class' =>'col-xs-10 col-sm-5', 'placeholder'=>'Subject')); ?>
	<?php echo $form->error($model,'message_body'); ?>		
	</div>
</div>
<div class="form-group marginBot10px">
	<?php echo $form->labelEx($model,'attached_file', array('class' =>'col-sm-2 control-label no-padding-right')); ?>
	<div class="col-sm-9">
	<?php echo $form->fileField($model,'attached_file',array('rows'=>6, 'cols'=>50)); ?>
	<?php echo $form->error($model,'attached_file'); ?>
	</div>
</div>

<div class="" style="width:66%; margin:0 auto !important;" >
	<?php echo CHtml::submitButton($model->isNewRecord ? 'Send' : 'Save', array('class' => 'btn btn-info btn-mini marginTop10px')); ?>
</div>
<?php $this->endWidget(); ?>
</div><!-- form -->