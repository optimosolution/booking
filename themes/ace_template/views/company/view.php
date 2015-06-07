<?php
/* @var $this CompanyController */
/* @var $model Company */
?>

<?php
$this->pageTitle = 'Settings - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Settings',
);
?>
<div class="widget">
    <!-- Widget title -->
    <div class="widget-head">
        <div class="pull-left">Settings</div>
        <div class="widget-icons pull-right">
            <a class="wminimize" href="#"><i class="icon-chevron-up"></i></a> 
            <a class="wclose" href="#"><i class="icon-remove"></i></a>
        </div>  
        <div class="clearfix"></div>
    </div>
    <div class="widget-content">
        <!-- Widget content -->
        <?php
        $this->widget('zii.widgets.CDetailView', array(
            'htmlOptions' => array(
                'class' => 'table table-striped table-condensed table-hover',
            ),
            'data' => $model,
            'attributes' => array(
                array(
                    'name' => 'company_logo',
                    'type' => 'raw',
                    'value' => Company::get_company_logo($model->id),
                    'htmlOptions' => array('class' => 'user-pic'),
                ),
                'company_name',
                array(
                    'name' => 'country',
                    'type' => 'raw',
                    'value' => Currency::get_currency($model->currency),
                ),
                array(
                    'name' => 'country',
                    'type' => 'raw',
                    'value' => Country::getCountry($model->country),
                ),
                array(
                    'name' => 'state',
                    'type' => 'raw',
                    'value' => State::getState($model->state),
                ),
                array(
                    'name' => 'city',
                    'type' => 'raw',
                    'value' => City::getCity($model->city),
                ),
                'address',
                'email',
                'phone',
                'mobile',
                'fax',
                'website',
                array(
                    'name' => 'time_zone',
                    'type' => 'raw',
                    'value' => Timezone::get_zone($model->time_zone),
                ),
                'paypal_username',
                'paypal_password',
                'paypal_signature',
                'paypal_app_id',
                'expiry',
                'summary',
            ),
        ));
        ?>
        <div class="widget-foot">
            <?php echo CHtml::link('<i class="icon-edit"></i> Edit Settings', array('company/update', 'id' => Yii::app()->user->company), array('class' => 'btn btn-info btn-mini')); ?>
        </div>
    </div>
</div>