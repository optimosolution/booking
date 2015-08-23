<?php

class MassmailContentController extends Controller
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
				'actions'=>array('create','update','admin','mail','templateUpdate','useTemplate'),
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
		$model=new MassmailContent;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['MassmailContent']))
		{
			$model->attributes=$_POST['MassmailContent'];
			$model->entry_date = new CDbExpression('NOW()');
			$model->shop_id= Yii::app()->user->shop_id;
			$model->status=1;
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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

		if(isset($_POST['MassmailContent']))
		{
			$model->attributes=$_POST['MassmailContent'];
			$model->update_date = new CDbExpression('NOW()');
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

	public function actionUseTemplate($id)
	{	



		$modelmc = new MassmailContent; 
		$defaultEmailID=$_GET['id'];
		$modelmc->subject = MassmailContentDefault::get_email_subject($defaultEmailID);
		$modelmc->massmail_body = MassmailContentDefault::get_email_body($defaultEmailID);
		$modelmc->entry_date = new CDbExpression('NOW()');
		$modelmc->shop_id = Yii::app()->user->shop_id;
		$modelmc->status = 1;
		//$modelmc->save();
		if (!$modelmc->save()) {
            print_r($modelmc->getErrors());         
        }
		Yii::app()->user->setFlash('success', Yii::t('Common', 'data_saved_successfully'));
        $this->redirect(array('massmailContent/view', 'id' => $modelmc->id));

	  		
	}
/*
	public function actionUpdate($id) {
		if ($model->save()) {
                    DocumentAccess::model()->deleteAll('document_id=' . $id);
                    for ($e = 0; $e < $totalAccess; $e++) {
                        $document = new DocumentAccess;
                        $document->document_id = $model->id;
                        $document->user_id = $expression[$e];
                        $document->save();
                    }
                    $modeldh->company_id = $model->company_id;
                    $modeldh->document_id = $model->id;
                    $modeldh->user_id = $model->user_id;
                    $modeldh->project_id = $model->project_id;
                    $modeldh->assignment_id = $model->assignment_id;
                    $modeldh->catid = $model->catid;
                    $modeldh->doc_name = $model->doc_name;
                    $modeldh->doc_file = $model->doc_file;
                    $modeldh->doc_type = $model->doc_type;
                    $modeldh->doc_size = $model->doc_size;
                    $modeldh->summary = $model->summary;
                    $modeldh->up_dated = $model->up_dated;
                    $modeldh->access_user = $model->access_user;
                    $modeldh->modified_by = Yii::app()->user->id;
                    $modeldh->modified_on = date('Y-m-d H:i');
                    $modeldh->evolution = 'Edited';
                    $modeldh->save();
                    Yii::app()->user->setFlash('success', Yii::t('Common', 'data_saved_successfully'));
                    $this->redirect(array('view', 'id' => $model->id));
                }
	}
	*/
	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('MassmailContent');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new MassmailContent('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['MassmailContent']))
			$model->attributes=$_GET['MassmailContent'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return MassmailContent the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=MassmailContent::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param MassmailContent $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='massmail-content-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
