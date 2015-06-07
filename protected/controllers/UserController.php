<?php

class UserController extends Controller {

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
                'actions' => array('index', 'create', 'activate'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('admin', 'delete', 'view', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete', 'view', 'update'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionActivate($id, $activation) {
        $value = User::model()->findByAttributes(array('id' => $id));
        if (!empty($activation) OR !empty($id)) {
            if ($activation == $value->activation) {
                Yii::app()->db->createCommand('UPDATE {{user}} SET `status` = 1 WHERE id=' . $id)->execute();
                Yii::app()->user->setFlash('success', 'Account verification successful. Please login.');
                $this->redirect(array('site/login'));
            } else {
                Yii::app()->user->setFlash('error', 'Account verification not successful. Please try again!');
                $this->redirect(array('site/login'));
            }
        }
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->page_title = 'Profile';
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }
    /**
     * Change Password a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionChangepassword($id)
     {      
        $model = new User;
     
        $model = User::model()->findByAttributes(array('id'=>$id));
        $model->setScenario('changePwd');
     
     
         if(isset($_POST['User'])){
     
            $model->attributes = $_POST['User'];
            $valid = $model->validate();
     
            if($valid){
     
              $model->password = SHA1($model->new_password);
     
              if($model->save())
                 $this->redirect(array('changepassword','msg'=>'successfully changed password'));
              else
                 $this->redirect(array('changepassword','msg'=>'password not changed'));
                }
            }
     
        $this->render('changepassword',array('model'=>$model)); 
     }
    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $this->layout = '//layouts/register_client_admin';
        $this->page_title = 'Registration';
        $model = new User;
        $model_company = new Company;
        $path = Yii::app()->basePath . '/../uploads/profile_picture';
        if (!is_dir($path)) {
            mkdir($path);
        }

        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
            if ($model->validate()) {
                $model->password = SHA1($model->password);
                $model->registerDate = new CDbExpression('NOW()');
                $model->activation = md5(microtime());
                /*
                if ($model->storeowner == 1) {
                    $model->group_id = 2;
                    $model->user_type = 2;
                } else {
                    $model->group_id = 7;
                }
                */
                $model->company_owner = 1;
                $model->group_id = 2;
                $model->user_type = 2;
                $model->status = 2;
                
                //Picture upload script
                if (@!empty($_FILES['User']['name']['profile_picture'])) {
                    $model->profile_picture = $_POST['User']['profile_picture'];
                    if ($model->validate(array('profile_picture'))) {
                        $model->profile_picture = CUploadedFile::getInstance($model, 'profile_picture');
                    } else {
                        $model->profile_picture = null;
                    }
                    $model->profile_picture->saveAs($path . '/' . time() . '_' . str_replace(' ', '_', strtolower($model->profile_picture)));
                    $model->profile_picture = time() . '_' . str_replace(' ', '_', strtolower($model->profile_picture));
                }
                if ($model->save()) {
                    if ($model->company_owner == 1) {
                        $model_company->owner = $model->id;
                        $model_company->company_name = 'Untitled Company';
                        //$model_company->currency = ;
                        $model_company->email = $model->email;
                        $model_company->save();
                        Yii::app()->db->createCommand('UPDATE {{user}} SET `company` = ' . $model_company->id . ' WHERE id=' . $model->id . ' LIMIT 1')->execute();
                    }
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
    public function actionUpdate($id) {
        $this->page_title = 'Edit Profile';
        $model = $this->loadModel($id);
        $previuosFileName = $model->profile_picture;
        $previuosPassword = $model->password;
         //$model->password = SHA1($model->password);
        $path = Yii::app()->basePath . '/../uploads/profile_picture';
        if (!is_dir($path)) {
            mkdir($path);
        }

        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
            if ($model->validate()) {
              
              //Passward 
               if (@!empty($model->password)) {
                    $model->password = SHA1($model->password);
               } else {
                    $model->password=$previuosPassword;
                }
                //Picture upload script
                if (@!empty($_FILES['User']['name']['profile_picture'])) {
                    $model->profile_picture = $_POST['User']['profile_picture'];

                    if ($model->validate(array('profile_picture'))) {
                        $filePath = Yii::app()->basePath . '/../uploads/profile_picture/' . $previuosFileName;
                        if ((is_file($filePath)) && (file_exists($filePath))) {
                            unlink($filePath);
                        }
                        $model->profile_picture = CUploadedFile::getInstance($model, 'profile_picture');
                    } else {
                        $model->profile_picture = '';
                    }
                    $model->profile_picture->saveAs($path . '/' . time() . '_' . str_replace(' ', '_', strtolower($model->profile_picture)));
                    $model->profile_picture = time() . '_' . str_replace(' ', '_', strtolower($model->profile_picture));
                } else {
                    $model->profile_picture = $previuosFileName;
                }
                if ($model->save()) {
                    $this->redirect(array('view', 'id' => $model->id));
                }
            }
        }

        $this->render('update', array(
            'model' => $model,
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

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax'])) {
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
            }
        } else {
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
        }
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('User');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new User('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['User'])) {
            $model->attributes = $_GET['User'];
        }

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return User the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = User::model()->findByPk($id);
        if ($model === null) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param User $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'user-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}