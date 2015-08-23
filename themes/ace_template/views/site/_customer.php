<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
$company=Yii::app()->user->company;
$shop_id=Yii::app()->user->shop_id;
$group_id=Yii::app()->user->group_id;
$customer_id=Yii::app()->user->id;
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
					</div><!-- /.col -->
				</div><!-- /.row --><!-- /.row -->
				<div class="hr hr32 hr-dotted"></div>

				<div class="row">
					<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->
					<div class="row">
						<div class="col-xs-12">
							<div class="tabbable">
								<ul id="inbox-tabs" class="inbox-tabs nav nav-tabs padding-16 tab-size-bigger tab-space-1">
									<li class="li-new-mail pull-right">
										    <?php echo CHtml::link('<i class="ace-icon fa fa-envelope bigger-130" style="width:20% !important; float:left;"></i> Write Email', array('mailCustomer/create'), array('class' => 'btn btn-purple btn-new-mail', 'style'=>'border-radius:5px !important; border:1px solid #FFF !important; padding:10px !important; width:130px !important;')); ?>
										 
									</li><!-- /.li-new-mail -->

									<li class="active">
										<a data-toggle="tab" href="#inbox" data-target="inbox">
											<i class="blue ace-icon fa fa-inbox bigger-130"></i>
											<span class="bigger-110">Message Inbox</span>
										</a>
									</li>

								</ul>
								<?php
									$resultUnreadEmail=MailCustomer::model()->findAllBySql("select * from os_mail_customer where mail_status=1 and customer_id=$customer_id and created_by <> $customer_id"); 
									$count_val=count($resultUnreadEmail);
								?>
								<div class="tab-content no-border no-padding">
									<div id="inbox" class="tab-pane in active">
										<div class="message-container">
											<div id="id-message-list-navbar" class="message-navbar clearfix">
												<div class="message-bar">
													<div class="message-infobar" id="id-message-infobar">
														<span class="blue bigger-150">Inbox</span>
														<span class="grey bigger-110">(<?php echo $count_val; ?> unread messages)</span>
													</div>
												</div>
											</div>

											<?php
													$arrayY = Yii::app()->db->createCommand()
									                ->select('*')
									                ->from('{{mail_customer}}')
									                 ->where('customer_id='.$customer_id)
									                 ->where('created_by<>'.$customer_id)
									                 ->limit(5)
									                 ->order('mail_status')  
									                 ->order('send_on DESC')  
									                ->queryAll();
												?>
											<div class="message-list-container">
												<div class="message-list" id="message-list">
												<?php 
													 foreach ($arrayY as $key => $valuesY) {  

													 	if($valuesY['mail_status']==1){
												?>
													<div class="message-item message-unread">
														 
														<i class="ace-icon fa fa-envelope bigger-130 light-grey"></i>
														<span class="sender" title="Alex John Red Smith" style="width:120px;"><?php echo CHtml::link(User::get_user_name($valuesY['store_owner']),array('mailCustomer/viewCustomer', 'id'=>$valuesY['id'])); ?>
														</span>
														<span class="time"style="width:150px;">
															<?php echo CHtml::link($valuesY['send_on'],array('mailCustomer/viewCustomer', 'id'=>$valuesY['id'])); ?>
														</span>
														<?php if (!empty($valuesY['attached_file'])){ ?>
															<span class="attachment"><i class="ace-icon fa fa-paperclip"></i></span>
														<?php } ?>
														<span class="summary">
															<span class="text">
																<?php echo CHtml::link($valuesY['subject'],array('mailCustomer/viewCustomer', 'id'=>$valuesY['id'])); ?>
															</span>
														</span>
													</div>

													<?php } else { ?>

													<div class="message-item">
														 
														<i class="ace-icon fa fa-envelope-o bigger-130 light-grey"></i>
														<span class="sender" title="Alex John Red Smith" style="width:120px;"><?php echo User::get_user_name($valuesY['store_owner']);?></span>
														<span class="time" style="width:150px !important;"><?php echo $valuesY['send_on']; ?></span>
														<?php if (!empty($valuesY['attached_file'])){ ?>
															<span class="attachment"><i class="ace-icon a fa-paperclip"></i></span>
														<?php } ?>
														<span class="summary">
															<span class="text">
																<?php echo CHtml::link($valuesY['subject'],array('mailCustomer/view', 'id'=>$valuesY['id'])); ?>
															</span>
														</span>
													</div>
												<?php } } ?>
												 
												</div>
											</div>
											<?php
												$resultUnreadEmail=mailCustomer::model()->findAllBySql("select * from os_mail_customer where customer_id=$customer_id"); 
												$count_val=count($resultUnreadEmail);
											?>
											<div class="message-footer clearfix">
												<div class="pull-left"> <?php echo $count_val; ?> messages total </div>

												<div class="pull-right">
													 <?php echo CHtml::link('<i class="icon-plus"></i> view all', array('mailCustomer/adminCustomer'), array('class' => 'btn btn-info btn-mini marginTop10px')); ?>
												</div>
											</div>
										</div>
									</div>
								</div><!-- /.tab-content -->
							</div><!-- /.tabbable -->
						</div><!-- /.col -->
					</div><!-- /.row -->
					<div class="hr hr32 hr-dotted"></div>

					<div class="hide message-content" id="id-message-content">
						<div class="message-header clearfix">
							<div class="pull-left">
								<span class="blue bigger-125"> Clik to open this message </span>

								<div class="space-4"></div>

								<i class="ace-icon fa fa-star orange2"></i>

								&nbsp;
								<img class="middle" alt="John's Avatar" src="assets/avatars/avatar.png" width="32" />
								&nbsp;
								<a href="#" class="sender">John Doe</a>

								&nbsp;
								<i class="ace-icon fa fa-clock-o bigger-110 orange middle"></i>
								<span class="time grey">Today, 7:15 pm</span>
							</div>

							<div class="pull-right action-buttons">
								<a href="#">
									<i class="ace-icon fa fa-reply green icon-only bigger-130"></i>
								</a>

								<a href="#">
									<i class="ace-icon fa fa-mail-forward blue icon-only bigger-130"></i>
								</a>

								<a href="#">
									<i class="ace-icon fa fa-trash-o red icon-only bigger-130"></i>
								</a>
							</div>
						</div>

						<div class="hr hr-double"></div>

						<div class="message-body">
							<p>
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
							</p>

							<p>
								Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
							</p>

							<p>
								Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
							</p>

							<p>
								Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
							</p>

							<p>
								Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
							</p>

							<p>
								Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
							</p>
						</div>

						<div class="hr hr-double"></div>

						<div class="message-attachment clearfix">
							<div class="attachment-title">
								<span class="blue bolder bigger-110">Attachments</span>
								&nbsp;
								<span class="grey">(2 files, 4.5 MB)</span>

								<div class="inline position-relative">
									<a href="#" data-toggle="dropdown" class="dropdown-toggle">
										&nbsp;
										<i class="ace-icon fa fa-caret-down bigger-125 middle"></i>
									</a>

									<ul class="dropdown-menu dropdown-lighter">
										<li>
											<a href="#">Download all as zip</a>
										</li>

										<li>
											<a href="#">Display in slideshow</a>
										</li>
									</ul>
								</div>
							</div>

							&nbsp;
							<ul class="attachment-list pull-left list-unstyled">
								<li>
									<a href="#" class="attached-file">
										<i class="ace-icon fa fa-file-o bigger-110"></i>
										<span class="attached-name">Document1.pdf</span>
									</a>

									<span class="action-buttons">
										<a href="#">
											<i class="ace-icon fa fa-download bigger-125 blue"></i>
										</a>

										<a href="#">
											<i class="ace-icon fa fa-trash-o bigger-125 red"></i>
										</a>
									</span>
								</li>

								<li>
									<a href="#" class="attached-file">
										<i class="ace-icon fa fa-film bigger-110"></i>
										<span class="attached-name">Sample.mp4</span>
									</a>

									<span class="action-buttons">
										<a href="#">
											<i class="ace-icon fa fa-download bigger-125 blue"></i>
										</a>

										<a href="#">
											<i class="ace-icon fa fa-trash-o bigger-125 red"></i>
										</a>
									</span>
								</li>
							</ul>

							<div class="attachment-images pull-right">
								<div class="vspace-4-sm"></div>

								<div>
									<img width="36" alt="image 4" src="assets/images/gallery/thumb-4.jpg" />
									<img width="36" alt="image 3" src="assets/images/gallery/thumb-3.jpg" />
									<img width="36" alt="image 2" src="assets/images/gallery/thumb-2.jpg" />
									<img width="36" alt="image 1" src="assets/images/gallery/thumb-1.jpg" />
								</div>
							</div>
						</div>
					</div><!-- /.message-content -->

					<!-- PAGE CONTENT ENDS -->
					</div><!-- /.col
					<div class="vspace-12-sm"></div>
					<div class="col-sm-5">
					</div> -->
				</div><!-- /.row -->
				<div class="hr hr32 hr-dotted"></div>
				<!-- PAGE CONTENT ENDS -->
				<!-- PAGE CONTENT ENDS -->
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.page-content-area -->

<!-- /.page-content-area -->
