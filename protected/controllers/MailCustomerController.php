<?php

class MailCustomerController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}


	public function beforeAction(CAction $action)
		{
		    if(!isset(Yii::app()->user->id))
		    {
		        $this->redirect(array('site/login'));
		    }

		    return true;
		}
	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','viewCustomer'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','createSowner','update','admin','adminCustomer','adminSowner','download'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','adminCustomer','adminSowner'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}


	public function actionViewCustomer($id)
	{
		$this->render('view_customer',array(
			'model'=>$this->loadModel($id),
		));
	}
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate() // this is for Customer who send messages to Shop Owner
	{
		$model=new MailCustomer;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);		 
        
		if(isset($_POST['MailCustomer']))
		{
			$model->attributes=$_POST['MailCustomer'];
			$model->send_on = new CDbExpression('NOW()');
			$model->customer_id=Yii::app()->user->id;

//$model->store_owner=1006;

			$shop_id=Yii::app()->user->shop_id;
	    	$storeowner = Yii::app()->db->createCommand()
	        ->select('id')
	        ->from('{{user}}')
	        ->where('shop_id='.$shop_id.' AND group_id=6') //we can add 'storeowner=1' for adding an another fileter to find sowenr
	        ->queryScalar();	
         
	        $path = Yii::app()->basePath . '/../uploads/email_attachment';
		        if (!is_dir($path)) {
		            mkdir($path);
		        }
		    //File upload script
                if (@!empty($_FILES['MailCustomer']['name']['attached_file'])) {
                    $model->attached_file = $_POST['MailCustomer']['attached_file'];
                    if ($model->validate(array('attached_file'))) {
                        $model->attached_file = CUploadedFile::getInstance($model, 'attached_file');
                    } else {
                        $model->attached_file = null;
                    }
                    $model->attached_file->saveAs($path . '/' . time() . '_' . str_replace(' ', '_', strtolower($model->attached_file)));
                    $model->attached_file = time() . '_' . str_replace(' ', '_', strtolower($model->attached_file));
                }
                    
			$storeowner_name= User::get_user_name($storeowner);
			$model->store_owner=$storeowner;
			$model->mail_status=1; //1 = unread email, 2= read emial
			
			if($model->save()){
				//Send mail to user
                    $message = "Hellow Mr. " .$storeowner_name. ", <br /><br />";
                    $message .= $model->message_body."<br /><br />" ;
                    $message .= "Sincerely, <br />" . Yii::app()->user->name."<br /><br />" ;
                     if (!empty($model->attached_file)) {
                     	 $message .= "<strong>Attachment File: </stong> <br /><a href='uploads/email_attachment/" . $model->attached_file."' tilte='' target='_blalnk' >" . $model->attached_file."</a>" ;
                     }
                    $to = User::get_user_email($storeowner);
                    $subject = 'Message From Customer ('.Yii::app()->user->name.')';
                    $fromName = Yii::app()->user->name;
                    $fromMail = Yii::app()->user->email;
					
					//Test 
					/*
					print  $to = User::get_user_email($storeowner)."<br /><br />" ;

                    print  $storeowner_name= User::get_user_name($storeowner)."<br /><br />" ;

					print $fromName = Yii::app()->user->name."<br /><br />" ;
                    print  $fromMail = Yii::app()->user->email."<br /><br />" ;
                    print  $message .= $model->message_body."<br /><br />" ;
                    exit();                    
 					*/
                    User::sendMail($to, $subject, $message, $fromName, $fromMail);
                    Yii::app()->user->setFlash('success', 'Thank you for your message to Store Owner. Your message has been successfully delivered.');

				$this->redirect(array('viewCustomer','id'=>$model->id));
			}	
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}


	public function actionCreateSowner()
	{
		$model=new MailCustomer;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);		 
        
		if(isset($_POST['MailCustomer']))
		{
			$model->attributes = $_POST['MailCustomer'];
			$model->send_on = new CDbExpression('NOW()');
			//$model->customer_id = Yii::app()->user->id;

			$reply_to=$model->customer_id; //For Mail Function not for database save***

 	    	$reply_to_name = Yii::app()->db->createCommand() //storing the Customer's name to mail him.
	        ->select('name')
	        ->from('{{user}}')
	        ->where('id='.$reply_to)
	        ->queryScalar();	
         
	        $reference_mail=$model->reference_mail;

			$subject= MailCustomer::get_subject($reference_mail);

			$model->subject='RE: '.$subject;

			$model->store_owner=Yii::app()->user->id;

 			$model->mail_status=1;
			
			if($model->save()){
				//Send mail to user
                    $message = "Hellow Mr. " .$reply_to_name. ", <br /><br />";
                    $message.= $model->message_body."<br /><br />" ;
                    $message.= "Sincerely, <br />" . Yii::app()->user->name;
                    $to = User::get_user_email($reply_to);
                    $subject = 'Message From Shop Owner ('.Yii::app()->user->name.')';
                    $fromName = Yii::app()->user->name;
                    $fromMail = Yii::app()->user->email;
					
					//Test 
					/*
					print  $to = User::get_user_email($storeowner)."<br /><br />" ;

                    print  $storeowner_name= User::get_user_name($storeowner)."<br /><br />" ;

					print $fromName = Yii::app()->user->name."<br /><br />" ;
                    print  $fromMail = Yii::app()->user->email."<br /><br />" ;
                    print  $message .= $model->message_body."<br /><br />" ;
                    exit();                    
 					*/
                    User::sendMail($to, $subject, $message, $fromName, $fromMail);
                    Yii::app()->user->setFlash('success', 'Message Reply to '.$reply_to_name.'has been successful.');

				$this->redirect(array('view','id'=>$model->id));
			}	
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['MailCustomer']))
		{
			$model->attributes=$_POST['MailCustomer'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('MailCustomer');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new MailCustomer('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['MailCustomer']))
			$model->attributes=$_GET['MailCustomer'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionAdminCustomer()
	{
		$model=new MailCustomer('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['MailCustomer']))
			$model->attributes=$_GET['MailCustomer'];

		$this->render('admin_customer',array(
			'model'=>$model,
		));
	}

	public function actionAdminSowner()
	{
		$model=new MailCustomer('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['MailCustomer']))
			$model->attributes=$_GET['MailCustomer'];

		$this->render('admin_sowner',array(
			'model'=>$model,
		));
	}


	// Function to make download link in view page

	public function actionDownload($id) {
        $this->render('download', array(
            'model' => $this->loadModel($id),
        ));
    }

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return MailCustomer the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=MailCustomer::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param MailCustomer $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='mail-customer-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
