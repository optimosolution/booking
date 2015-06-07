<?php
/* @var $this ServiceController */
/* @var $model Service */
?>

<?php
$this->pageTitle = 'Service Details - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Services' => array('admin'),
    $model->title,
);
?>
<div class="widget">
    <div class="widget-head">
        <div class="pull-left">Service Details (<?php echo $model->title; ?>)</div>
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
                        'name' => 'shop',
                        'type' => 'raw',
                        'value' => Shop::get_shop($model->shop),
                    ),
                    array(
                        'name' => 'category',
                        'type' => 'raw',
                        'value' => ServiceCategory::get_category($model->category),
                    ),
                    'title',
                    'details',
                    'cost',
                    'required_time',
                    array(
                        'name' => 'model_photo',
                        'type' => 'raw',
                        'value' => Service::get_service_picture($model->id),
                        'htmlOptions' => array('class' => 'user-pic'),
                    ),
                    //'barber',
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