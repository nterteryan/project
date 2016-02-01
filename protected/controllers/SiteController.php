<?php

class SiteController extends Controller {

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
    
    /**
     * Marketing plan static page
     *
     * @author Narek T.
     * @created at 30th day of January 2016
     * @return void
     */
    public function actionMarketing() {
        //$this->layout = "//layouts/home";
        $this->render('marketing');
    }
    
    /**
     * Finance plan static page
     *
     * @author Narek T.
     * @created at 30th day of January 2016
     * @return void
     */
    public function actionFinance() {
        //$this->layout = "//layouts/home";
        $this->render('finance');
    }
    
    /**
     * Finance plan static page
     *
     * @author Narek T.
     * @created at 30th day of January 2016
     * @return void
     */
    public function actionMedicine() {
        //$this->layout = "//layouts/home";
        $this->render('medicine');
    }
    
    

}