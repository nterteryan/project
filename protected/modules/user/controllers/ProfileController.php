<?php

/**
 * DashboardController 
 *
 * @author Narek T.
 * @created at 23th day of Jan 2016
 */
class ProfileController extends Controller {
    
    /**
     * @return array action filters
     */
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

    /**
     * Action Index 
     *
     * @author Narek T.
     * @created at 23th day of Jan 2016
     */
    public function actionIndex() {
        $user = User::model()->findByPk(Yii::app()->user->id);
        $this->render("index", array(
            'user' => $user,
        ));
    }

}
