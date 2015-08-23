<?php
/* @var $this AppointmentController */
/* @var $model Appointment */

$company = Yii::app()->user->company;
$shop_id = Yii::app()->user->shop_id;
$user_id = Yii::app()->user->id;

$currency_short_code= Currency::get_currency_short_code(Shop::get_currency_id($shop_id));


$this->breadcrumbs = array(
    'Appointments' => array('customerFilter'),
    'Manage',
);

Yii::app()->clientScript->registerScript('search_appointment', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#appointment-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<h1 style="margin-bottom:30px;">Appointed Customers Lists</h1>

<?php /*  echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn ')); ?>
  <div class="search-form" style="display:none">
  <?php $this->renderPartial('_search',array(
  'model'=>$model,
  ));  ?>
  </div><!-- search-form -->
  <?php */ ?>

<div style="width:45%; float:left;margin-right:10px;">
<?php
    $form = $this->beginWidget('CActiveForm', array(
    'id' => 'page-form',
    'action' => Yii::app()->createUrl('//appointment/date_range_select'),
    'enableAjaxValidation' => true,
        ));
?>
 <fieldset>
    <legend>Filter by date range</legend>
   <b style="float:left; padding-right:2px; margin-top:2px;">From :</b>
    <?php
    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'name' => 'from_date', // name of post parameter
        'value' => (isset(Yii::app()->request->cookies['from_date'])) ? Yii::app()->request->cookies['from_date']->value : '',
        'options' => array(
            'showAnim' => 'fold',
            'dateFormat' => 'yy-mm-dd',
        ),
        'htmlOptions' => array(
            'style' => 'height:30px; width:40%;float:left;',
             'placeholder'=>'0000-00-00'
        ),
    ));
    ?>
    
    <b style="float:left; padding-right:2px; margin-top:2px;">To :</b>
    <?php
    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'name' => 'to_date',
        'value' => (isset(Yii::app()->request->cookies['to_date'])) ? Yii::app()->request->cookies['to_date']->value : '',
        //'value'=>Yii::app()->request->cookies['to_date']->value,
        'options' => array(
            'showAnim' => 'fold',
            'dateFormat' => 'yy-mm-dd',
        ),
        'htmlOptions' => array(
            'style' => 'height:30px; width:40%;float:left;',
            'placeholder'=>'0000-00-00'
        ),
    ));
    ?>
    </fieldset>
    </br>
    <div class="clear" style="clear:left;"></div>
    <?php 
        echo CHtml::submitButton('Apply Filter', array('class'=>'btn btn-primary btn-mini',"style"=>"margin-left:42px;"));  // submit button
        $this->endWidget(); 
    ?>
</div> 

<div style="width:45%; float:left;">
    <?php
        $form = $this->beginWidget('CActiveForm', array(
        'id' => 'cost_range-form',
        'action' => Yii::app()->createUrl('//appointment/cost_range'),
        'enableAjaxValidation' => true,
            ));
    ?>
	<fieldset>
    <legend>Filter by Cost range</legend>
    <b style="float:left; padding-right:2px; margin-top:2px;">From :</b>
    <?php echo $form->textField($model,'cost_range_from', array(
        'name' => 'cost_range_from',
        'value' => (isset(Yii::app()->request->cookies['cost_range_from'])) ? Yii::app()->request->cookies['cost_range_from']->value : '',
        'style'=>'width:40%;float:left;',
        'class'=>'form-control marginBot10px marginBot10px', 
        'placeholder'=>'0.00 .'.$currency_short_code
    )); ?>


    <b style="float:left; padding-right:2px; margin-top:2px;">To :</b>
    <?php echo $form->textField($model,'cost_range_to',array(
        'name' => 'cost_range_to',
        'value' => (isset(Yii::app()->request->cookies['cost_range_to'])) ? Yii::app()->request->cookies['cost_range_to']->value : '',
        'style'=>'width:40%;float:left;',
        'class'=>'form-control marginBot10px marginBot10px', 
        'placeholder'=>'0.00 .'.$currency_short_code
    )); ?>
	 </fieldset>
     <div class="clear" style="clear:left;"></div>

    <?php 
        echo CHtml::submitButton('Apply Filter', array('class'=>'btn btn-primary btn-mini',"style"=>"margin-left:42px;"));  // submit button
        $this->endWidget(); 
    ?>
</div>
<div class="clear" style="clear:left;"></div>
<br/>

<?php
$form = $this->beginWidget('CActiveForm', array(
    //'enableAjaxValidation' => true, 'action' => Yii::app()->createUrl('appointment/mail'),
    'enableAjaxValidation' => true, 'action' => Yii::app()->createUrl('massmail/mailSend'),
        ));


//$date=time();

$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'appointment-grid',
    'dataProvider' => $model->search_filter_customer(array('condition' => 'shop_id=' . $shop_id . ' AND company_id=' . $company . ' AND status=1')),
