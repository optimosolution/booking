<?php

class CustomerController extends Controller
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

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','regCustomer',),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','admin','delete','regCustomer', 'adminsw','ajaxupdate'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
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

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */

	public function actionCreate() {
        //$this->layout = '//layouts/register_customer';
        //$this->page_title = 'Registration';
        $model = new Customer;
       // $model_company = new Company;
        $path = Yii::app()->basePath . '/../uploads/profile_picture';
        if (!is_dir($path)) {
            mkdir($path);
        }

        if (isset($_POST['Customer'])) {
            $model->attributes = $_POST['Customer'];
            if ($model->validate()) {
                $model->password = SHA1($model->password);
                $model->registerDate = new CDbExpression('NOW()');
                $model->activation = md5(microtime());
            
                $model->group_id = 8;
                $model->user_type = 8;
                $model->status = 2;
                
                //Picture upload script
                if (@!empty($_FILES['Customer']['name']['profile_picture'])) {
                    $model->profile_picture = $_POST['Customer']['profile_picture'];
                    if ($model->validate(array('profile_picture'))) {
                        $model->profile_picture = CUploadedFile::getInstance($model, 'profile_picture');
                    } else {
                        $model->profile_picture = null;
                    }
                    $model->profile_picture->saveAs($path . '/' . time() . '_' . str_replace(' ', '_', strtolower($model->profile_picture)));
                    $model->profile_picture = time() . '_' . str_replace(' ', '_', strtolower($model->profile_picture));
                }
                if ($model->save()) {
                    
                    //Send mail to user
                    $message = "Hello " . $model->name . ", <br /><br />";
                    $message .= "Welcome to " . Yii::app()->params['adminName'] . ". Please click on the link below to activate your account.  Alternatively, you can copy and paste the complete URL on the address bar of your browser and then press the Enter key.  <br /><br />";
                    $message .= 'http://' . $_SERVER['HTTP_HOST'] . $this->createUrl('user/activate', array("id" => $model->id, "activation" => $model->activation));
                    $message .= "<br /><br />Sincerely, <br />" . Yii::app()->params['adminName'];
                    $to = $model->email;
                    $subject = 'Welcome to ' . Yii::app()->params['adminName'];
                    $fromName = Yii::app()->params['adminName'];
                    $fromMail = Yii::app()->params['adminEmail'];
                    User::sendMail($to, $subject, $message, $fromName, $fromMail);

                    //Yii::app()->user->setFlash('success', 'Thanks for registering with us! Please check your email to activate account.');
                    $this->redirect(array('Customer/adminsw'));
                }
            }
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }
 
	public function actionRegCustomer() {
        $this->layout = '//layouts/register_customer';
        //$this->page_title = 'Registration';
        $model = new Customer;
       // $model_company = new Company;
        $path = Yii::app()->basePath . '/../uploads/profile_picture';
        if (!is_dir($path)) {
            mkdir($path);
        }

        if (isset($_POST['Customer'])) {
            $model->attributes = $_POST['Customer'];
            if ($model->validate()) {
                $model->password = SHA1($model->password);
                $model->registerDate = new CDbExpression('NOW()');
                $model->activation = md5(microtime());
            
                $model->group_id = 8;
                $model->user_type = 8;
                $model->status = 2;
                
                //Picture upload script
                if (@!empty($_FILES['Customer']['name']['profile_picture'])) {
                    $model->profile_picture = $_POST['Customer']['profile_picture'];
                    if ($model->validate(array('profile_picture'))) {
                        $model->profile_picture = CUploadedFile::getInstance($model, 'profile_picture');
                    } else {
                        $model->profile_picture = null;
                    }
                    $model->profile_picture->saveAs($path . '/' . time() . '_' . str_replace(' ', '_', strtolower($model->profile_picture)));
                    $model->profile_picture = time() . '_' . str_replace(' ', '_', strtolower($model->profile_picture));
                }
                if ($model->save()) {
                    
                    //Send mail to user
                    $message = "Hello " . $model->name . ", <br /><br />";
                    $message .= "Welcome to " . Yii::app()->params['adminName'] . ". Please click on the link below to activate your account.  Alternatively, you can copy and paste the complete URL on the address bar of your browser and then press the Enter key.  <br /><br />";
                    $message .= 'http://' . $_SERVER['HTTP_HOST'] . $this->createUrl('user/activate', array("id" => $model->id, "activation" => $model->activation));
                    $message .= "<br /><br />Sincerely, <br />" . Yii::app()->params['adminName'];
                    $to = $model->email;
                    $subject = 'Welcome to ' . Yii::app()->params['adminName'];
                    $fromName = Yii::app()->params['adminName'];
                    $fromMail = Yii::app()->params['adminEmail'];
                    User::sendMail($to, $subject, $message, $fromName, $fromMail);

                    Yii::app()->user->setFlash('success', 'Thanks for registering with us! Please check your email to activate account.');
                    $this->redirect(array('site/login'));
                }
            }
        }

        $this->render('create', array(
            'model' => $model,
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

		if (isset($_POST['Customer'])) {
			$model->attributes=$_POST['Customer'];
			if ($model->save()) {
				$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}


	public function actionAjaxupdate()
	{
	   	//$model=new Appointment;
		/*
		$customers = $_POST['sortOrder'];
	        if(count($sortOrderAll)>0)
	        {
	            foreach($sortOrderAll as $menuId=>$sortOrder)
	            {
	                $model=$this->loadModel($menuId);
	                $model->sortOrder = $sortOrder;
	                $model->save();
	            }
	        }

	   if (Yii::app()->request->isAjaxRequest) {
            $model = new TimeTracker();
            if (isset($_POST['TimeTracker'])) {
                $model->attributes = $_POST['TimeTracker'];
                $model->company_id = Yii::app()->user->companyid;
                $model->created_by = Yii::app()->user->id;
                $model->created_date = new CDbExpression('NOW()');
                $wages = $this->get_user_wages_per_hour($model->user_id);
                $model->total_cost = ROUND(($model->task_hour * $wages), 2);

                if ($model->validate()) {
                    $model->save();
                    $data = array();
                    //$data["myValue"] = Yii::app()->user->setFlash('success', 'Message sent!');
                    //$data["myValue"] = '';
                    //$this->renderPartial('_ajaxContent', $data, false, true);
                }
            }
        }

	    $act = $_GET['act'];
	    if($act=='doSortOrder')
	    {
	        $sortOrderAll = $_POST['sortOrder'];
	        if(count($sortOrderAll)>0)
	        {
	            foreach($sortOrderAll as $menuId=>$sortOrder)
	            {
	                $model=$this->loadModel($menuId);
	                $model->sortOrder = $sortOrder;
	                $model->save();
	            }
	        }
	    }
	    else
	    {           
	        $autoIdAll = $_POST['autoId'];
	        if(count($autoIdAll)>0)
	        {
	            foreach($autoIdAll as $autoId)
	            {
	                $model=$this->loadModel($autoId);
	                if($act=='doDelete')
	                    $model->isDeleted = '1';
	                if($act=='doActive')
	                    $model->isActive = '1';
	                if($act=='doInactive')
	                    $model->isActive = '0';                     
	                if($model->save())
	                    echo 'ok';
	                else
	                    throw new Exception("Sorry",500);
	 
	            }
	        }
	    }
	    */
	}
	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if (Yii::app()->request->isPostRequest) {
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if (!isset($_GET['ajax'])) {
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
			}
		} else {
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		}
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Customer');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Customer('search');
		$model->unsetAttributes();  // clear any default values
		
		if (isset($_GET['Customer'])) {
			$model->attributes=$_GET['Customer'];
		}

		$this->render('admin',array(
			//'model'=>$model->search(array('condition'=>'company=1')),
			'model'=>$model,
		));
	}

	public function actionAdminsw()
	{
		$model=new Customer('search');
		$model->unsetAttributes();  // clear any default values
		
		if (isset($_GET['Customer'])) {
			$model->attributes=$_GET['Customer'];
		}

		$this->render('adminsw',array(
			//'model'=>$model->search(array('condition'=>'company=1')),
			'model'=>$model,
		));
	}
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Customer the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Customer::model()->findByPk($id);
		if ($model===null) {
			throw new CHttpException(404,'The requested page does not exist.');
		}
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Customer $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax']==='customer-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}