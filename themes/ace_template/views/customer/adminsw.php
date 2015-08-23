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

<h1>Registered Customers</h1>
  

<?php /* echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
*/ ?>
 
<?php 
     
  $this->widget('zii.widgets.grid.CGridView',array(
	'id'=>'customer-grid',
	//'dataProvider'=>$model->search(),
	'dataProvider'=>$model->search(array('condition'=>'company='.$company_id.' AND group_id=8 AND shop_id='.$shop_id )),
	'htmlOptions'=>array('style'=>'cursor: pointer;'),
	'selectionChanged'=>"function(id){window.location='" . Yii::app()->urlManager->createUrl('customer/view', array('id'=>'')) . "' + $.fn.yiiGridView.getSelection(id);}",
	
	'filter'=>$model,
	'columns'=>array(
		array(
                'header'=>'Sl.',
                'value'=>'$this->grid->dataProvider->pagination->offset + $row+1',       //  row is zero based
                'htmlOptions' => array('style' => "text-align:center; width:50px !important;", 'title' => 'ID'),
        ),
		'name',
		'email',
		'phone',
		/*
		array( // this is for your related group members of the current group
            'name'=>'Number of visit', // this will access the attributeLabel from the member model class, and assign it to your column header
            'value' => 'Appointment::get_visit_amount($data->id)', 
            'type'=>'raw' // this tells that the value type is raw and no formatting is to be applied to it
         ),
		*/
		'registerDate',
		'lastvisitDate',
		array(
            'name' => 'status',
            'value' => '$data->status == 0 ? "Disabled" : "Active"','htmlOptions' => array('style' => "text-align:center; width:50px !important;", 'title' => 'ID'),
        ),         
		/*
		'username','password',//'shop_id//'id',',
		'activation',
		'group_id',
		'address',
		'country',
		'state',
		'city',
		'fax',
		'website',
		'profile_picture',
		'storeowner',
		'user_type',
		*/
		array(
			 'header' => '',
			 'class' => 'CButtonColumn',
			 'htmlOptions' => array('style' => "text-align:center;width:100px;", 'class' => ''),
			 'template' => '{view} {update} {delete}',
			 'buttons' => array(
			  'view' => array(
			   'label' => '',
			   'imageUrl' => '',
			   'url' => 'Yii::app()->createUrl("/customer/view", array("id"=>$data["id"]))',
			   'options' => array('class' => 'btn btn-xs btn-info fa fa-eye'),
			  ),
			  'update' => array(
			   'label' => '',
			   'imageUrl' => '',
			   'url' => 'Yii::app()->createUrl("/customer/update", array("id"=>$data["id"]))',
			   'options' => array('class' => 'btn btn-xs btn-info fa fa-pencil'),
			  ),
			  'delete' => array(
			   'label' => '',
			   'imageUrl' => '',
			   'url' => 'Yii::app()->createUrl("/customer/delete", array("id"=>$data["id"]))',
			   'options' => array('class' => 'btn btn-xs btn-danger fa fa-trash-o'),
			  ),
			 ),
			),
	),
)); ?>
