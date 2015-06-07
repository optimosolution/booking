<?php
/* @var $this ShopController */
/* @var $model Shop */
?>

<?php
$this->pageTitle = 'New Shop - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Shops' => array('admin'),
    'Create',
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
        <div class="pull-left">New Shop</div>
        <div class="widget-icons pull-right">
            <a class="wminimize" href="#"><i class="icon-chevron-up"></i></a> 
            <a class="wclose" href="#"><i class="icon-remove"></i></a>
        </div>  
        <div class="clearfix"></div>
    </div>
    <div class="widget-content">
        <div class="padd">
            <?php $this->renderPartial('_new', array('model' => $model)); ?>
        </div>
        <div class="widget-foot">
            <!-- Footer goes here -->
        </div>
    </div>
</div>