<?php
/**
 * PaymentController 
 *
 * @author Narek T.
 * @created at 26th day of Jan 2016
 */
class PaymentController extends Controller {

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
                    || $userOrder->marketingPlan->join_amount !== $userPmPayment->payment_amount) {
                $this->redirect(APP_BASE_URL_ABS . '/user/start/paymentField');
            }
            $userOrder->markAsApproved();
            $marketingPlan = $userOrder->marketingPlan;
            $marketingPlan->insertUserToMarketing($currentUser->id);
            $this->redirect(APP_BASE_URL_ABS . '/user/start/paymentSuccess');
        }
        echo "<pre>";
        var_dump($_POST);
        echo "</pre>";
        die();
        $this->render('perfectVerify');
    }

}