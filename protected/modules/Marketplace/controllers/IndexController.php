<?php

class IndexController extends Controller
{
	public function actionIndex(){
        $request = Yii::app()->request;

		$user        = User::getCurrentUser();
		$marketplace = Marketplace::model()->findByAttributes(array('user_id'=>Yii::app()->user->id));
		if (!$marketplace instanceof Marketplace) {
       		$this->redirect(Yii::app()->createUrl("/marketplace/vendor"));
		}
        $image_user = Yii::app()->createAbsoluteUrl("/images/marketplace/thumb/" . $marketplace->logo);

       
		$this->render("index", array(
			'user'        => $user,
			'marketplace' => $marketplace,
			'image_user'  => $image_user,
		));

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