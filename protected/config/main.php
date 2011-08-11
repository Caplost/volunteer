<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => '南京巾帼志愿者网',
    // preloading 'log' component
    'preload' => array('log'),
    
    //主题
    'theme'=>'volunteer',
    
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.modules.backspace.models.*',
        'application.components.*',
        'ext.dwz.*',
    ),
    
    
    'modules' => array(
        'admin',
        'backspace',
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => 'ok',
            'generatorPaths'=>array(
            'ext.dwz.gii', //可以继续配置其他路径
        ),
            
        ),
    ),
    
    // application components
    'components' => array(
        'user' => array(
            // enable cookie-based authentication
            'loginUrl'=>array('site/login'),
            'allowAutoLogin' => true,
        ),
        // uncomment the following to enable URLs in path-format

        'authManager'=>array(
          'class'=>'CDbAuthManager',
          'connectionID'=>'db',
            'defaultRoles'=>array('guest'),
            'itemTable'=>'vol_auth_item',
            'assignmentTable'=>'vol_auth_assignment',
            'itemChildTable'=>'vol_auth_item_child',
        ),
        
        'urlManager' => array(
            'urlFormat' => 'path',
            'showScriptName' => false,
            'rules' => array(
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>/statue/<category:\d+>'=>'<controller>/<action>',
                '<controller:\w+>/<action:\w+>/statue/<category:\d+>/sub/'=>'<controller>/<action>',
                '<controller:\w+>/<action:\w+>/statue/<category:\d+>/sub/<subCategory:\d+>'=>'<controller>/<action>',
                '<controller:\w+>/<action:\w+>/statue/<category:\d+>/sub/<subCategory:\d+>/category/'=>'<controller>/<action>',
                '<controller:\w+>/<action:\w+>/statue/<category:\d+>/sub/<subCategory:\d+>/category/<thCategory:\d+>'=>'<controller>/<action>',
            ),
        ),
           /*
        'db' => array(
            'connectionString' => 'sqlite:' . dirname(__FILE__) . '/../data/testdrive.db',
        ),
          */
        // uncomment the following to use a MySQL database
     
          'db'=>array(
          'connectionString' => 'mysql:host=localhost;dbname=volunteer',
          'emulatePrepare' => true,
          'username' => 'root',
          'password' => '',
          'charset' => 'utf8',
          ),
     
        
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
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
    'params' => array(
        // this is used in contact page
        'adminEmail' => 'webmaster@example.com',
        'powered'=>'南京思亿欧有限公司',
        'Allrights'=>'南京市志愿者协会',
    ),
);