<?php
/* @var $this ServiceCategoryController */
/* @var $model ServiceCategory */
?>

<?php
$this->pageTitle = 'Service Category Details - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Service Categories' => array('admin'),
    $model->title,
);
?>
<div class="widget">
    <div class="widget-head">
        <div class="pull-left">Service Category Details (<?php echo $model->title; ?>)</div>
        <div class="widget-icons pull-right">
            <a class="wminimize" href="#"><i class="icon-chevron-up"></i></a> 
            <a class="wclose" href="#"><i class="icon-remove"></i></a>
        </div>  
        <div class="clearfix"></div>
    </div>
    <div class="widget-content">
        <div class="padd">
            <?php
            $this->widget('zii.widgets.CDetailView', array(
                'htmlOptions' => array(
                    'class' => 'table table-striped table-condensed table-hover',
                ),
                'data' => $model,
                'attributes' => array(
                    'title',
                    array(
                        'name' => 'published',
                        'value' => $model->published ? "Yes" : "No",
                    ),
                ),
            ));
            ?>
            <div class="widget-foot">
                <!-- Footer goes here -->
                <?php echo CHtml::link('<i class="icon-plus"></i> Add', array('create'), array('class' => 'btn btn-info btn-mini')); ?>
                <?php echo CHtml::link('<i class="icon-edit"></i> Edit', array('update', 'id' => $model->id), array('class' => 'btn btn-info btn-mini')); ?>
            </div>
        </div>
    </div>
</div>