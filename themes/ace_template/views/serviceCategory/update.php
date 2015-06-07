<?php
/* @var $this ServiceCategoryController */
/* @var $model ServiceCategory */
?>

<?php
$this->pageTitle = 'Edit Service Category - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Service Categories' => array('admin'),
    $model->title => array('view', 'id' => $model->id),
    'Update',
);
?>
<div class="widget">
    <div class="widget-head">
        <div class="pull-left">Update Service Category (<?php echo $model->title; ?>)</div>
        <div class="widget-icons pull-right">
            <a class="wminimize" href="#"><i class="icon-chevron-up"></i></a> 
            <a class="wclose" href="#"><i class="icon-remove"></i></a>
        </div>  
        <div class="clearfix"></div>
    </div>
    <div class="widget-content">
        <div class="padd">
            <?php $this->renderPartial('_form', array('model' => $model)); ?>        </div>
        <div class="widget-foot">
            <!-- Footer goes here -->
            <?php echo CHtml::link('<i class="icon-plus"></i> Add', array('create'), array('class' => 'btn btn-info btn-mini')); ?>
            <?php echo CHtml::link('<i class="icon-eye-open"></i> Details', array('view','id'=>$model->id), array('class' => 'btn btn-info btn-mini')); ?>
        </div>
    </div>
</div>