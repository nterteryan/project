<?php

class AuthController extends Controller {

    /**
     * beforeAction
     *
     * @author Davit T.
     * @created at 25th day of Jan 2016
     * @return bool
     */
    public function beforeAction($action) {
        if (!Yii::app()->user->isGuest && !in_array($action->id, array('error', 'logout'))) {
            $this->redirect("/user/dashboard");
        }
        return parent::beforeAction($action);
    }

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
                $this->redirect(Yii::app()->createUrl("/user/certificate"));
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

        $model = new User('registration');

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
            $user->save(false);
            $this->render('activationSuccess');
        }
    }

    /**
     * actionForgotePassword
     *
     * @author Davit T.
     * @created at 24th day of Jan 2016
     * @return void
     */
    public function actionForgotePassword() {
        $error = "";
        if (isset($_POST['email'])) {
            $email = $_POST['email'];
            $user = User::model()->findByAttributes(array('email' => $email));
            if ($user instanceof User) {
                $to = $_POST['email'];
                $subject = "Забыли пароль?";
                $messageText = "Зайдите по <a href='"
                        . Yii::app()->createAbsoluteUrl("/auth/resetPassword", array('code' => $user->activation_code))
                        . "'>этой ссылке</a> чтобы сбросить старый пароль и создать новый";
                CNotification::sendMail($to, $subject, $messageText);
                $this->render("resetMailSent");
                exit;
            } else {
                $error = "Пользователь с такой электронной почтой не существует.";
            }
        }
        $this->render('forgotePassword', array('error' => $error));
    }

    /**
     * actionResetPassword
     *
     * @author Davit T.
     * @created at 24th day of Jan 2016
     * @return void
     */
    public function actionResetPassword($code = '') {
        $model = null;
        if ($code) {
            $model = User::model()->findByAttributes(array('activation_code' => $code));
        }
        if (!$model instanceof User) {
            $this->render("resetPasswordFail");
            exit;
        }
        $model->setScenario("resetPassword");
        $model->password = '';
        if (isset($_POST["User"])) {
            $model->attributes = $_POST["User"];
            if ($model->save()) {
                $this->render("resetPasswordSuccess");
                exit;
            }
        }
        $this->render("resetPassword", array('model' => $model));
    }

}