<?php
/* @var $this StaffServiceController */
/* @var $model StaffService */

$shop_id=Yii::app()->user->shop_id;


$this->breadcrumbs=array(
	'Staff Services'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List StaffService', 'url'=>array('index')),
	array('label'=>'Create StaffService', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#staff-service-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="widget">
	<div class="widget-head">
	    <div class="pull-left"><h1>Staff Services</h1></div>
	    <div class="widget-icons pull-right">
	        <a class="wminimize" href="#"><i class="icon-chevron-up"></i></a> 
	        <a class="wclose" href="#"><i class="icon-remove"></i></a>
	    </div>  
	    <div class="clearfix"></div>
	</div>
	<div class="widget-content" style="display: block;"> 

	<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
	<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
		'model'=>$model,
	)); ?>
	</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'staff-service-grid',
	'dataProvider'=>$model->search(),
	'htmlOptions'=>array('style'=>'cursor: pointer;'),
	'selectionChanged'=>"function(id){window.location='" . Yii::app()->urlManager->createUrl('staffService/view', array('id'=>'')) . "' + $.fn.yiiGridView.getSelection(id);}",

	'filter'=>$model,
	'columns'=>array(
		array(
                'header'=>'Sl.',
                'value'=>'$this->grid->dataProvider->pagination->offset + $row+1',       //  row is zero based
                'htmlOptions' => array('style' => "text-align:center; width:50px !important;", 'title' => 'ID'),
        ),
		//'company_id',
		 array(
                'name' => 'shop_id',
                'type' => 'raw',
                'value' => 'Shop::get_shop($data->shop_id)',  
                //'filter' => CHtml::activeDropDownList($model, 'customer_id', CHtml::listData(User::model()->findAll(array("order" => "name")), 'id', 'name'), array('empty' => 'All')),
                'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Shop Name'),
        ),	
		array(
                'name' => 'user_id',
                'type' => 'raw',
                'value' => 'Staff::get_user_name($data->user_id)',  
                'filter' => CHtml::activeDropDownList($model, 'user_id', CHtml::listData(User::model()->findAll(array("order" => "name", 'condition' => 'shop_id='.$shop_id)), 'id', 'name'), array('empty' => 'All')),
                'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Staff Name'),
        ),	
		 array(
                'name' => 'servic_id',
                'type' => 'raw',
                'value' => 'Service::get_service_name($data->servic_id)',  
                'filter' => CHtml::activeDropDownList($model, 'servic_id', CHtml::listData(Service::model()->findAll(array("order" => "title", 'condition' => 'shop='.$shop_id)), 'id', 'title'), array('empty' => 'All')),
                'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Service Name'),
        ),	
		'note',
		//'servic_id',
		//'time_required',
		/*
		'price',
		
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
</div>
    <div class="widget-foot">
        <!-- Footer goes here -->
        <?php echo CHtml::link('<i class="icon-plus"></i> Assign New Service', array('create', 'shop_id'=>Yii::app()->user->shop_id), array('class' => 'btn btn-primary btn-mini')); ?>
    </div>
</div>