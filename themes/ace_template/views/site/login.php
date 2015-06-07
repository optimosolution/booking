<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle = Yii::app()->name . ' - Login';
$this->breadcrumbs = array(
    'Login',
);
?>
<div class="form">


<fieldset>
	
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'login-form',
    'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
)); ?> 
	
	<div class="row rowInput" >
        <?php echo $form->textField($model,'username',array('size'=>35,'maxlength'=>150,'encode'=>false,'value'=>'','placeholder'=>'Username/Email')); ?>
        <?php echo $form->error($model,'username'); ?>
    </div>
 
    <div class="row rowInput">
        <?php echo $form->passwordField($model,'password',array('size'=>35,'maxlength'=>150,'encode'=>false,'value'=>'','placeholder'=>'password')); ?>
        <?php echo $form->error($model,'password'); ?>
         
    </div>
 
    <div class="row rememberMe">
        <?php echo $form->checkBox($model,'rememberMe'); ?>
        <?php echo $form->label($model,'rememberMe'); ?>
        <?php echo $form->error($model,'rememberMe'); ?>
    </div>
 
    <div class="row buttons">

        <?php  //<i class="ace-icon fa fa-key"></i>
        	echo CHtml::submitButton('Login' ,array(
			    'class'=>"width-35 pull-right btn btn-sm btn-primary",
			    'style'=>'padding-left:3px;'
			)); ?>
		 
		<button type="reset" class="width-30 pull-left btn btn-sm">
			<i class="ace-icon fa fa-refresh"></i>
			<span class="bigger-110">Reset</span>
		</button>
    </div>


    

 

	<div class="space-4"></div>
</fieldset> 
<?php $this->endWidget(); ?>
</div><!-- form -->

  