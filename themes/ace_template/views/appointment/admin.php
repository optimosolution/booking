<?php
/* @var $this AppointmentController */
/* @var $model Appointment */

$this->breadcrumbs=array(
	'Appointments'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Appointment', 'url'=>array('index')),
	array('label'=>'Create Appointment', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search_appointment', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#appointment-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<h1>Lists of Appointments</h1>
 

<?php
	 
		$this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'appointment-grid',
		'dataProvider'=>$model->search_appointment(),
	 	'htmlOptions'=>array('style'=>'cursor: pointer;'),
		'selectionChanged'=>"function(id){window.location='" . Yii::app()->urlManager->createUrl('appointment/view', array('id'=>'')) . "' + $.fn.yiiGridView.getSelection(id);}",

		'rowCssClassExpression' => '
        ( $row%2 ? $this->rowCssClass[1] : $this->rowCssClass[0] ) .
        ( $data->status ? null : " orangeBG" )
    ',
		'filter'=>$model,
		'columns'=>array(
			array(
                'header'=>'Sl.',
                'value'=>'$this->grid->dataProvider->pagination->offset + $row+1',       //  row is zero based
                'htmlOptions' => array('style' => "text-align:center; width:50px !important;", 'title' => 'ID'),
       		 ),
			array(
	                'name' => 'customer_id',
	                'value' => 'User::get_user_name($data->customer_id)',
	                'filter' => CHtml::activeDropDownList($model, 'customer_id', CHtml::listData(User::model()->findAll(array('condition' => 'group_id=8 AND company=' . Yii::app()->user->company.' AND shop_id=' . Yii::app()->user->shop_id, "order" => "name")), 'id', 'name'), array('empty' => 'All')),
	                'htmlOptions' => array('style' => "text-align:left; width:150px;text-transform:capitalize;"),
	            ),
			array(
	                'name' => 'shop_id',
	                'value' => 'Shop::get_shop($data->shop_id)',
	                'filter' => CHtml::activeDropDownList($model, 'shop_id', CHtml::listData(Shop::model()->findAll(array('condition' => 'company=' . Yii::app()->user->company, "order" => "title")), 'id', 'title'), array('empty' => 'All')),
	                'htmlOptions' => array('style' => "text-align:left; width:150px;"),
	            ),
			array(
	                'name' => 'staff_id',
	                'value' => 'User::get_user_name($data->staff_id)',
	                'filter' => CHtml::activeDropDownList($model, 'staff_id', CHtml::listData(User::model()->findAll(array('condition' => 'group_id=7 AND company=' . Yii::app()->user->company.' AND shop_id=' . Yii::app()->user->shop_id, "order" => "name")), 'id', 'name'), array('empty' => 'All')),
	                'htmlOptions' => array('style' => "text-align:left; width:150px;text-transform:capitalize;"),
	            ),
	 		array(
	                'name' => 'service_id',
	                'value' => 'Service::get_service_name($data->service_id)',
	                 'filter' => CHtml::activeDropDownList($model, 'service_id', CHtml::listData(Service::model()->findAll(array('condition' => 'company=' . Yii::app()->user->company.' AND shop=' . Yii::app()->user->shop_id, "order" => "title")), 'id', 'title'), array('empty' => 'All')),
	                'htmlOptions' => array('style' => "text-align:left; width:150px;"),
	            ), 
			'appoint_date',
			'appoint_time',
			//'total_cost',
			array(
	                'name' => 'total_cost',
	                'type' => 'raw',
	                //'value' => '$data->total_cost',
	                'value'=>'Appointment::getIdentifyCyrency($data->shop_id).\'\'.$data->total_cost',//.\' \'.$data->status
	                'htmlOptions' => array('style' => "text-align:left; width:100px;"),
	            ),
			/* array(
                    'name' => 'status',
                    'value' => '$data->status?Yii::t(\'app\',\'Upcoming\')Yii::t(\'app\',\'Completed\'):Yii::t(\'app\', \'Inactive\')',
                    'filter' => array('' => Yii::t('app', 'All'), '0' => Yii::t('app', 'Upcoming'), '1' => Yii::t('app', 'Completed'),  '2' => Yii::t('app', 'Incomplete')),
                    'htmlOptions' => array('style' => "text-align:center;"),
                ),
			*/
			
			array(
	                'header' => 'Action & status',
	                'type' => 'raw',
	                'value' => 'Appointment::buttonColor($data->status, $data->id,  $data->appoint_date, $data->appoint_time)',	                
	                'htmlOptions' => array('style' => "margin:0 auto; text-align:center;"),
	            ),
			/*'id','company_id','end_time',
			'service_category',
			'note',
			*/
			array(
            'class'=>'CButtonColumn',
            'header' => Yii::t( 'app', 'Tools' ),
        ),
		),
	)); 
 
?>	
 <?php echo CHtml::link('<i class="icon-plus"></i> Create New Appointment', array('create'), array('class' => 'btn btn-info btn-mini marginTop10px')); ?>

<?php /* echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
*/ ?>
<?php 
?>