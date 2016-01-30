<?php

class SiteController extends Controller {

    /**
     * beforeAction
     *
     * @author Davit T.
     * @created at 25th day of Jan 2016
     * @return bool
     */
    public function beforeAction($action) {
        if (!Yii::app()->user->isGuest && $action->id !== 'error') {
            $this->redirect("/user/dashboard");
        }
        return parent::beforeAction($action);
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex() {
        $this->layout = "//layouts/home";
        $criteria = new CDbCriteria();
        $criteria->limit = 10;
        $criteria->order = "created_date DESC";
        $criteria->condition = "status = :status";
        $criteria->params = array(
            ":status" => User::STATUS_ACTIVE
        );
        $users = User::model()->findAll($criteria);
        $this->render('index', array(
            'users' => $users,
            'usersCount' => count(User::model()->findAll()),
        ));
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

}