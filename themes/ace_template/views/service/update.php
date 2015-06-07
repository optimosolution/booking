<?php
/* @var $this ServiceController */
/* @var $model Service */
?>

<?php
$this->pageTitle = 'Edit Service - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Services' => array('admin'),
    $model->title => array('view', 'id' => $model->id),
    'Update',
);
?>
<div class="widget">
    <div class="widget-head">
        <div class="pull-left">Edit Service (<?php echo $model->title; ?>)</div>
        <div class="widget-icons pull-right">
            <a class="wminimize" href="#"><i class="icon-chevron-up"></i></a> 
            <a class="wclose" href="#"><i class="icon-remove"></i></a>
        </div>  
        <div class="clearfix"></div>
    </div>
    <div class="widget-content" style="display: block;">
        <div class="padd">
            <?php $this->renderPartial('_form', array('model' => $model)); ?>
        </div>
    </div>
    <div class="widget-foot">
        <!-- Footer goes here -->
        <?php echo CHtml::link('<i class="icon-plus"></i> Add', array('create'), array('class' => 'btn btn-info btn-mini')); ?>
        <?php echo CHtml::link('<i class="icon-eye-open"></i> Details', array('view', 'id' => $model->id), array('class' => 'btn btn-info btn-mini')); ?>
    </div>
</div>