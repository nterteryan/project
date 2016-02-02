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
                    'getForm',
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
    
    /**
     * Get certificate form
     *
     * @author Narek T.
     * @created at 2nd day of Febrary 2016
     * @return void
     */
    public function actionGetForm() {
        $response = array(
            'success' => 'true',
        );
        $certificate = Certificate::model()->findByPk($_POST['certificateId']);
        // Check if certificate not exist or ceritificate reached limit
        if (!$certificate instanceof Certificate || $certificate->count == 0) {
            
        }
        $userCertificate = new UserCertificate;
        $response['form'] = $this->renderPartial('_form', array(
            'userCertificate' => $userCertificate,
        ), true, false);
        echo json_encode($response);
        Yii::app()->end();
    }

}