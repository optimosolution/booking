<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'theme' => 'ace_template',
	'name' => 'App',
    //Default time zone
    'timeZone' => 'Asia/Dhaka',
    //Default source language
    'sourceLanguage' => 'en_us',
    // preloading 'log' component
    'preload' => array('log'),
    // path aliases Calendar
   // Yii::setPathOfAlias('ecalendarview', dirname(__FILE__) . '/../extensions/ecalendarview'),
      // path aliases for yii
    'aliases' => array( 
        /*
        //callendar
        'ecalendarview'=> dirname(__DIR__ . '/../extensions/ecalendarview'),//
        // yiistrap configuration
        'bootstrap' => realpath(__DIR__ . '/../extensions/bootstrap'), // change this if necessary
        // yiiwheels configuration
        'yiiwheels' => realpath(__DIR__ . '/../extensions/yiiwheels'), // change if necessary
        */
    ),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        // import paths - yiistrap configuration
        /* 'bootstrap.helpers.TbHtml', */
    ),
    'modules' => array(
        // uncomment the following to enable the Gii tool    
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => 'admingii',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '::1'),
        ),
    ),
    /*
    //##############Showing error for this line and I hide this ###############
    'behaviors' => array(
        'runEnd' => array(
            'class' => 'application.components.WebApplicationEndBehavior',
        ),
    ),
    */
	// application components
	'components'=>array(
		 /*
         // yiistrap configuration
        'bootstrap' => array(
            //'class' => 'bootstrap.components.Bootstrap',
            'class' => 'bootstrap.components.TbApi',
        ),
        // yiiwheels configuration
        'yiiwheels' => array(
            'class' => 'yiiwheels.YiiWheels',
        ),
        */
        'clientScript' => array(
            'packages' => array(
                'jquery' => array(
                    'baseUrl' => '//ajax.googleapis.com/ajax/libs/jquery/2.1.1/',
                    'js' => array('jquery.min.js'),
                    'coreScriptPosition' => CClientScript::POS_HEAD,
                ),
                'jquery.ui' => array(
                    'baseUrl' => '//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/',
                    'js' => array('jquery-ui.min.js'),
                    'depends' => array('jquery'),
                    'coreScriptPosition' => CClientScript::POS_BEGIN,
                ),
            ),
        ),
        'browser' => array(
            'class' => 'application.extensions.browser.CBrowserComponent',
        ),


		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format
		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		*/
		'session' => array(
            'class' => 'CDbHttpSession',
            'connectionID' => 'db',
            'sessionName' => 'BOOKING',
            'autoCreateSessionTable' => false,
            'sessionTableName' => 'os_yiisession',
            'cookieMode' => 'only',
            'timeout' => 3600,
        ),
        // uncomment the following to use a MySQL database
        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=booking',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
            'tablePrefix' => 'os_'
        ),
        /* 'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=rndinfo_bookingdb',
            'emulatePrepare' => true,
            'username' => 'rndinfo_booking2',
            'password' => 'b00kinG',
            'charset' => 'utf8',
            'tablePrefix' => 'os_'
        ),
        */
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);