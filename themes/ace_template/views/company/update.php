<?php
/* @var $this CompanyController */
/* @var $model Company */
?>

<?php
$this->pageTitle = 'Edit Settings - ' . Yii::app()->name;
$this->breadcrumbs = array(
    $model->company_name => array('view', 'id' => $model->id),
    'Update',
);
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile(Yii::app()->theme->baseUrl . '/js/jquery.chained.js', CClientScript::POS_END);

Yii::app()->clientScript->registerScript('chain-select', " 
$('#Company_state').chained('#Company_country');
$('#Company_city').chained('#Company_state');
");
?>
<div class="widget">
    <!-- Widget title -->
    <div class="widget-head">
        <div class="pull-left">Edit Settings</div>
        <div class="widget-icons pull-right">
            <a class="wminimize" href="#"><i class="icon-chevron-up"></i></a> 
            <a class="wclose" href="#"><i class="icon-remove"></i></a>
        </div>  
        <div class="clearfix"></div>
    </div>
    <div class="widget-content">
        <!-- Widget content -->
        <div class="padd">
            <?php $this->renderPartial('_form', array('model' => $model)); ?>
        </div>        
        <div class="widget-foot">
        </div>
    </div>
</div>