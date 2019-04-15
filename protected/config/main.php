<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'ТД Интерстрой',
	'timeZone'=>'Asia/Yekaterinburg',
	'sourceLanguage'=>'en',
	'language'=>'ru',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.components.ImageHandler.CImageHandler',
	),

	'modules'=>array(
		'admin',
		/*
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'fY3gcl73Jh',
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		*/
	),

	// application components
	'components'=>array(

		'authManager'=>array(
			'class'=>'PhpAuthManager',
			'defaultRoles'=>array('guest'),
		),

		'user'=>array(
			'class'=>'WebUser',
			'loginUrl'=>array('users/login'),
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),

		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
			'rules'=>require(dirname(__FILE__).'/url.php'),
		),

		'db'=>require(dirname(__FILE__).'/database.php'),

		/*
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		*/

		// jquery
		'clientScript'=>array(
			'scriptMap'=>array(
				'jquery.js'=>'/js/jquery-1.10.2.min.js',
			)
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
	'params'=>require(dirname(__FILE__).'/params.php'),
);
