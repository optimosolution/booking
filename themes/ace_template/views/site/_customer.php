<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
$company=Yii::app()->user->company;
$shop_id=Yii::app()->user->shop_id;
$group_id=Yii::app()->user->group_id;
?>

<div class="page-content-area">

<div class="page-header">
			<h1>
				Dashboard
				<small>
					<i class="ace-icon fa fa-angle-double-right"></i>
					Registered Member<strong>(<?php Yii::app()->user->name; ?>)</strong>
				</small>
			</h1>
		</div><!-- /.page-header -->
		
		<div class="row">
			<div class="col-xs-12">
				<!-- PAGE CONTENT BEGINS -->
				<div class="alert alert-block alert-success">
					<button type="button" class="close" data-dismiss="alert">
						<i class="ace-icon fa fa-times"></i>
					</button>

					<i class="ace-icon fa fa-check green"></i>

					Welcome to
					<strong class="green">
						<?php echo CHtml::encode(Yii::app()->name); ?>
						<small>(v 0.1)</small>
					</strong>
				</div>

				 
				<div class="row">
					<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->
						<div class="row">
							<div class="col-sm-8">
								<div class="space"></div>

								<div id="calendar"></div>
							</div>

							<div class="col-sm-4">
							<div class="widget-box transparent">
								<div class="widget-header">
									<h4>Available Services</h4>
								</div>

								<div class="widget-body">
									<div class="widget-main no-padding">
										<div id="external-events">
											<?php
												$array = Yii::app()->db->createCommand()
								                ->select('*')
								                ->from('{{service}}')
								                ->where('shop='.$shop_id.' AND company='.$company.' AND published=1')
								                ->queryAll();

								                foreach ($array as $key => $values) {  
											?>
											<a href="index.php?r=appointment/create&service_id=<?php print $values['id']; ?>" class="serviceListLink" style="cursor:pointer !important;" >
											<div class="external-event label-success" data-class="label-grey">
												<i class="ace-icon fa fa-arrows"></i>
												<?php print $values['title']; ?>

												<i class="ace-icon fa fa-sign-in fright linkServiceFontIco" style=""></i>
											</div></a>
											<?php } ?> 
 
										</div>
									</div>
								</div>
							</div>
						</div>
						</div>

					<!-- PAGE CONTENT ENDS -->
					</div><!-- /.col -->
				</div><!-- /.row --><!-- /.row -->
						<!-- PAGE CONTENT ENDS -->
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.page-content-area -->

<!-- /.page-content-area -->
