<?php

class CompanyController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';
    public $page_title;

    /**
     * @return array action filters
     */
    public function filters() {
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
    public function accessRules() {
        return array(
           

            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('admin', 'delete', 'create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete', 'create', 'update'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->page_title = 'Settings';
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $this->page_title = 'Edit Settings';
        $model = $this->loadModel($id);

        $previuosFileName = $model->company_logo;
        $path = Yii::app()->basePath . '/../uploads/company_logo';
        if (!is_dir($path)) {
            mkdir($path);
        }

        if (isset($_POST['Company'])) {
            $model->attributes = $_POST['Company'];
            if ($model->validate()) {
                $model->paypal_username = base64_encode($model->paypal_username);
                $model->paypal_password = base64_encode($model->paypal_password);
                $model->paypal_signature = base64_encode($model->paypal_signature);
                $model->paypal_app_id = base64_encode($model->paypal_app_id);
                //Picture upload script
                if (@!empty($_FILES['Company']['name']['company_logo'])) {
                    $model->company_logo = $_POST['Company']['company_logo'];

                    if ($model->validate(array('company_logo'))) {
                        $filePath = Yii::app()->basePath . '/../uploads/company_logo/' . $previuosFileName;
                        if ((is_file($filePath)) && (file_exists($filePath))) {
                            unlink($filePath);
                        }
                        $model->company_logo = CUploadedFile::getInstance($model, 'company_logo');
                    } else {
                        $model->company_logo = '';
                    }
                    $model->company_logo->saveAs($path . '/' . time() . '_' . str_replace(' ', '_', strtolower($model->company_logo)));
                    $model->company_logo = time() . '_' . str_replace(' ', '_', strtolower($model->company_logo));
                } else {
                    $model->company_logo = $previuosFileName;
                }
                if ($model->save()) {
                    Yii::app()->user->setFlash('success', 'Settings has been saved successfully.');
                    $this->redirect(array('view', 'id' => $model->id));
                }
            }
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $this->redirect(array('site/index'));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Company the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Company::model()->findByPk($id);
        if ($model === null) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Company $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'company-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}