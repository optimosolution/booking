<?php
/* @var $this ShopController */
/* @var $model Shop */
/* @var $form TbActiveForm */


$cs = Yii::app()->getClientScript();

$cs->registerScriptFile(Yii::app()->theme->baseUrl . '/style/jquery-ui.custom.min.css', CClientScript::POS_HEAD);
$cs->registerScriptFile(Yii::app()->theme->baseUrl . '/style/chosen.css', CClientScript::POS_HEAD);
$cs->registerScriptFile(Yii::app()->theme->baseUrl . '/style/datepicker.css', CClientScript::POS_HEAD);
$cs->registerScriptFile(Yii::app()->theme->baseUrl . '/style/bootstrap-timepicker.css', CClientScript::POS_HEAD);
$cs->registerScriptFile(Yii::app()->theme->baseUrl . '/style/daterangepicker.css', CClientScript::POS_HEAD);
$cs->registerScriptFile(Yii::app()->theme->baseUrl . '/style/bootstrap-datetimepicker.css', CClientScript::POS_HEAD);

$cs->registerScriptFile(Yii::app()->theme->baseUrl . '/js/date-time/bootstrap-datepicker.min.js', CClientScript::POS_END);
$cs->registerScriptFile(Yii::app()->theme->baseUrl . '/js/date-time/bootstrap-timepicker.min.js', CClientScript::POS_END);
$cs->registerScriptFile(Yii::app()->theme->baseUrl . '/js/date-time/moment.min.js', CClientScript::POS_END);
$cs->registerScriptFile(Yii::app()->theme->baseUrl . '/js/date-time/daterangepicker.min.js', CClientScript::POS_END);
$cs->registerScriptFile(Yii::app()->theme->baseUrl . '/js/date-time/bootstrap-datetimepicker.min.js', CClientScript::POS_END);
  
 
?>

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'shop-form',
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
    <?php echo $form->labelEx($model,'title', array('class' =>'col-sm-2 control-label no-padding-right')); ?>
    <div class="col-sm-9">
        <?php echo $form->textField($model, 'title', array('span' => 5, 'maxlength' => 150)); ?>
        <?php echo $form->error($model,'title'); ?>       
    </div>
</div>


<div class="form-group marginBot10px">
    <?php echo $form->labelEx($model,'start_hour_hr', array('class' =>'col-sm-2 control-label no-padding-right')); ?>
    <div class="col-sm-9">
        <?php //echo $form->textField($model, 'start_hour', array('span' => 7, 'maxlength' => 200,'id'=>'timepicker1', 'style'=>'width:30% !important;')); ?>
        <?php echo $form->dropDownList($model, 'start_hour_hr', array(
            '00' => '00', '01' => '01','02' => '02', '03' => '03','04' => '04', '05' => '05','06' => '06', '07' => '07','08' => '07', '09' => '09','10' => '10', '11' => '11','12' => '12', '13' => '13','14' => '14', '15' => '15','16' => '16', '17' => '17','18' => '18', '19' => '19','20' => '20', '21' => '21','22' => '22', '23' => '23'
            ), array('class' => 'span2')); ?>
            :
            <?php echo $form->dropDownList($model, 'start_hour_min', array(
            '00' => '00', '15' => '15','30' => '30', '45' => '45',
            ), array('class' => 'span2')); 
            ?>
        <?php echo $form->error($model,'start_hour_hr'); ?>       
    </div>
</div>
 

<div class="form-group marginBot10px">
    <?php echo $form->labelEx($model,'end_hour_hr', array('class' =>'col-sm-2 control-label no-padding-right')); ?>
    <div class="col-sm-9">
        <?php /*
             $this->widget('application.extensions.jui_timepicker.JTimePicker', array(
                'model'=>$model,
                'attribute'=>'end_hour',
                // additional javascript options for the date picker plugin
                'options'=>array(
                    'showPeriod'=>true,
                    'hours'=>array('starts'=>6, 'ends'=>23),
                    'minutes'=>array('interval'=>15),
                    ),
                'htmlOptions'=>array('size'=>8,'maxlength'=>8 ),
            )); */
            ?>
            
        <?php //echo $form->textField($model, 'end_hour', array('span' => 7, 'maxlength' => 150, 'id'=>'')); ?>
        <?php echo $form->dropDownList($model, 'end_hour_hr', array(
            '00' => '00', '01' => '01','02' => '02', '03' => '03','04' => '04', '05' => '05','06' => '06', '07' => '07','08' => '07', '09' => '09','10' => '10', '11' => '11','12' => '12', '13' => '13','14' => '14', '15' => '15','16' => '16', '17' => '17','18' => '18', '19' => '19','20' => '20', '21' => '21','22' => '22', '23' => '23'
            ), array('class' => 'span2')); ?>
            :
            <?php echo $form->dropDownList($model, 'end_hour_min', array(
            '00' => '00', '15' => '15','30' => '30', '45' => '45',
            ), array('class' => 'span2')); 
            ?>

        <?php echo $form->error($model,'end_hour_hr'); ?>       
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
        <?php State::get_sate_edit('Shop', 'state', $model->state); ?>        
         <?php echo $form->error($model,'state'); ?>       
    </div>
</div>
 

<div class="form-group marginBot10px">
    <?php echo $form->labelEx($model,'city', array('class' =>'col-sm-2 control-label no-padding-right')); ?>
    <div class="col-sm-9">
        <?php City::get_city_edit('Shop', 'city', $model->city); ?>       
         <?php echo $form->error($model,'city'); ?>       
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
    <?php echo $form->labelEx($model,'shop_picture', array('class' =>'col-sm-2 control-label no-padding-right')); ?>
    <div class="col-sm-9">
         <?php echo $form->fileField($model, 'shop_picture', array('maxlength' => 255, 'class' => 'span12')); ?>
        <?php echo $form->error($model,'shop_picture'); ?>       
    </div>
</div>

<div class="form-group marginBot10px">
    <?php echo $form->labelEx($model,'published', array('class' =>'col-sm-2 control-label no-padding-right')); ?>
    <div class="col-sm-9">
        <?php echo $form->dropDownList($model, 'published', array('1' => 'Yes', '0' => 'No'), array('class' => 'span2')); ?>

        <?php echo $form->error($model,'published'); ?>       
    </div>
</div>


 <div class="form-actions">
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-primary btn-mini iframe', 'style' => 'margin-left: 12px; margin-top: 20px; padding: 6px 35px;')); ?>
</div>
<?php $this->endWidget(); ?>

 

 <!-- inline scripts related to this page -->
<?php
Yii::app()->clientScript->registerScript('search', "
    $('#timepicker1').timepicker({
        minuteStep: 1,
        showSeconds: true,
        showMeridian: false
    }).next().on(ace.click_event, function(){
        $(this).prev().focus();
    });
", CClientScript::POS_END);
?>