<?php

class ShopController extends Controller {

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
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('admin', 'delete', 'create', 'update', 'new'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete', 'create', 'update', 'new'),
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
        $this->page_title = 'Shop Details';
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $this->page_title = 'New Shop';
        $model = new Shop;

        $path = Yii::app()->basePath . '/../uploads/shop';
        if (!is_dir($path)) {
            mkdir($path);
        }

        if (isset($_POST['Shop'])) {
            $model->attributes = $_POST['Shop'];
            if ($model->validate()) {
                $model->company = Yii::app()->user->company;

                //$model->currency= Company::get_currency(Yii::app()->user->company);

                $model->start_hour= $model->start_hour_hr.":".$model->start_hour_min.":"."00";
                $model->end_hour= $model->end_hour_hr.":".$model->end_hour_min.":"."00";
                //Picture upload script
                if (@!empty($_FILES['Shop']['name']['shop_picture'])) {
                    $model->shop_picture = $_POST['Shop']['shop_picture'];
                    if ($model->validate(array('shop_picture'))) {
                        $model->shop_picture = CUploadedFile::getInstance($model, 'shop_picture');
                    } else {
                        $model->shop_picture = null;
                    }
                    $model->shop_picture->saveAs($path . '/' . time() . '_' . str_replace(' ', '_', strtolower($model->shop_picture)));
                    $model->shop_picture = time() . '_' . str_replace(' ', '_', strtolower($model->shop_picture));
                }
                if ($model->save()) {
                    $this->redirect(array('view', 'id' => $model->id));
                }
            }
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    public function actionNew() {
        $this->layout = '//layouts/popup';
        $model = new Shop;
        $path = Yii::app()->basePath . '/../uploads/shop';
        if (!is_dir($path)) {
            mkdir($path);
        }

        if (isset($_POST['Shop'])) {
            $model->attributes = $_POST['Shop'];
            if ($model->validate()) {
                $model->company = Yii::app()->user->company;
                //$model->currency= Company::get_currency(Yii::app()->user->company);

                $model->start_hour= $model->start_hour_hr.":".$model->start_hour_min.":"."00";
                $model->end_hour= $model->end_hour_hr.":".$model->end_hour_min.":"."00";
                //Picture upload script
                if (@!empty($_FILES['Shop']['name']['shop_picture'])) {
                    $model->shop_picture = $_POST['Shop']['shop_picture'];
                    if ($model->validate(array('shop_picture'))) {
                        $model->shop_picture = CUploadedFile::getInstance($model, 'shop_picture');
                    } else {
                        $model->shop_picture = null;
                    }
                    $model->shop_picture->saveAs($path . '/' . time() . '_' . str_replace(' ', '_', strtolower($model->shop_picture)));
                    $model->shop_picture = time() . '_' . str_replace(' ', '_', strtolower($model->shop_picture));
                }
                if ($model->save()) {
                    Yii::app()->user->setFlash('success', "Shop has been created successfully.");
                    ?>
                    <script>
                        window.parent.$.fancybox.close();
                        //parent.location.reload(true);
                        window.parent.update_shop();
                    </script>
                    <?php

                }
            }
        }

        $this->render('new', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $this->page_title = 'Edit Shop';
        $model = $this->loadModel($id);

        $previuosFileName = $model->shop_picture;
        $path = Yii::app()->basePath . '/../uploads/shop';
        if (!is_dir($path)) {
            mkdir($path);
        }

        if (isset($_POST['Shop'])) {
            $model->attributes = $_POST['Shop'];
            if ($model->validate()) {

               // $model->currency= Company::get_currency(Yii::app()->user->company);
                $model->start_hour= $model->start_hour_hr.":".$model->start_hour_min.":"."00";
                $model->end_hour= $model->end_hour_hr.":".$model->end_hour_min.":"."00";
                //Picture upload script
                if (@!empty($_FILES['Shop']['name']['shop_picture'])) {
                    $model->shop_picture = $_POST['Shop']['shop_picture'];

                    if ($model->validate(array('shop_picture'))) {
                        $filePath = Yii::app()->basePath . '/../uploads/shop/' . $previuosFileName;
                        if ((is_file($filePath)) && (file_exists($filePath))) {
                            unlink($filePath);
                        }
                        $model->shop_picture = CUploadedFile::getInstance($model, 'shop_picture');
                    } else {
                        $model->shop_picture = '';
                    }
                    $model->shop_picture->saveAs($path . '/' . time() . '_' . str_replace(' ', '_', strtolower($model->shop_picture)));
                    $model->shop_picture = time() . '_' . str_replace(' ', '_', strtolower($model->shop_picture));
                } else {
                    $model->shop_picture = $previuosFileName;
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
        $dataProvider = new CActiveDataProvider('Shop');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $this->page_title = 'Shops';
        $model = new Shop('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Shop'])) {
            $model->attributes = $_GET['Shop'];
        }

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Shop the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Shop::model()->findByPk($id);
        if ($model === null) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Shop $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'shop-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}