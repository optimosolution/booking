<?php
/* @var $this ServiceController */
/* @var $model Service */
?>

<?php
$this->pageTitle = 'New Service - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Services' => array('admin'),
    'Create',
);
$this->widget('application.extensions.fancybox.EFancyBox', array(
    'target' => "a#popup",
    'config' => array(
        'centerOnScroll' => true,
        'openEffect' => 'elastic',
        'closeEffect' => 'elastic',
        'showNavArrows' => false,
    ),
));
?>
<div class="widget">
    <div class="widget-head">
        <div class="pull-left">New Service</div>
        <div class="widget-icons pull-right">
            <a class="wminimize" href="#"><i class="icon-chevron-up"></i></a> 
            <a class="wclose" href="#"><i class="icon-remove"></i></a>
        </div>  
        <div class="clearfix"></div>
    </div>
    <div class="widget-content" style="display: block;">
        <div class="padd">
            <?php $this->renderPartial('_form', array('model' => $model)); ?>
        </div>
    </div>
    <div class="widget-foot">
        <!-- Footer goes here -->
    </div>
</div>
<script>
    function update_shop()
    {
        $("#shop_update").load('<?php echo Yii::app()->getRequest()->getUrl(); ?> #shop_update');
        $('a#popup').livequery(function() {
            $(this).fancybox();
        });
    }
    function update_category()
    {
        $("#category_update").load('<?php echo Yii::app()->getRequest()->getUrl(); ?> #category_update');
        $('a#popup').livequery(function() {
            $(this).fancybox();
        });
    }
</script>