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
        $messageText = "Регистрация успешна завершена! Нажмите на <а href='"
                . $model->activation_code
                . "'>сюда</a> чтобы активировать ваш акаунт";
        $swiftMailer = new SwiftMailer();
        return $swiftMailer->sendEmail($to, $subject, $messageText);
    }

}
