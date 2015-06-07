<?php

class AppointmentNoteController extends Controller
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
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','delete','admin'),
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
	public function actionCreate()
	{
		$model=new AppointmentNote;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['AppointmentNote']))
		{
				

			$model->time = new CDbExpression('NOW()');
			$model->note_by=Yii::app()->user->id;
			$model->ip=  CHttpRequest::getUserHostAddress(); 
			$model->status=1;
			 $path = Yii::app()->basePath . '/../uploads/appointent_noteFile';
		        if (!is_dir($path)) {
		            mkdir($path);
		        }
			$model->attributes=$_POST['AppointmentNote'];
			//Picture upload script
                if (@!empty($_FILES['AppointmentNote']['name']['file_name'])) {
                    $model->file_name = $_POST['AppointmentNote']['file_name'];
                    if ($model->validate(array('file_name'))) {
                        $model->file_name = CUploadedFile::getInstance($model, 'file_name');
                    } else {
                        $model->file_name = null;
                    }
                    $model->file_name->saveAs($path . '/' . time() . '_' . str_replace(' ', '_', strtolower($model->file_name)));
                    $model->file_name = time() . '_' . str_replace(' ', '_', strtolower($model->file_name));
                }

			if($model->save())
				if (Yii::app()->user->group_id==8){
 				$this->redirect(array('appointment/detailViewCustomer','id'=>$model->appointment_id));
 				}else{
 				$this->redirect(array('appointment/view','id'=>$model->appointment_id));
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
	 	$previuosFileName = $model->file_name;

		$path = Yii::app()->basePath . '/../uploads/appointent_noteFile';
	        if (!is_dir($path)) {
	            mkdir($path);
	        }
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['AppointmentNote']))
		{
			$model->attributes=$_POST['AppointmentNote'];
			if ($model->validate()) {
				$model->time = new CDbExpression('NOW()');
				$model->note_by=Yii::app()->user->id;
				$model->ip=  CHttpRequest::getUserHostAddress(); 

				//Picture upload script
	                if (@!empty($_FILES['AppointmentNote']['name']['file_name'])) {
	                    $model->file_name = $_POST['AppointmentNote']['file_name'];

	                    if ($model->validate(array('file_name'))) {
	                        $filePath = Yii::app()->basePath . '/../uploads/appointent_noteFile/' . $previuosFileName;
	                        if ((is_file($filePath)) && (file_exists($filePath))) {
	                            unlink($filePath);
	                        }
	                        $model->file_name = CUploadedFile::getInstance($model, 'file_name');
	                    } else {
	                        $model->file_name = '';
	                    }
	                    $model->file_name->saveAs($path . '/' . time() . '_' . str_replace(' ', '_', strtolower($model->file_name)));
	                    $model->file_name = time() . '_' . str_replace(' ', '_', strtolower($model->file_name));
	                } else {
	                    $model->file_name = $previuosFileName;
	                }
            	  
			if($model->save())
				$this->redirect(array('appointment/view','id'=>$model->appointment_id));
			}
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
    public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $this->loadModel($id)->delete();
            $this->redirect(array('/appointment/view', 'id' => $_GET['v']));
         
        } else {
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
        }
    }

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('AppointmentNote');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new AppointmentNote('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['AppointmentNote']))
			$model->attributes=$_GET['AppointmentNote'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return AppointmentNote the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=AppointmentNote::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param AppointmentNote $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='appointment-note-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
