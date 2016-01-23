<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity {
    
     private $_id;

    /**
     * Authenticates a user.
     * The example implementation makes sure if the username and password
     * are both 'demo'.
     * In practical applications, this should be changed to authenticate
     * against some persistent user identity storage (e.g. database).
     * @return boolean whether authentication succeeds.
     */
    public function authenticate() {
        $user = User::model()->findByAttributes(array(
            'email' => $this->username,
        ));
        if (!$user instanceof User) {
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        } elseif (!HashHelper::comparePassword($this->password, $user->password)) {
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        } elseif ($user->status == User::STATUS_NEW) {
            $this->errorCode = User::ERR_INACTIVE;
        } elseif ($user->status == User::STATUS_BLOCKED) {
            $this->errorCode = User::ERR_BLOCKED;    
        } else {
            $this->_id = $user->id;
            //$user->setLastLoggedDate();
            $auth = Yii::app()->authManager;
            if (!$auth->isAssigned($user->role, $this->_id)) {
                if ($auth->assign($user->role, $this->_id)) {
                    $auth->save();
                }
            }
            $this->errorCode = self::ERROR_NONE;
        }
        return ($this->errorCode == self::ERROR_NONE);
    }
    
    public function getId() {
        return $this->_id;
    }

}