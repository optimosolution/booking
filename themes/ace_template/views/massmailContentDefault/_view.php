<?php
/* @var $this MassmailContentDefaultController */
/* @var $data MassmailContentDefault */
?>

<div class="view" style="border-bottom: 2px dotted; padding:10px;">
	<div style="width:78%; float:left; border: 2px solid #CCC !important; padding:20px;" >
	 
		<b><?php echo CHtml::encode($data->getAttributeLabel('subject')); ?>:</b>
		<?php echo CHtml::encode($data->subject); ?>
		<br />
		<div style="height:200px !important; overflow:auto;"
		<b><?php echo CHtml::encode($data->getAttributeLabel('massmail_body')); ?>:</b>
		<?php echo substr("htmlspecialchars_decode(CHtml::encode($data->massmail_body))",600); ?>
	 	</div>
	 <?php /*
		<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
		<?php echo CHtml::encode($data->status); ?>
		<br />
	*/ ?>
	</div>
 	<div style="width:20%; float:left; margin-left:10px; " >	
		<div style="width:8%;  border:1 px solid #ccc;" >
		     <?php echo CHtml::link('<i class="icon-plus"></i>Use This Template', array('massmailContent/useTemplate', 'id'=>$data->id), array('class' => 'btn btn btn-primary', 'style'=>' float:left; margin-right:10px; margin-top:20px;')); ?>
		</div>
		<div style="width:8%; border:1 px solid #ccc;" >
		     <?php echo CHtml::link('<i class="icon-plus"></i>View Full Template', array('massmailContentDefault/view', 'id'=>$data->id), array('class' => 'btn btn btn-primary', 'style'=>' float:left; margin-right:10px; margin-top:20px;')); ?>
		</div>
	</div>	
	<div style="clear:left;"></div>
</div>