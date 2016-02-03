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
                    'buy',
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
            'certificate' => $certificate,
        ), true, false);
        echo json_encode($response);
        Yii::app()->end();
    }
    
    /**
     * Get certificate form
     *
     * @author Narek T.
     * @created at 2nd day of Febrary 2016
     * @return void
     */
    public function actionBuy() {
        $response = array(
            'success' => 'true',
            'message' => 'Âû óñïåøíî êóïèëè ñåğòèôèêàò.',
        );
        $certificate = Certificate::model()->findByPk($_POST['UserCertificate']['certificate_id']);
        // Check if certificate not exist or ceritificate reached limit
        if (!$certificate instanceof Certificate || $certificate->count == 0) {
            $response['success'] = 'false';
            $response['message'] = 'Ó âàñ íå äîñòàòî÷íî äåíåãü íà ëèöåâîì ñ÷åòå.';
            echo json_encode($response);
            Yii::app()->end();
        }
        // Get current user
        $currentUser = User::getCurrentUser();
        $certificateCount = $_POST['UserCertificate']['count'];
        $priceAmount = $certificate->current_price * $certificateCount;
        // Check if user have enough balance in account
        if (!$currentUser->isAmountEnough($priceAmount)) {
            $response['success'] = 'false';
            $response['message'] = 'Ó âàñ íå äîñòàòî÷íî äåíåãü íà ëèöåâîì ñ÷åòå.';
            echo json_encode($response);
            Yii::app()->end();
        }
        // Discount from certificate
        $certificate->discount($certificateCount);
        // Make transaction for user
        $userTransaction = new UserTransaction();
        $userTransaction->sender_id = $currentUser->id;
        $userTransaction->amount = $priceAmount;
        $userTransaction->transaction_type = UserTransaction::TYPE_BUY;
        $userTransaction->account_type = User::ACCOUNT_TYPE_AMOUNT;
        $userTransaction->save(false);
        // Discount from user amount
        $currentUser->discount($priceAmount);
        // Make user sertificate order
        $userCertificateOrder = new UserCertificateOrder();
        $userCertificateOrder->buyer_id = $currentUser->id;
        $userCertificateOrder->certificate_id = $certificate->id;
        $userCertificateOrder->user_transaction_id = $userTransaction->id;
        $userCertificateOrder->count = $certificateCount;
        $userCertificateOrder->price = $certificate->current_price;
        $userCertificateOrder->save(false);
        // Check if user already have this type of certificate
        $userCertificate = UserCertificate::model()->byCertificateId($certificate->id)
                ->byUserId($currentUser->id)->find();
        if ($userCertificate instanceof UserCertificate) {
            $userCertificate->count = $userCertificate->count + $certificateCount;
            $userCertificate->save(false);
        } else {
            $userCertificate = new UserCertificate();
            $userCertificate->user_id = $currentUser->id;
            $userCertificate->certificate_id = $certificate->id;
            $userCertificate->count = $certificateCount;
            $userCertificate->save(false);
        }
        
        echo json_encode($response);
        Yii::app()->end();
    }

}