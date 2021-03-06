<?php
/* @var $this CustomerController */
/* @var $model Customer */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'user-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array(
            'enctype' => 'multipart/form-data',
            //'class' => 'form-horizontal',
        ), //uni
    ));

    
    ?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

            <?php 
                if(!empty($_GET['company'])){
                echo $form->hiddenField($model, 'company', array('value' => $_GET['company']));
            }else{
                echo $form->hiddenField($model, 'company', array('value' => Yii::app()->user->company));
            } 

            if(!empty($_GET['shop_id'])){
                echo $form->hiddenField($model, 'shop_id', array('value' => $_GET['shop_id']));
            }else{
                echo $form->hiddenField($model, 'shop_id', array('value' => Yii::app()->user->shop_id));
            }
            ?>  

            <?php echo $form->textField($model,'name',array('span'=>5,'class'=>'form-control marginBot10px marginBot10px', 'placeholder'=>'Name')); ?>

            <?php echo $form->textField($model,'username',array('span'=>5,'class'=>'form-control marginBot10px marginBot10px', 'placeholder'=>'Username')); ?>

            <?php echo $form->textField($model,'email',array('span'=>5,'class'=>'form-control marginBot10px', 'placeholder'=>'Email')); ?>

            <?php echo $form->passwordField($model,'password',array('span'=>5,'class'=>'form-control marginBot10px', 'placeholder'=>'Password')); ?>

            <?php //echo $form->textField($model,'group_id',array('span'=>5,'class'=>'form-control marginBot10px')); ?>

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
            <?php echo $form->textField($model,'address',array('span'=>5,'class'=>'form-control marginBot10px', 'placeholder'=>'Address')); ?>

            <?php echo $form->textField($model,'phone',array('span'=>5,'class'=>'form-control marginBot10px', 'placeholder'=>'Phone')); ?>

            <?php echo $form->textField($model,'mobile',array('span'=>5,'class'=>'form-control marginBot10px', 'placeholder'=>'Mobile')); ?>

            <?php echo $form->fileField($model,'profile_picture',array('span'=>5)); ?>

            <?php //echo $form->dropDownList($model, 'storeowner', array('1' => 'Yes', '0' => 'No'), array('class' => 'span5', 'label'=>'Company Owner')); ?>

            <?php echo $form->hiddenField($model,'storeowner',array('span'=>5,'class'=>'form-control marginBot10px', 'value'=>'0')); ?>

        <div class="form-actions">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-primary btn-mini iframe', 'style' => 'margin-left: 12px; margin-top: 20px; padding: 6px 35px;')); ?>
        
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->