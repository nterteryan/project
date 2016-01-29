<?php

/**
 * Notification
 *
 * @author Davit T.
 * @created at 24th day of Jan 2016
 */
class CNotification {

    /**
     * sendActivationMail
     *
     * @author Davit T.
     * @created at 24th day of Jan 2016
     * @param object $model
     * @return boolean
     */
    public static function sendActivationMail($model) {
        $to = $model->email;
        $subject = "Регистрация успешна завершена!";
        $messageText = "Регистрация успешна завершена! Нажмите <a href='"
                . Yii::app()->createAbsoluteUrl("/auth/activate", array("code"=>$model->activation_code))
                . "'>сюда</a> чтобы активировать ваш акаунт";
        return self::sendMail($to, $subject, $messageText);
    }

    /**
     * sendMail
     *
     * @author Davit T.
     * @created at 24th day of Jan 2016
     * @param object $model
     * @return boolean
     */
    public static function sendMail($to, $subject, $messageText) {
        $swiftMailer = new SwiftMailer();
        $smtp = (Yii::app()->params['useSwiftMailer']) ? true : false;
        return $swiftMailer->sendEmail($to, $subject, $messageText, $smtp);
    }

}
