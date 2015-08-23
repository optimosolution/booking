<?php
/* @var $this ServiceController */
/* @var $model Service */

$this->pageTitle = 'Services - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Services' => array('admin'),
    'Manage',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#service-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="widget">
    <div class="widget-head">
        <div class="pull-left"><h1>Services</h1></div>
        <div class="widget-icons pull-right">
            <a class="wminimize" href="#"><i class="icon-chevron-up"></i></a> 
            <a class="wclose" href="#"><i class="icon-remove"></i></a>
        </div>  
        <div class="clearfix"></div>
    </div>
    <div class="widget-content" style="display: block;">
        <?php
        $this->widget('zii.widgets.grid.CGridView', array(
            'id' => 'service-grid',
            'dataProvider' => $model->search(),
            'htmlOptions'=>array('style'=>'cursor: pointer;'),
            'selectionChanged'=>"function(id){window.location='" . Yii::app()->urlManager->createUrl('service/view', array('id'=>'')) . "' + $.fn.yiiGridView.getSelection(id);}",

            //'dataProvider'=>$model->search(array('condition'=>'company='.Yii::app()->user->company.' AND shop='.Yii::app()->user->shop_id)),
            'filter' => $model,
            'columns' => array(
                array(
                'header'=>'Sl.',
                'value'=>'$this->grid->dataProvider->pagination->offset + $row+1',       //  row is zero based
                'htmlOptions' => array('style' => "text-align:center; width:50px !important;", 'title' => 'ID'),
        ),
            'title',
                array(
                    'name' => 'shop',
                    'type' => 'raw',
                    'value' => 'Shop::get_shop($data->shop)',
                    //'filter' => CHtml::activeDropDownList($model, 'shop', CHtml::listData(Shop::model()->findAll(array('condition' => 'published=1 AND company=' . Yii::app()->user->company, "order" => "title")), 'id', 'title'), array('empty' => 'All')),
                    'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Shop'),
                ),
                array(
                    'name' => 'category',
                    'type' => 'raw',
                    'value' => 'ServiceCategory::get_category($data->category)',
                    'filter' => CHtml::activeDropDownList($model, 'category', CHtml::listData(ServiceCategory::model()->findAll(array('condition' => 'published=1 AND company=' . Yii::app()->user->company, "order" => "title")), 'id', 'title'), array('empty' => 'All')),
                    'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Category'),
                ), 
                'cost',
                'required_time',
                array(
                    'name' => 'published',
                    'value' => '$data->published?Yii::t(\'app\',\'Active\'):Yii::t(\'app\', \'Inactive\')',
                    'filter' => array('' => Yii::t('app', 'All'), '0' => Yii::t('app', 'Inactive'), '1' => Yii::t('app', 'Active')),
                    'htmlOptions' => array('style' => "text-align:center;"),
                ),
                array(
                    'class' => 'CButtonColumn',
                ),
            ),
        ));
        ?>
    </div>
    <div class="widget-foot">
        <!-- Footer goes here -->
        <?php echo CHtml::link('<i class="icon-plus"></i> Add', array('create', 'shop_id'=>Yii::app()->user->shop_id), array('class' => 'btn btn-default btn-mini')); ?>
    </div>
</div>