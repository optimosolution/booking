<?php
/* @var $this StaffController */
/* @var $model Staff */

$this->breadcrumbs=array(
	'Staff'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Staff', 'url'=>array('index')),
	array('label'=>'Create Staff', 'url'=>array('create')),
	array('label'=>'Update Staff', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Staff', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Staff', 'url'=>array('admin')),
);
?>

<h1>View Staff #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'profile_picture',
		array(
                    'name' => 'profile_picture',
                    'type' => 'raw',
                    'value' => Staff::get_profile_picture($model->id),
                    'htmlOptions' => array('style' => "text-align:left;width:50px;", 'title' => 'Profile Pic', 'class' => 'img-rounded'),
                ),
		//'id',
		'name',
		'username',
		'email',
		array(
                'name' => 'company',
                'type' => 'raw',
                'value' => Company::get_company_name($model->company), 
                 'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Company Name'),
                ),
 		array(
                'name' => 'Store Name',
                'type' => 'raw',
                'value' => Shop::get_shop($model->shop_id), 
                 'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Store Name'),
                ),
  		array(
                'name' => 'Employee Type',
                'type' => 'raw',
                'value' => UserGroup::get_user_group($model->group_id), 
                 'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Employee Type'),
                ),
		'address',
 			array(
                'name' => 'Country',
                'type' => 'raw',
                'value' => Country::getCountry($model->country), 
                 'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Country Name'),
                ),
		array(
                'name' => 'State',
                'type' => 'raw',
                'value' => State::getState($model->state), 
                 'htmlOptions' => array('style' => "text-align:left;", 'title' => 'State Name'),
                ),
		array(
                'name' => 'City',
                'type' => 'raw',
                'value' => City::getCity($model->city), 
                 'htmlOptions' => array('style' => "text-align:left;", 'title' => 'City Name'),
                ),
		'phone',
		'mobile',
		'fax',
		'website',
		
		
		'registerDate',
		'lastvisitDate',
		'status',
		//'storeowner','user_type','password','activation',
	),
)); ?>
<div class="appointmentsNote" style="padding:20px; margin:20px 0;">
    <h3 style="background:#CCC; padding:10px">Secondary Contact Person</h3>
    <?php                                
        $arrayY = Yii::app()->db->createCommand()
        ->select('*')
        ->from('{{staff_second_contact}}')
         ->where('staff_id='.$model->id)
         ->queryAll();
        foreach ($arrayY as $key => $valuesY) {  
     ?>
     <div>
     	<table width="100%" cellpadding="5" border="1" cellspacing="2" style="border: 2px solid #CCC;">
     		<tr><td style="padding:5px; text-align:right; width:15% !important;" ><strong>Name: </strong></td><td style="padding:5px;"><?php echo $valuesY['name_second_contact']; ?></td></tr>
     		<tr><td style="padding:5px; text-align:right;"><strong>Email: </strong></td><td style="padding:5px;"><?php echo $valuesY['email_second_contact']; ?></td></tr>
     		<tr><td style="padding:5px; text-align:right;"><strong>Phone:</strong> </td><td style="padding:5px;"><?php echo $valuesY['phone_second_contact']; ?></td></tr>
     		<tr><td style="padding:5px; text-align:right;"><strong>Address:</strong> </td><td style="padding:5px;"><?php echo $valuesY['address_second_contact']; ?></td></tr>
     	</table>
     </div>
    <?php } ?>
</div>

<div class="widget-foot">
    <!-- Footer goes here -->
    <?php echo CHtml::link('<i class="icon-plus"></i> Update', array('update', 'id'=>$model->id), array('class' => 'btn btn btn-success', 'style'=>'width:150px; float:left; margin-right:10px; margin-top:20px;')); ?>
    <?php echo CHtml::link('<i class="icon-plus"></i> Create New', array('create'), array('class' => 'btn btn btn-primary', 'style'=>' float:left; margin-right:10px; margin-top:20px;')); ?>
    <?php //echo CHtml::link('<i class="icon-edit"></i> Edit', array('Reply', 'id' => $model->id), array('class' => 'btn btn-info btn-mini')); ?>
    

</div>
