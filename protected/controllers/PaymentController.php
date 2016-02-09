<?php
/**
 * PaymentController 
 *
 * @author Narek T.
 * @created at 26th day of Jan 2016
 */
class PaymentController extends Controller {
    
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
                    'perfectVerify',
                ),
                'roles' => array(User::ROLE_USER),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionPerfectVerify() {
        /*$userOrder = UserOrder::model()->inprogress()->with('marketingPlan')->findByPk(2);
        $marketingPlan = $userOrder->marketingPlan;
        echo "<pre>";
        var_dump($marketingPlan->insertUserToMarketing(2));
        echo "</pre>";
        die();*/
        $request = Yii::app()->request;
        $keyCode = $request->getPost('KEY_CODE', false);
        $paymentBatchNum = $request->getPost('PAYMENT_BATCH_NUM', false);
        $userOrderNumberId = $request->getPost('ORDER_NUM');
        $verified = true;
        // Refuse if not key code provided.
        if (!$keyCode || !$paymentBatchNum || $paymentBatchNum == 0) {
            $verified = false;
        }
        // Check if the user tariff plan belongs to the user
        $currentUser = User::getCurrentUser();
        // Save payment for current user
        $userPmPayment = new UserPmoneyPayment();
        $userPmPayment->user_id = $currentUser->id;
        $userPmPayment->order_num = $userOrderNumberId;
        $userPmPayment->payee_account = $request->getPost('PAYEE_ACCOUNT');
        $userPmPayment->payer_account = $request->getPost('PAYER_ACCOUNT');
        $userPmPayment->payment_amount = $request->getPost('PAYMENT_AMOUNT');
        $userPmPayment->payment_units = $request->getPost('PAYMENT_UNITS');
        $userPmPayment->payment_batch_num = $paymentBatchNum;
        $userPmPayment->payment_id = $request->getPost('PAYMENT_ID');
        $userPmPayment->suggested_memo = $request->getPost('SUGGESTED_MEMO');
        $userPmPayment->v2_hash = $request->getPost('V2_HASH');
        $userPmPayment->timestamp_gmt = $request->getPost('TIMESTAMPGMT');
        $userPmPayment->customer_number = $request->getPost('CUST_NUM');
        $userPmPayment->key_code = $request->getPost('KEY_CODE');
        $userPmPayment->save(false);
        // In case when user come from some marketing plan
        if ($keyCode == 'marketing') {
            $userOrder = UserOrder::model()->inprogress()->with('marketingPlan')->findByPk($userOrderNumberId);
            // Check if order not exist or not verified or marketing plan not exist
            if (!$verified || !$userOrder instanceof UserOrder || is_null($userOrder->marketingPlan)
                    || $userOrder->marketingPlan->join_amount !== $userPmPayment->payment_amount
                    || $userPmPayment->payee_account !== Yii::app()->params['payeeAccountPM']) {
                $this->redirect(APP_BASE_URL_ABS . '/user/start/paymentField');
            }
            $userOrder->markAsApproved();
            $marketingPlan = $userOrder->marketingPlan;
            $marketingPlan->insertUserToMarketing($currentUser->id);
            $this->redirect(APP_BASE_URL_ABS . '/user/start/paymentSuccess');
        } else if ($keyCode == UserOrder::TYPE_CHARGE) {
            $userOrder = UserOrder::model()->inprogress()->findByPk($userOrderNumberId);
            // Check if order not exist or not verified or marketing plan not exist
            if (!$verified || !$userOrder instanceof UserOrder || 
                    $userOrder->amount !== $userPmPayment->payment_amount
                    || $userPmPayment->payee_account !== Yii::app()->params['payeeAccountPM']) {
                $this->redirect(APP_BASE_URL_ABS . '/user/start/paymentField');
            }
            $userOrder->markAsApproved();
            // Add user transaction
            // Add user transactions
            UserTransaction::create(array(
                'receiver_id' => $userOrder->id,
                'amount' => $userOrder->amount,
                'account_type' => User::ACCOUNT_TYPE_AMOUNT,
                'transaction_type' => UserTransaction::TYPE_CHARGE,
            ));
            // Charge user balance
            $currentUser->addAmount($userOrder->amount, User::ACCOUNT_FIELD_AMOUNT);
            $this->redirect(APP_BASE_URL_ABS . '/user/start/paymentSuccess');
        }
        
        
        $this->redirect(APP_BASE_URL_ABS . '/user/start/paymentField');
    }

}