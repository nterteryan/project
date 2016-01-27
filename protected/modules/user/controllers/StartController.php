<?php
/**
 * StartController 
 *
 * @author Narek T.
 * @created at 24th day of Jan 2016
 */
class StartController extends Controller {
    
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

}