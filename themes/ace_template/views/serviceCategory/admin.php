<?php
/* @var $this ServiceCategoryController */
/* @var $model ServiceCategory */

$this->pageTitle = 'Service Categories - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Service Categories' => array('admin'),
    'Manage',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#service-category-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="widget">
    <div class="widget-head">
        <div class="pull-left"><h1>Service Categories</h1></div>
        <div class="widget-icons pull-right">
            <a class="wminimize" href="#"><i class="icon-chevron-up"></i></a> 
            <a class="wclose" href="#"><i class="icon-remove"></i></a>
        </div>  
        <div class="clearfix"></div>
    </div>
    <div class="widget-content" style="display: block;">
        <?php
        $this->widget('zii.widgets.grid.CGridView', array(
            //'type' => 'table table-striped table-bordered table-hover', .' AND shop='. Yii::app()->user->shop_id
            'id' => 'service-category-grid',
            'dataProvider'=>$model->search(array('condition'=>'company='.Yii::app()->user->company)),
            //'dataProvider' => $model->search(),
            'filter' => $model,
            'columns' => array(
              array(
                'header'=>'Sl.',
                'value'=>'$this->grid->dataProvider->pagination->offset + $row+1',       //  row is zero based
                'htmlOptions' => array('style' => "text-align:center; width:50px !important;", 'title' => 'ID'),
        ),
                'title',
                array(
                    'name' => 'published',
                    'type'=> 'raw',
                    'value' => '$data->published?Yii::t(\'app\',\'Active\'):Yii::t(\'app\', \'Inactive\')',
                    'filter' => array('' => Yii::t('app', 'All'), '0' => Yii::t('app', 'Inactive'), '1' => Yii::t('app', 'Active')),
                    'htmlOptions' => array('style' => "text-align:center;"),
                ),
               


            array(
                 'header' => '',
                 'class' => 'CButtonColumn',
                 'htmlOptions' => array('style' => "text-align:center;width:100px;", 'class' => ''),
                 'template' => '{view} {update} {delete}',
                 'buttons' => array(
                  'view' => array(
                   'label' => '',
                   'imageUrl' => '',
                   'url' => 'Yii::app()->createUrl("/serviceCategory/view", array("id"=>$data["id"]))',
                   'options' => array('class' => 'btn btn-xs btn-info fa fa-eye'),
                  ),
                  'update' => array(
                   'label' => '',
                   'imageUrl' => '',
                   'url' => 'Yii::app()->createUrl("/serviceCategory/update", array("id"=>$data["id"]))',
                   'options' => array('class' => 'btn btn-xs btn-info fa fa-pencil'),
                  ),
                  'delete' => array(
                   'label' => '',
                   'imageUrl' => '',
                   'url' => 'Yii::app()->createUrl("/serviceCategory/delete", array("id"=>$data["id"]))',
                   'options' => array('class' => 'btn btn-xs btn-danger fa fa-trash-o'),
                  ),
                 ),
                ),
            ),
        ));
        ?>             
    </div>
    <div class="widget-foot">
        <!-- Footer goes here -->
        <?php echo CHtml::link('<i class="icon-plus"></i> Add', array('serviceCategory/create', 'shop_id'=>Yii::app()->user->shop_id), array('class' => 'btn btn-info btn-mini')); ?>
    </div>
</div>

