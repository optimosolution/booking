<?php
/* @var $this MassmailController */
/* @var $model Massmail */

$this->pageTitle = 'Mass Mail - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Mass Mail' => array('admin'),
    'Manage',
);
?>
<div class="widget-box">
    <div class="widget-header">
        <h5>Manage Mass Mail</h5>
        <div class="widget-toolbar">
            <a data-action="settings" href="#"><i class="icon-cog"></i></a>
            <a data-action="reload" href="#"><i class="icon-refresh"></i></a>
            <a data-action="collapse" href="#"><i class="icon-chevron-up"></i></a>
            <a data-action="close" href="#"><i class="icon-remove"></i></a>
        </div>
        <div class="widget-toolbar">
            <?php echo CHtml::link('<i class="icon-plus"></i>', array('create'), array('data-rel' => 'tooltip', 'title' => 'Add', 'data-placement' => 'bottom')); ?>
        </div>
    </div><!--/.widget-header -->
    <div class="widget-body">
        <div class="widget-main">

            <?php $this->widget('zii.widgets.grid.CGridView', array(
                'id'=>'massmail-grid',
                'dataProvider' => $model->search(),
                'htmlOptions'=>array('style'=>'cursor: pointer;'),
                'selectionChanged'=>"function(id){window.location='" . Yii::app()->urlManager->createUrl('massmail/view', array('id'=>'')) . "' + $.fn.yiiGridView.getSelection(id);}",

                'filter' => $model,
                'columns' => array(
                     array(
                        'header' => 'Subject',
                        'type' => 'raw',
                        'value' => 'MassmailContent::get_subject($data->mail_content_id)',
                        'htmlOptions' => array('style' => "text-align:right;width:70px;", 'title' => 'Send mail!'),
                    ),
                    array(
                        'header' => 'Send',
                        'type' => 'raw',
                        'value' => 'Massmail::get_mail_send($data->id)',
                        'htmlOptions' => array('style' => "text-align:right;width:70px;", 'title' => 'Send mail!'),
                    ),
                    array(
                        'class'=>'CButtonColumn',
                    ),
                ),
            ));
            ?>
        </div>
    </div><!--/.widget-body -->
</div><!--/.widget-box -->