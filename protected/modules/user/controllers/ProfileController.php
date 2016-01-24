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
                    'changePassword'
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
        $model = User::getCurrentUser();
        if (isset($_POST["User"])) {
            $model->attributes = $_POST["User"];
            if ($model->save()) {
                $this->redirect(Yii::app()->createUrl("/user/dashboard"));
            }
        }
        $this->render("index", array(
            'model' => $model,
        ));
    }

    /**
     * changePassword
     *
     * @author Davit T.
     * @created at 24th day of Jan 2016
     */
    public function actionChangePassword() {
        $response = array(
            'success' => 1,
            'error' => ''
        );
        $model = User::getCurrentUser();
        $model->setScenario(User::SCENARIO_RESET_PASSWORD);
        $model->attributes = $_POST['User'];
        if(!$model->save()) {
            $response['success'] = 0;
            $response['error'] = $model->getErrors();
        };
        echo json_encode($response);
    }

}