// DONT FORGET TO TURN ON afterAjaxUpdate Or after the first search the Datepicker won't Run
    'afterAjaxUpdate' => "function() {
        jQuery('#Appointment_date_first').datepicker(jQuery.extend({showMonthAfterYear:false},jQuery.datepicker.regional['id'],{'showAnim':'fold','dateFormat':'yy-mm-dd','changeMonth':'true','changeYear':'true','constrainInput':'false'}));
        jQuery('#Appointment_date_last').datepicker(jQuery.extend({showMonthAfterYear:false},jQuery.datepicker.regional['id'],{'showAnim':'fold','dateFormat':'yy-mm-dd','changeMonth':'true','changeYear':'true','constrainInput':'false'}));
        }",
    'filter' => $model,
    'columns' => array(
        array(
            'class' => 'CCheckBoxColumn',
            'selectableRows' => '2',
            'value' => 'User::get_user_email($data->customer_id)',
            'checkBoxHtmlOptions' => array("name" => "idList[]"),
            'selectableRows' => '50',
        ),
        /*
            array(
            'class' => 'CCheckBoxColumn',
            'selectableRows' => '2',
            'value' => '$data["customer_id"]',
            'checkBoxHtmlOptions' => array("name" => "idList[]"),
            'selectableRows' => '50',
        ),
        */
        array(//this array is for automatic serial 
            'header' => 'Sl.',
            'value' => '$this->grid->dataProvider->pagination->offset + $row+1', //  row is zero based
            'htmlOptions' => array('style' => "text-align:center; width:50px !important;", 'title' => 'ID'),
        ),
        array(
            'name' => 'customer_id',
            'value' => 'User::get_user_name($data->customer_id)',
            'filter' => CHtml::activeDropDownList($model, 'customer_id', CHtml::listData(User::model()->findAll(array('condition' => 'group_id=8 AND company=' . Yii::app()->user->company . ' AND shop_id=' . Yii::app()->user->shop_id, "order" => "name")), 'id', 'name'), array('empty' => 'All')),
            'htmlOptions' => array('style' => "text-align:left; width:250px;"),
        ),
         array(
          'name' => 'email', //want to use the label as email
          'value' => 'User::get_user_email($data->customer_id)',
          'htmlOptions' => array('style' => "text-align:left; width:200px;"),
          ), /**/
        array(
            'name' => 'shop_id',
            'value' => 'Shop::get_shop($data->shop_id)',
            'htmlOptions' => array('style' => "text-align:left; width:150px;"),
        ),
        array(
            'name' => 'appointment_count',
            'value' => '$data->number_of_visit',
            'htmlOptions' => array('style' => "text-align:center; width:100px; font-weight:bold;"),
        ),
        array(
            'name' => 'total_amount',
            'value' => '$data->total_amount',
            'htmlOptions' => array('style' => "text-align:center; width:100px; font-weight:bold;"),
        ),
        array(
            'header' => '',
            'class' => 'CButtonColumn',
            'htmlOptions' => array('style' => "text-align:center;width:100px;", 'class' => ''),
            'template' => '{view} {update} {delete}',
            'buttons' => array(
                'view' => array(
                    'label' => '',
                    'imageUrl' => '',
                    'url' => 'Yii::app()->createUrl("/appointment/filterListView", array("customer_id"=>$data["customer_id"]))',
                    'options' => array('class' => 'btn btn-xs btn-info fa fa-eye'),
                ),
                'update' => array(
                    'label' => '',
                    'imageUrl' => '',
                    'url' => 'Yii::app()->createUrl("/appointment/update", array("id"=>$data["id"]))',
                    'options' => array('class' => 'btn btn-xs btn-info fa fa-pencil', 'style' => 'display:none;  '),
                ),
                'delete' => array(
                    'label' => '',
                    'imageUrl' => '',
                    'url' => 'Yii::app()->createUrl("/appointment/delete", array("id"=>$data["id"]))',
                    'options' => array('class' => 'btn btn-xs btn-danger fa fa-trash-o', 'style' => ' display:none; '),
                ),
            ),
        ),
    ),
));
?>	
<?php //echo CHtml::link('<i class="icon-plus"></i> Send Message to Selected Members', array('massMail/sendMany'), array('class' => 'btn btn-info btn-mini marginTop10px')); ?>

<?php /* echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
  <div class="search-form" style="display:none">
  <?php $this->renderPartial('_search',array(
  'model'=>$model,
  )); ?>
  </div><!-- search-form -->
 */ ?>
<?php
?>

<script>
    function reloadGrid(data) {
        $.fn.yiiGridView.update('appointment-grid');
    }
</script>

<?php echo CHtml::ajaxSubmitButton('Filter', array('appointment/ajaxupdate'), array(), array("style" => "display:none;")); ?>
<?php //echo CHtml::ajaxSubmitButton('Send Mail to selected Customer',array('appointment/ajaxupdate','act'=>'doActive'), array('success'=>'reloadGrid'));  ?>

<?php echo CHtml::submitButton($model->isNewRecord ? 'Send Mail to selected Customer' : 'Save', array('class' => 'btn btn-primary btn-mini iframe', 'style' => 'margin-left: 12px; margin-top: 0; padding: 6px 35px;')); ?>
<?php $this->endWidget(); ?>