<?php
/* @var $this ShopController */
/* @var $model Shop */
?>

<?php
$this->pageTitle = 'Shop Details - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Shops' => array('admin'),
    $model->title,
);
?>
<div class="widget">
    <div class="widget-head">
        <div class="pull-left">Shop Details ( <?php echo $model->title; ?>)</div>
        <div class="widget-icons pull-right">
            <a class="wminimize" href="#"><i class="icon-chevron-up"></i></a> 
            <a class="wclose" href="#"><i class="icon-remove"></i></a>
        </div>  
        <div class="clearfix"></div>
    </div>
    <div class="widget-content" style="display: block;">
        <div class="padd">
            <?php
            $this->widget('zii.widgets.CDetailView', array(
                'htmlOptions' => array(
                    'class' => 'table table-striped table-condensed table-hover',
                ),
                'data' => $model,
                'attributes' => array(
                    array(
                        'name' => 'shop_picture',
                        'type' => 'raw',
                        'value' => Shop::get_shop_picture($model->id),
                        'htmlOptions' => array('class' => 'user-pic'),
                    ),
                    'title',
                    'start_hour',
                    'end_hour',
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
                     array(
                        'name' => 'currency',
                        'type' => 'raw',
                        'value' => Currency::get_currency($model->currency),
                    ),
                    'address',
                    'email',
                    'phone',
                    'fax',
                    'website',
                    array(
                        'name' => 'published',
                        'value' => $model->published ? "Yes" : "No",
                    ),
                ),
            ));
            ?>
        </div>
    </div>
    <div class="widget-foot">
        <!-- Footer goes here -->
        <?php echo CHtml::link('<i class="icon-plus"></i> Add', array('create'), array('class' => 'btn btn-info btn-mini')); ?>
        <?php echo CHtml::link('<i class="icon-edit"></i> Edit', array('update', 'id' => $model->id), array('class' => 'btn btn-info btn-mini')); ?>
    </div>
</div>