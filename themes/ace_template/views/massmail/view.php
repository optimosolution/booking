<?php
/* @var $this MassmailController */
/* @var $model Massmail */
?>

<?php
$this->pageTitle = 'Mass Mail details - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Mass Mail' => array('admin'),
    $model->mail_content_id,
);
?>
<div class="widget-box">
    <div class="widget-header">
        <h5>Details Mass Mail (<?php echo MassmailContent::get_subject($model->mail_content_id); ?>)</h5>
        <div class="widget-toolbar">
            <a data-action="settings" href="#"><i class="icon-cog"></i></a>
            <a data-action="reload" href="#"><i class="icon-refresh"></i></a>
            <a data-action="collapse" href="#"><i class="icon-chevron-up"></i></a>
            <a data-action="close" href="#"><i class="icon-remove"></i></a>
        </div>
        <div class="widget-toolbar">
            <?php echo CHtml::link('<i class="icon-pencil"></i>', array('update', 'id' => $model->id), array('data-rel' => 'tooltip', 'title' => 'Edit', 'data-placement' => 'bottom')); ?>
        </div>
        <div class="widget-toolbar">
            <?php echo CHtml::link('<i class="icon-plus"></i>', array('create'), array('data-rel' => 'tooltip', 'title' => 'Add', 'data-placement' => 'bottom')); ?>
        </div>
    </div><!--/.widget-header -->
    <div class="widget-body">
        <div class="widget-main">
            <?php
            $this->widget('zii.widgets.CDetailView', array(
                'htmlOptions' => array(
                    'class' => 'table table-striped table-condensed table-hover',
                ),
                'data' => $model,
                'attributes' => array(
                    'id',
                    'users',
                    array(
                        'name' => 'mail_content_id',
                        'type' => 'raw',
                        'value' => MassmailContent::get_subject($model->mail_content_id),
                        //'value' => UserAdmin::get_user_name($model->created_by),
                    ),
                    array(
                        'name' => 'message_body',
                        'type' => 'raw',
                        'value' => MassmailContent::get_message_body($model->mail_content_id),
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'send_by',
                        'type' => 'raw',
                        'value' => User::get_user_name($model->send_by),
                        //'value' => UserAdmin::get_user_name($model->created_by),
                    ),
                    array(
                        'name' => 'send_on',
                        'type' => 'raw',
                        'value' => $model->created_on,
                    ),
                    array(
                        'name' => 'modified_by',
                        'type' => 'raw',
                        'value' => User::get_user_name($model->modified_by),
                    ),
                    array(
                        'name' => 'modified_on',
                        'type' => 'raw',
                        'value' => $model->modified_on,
                    ),
                ),
            ));
            ?>
        </div>
    </div><!--/.widget-body -->
</div><!--/.widget-box -->