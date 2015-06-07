<?php
/* @var $this ServiceCategoryController */
/* @var $model ServiceCategory */
?>

<?php
$this->pageTitle = 'New Service Category - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Service Categories' => array('admin'),
    'Create',
);
?>

<div class="widget">
    <div class="widget-head">
        <div class="pull-left">New Service Category</div>
        <div class="widget-icons pull-right">
            <a class="wminimize" href="#"><i class="icon-chevron-up"></i></a> 
            <a class="wclose" href="#"><i class="icon-remove"></i></a>
        </div>  
        <div class="clearfix"></div>
    </div>
    <div class="widget-content">
        <div class="padd">
            <?php $this->renderPartial('_form', array('model' => $model)); ?>
        </div>
        <div class="widget-foot">
            <!-- Footer goes here -->
        </div>
    </div>
</div>
