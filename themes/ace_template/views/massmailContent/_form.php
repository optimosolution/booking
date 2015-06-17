<?php
/* @var $this MassmailContentController */
/* @var $model MassmailContent */
/* @var $form CActiveForm */
?>

 
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'massmail-content-form',
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
		<?php echo $form->labelEx($model,'subject', array('class' =>'col-sm-2 control-label no-padding-right')); ?>
		<div class="col-sm-9">
		<?php echo $form->textField($model,'subject',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'subject'); ?>	
		</div>
	</div>
	 

	
	<div class="form-group marginBot10px">
		<?php echo $form->labelEx($model,'massmail_body', array('class' =>'col-sm-2 control-label no-padding-right')); ?>
		<div class="col-sm-9">
		<?php
		    $this->widget('application.extensions.yii-ckeditor.CKEditorWidget', array(
		        'model' => $model,
		        'attribute' => 'massmail_body',
		        // editor options http://docs.ckeditor.com/#!/api/CKEDITOR.config
		        'config' => array(
		            'language' => 'en',
		        //'toolbar' => 'Basic',
		        ),
		    ));
	    ?>
		<?php //echo $form->textArea($model,'massmail_body',array('id'=>'editor1', 'rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'massmail_body'); ?>
		</div>
	</div>
	 <script type="text/javascript">
	        CKEDITOR.replace( 'editor1' );
    </script>


    <div class="form-group marginBot10px" style="display:none;">
		<?php echo $form->labelEx($model,'attached_file', array('class' =>'col-sm-2 control-label no-padding-right')); ?>
		<div class="col-sm-9">
		<?php echo $form->fileField($model,'attached_file',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'attached_file'); ?>	
		</div>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->