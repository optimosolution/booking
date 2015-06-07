<?php
$this->pageTitle = Yii::t('Site', 'No_Access') . ' - ' . Yii::app()->name;
$this->breadcrumbs = array(
    Yii::t('Site', 'No_Access'),
);
?>
<?php
$this->beginWidget('bootstrap.widgets.TbHeroUnit', array(
    'heading' => Yii::t('Site', 'Error_403'),
));
?>
<p>You are not authorized to perform this action.</p>
<p><?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'type' => $model->isNewRecord ? 'success' : 'warning',
        'size' => 'large',
        'label' => Yii::t('Site', 'Contact_us'),
        'url' => array('site/contact'),
    ));
    ?></p>

<?php $this->endWidget(); ?>