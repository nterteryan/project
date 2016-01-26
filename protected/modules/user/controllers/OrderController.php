<?php
/**
 * OrderController 
 *
 * @author Narek T.
 * @created at 24th day of Jan 2016
 */
class OrderController extends Controller {
    
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
                    'marketing',
                ),
                'roles' => array(User::ROLE_USER),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionMarketing($id) {
        $marketingPlan = MarketingPlan::model()->findByPk($id);
        // CHeck if marketing plan exist
        if (!$marketingPlan instanceof MarketingPlan) {
            $this->redirect(APP_BASE_URL . '/user/dashboard');
        }
        // Check if order exist for current user and current marketingplan
        $userOrder = UserOrder::model()->inprogress()->byUserId(Yii::app()->user->id)
                ->byMarketingPlanId($id)->find();
        if (!$userOrder instanceof UserOrder) {
            $userOrder = new UserOrder();
        }
        $userOrder->amount = $marketingPlan->join_amount;
        $userOrder->user_id = Yii::app()->user->id;
        $userOrder->marketing_plan_id = $id;
        $userOrder->save(false);
        
        $this->render('index', array(
            'marketingPlan' => $marketingPlan,
            'userOrder' => $userOrder,
        ));
    }

}