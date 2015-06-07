<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity {

    private $_id;

    const ERROR_EMAIL_INVALID = 5;
    const ERROR_STATUS_NOTACTIV = 2;
    const ERROR_STATUS_BAN = 3;
    const ERROR_STATUS_EXPIRE = 4;

    /**
     * Authenticates a user.
     * The example implementation makes sure if the username and password
     * are both 'demo'.
     * In practical applications, this should be changed to authenticate
     * against some persistent user identity storage (e.g. database).
     * @return boolean whether authentication succeeds.
     */
    public function authenticate() {
        if (strpos($this->username, "@")) {
            $user = User::model()->findByAttributes(array('email' => $this->username));
        } else {
            $user = User::model()->findByAttributes(array('username' => $this->username));
        }

        if ($user === null) { // No user found!
            //$this->errorCode = self::ERROR_USERNAME_INVALID;
            if (strpos($this->username, "@")) {
                $this->errorCode = self::ERROR_EMAIL_INVALID;
            } else {
                $this->errorCode = self::ERROR_USERNAME_INVALID;
            }
        } else if ($user->password !== SHA1($this->password)) { // Invalid password!
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        } else if ($user->status == 2) {
            $this->errorCode = self::ERROR_STATUS_NOTACTIV;
        } else if ($user->status == 3) {
            $this->errorCode = self::ERROR_STATUS_BAN;
        } else if ($user->status == 4) {
            $this->errorCode = self::ERROR_STATUS_EXPIRE;
        } else { // Okay!
            Yii::app()->db->createCommand('UPDATE {{user}} SET `lastvisitDate` = NOW() WHERE id=' . $user->id)->execute();
            $this->errorCode = self::ERROR_NONE;
            // Store the role in a session:
            $this->setState('group_id', $user->group_id);
            $this->setState('storeowner', $user->storeowner);
            $this->setState('email', $user->email);
            $this->setState('fullname', $user->name);
            $this->setState('user_type', $user->user_type);
            $this->setState('company', $user->company);
            $this->setState('shop_id', $user->shop_id);
            $this->_id = $user->id;
            Yii::app()->db->createCommand('UPDATE {{yiisession}} SET `userId` = ' . $user->id . ', userType=0 WHERE id="' . session_id() . '"')->execute();
        }
        return !$this->errorCode;
    }

    public function getId() {
        return $this->_id;
    }

}