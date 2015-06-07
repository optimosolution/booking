<?php
/* @var $this ShopController */
/* @var $model Shop */
?>

<?php
$this->pageTitle = 'Edit Shop - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Shops' => array('index'),
    $model->title => array('view', 'id' => $model->id),
    'Update',
);
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile(Yii::app()->theme->baseUrl . '/js/jquery.chained.js', CClientScript::POS_END);
Yii::app()->clientScript->registerScript('chain-select-edit', " 
$('#Shop_state').chained('#Shop_country');
$('#Shop_city').chained('#Shop_state');
");
?>
<div class="widget">
    <div class="widget-head">
        <div class="pull-left">Edit Shop (<?php echo $model->title; ?>)</div>
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