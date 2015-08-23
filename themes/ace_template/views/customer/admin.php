<?php
/* @var $this CustomerController */
/* @var $model Customer */


$this->breadcrumbs=array(
	'Customers'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Customer', 'url'=>array('index')),
	array('label'=>'Create Customer', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#customer-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");

//Find the Company Name of Current user:
$company_id=Yii::app()->user->company;
$shop_id=Yii::app()->user->shop_id;

?>

<h1>Customers</h1>
 
<?php /* echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
*/ ?>
<?php $this->widget('zii.widgets.grid.CGridView',array(
	'id'=>'customer-grid',
	//'dataProvider'=>$model->search(),
	'dataProvider'=>$model->search(array('condition'=>'company='.$company_id.' AND group_id=8')),
	'htmlOptions'=>array('style'=>'cursor: pointer;'),
	'selectionChanged'=>"function(id){window.location='" . Yii::app()->urlManager->createUrl('customer/view', array('id'=>'')) . "' + $.fn.yiiGridView.getSelection(id);}",

	'filter'=>$model,
	'columns'=>array(
		array(
                'header'=>'Sl.',
                'value'=>'$this->grid->dataProvider->pagination->offset + $row+1',       //  row is zero based
                'htmlOptions' => array('style' => "text-align:center; width:50px !important;", 'title' => 'ID'),
        ),
        //'profile_picture',
		'name',
		'email',
		'phone',
		 array(
                'name' => 'company',
                'type' => 'raw',
                'value' => 'Company::get_company_name($data->company)', //This part is Not working
               // 'filter' => CHtml::activeDropDownList($model, 'company', CHtml::listData(Company::model()->findAll(array("order" => "company_name")), 'id', 'company_name'), array('empty' => 'All')),
                'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Company'),
                ),
		  array(
                'name' => 'shop_id',
                'type' => 'raw',
                'value' => 'Shop::get_shop($data->shop_id)', //This part is Not working
                'filter' => CHtml::activeDropDownList($model, 'shop_id', CHtml::listData(Shop::model()->findAll(array("order" => "id")), 'id', 'title'), array('empty' => 'All')),
                'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Shop Name'),
                ),
		  'registerDate','lastvisitDate',
		  array(
            'name' => 'status',
            'value' => '$data->status == 0 ? "Disabled" : "Active"','htmlOptions' => array('style' => "text-align:center; width:50px !important;", 'title' => 'ID'),
        ),
		/*'username','password',
		'country',
		'state',
		'city',
		
		'activation',
		'group_id',
		'address',
		
		
		'fax',
		'website',
		
		
		'storeowner',
		'user_type',
		
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>