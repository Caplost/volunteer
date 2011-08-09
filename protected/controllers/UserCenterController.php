<?php

class UserCenterController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}
 
      public function filters() {
        return array(
            'accessControl',
        );
    }

    public function accessRules() {
        return array(
            array(
                'allow',
                'actions'=>array('index'),
                'users'=>array('@'),
            ),
            array(
                'allow',
                'actions'=>array('create','get'),
                'roles'=>array('member'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }
    
    public function actionCreate(){
        $this->render('create');
    }
    
     public function actionGet(){
        $this->render('create',array('get'=>'It\'s get action !'));
    }

    // Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}