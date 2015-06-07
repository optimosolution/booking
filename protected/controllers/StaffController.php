<?php

class StaffController extends Controller
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
      public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'create', 'activate','sownerCreate'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('admin', 'delete', 'view', 'update','sownerCreate'),
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

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        //$this->page_title = 'Profile';
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /*** */
    public function actionChangepassword($id)
     {      
        $model = new User;
     
        $model = User::model()->findByAttributes(array('id'=>$id));
        $model->setScenario('changePwd');
     
     
         if(isset($_POST['User'])){
     
            $model->attributes = $_POST['User'];
            $valid = $model->validate();
     
            if($valid){
     
              $model->password = md5($model->new_password);
     
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
        //$this->layout = '//layouts/register_client_admin';
        //$this->page_title = 'New Staff';
        $model = new Staff;
        $second_contact = new StaffSecondContact;

        $path = Yii::app()->basePath . '/../uploads/profile_picture';
        if (!is_dir($path)) {
            mkdir($path);
        }
 
        if (isset($_POST['Staff'], $_POST['StaffSecondContact'] )) {
            
            $model->attributes = $_POST['Staff'];
            $second_contact->attributes = $_POST['StaffSecondContact'];

            $valid = $model->validate();
            $valid = $second_contact->validate() && $valid;
            if($valid){ 
               
                $model->password = SHA1('password');
                $model->registerDate = new CDbExpression('NOW()');
                $model->activation = md5(microtime());

                $company_id=Yii::app()->user->company;//store owner's company is saving 
                $model->company=  $company_id;
                $model->group_id = 7;
                $model->user_type = 7;
                $model->status = 1;
                
                //Picture upload script
                if (@!empty($_FILES['Staff']['name']['profile_picture'])) {
                    $model->profile_picture = $_POST['Staff']['profile_picture'];
                    if ($model->validate(array('profile_picture'))) {
                        $model->profile_picture = CUploadedFile::getInstance($model, 'profile_picture');
                    } else {
                        $model->profile_picture = null;
                    }
                    $model->profile_picture->saveAs($path . '/' . time() . '_' . str_replace(' ', '_', strtolower($model->profile_picture)));
                    $model->profile_picture = time() . '_' . str_replace(' ', '_', strtolower($model->profile_picture));
                   
                    
                    //$shop_id=Yii::app()->user->shop_id; //store owner's shop id is saving
                }
                //$model->save(false);

                if (($model->save()) AND ($second_contact->save()) ) {
 
                    $second_contact->saff_id = $model->id;
                    //$second_contact->name_second_contact = $model->id;
                    //$second_contact->phone_second_contact = $model->id;
                    //$second_contact->email_second_contact = $model->id;
                    //$second_contact->address_second_contact = $model->id;
                    

                    Yii::app()->user->setFlash('success', 'Staff has been registered.');
                    $this->redirect(array('staff/admin'));

                }
            }
        }

        /*$this->render('create', array(
            'model' => $model,
        )); */
        $this->render('create', array(
            'model'=>$model,'second_contact'=>$second_contact
        ));
    }


    //Adding Store owners
     public function actionSownerCreate() {
        //$this->layout = '//layouts/register_client_admin';
        //$this->page_title = 'New Staff';
        $model = new Staff;
        $path = Yii::app()->basePath . '/../uploads/profile_picture';
        if (!is_dir($path)) {
            mkdir($path);
        }

        if (isset($_POST['Staff'])) {
            $model->attributes = $_POST['Staff'];
            if ($model->validate()) {
               // $model->password = SHA1($model->password);
                $model->password = SHA1('password');
                $model->registerDate = new CDbExpression('NOW()');
                $model->activation = md5(microtime());
                $model->group_id = 6;
                $model->user_type = 6;
                $model->status = 1;
                $model->company = Yii::app()->user->company;
                $model->storeowner = 1;
                //Picture upload script
                if (@!empty($_FILES['Staff']['name']['profile_picture'])) {
                    $model->profile_picture = $_POST['Staff']['profile_picture'];
                    if ($model->validate(array('profile_picture'))) {
                        $model->profile_picture = CUploadedFile::getInstance($model, 'profile_picture');
                    } else {
                        $model->profile_picture = null;
                    }
                    $model->profile_picture->saveAs($path . '/' . time() . '_' . str_replace(' ', '_', strtolower($model->profile_picture)));
                    $model->profile_picture = time() . '_' . str_replace(' ', '_', strtolower($model->profile_picture));
                     //$shop_id=Yii::app()->user->shop_id; //store owner's shop id is saving
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
                    $this->redirect(array('staff/admin'));
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

        if(isset($_POST['Staff']))
        {
            $model->attributes=$_POST['Staff'];
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
        $dataProvider=new CActiveDataProvider('Staff');
        $this->render('index',array(
            'dataProvider'=>$dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model=new Staff('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['Staff']))
            $model->attributes=$_GET['Staff'];

        $this->render('admin',array(
            'model'=>$model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Staff the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model=Staff::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Staff $model the model to be validated
     */
    protected function performAjaxValidation($model, $second_contact)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='staff-form')
        {
            echo CActiveForm::validate($model,$second_contact);
            Yii::app()->end();
        }
    }
}
