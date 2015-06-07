<?php
/* @var $this AppointmentController */
/* @var $model Appointment */
/* @var $form TbActiveForm */

 
//storing the shop id of this customer
$shop_id=Yii::app()->user->shop_id;
 
?>

<div class="row">
    <div class="col-sm-6">
        <div class="widget-box transparent" id="recent-box">
          
        <div class="form">
                <?php $form=$this->beginWidget('CActiveForm', array(
                'id'=>'appointment-form',
                'enableAjaxValidation' => false,
                'htmlOptions' => array(
                    'enctype' => 'multipart/form-data',
                    //'class' => 'form-horizontal',
                    ), //uni
                )); ?>
            <div class="widget-header">
                <h4 class="widget-title lighter smaller">
                    <i class="ace-icon fa fa-rss orange"></i>Appointment Booking
                </h4>
                <div class="widget-toolbar no-border">
                    <ul class="nav nav-tabs" id="recent-tab">
                        <li class="active">
                            <a data-toggle="tab" href="#service-tab">Service</a>
                        </li>

                        <li>
                            <a data-toggle="tab" href="#timing-tab">Timing</a>
                        </li>

                        <li>
                            <a data-toggle="tab" href="#detail-tab">Details</a>
                        </li>

                         <li>
                            <a data-toggle="tab" href="#payment-tab">Payment</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="widget-body">
                <div class="widget-main padding-4">
                    <div class="tab-content padding-8 tab-content_appointment" style="overflow:none !important;">
                        <p class="help-block">Fields with <span class="required">*</span> are required.</p>
                          <?php echo $form->errorSummary($model); ?>
                        <div  id="service-tab" class="tab-pane active">
                        <?php //echo $form->hiddenField($model,'company_id',array('span'=>5, 'value'=>Yii::app()->user->company)); ?>
                        <?php //echo $form->textField($model,'shop_id',array('span'=>5,  'value'=>Yii::app()->user->shop_id)); ?>
                        <?php //echo $form->hiddenField($model,'customer_id',array('span'=>5,  'value'=>Yii::app()->user->id)); ?>

                        <div class="control-group marginBot10px">
                            <label class="control-label" for="staff_id"><?php echo $form->labelEx($model, 'Staff'); ?></label> <br/>
                            <?php echo $form->dropDownList($model, 'staff_id', CHtml::listData(User::model()->findAll(array('condition' => 'shop_id='.$shop_id.' AND status=1 AND group_id=7', "order" => "name")), 'id', 'name'), array('empty' => '--Any--', 'class' => 'span12 input-large', 'options' => array(), 'label' => false)); ?>
                        </div>
                         

                        <?php 
                         if(empty($_GET['service_id'])){
                        ?>    
                                <div class="control-group marginBot10px">
                                    <label class="control-label" for="service_category"><?php echo $form->labelEx($model, 'service_category'); ?></label> <br/>
                                    <?php echo $form->dropDownList($model, 'service_category', CHtml::listData(ServiceCategory::model()->findAll(array('condition' => 'published=1 AND company='.Yii::app()->user->company, "order" => "title")), 'id', 'title'), array('empty' => '--please select--', 'class' => 'span12 input-large', 'options' => array(), 'label' => false)); ?>
                                </div>
                                
                              
                                <?php echo $form->labelEx($model,'service'); ?> *<br/>
                                <?php echo Service::get_service_list('Appointment', 'service_id', $model->service_id); ?>
                                <?php echo $form->error($model,'service_id'); ?><br/>

                                <input type="disable" class="total_cost" value="" name='total_cost'  disabled/>
                                <div class="total_cost" ></div>
                        <?php 
                            }
                            if(!empty($_GET['service_id'])){
                                $service_id=$_GET['service_id'];
                                $array = Yii::app()->db->createCommand()
                                    ->select('category')
                                    ->from('{{service}}')
                                    ->where('id='.$service_id)
                                    ->queryAll();

                                    foreach ($array as $key => $values) {
                                        $category_id= $values['category'];
                        ?>
                                 <div class="control-group marginBot10px" >
                                    <label class="control-label" for="service_id"><?php echo $form->labelEx($model, 'Category'); ?></label><br/>
                                    <input type="disable" value="<?php  echo ServiceCategory::get_category( $category_id);?>" name='category_name'  disabled/>

                                    <?php echo $form->hiddenField($model,'service_category', array('value'=>$category_id)); ?>
                                </div>
                                <?php   } ?>
                                
                                <div class="control-group marginBot10px">
                                    <label class="control-label" for="service_id"><?php echo $form->labelEx($model, 'service_id'); ?></label><br/>
                                     <input type="disable" value="<?php  echo Service::get_service_name( $service_id);?>" name='service_name'  disabled/>

                                    <?php echo $form->hiddenField($model,'service_id', array('value'=>$service_id)); ?>

                                     <?php echo CHtml::link('Select Another',array('appointment/create'), array('class'=>'btn_small', 'type'=>'button')); ?>
                                 </div>
                                 <div class="control-group marginBot10px">  

                                    <label class="control-label" for="ent_time"><?php echo $form->labelEx($model, 'total_cost'); ?></label><br/>
                                    <input type="disable" value="<?php  echo Service::get_cost( $service_id);?>" name='total_cost'  disabled/>
                                    <span style="font-weight:bold; margin-left:5px;">
                                        <?php  echo Currency::get_currency_short_code(Shop::get_currency_id($shop_id));?>
                                    </span> <br/>

                            </div>
                            <?php        
                                }
                            ?>
                            <?php //echo $form->textField($model,'service_id',array('span'=>5)); ?>
                            <a data-toggle="tab"  class="btn btn-primary btn-mini iframe" href="#timing-tab">
                                Next
                                <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                            </a>
                        </div>

                        <div id="timing-tab" class="tab-pane">
                             
                            <div class="input-group control-group marginBot10px">
                                <label class="control-label" for="appoint_date"><?php echo $form->labelEx($model, 'Date'); ?></label> <br/>
                                <?php //echo $form->textField($model,'appoint_date',array('size'=>60,'maxlength'=>200, 'class'=>'form-control date-picker', 'data-date-format'=>'yyyy-mm-dd')); 
                                ?>

                                <?php
                                   
                                    
                                    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                    'model' => $model,
                                    'attribute' => 'appoint_date',
                                    //'themeUrl' => Yii::app()->baseUrl . '/css/jui',
                                    //'theme' => 'softark',
                                   // 'cssFile' => 'jquery-ui-1.9.2.custom.css',
                                    'options' => array(
                                        'showOn' => 'both',             // also opens with a button
                                        'dateFormat' => 'yy-mm-dd',     // format of "2012-12-25"
                                        'showOtherMonths' => true,      // show dates in other months
                                        'selectOtherMonths' => true,    // can seelect dates in other months
                                        //'changeYear' => true,           // can change year
                                        'changeMonth' => true,          // can change month
                                       // 'yearRange' => '2000:2099',     // range of year
                                       // 'minDate' => '2000-01-01',      // minimum date
                                       // 'maxDate' => '2099-12-31',      // maximum date
                                        'showButtonPanel' => true,      // show button panel
                                    ),
                                    'htmlOptions' => array(
                                        'size' => '10',
                                        'maxlength' => '10',
                                    ),
                                ));

                                ?>
                                 
                            </div>
                            <?php //echo $form->textField($model,'ent_time',array('span'=>5)); ?>

                            <div class="input-group control-group marginBot10px">
                                <label class="control-label" for="appoint_time"><?php echo $form->labelEx($model, 'Set Time'); ?></label></br>
                                <?php echo Appointment::get_time_series('Appointment', 'appoint_time', $model->appoint_time); ?>
                            </div>
                            <?php //echo $form->textField($model,'ent_time',array('span'=>5)); ?>
                            <a data-toggle="tab"  class="btn btn-primary btn-mini iframe" href="#service-tab">
                                <i class="ace-icon fa fa-arrow-left icon-on-left"></i>
                                Back
                                
                            </a>
                            <a data-toggle="tab"  class="btn btn-primary btn-mini iframe" href="#detail-tab">
                                Next
                                <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                            </a>
                        </div><!-- /.#member-tab -->

                        <div id="detail-tab" class="tab-pane ">
                            <?php echo $form->textArea($model,'note',array('rows'=>5,'span'=>6, 'class'=> 'marginBot10px')); ?>  </br>
                            <a data-toggle="tab"  class="btn btn-primary btn-mini iframe" href="#timing-tab">
                                
                                <i class="ace-icon fa fa-arrow-left icon-on-left"></i>Back
                            </a> 
                            <a data-toggle="tab"  class="btn btn-primary btn-mini iframe" href="#payment-tab">
                                Next
                                <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                            </a>
                        </div>

                        <div id="payment-tab" class="tab-pane">
                            <?php //echo $form->textField($model,'total_cost',array('span'=>5)); ?>
                            
                            <label class="control-label" for="ent_time"><?php echo $form->labelEx($model, 'payment'); ?></label>
                            <input class="ab-local-payment" type="radio" value="local" name="payment-method-5482cd8c7a41d" checked="checked">
                            I will pay locally
                            </label></br>
                           
                            <div class="row buttons btn-small ">
                                 <a data-toggle="tab"  class="btn btn-primary btn-mini iframe" href="#detail-tab">
                                
                                <i class="ace-icon fa fa-arrow-left icon-on-left"></i>Back
                            </a> 
                                <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save' , array('class' => 'btn btn-primary btn-mini iframe', 'style' => 'margin-left: 12px; margin-top: 0; padding: 6px 35px;')); ?>
                            </div>

                              
                            <?php $this->endWidget(); ?>
                        </div>
                        
                    </div>
                </div><!-- /.widget-main -->
            </div><!-- /.widget-body -->
        </div> 
        </div><!-- /.widget-box -->
    </div><!-- /.col -->
<?php
/*  
<script type="text/javascript">
    $(document).ready(function() {
        $("#Appointment_service_id").change(function() {
            var service_id = parseInt($('#Appointment_service_id').val());
             
             $.ajax({
                type: "GET",
                url: "<?php echo $this->createUrl('appointment/getService_id_fromAJAX'); ?>",
                data: "variable=" + service_id,
                data: {service_id:service_id},
                complete: function(data){
                        //data contains the response from the php file.
                        //u can pass it here to the javascript function
                        var service_cost = <?php echo Service::get_selected_service_cost($service_id); ?>;      
                        $('.total_cost').text("Cost: $" + service_cost);
                    }
            });
             
        });
    }); 

 
</script>

*/ ?>