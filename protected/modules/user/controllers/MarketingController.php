<?php
/**
 * StartController 
 *
 * @author Narek T.
 * @created at 24th day of Jan 2016
 */
class MarketingController extends Controller {
    
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
                    'easy',
                    'fast',
                    'partner',
                    'premium',
                    'paymentSuccess',
                    'paymentField',
                    'getPinForm',
                    'enterToMarketing',
                ),
                'roles' => array(User::ROLE_USER),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionEasy() {
        $currentUser = User::getCurrentUser();
        $matrixFirst = UserMatrixFirst::model()->notClosed()->byUserId($currentUser->id)->find();
        $marketingPlan = MarketingPlan::model()->bySlug(MarketingPlan::SLUG_MATRIX_1)->find();
        $this->render('easy', array(
            'currentUser' => $currentUser,
            'matrixFirst' => $matrixFirst,
            'marketingPlan' => $marketingPlan,
        ));
    }
    
    public function actionFast() {
        $currentUser = User::getCurrentUser();
        $matrixSeconde = UserMatrixSeconde::model()->notClosed()->byUserId($currentUser->id)->find();
        $marketingPlan = MarketingPlan::model()->bySlug(MarketingPlan::SLUG_MATRIX_2)->find();
        $this->render('fast', array(
            'currentUser' => $currentUser,
            'matrixSeconde' => $matrixSeconde,
            'marketingPlan' => $marketingPlan,
        ));
    }
    
    public function actionPartner() {
        $currentUser = User::getCurrentUser();
        $marketingPlan = MarketingPlan::model()->bySlug(MarketingPlan::SLUG_PARTNER)->find();
        $this->render('partner', array(
            'currentUser' => $currentUser,
            'marketingPlan' => $marketingPlan,
        ));
    }
    
    public function actionPremium() {
        $this->render('premium');
    }
    
    public function actionPaymentSuccess() {
        $this->render('paymentSuccess');
    }
    
    public function actionPaymentField() {
        $this->render('paymentField');
    }
    
    /**
     * Get pin code form
     *
     * @author Narek T.
     * @created at 21th day of February 2016
     * @return void
     */
    public function actionGetPinForm() {
        $response = array(
            'success' =>  'true',
        );
        // Get request params
        $request = Yii::app()->request;
        $marketingPlanId = $request->getPost('marketingId');
        // Check marketing plan
        $marketing = MarketingPlan::model()->findByPk($marketingPlanId);
        if (!$marketing instanceof MarketingPlan) {
            $response['success'] = 'false';
            $response['message'] = 'Неверный маркетинг плана.';
            echo json_encode($response);
            Yii::app()->end();
        }
        $response['message'] = $this->renderPartial('_form', array(
            'marketing' => $marketing,
        ), true, false);
        echo json_encode($response);
        Yii::app()->end();
    }
    
    /**
     * Check user pin code and enter user to marketing plan 
     *
     * @author Narek T.
     * @created at 21th day of February 2016
     * @return void
     */
    public function actionEnterToMarketing() {
        $response = array(
            'success' =>  'true',
        );
        // Get request params
        $request = Yii::app()->request;
        $marketingPlanId = $request->getPost('marketingId');
        $pin = $request->getPost('pin');
        // Get current user
        $currentUser = User::getCurrentUser();
        // Check pin code
        if ($currentUser->pin !== $pin) {
            $response['success'] = 'false';
            $response['message'] = 'Неверный пин. Пин код можно посматреть <a href="/user/profile">здесь</a>';
            echo json_encode($response);
            Yii::app()->end();
        }
        // Check marketing plan
        $marketingPlan = MarketingPlan::model()->findByPk($marketingPlanId);
        if (!$marketingPlan instanceof MarketingPlan) {
            $response['success'] = 'false';
            $response['message'] = 'У вас не достаточно денегь на лицевом счете.';
            echo json_encode($response);
            Yii::app()->end();
        }
        // Check if user have enough balance in account
        if (!$currentUser->isAmountEnough($marketingPlan->join_amount)) {
            $response['success'] = 'false';
            $response['message'] = 'У вас не достаточно денегь на лицевом счете. Пополнить можно <a href="/user/finance">здесь</a>';
            echo json_encode($response);
            Yii::app()->end();
        }
        // Make transaction for user
        $userTransaction = new UserTransaction();
        $userTransaction->sender_id = $currentUser->id;
        $userTransaction->amount = $marketingPlan->join_amount;
        $userTransaction->transaction_type = $marketingPlan->getTransactionType();
        $userTransaction->account_type = User::ACCOUNT_TYPE_AMOUNT;
        $userTransaction->save(false);
        // Discount from user amount
        $currentUser->discount($marketingPlan->join_amount);
        // Insert user to marketing
        $marketingPlan->insertUserToMarketing($currentUser->id);
        
        $response['message'] = 'Поздравляем вы успешно вошли в ' . $marketingPlan->name;
        echo json_encode($response);
        Yii::app()->end();
    }

}