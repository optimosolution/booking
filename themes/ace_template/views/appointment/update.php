<?php
/* @var $this AppointmentController */
/* @var $model Appointment */
?>

<?php
$this->breadcrumbs=array(
	'Appointments'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Appointment', 'url'=>array('index')),
	array('label'=>'Create Appointment', 'url'=>array('create')),
	array('label'=>'View Appointment', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Appointment', 'url'=>array('admin')),
);


//Start For chained dropdown menu //
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile(Yii::app()->request->baseUrl . '/js/jquery.chained.js', CClientScript::POS_END);


Yii::app()->clientScript->registerScript('chain-select', " 
    $('#Appointment_service_id').chained('#Appointment_service_category');
    $('#Appointment_total_cost').chained('#Appointment_service_id');
    ");

?>

    <h1>Update Appointment <?php echo $model->appoint_date; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>