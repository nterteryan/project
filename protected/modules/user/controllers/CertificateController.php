<?php

/**
 * CertificateController 
 *
 * @author Narek T.
 * @created at 31th day of Jan 2016
 */
class CertificateController extends Controller {
    
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

    public function actionIndex() {
        
        $certificates = Certificate::model()->findAll();
        $this->render('index', array(
            'certificates' => $certificates,
        ));
    }

}