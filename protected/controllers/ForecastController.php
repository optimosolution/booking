<?php
/*

*/

class ForecastController extends Controller {

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
                'actions' => array('index','view', 'admin'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'delete'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('create', 'update', 'admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }


	   public function getForecast($date) {
		  $weekdayIndex = $date->format('N') - 1;
		  if($weekdayIndex < 5) {
		    $temperature = rand(0, 15) . ' °C';
		    $conditions = 'rainy';
		  } else {
		    $temperature = rand(20, 30) . ' °C';
		    $conditions = 'sunny';
		  }
		 
		  return array(
		    'temperature' => $temperature,
		    'conditions' => $conditions,
		  );
	}
}
