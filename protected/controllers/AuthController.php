<?php

class AuthController extends Controller {

    /**
     * Displays the login page
     */
    public function actionLogin() {
        $model = new LoginForm;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login())
                $this->redirect(Yii::app()->createUrl("/user/dashboard"));
        }
        // display the login form
        $this->render('login', array('model' => $model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

    /**
     * actionRegister
     *
     * @author Davit T.
     * @created at 23 th day of Jan 2016
     * @param string $code
     * @return void
     */
    public function actionRegister($code = "") {

        $model = new User('register');

        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
            // Keep refferal code of inviter 
            $model->inviter_refferal = $code;

            if ($model->save()) {
                $this->render("registerSuccess", array('model' => $model));
                exit;
            }
        }
        $this->render("register", array(
            "model" => $model
        ));
    }

    /**
     * actionActivate
     *
     * @author Davit T.
     * @created at 24th day of Jan 2016
     * @param string $code
     * @return void
     */
    public function actionActivate($code = '') {
        $error = '';
        $user = null;
        if ($code) {
            $user = User::model()->findByAttributes(array(
                'activation_code' => $code
            ));
        }
        if (!$user instanceof User) {
            $this->render('activationFail');
        } else {
            $user->status = User::STATUS_ACTIVE;
            $user->activation_code = "";
            $user->save(false);
            $this->render('activationSuccess');
        }
    }

}