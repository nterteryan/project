<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}

	public function filters() {
	    return array(
	        'accessControl', // perform access control for CRUD operations
	            //'postOnly',
	    );
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules() {
	    return array(
	        array('allow', // allow all users to perform 'index' actions
	            'actions' => array(
	                'index',
	            ),
	            'roles' => array(User::ROLE_USER),
	        ),
	        array('deny', // deny all users
	            'users' => array('*'),
	        ),
	    );
	}
	
}