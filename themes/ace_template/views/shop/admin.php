<?php
/* @var $this ShopController */
/* @var $model Shop */

$this->pageTitle = 'Shops - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Shops' => array('admin'),
    'Manage',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#shop-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="widget">
    <div class="widget-head">
        <div class="pull-left">Shops</div>
        <div class="widget-icons pull-right">
            <a class="wminimize" href="#"><i class="icon-chevron-up"></i></a> 
            <a class="wclose" href="#"><i class="icon-remove"></i></a>
        </div>  
        <div class="clearfix"></div>
    </div>
    <div class="widget-content" style="display: block;">
        <?php
        $this->widget('zii.widgets.grid.CGridView', array(
            'id' => 'shop-grid',
            'dataProvider' => $model->search(),
            'htmlOptions'=>array('style'=>'cursor: pointer;'),
            'selectionChanged'=>"function(id){window.location='" . Yii::app()->urlManager->createUrl('shop/view', array('id'=>'')) . "' + $.fn.yiiGridView.getSelection(id);}",

            'filter' => $model,
            'columns' => array(
                array(
                'header'=>'Sl.',
                'value'=>'$this->grid->dataProvider->pagination->offset + $row+1',       //  row is zero based
                'htmlOptions' => array('style' => "text-align:center; width:50px !important;", 'title' => 'ID'),
        ),
                array(
                    'name' => 'shop_picture',
                    'type' => 'raw',
                    'value' => 'Shop::get_shop_picture($data->id)',
                    'htmlOptions' => array('style' => "text-align:left;width:50px;", 'title' => 'Shop', 'class' => 'img-rounded'),
                ),
                'title',
                'start_hour',
                'end_hour',
                'email',
                'phone',
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
        <?php echo CHtml::link('<i class="icon-plus"></i> Add', array('create'), array('class' => 'btn btn-default btn-mini')); ?>
    </div>
</div>