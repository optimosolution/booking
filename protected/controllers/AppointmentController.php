<?php

class AppointmentController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    public function beforeAction(CAction $action) {
        if (!isset(Yii::app()->user->id)) {
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
                'actions' => array(),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('index', 'view', 'create', 'update', 'calender', 'admin', 'customerFilter', 'adminCustomer', 'filterCustomer', 'dateRangeSelect', 'checkAppointments', 'getService_id_fromAJAX', 'detailViewCustomer', 'mail','filterListView'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionMail() {
        $customerList = Yii::app()->request->getParam('idList');
        print $allCustomers = (is_array($customerList)) ? implode(",", $customerList) : $customerList;
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionCalender() {
        $this->render('calender', array());
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    public function actionDetailViewCustomer($id) {
        $this->render('detail_view_customer_access', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    // gettign a variable from AJAX from the appointment form to find the Service cost
    public function actionGetService_id_fromAJAX() {
        $service_id = $_GET['getService_id_fromAJAX'];
    }

    public function actionCreate() {
        $model = new Appointment;
        $model_history = new CustomerHistory;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Appointment'])) {
            $model->attributes = $_POST['Appointment'];

            $model->applied_date = new CDbExpression('NOW()');

            $model->company_id = Yii::app()->user->company;
            $model->shop_id = Yii::app()->user->shop_id;
            $model->customer_id = Yii::app()->user->id;
            $model->total_cost = Service::get_service_cost($model->service_id);
            //$model->staff_id= 1027;
            $model->status = 1;
            if ($model->save()) {

                $model_history->appointment_id = $model->id;
                $model_history->shop_id = $model->shop_id;
                $model_history->customer_id = $model->customer_id;
                $model_history->appoint_date = $model->appoint_time;
                $model_history->service_id = $model->service_id;
                $model_history->save();

                $this->redirect(array('view', 'id' => $model->id));
            }
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    public function actionDate_range_select() {
        unset(Yii::app()->request->cookies['from_date']);  // first unset cookie for dates
        unset(Yii::app()->request->cookies['to_date']);

        $model = new Appointment('search_appointment');  // your model
        $model->unsetAttributes();  // clear any default values

        if (!empty($_POST)) {
            Yii::app()->request->cookies['from_date'] = new CHttpCookie('from_date', $_POST['from_date']);  // define cookie for from_date
            Yii::app()->request->cookies['to_date'] = new CHttpCookie('to_date', $_POST['to_date']);
            $model->from_date = $_POST['from_date'];
            $model->to_date = $_POST['to_date'];
        }
        $this->render('customer_filter', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Appointment'])) {
            $model->attributes = $_POST['Appointment'];
            if ($model->save()) {
                $this->redirect(array('view', 'id' => $model->id));
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
        $dataProvider = new CActiveDataProvider('Appointment');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }


    public function actionFilterListView()
    {
        //$dataProvider=new CActiveDataProvider('Appointment');
        $dataProvider=new CActiveDataProvider('Appointment', array(
            'criteria'=>array(
                'condition'=>'customer_id=:customerId',
                'params'=>array(':customerId'=>$_GET['customer_id']),
            ),
        ));
        $this->render('index',array(
            'dataProvider'=>$dataProvider,
        ));
    }
    
    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Appointment('search_appointment');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Appointment'])) {
            $model->attributes = $_GET['Appointment'];
        }

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function actionCustomerFilter() {
        $model = new Appointment('search_filter_customer');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Appointment'])) {
            $model->attributes = $_GET['Appointment'];
        }

        $this->render('customer_filter', array(
            'model' => $model,
        ));
    }

//'filterCustomer'
    public function actionCheckAppointments() {
        $model = new Appointment('search_appointment');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Appointment'])) {
            $model->attributes = $_GET['Appointment'];
        }

        $this->render('check_appointments', array(
            'model' => $model,
        ));
    }

    public function actionAdminCustomer() {
        $model = new Appointment('search_appointment');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Appointment'])) {
            $model->attributes = $_GET['Appointment'];
        }

        $this->render('appointment_list_customer', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Appointment the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Appointment::model()->findByPk($id);
        if ($model === null) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Appointment $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'appointment-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
