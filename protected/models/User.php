<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $id
 * @property integer $parent_id
 * @property string $email
 * @property string $password
 * @property string $status
 * @property string $role
 * @property string $first_name
 * @property string $last_name
 * @property string $skype
 * @property string $phone
 * @property string $refferal_code
 * @property string $activation_code
 * @property string $created_date
 * @property string $updated_date
 */
class User extends CActiveRecord {

    const STATUS_NEW = 'NEW';
    const STATUS_ACTIVE = 'ACTIVE';
    const STATUS_BLOCKED = 'BLOCKED';
    const ROLE_SUPER_ADMIN = 'SUPER_ADMIN';
    const ROLE_ADMIN = 'ADMIN';
    const ROLE_USER = 'USER';
    const ERR_INACTIVE = 'INACTIVE';
    const ERR_BLOCKED = 'BLOCKED';
    // Validation error messages
    const ERR_REQUIRED = '"{attribute}" обязателен для заполнения';
    const ERR_COMPARE = '"{attribute}" должен с точностью повторятся';
    const ERR_LENGTH = '"{attribute}" слишком длинный (максимум {max} символов).';
    const ERR_NUMERICAL = '"{attribute}" должен быть цыфрой';
    const ERR_UNIQUE = '{attribute} {value} уже существует';
    // Other error messages
    const ERR_INVALID_ACTIVATION = "Ссылка активации является неправильной.";
    const ERR_OLD_PASSWORD = "Пароль не соответствует текушему.";
    const ERR_OLD_PASSWORD_REQUIRED = '"Текуший Пароль" обязателен для заполнения';
    const ERROR_NOT_ENOUGH_AMOUNT = 'У вас не достаточно денег на лицевом счету.';
    const ERROR_INVALID_PIN_CODE = 'Неверный пин код.';
    const ERROR_FROM_USER = 'Предупреждение! Вы делаете что то неверно.';
    // Scenarios 
    const SCENARIO_RESET_PASSWORD = 'resetPassword';
    const SCENARIO_REGISTRATION = 'registration';
    // Amount Type
    const ACCOUNT_TYPE_AMOUNT = 'AMOUNT';
    const ACCOUNT_TYPE_PERSONAL_AMOUNT = 'PERSONAL_AMOUNT';
    // Amount Type
    const ACCOUNT_FIELD_AMOUNT = 'amount';
    const ACCOUNT_FIELD_PERSONAL_AMOUNT = 'personal_amount';
    // User types 
    const TYPE_FOUNDER = "FOUNDER";
    const TYPE_CO_FOUNDER = "CO_FOUNDER";
    const TYPE_PARTNER = "PARTNER";
    const TYPE_MEMBER = "MEMBER";
    // User premium
    const IS_PREMIUM_YES = 'YES';
    const IS_PREMIUM_NO = 'NO';
    // User default avatar if no image 
    const DEFAULT_AVATAR = '/themes/domblago/img/no_image.gif';
    // Compare field 
    public $repeat_password = '';
    // Old password used on reset password in profile page, etc
    public $old_password = '';
    // Inviter refferal code
    public $inviter_refferal = '';

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'users';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('email, password, username,skype', 'required', 'message' => self::ERR_REQUIRED),
            array('email', 'unique', 'message' => self::ERR_UNIQUE),
            array('parent_id', 'numerical', 'integerOnly' => true, 'message' => self::ERR_NUMERICAL),
            array('email, first_name, last_name, skype, refferal_code, activation_code', 'length', 'max' => 255, 'tooLong' => self::ERR_LENGTH),
            array('password', 'length', 'max' => 100, 'tooLong' => self::ERR_LENGTH),
            array('status', 'length', 'max' => 7, 'tooLong' => self::ERR_LENGTH),
            array('username', 'length', 'max' => 16, 'tooLong' => self::ERR_LENGTH),
            array('username', 'unique'),
            array('skype', 'unique'),
            array('role', 'length', 'max' => 11, 'tooLong' => self::ERR_LENGTH),
            array('phone', 'length', 'max' => 60, 'tooLong' => self::ERR_LENGTH),
            array('created_date', 'safe'),
            //
            // REGISTRATION SCENARIO
            // 
            array('email, password, username, repeat_password', 'required', 'on' => self::SCENARIO_REGISTRATION, 'message' => self::ERR_REQUIRED),
            array('repeat_password', 'compare', 'compareAttribute' => 'password', 'on' => self::SCENARIO_REGISTRATION, 'message' => self::ERR_COMPARE),
            // 
            // END REGISTRATION SCENARIO
            // 
            // RESETPASSWORD SCENARIO 
            // 
            array('repeat_password', 'required', 'on' => self::SCENARIO_RESET_PASSWORD, 'message' => self::ERR_REQUIRED),
            array('repeat_password', 'compare', 'compareAttribute' => 'password', 'on' => self::SCENARIO_RESET_PASSWORD, 'message' => self::ERR_COMPARE),
            // 
            // END RESETPASSWORD SCENARION
            // 
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, parent_id, email, password, status, role, first_name, last_name, skype, phone, refferal_code, activation_code, created_date, updated_date', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'userimage' => array(self::HAS_MANY, 'UserImage','user_id', 'joinType'=>'LEFT join',
            'condition'=>'userimage.status = "ACTIVE" or userimage.status IS NULL '),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'parent_id' => 'Parent',
            'email' => 'Эл-Почтa',
            'username' => 'Никнейм',
            'password' => 'Пароль',
            'old_password' => 'Текуший Пароль',
            'repeat_password' => 'Повторите Пароль',
            'status' => 'Статус',
            'role' => 'Роль',
            'first_name' => 'Имя',
            'last_name' => 'Фамилия',
            'skype' => 'Скайп',
            'phone' => 'Телефон',
            'refferal_code' => 'Рефферальный Код',
            'activation_code' => 'Код Активации',
            'created_date' => 'Дата Создания',
            'updated_date' => 'Дата Обнавления',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('parent_id', $this->parent_id);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('status', $this->status, true);
        $criteria->compare('role', $this->role, true);
        $criteria->compare('first_name', $this->first_name, true);
        $criteria->compare('last_name', $this->last_name, true);
        $criteria->compare('skype', $this->skype, true);
        $criteria->compare('phone', $this->phone, true);
        $criteria->compare('refferal_code', $this->refferal_code, true);
        $criteria->compare('activation_code', $this->activation_code, true);
        $criteria->compare('created_date', $this->created_date, true);
        $criteria->compare('updated_date', $this->updated_date, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return User the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * BeforeSave
     * For check isNewRecord, set created date or updated date
     * 
     * @author Narek T.
     * @created at 23th day of January 2016
     * @return bool
     */
    public function beforeSave() {
        if ($this->isNewRecord) {
            $this->created_date = new CDbExpression("now()");
            $this->refferal_code = HashHelper::generateRefferalHash();
            $this->activation_code = HashHelper::generateActivationHash($this->email);
            if (!empty($this->password)) {
                $this->password = HashHelper::hashPassword($this->password);
            }
            if ($this->inviter_refferal) {
                $this->parent_id = $this->getInviterIdByRefferalCode();
            }
        }
        if ($this->scenario == self::SCENARIO_RESET_PASSWORD && !empty($this->password)) {
            $this->password = HashHelper::hashPassword($this->password);
        }
        $this->updated_date = new CDbExpression("now()");
        return true;
    }

    /**
     * afterSave
     * 
     * @author Davit T.
     * @created at 24th day of Jan 2016
     * @return bool
     */
    public function afterSave() {
        if ($this->isNewRecord && $this->status == self::STATUS_NEW) {
            CNotification::sendActivationMail($this);
        }
        return parent::afterSave();
    }

    /**
     * getFullName
     *
     * @author Davit T.
     * @created at 24th day of Jan 2016
     * @return string
     */
    public function getFullName() {
        return $this->first_name . " " . $this->last_name;
    }

    /**
     * getRefferalUrl
     *
     * @author Davit T.
     * @created at 25th day of Jan 2016
     * @return string
     */
    public function getRefferalUrl() {
        return Yii::app()->createAbsoluteUrl("/auth/register", array('code' => $this->refferal_code));
    }

    /**
     * getInviterIdByRefferalCode 
     *
     * @author Davit T.
     * @created at 23th day of Jan 2016
     * @return void
     */
    private function getInviterIdByRefferalCode() {
        $dbCommand = Yii::app()->db->createCommand("SELECT `id` FROM `users` WHERE `refferal_code`=:refferal_code");
        $inviterId = $dbCommand->queryScalar(array(
            ':refferal_code' => $this->inviter_refferal
        ));
        $inviterId = $inviterId ? $inviterId : null;
        return $inviterId;
    }

    /**
     * Get current user, singleton 
     *
     * @author Narek T. 
     * @created at 24th day of July 2015
     * @return User
     */
    static function getCurrentUser() {
        static $currentUser;
        if (!$currentUser instanceof User) {
            $currentUser = User::model()->with('userimage')->findByPk(Yii::app()->user->id);
        }
        return $currentUser;
    }

    /**
     * Check if current user is partner 
     *
     * @author Narek T.
     * @created at 26th day of January 2016
     * @return boolean
     */
    public function isPartner() {
        //  NEED TO CHECK IS THIS OK
        return ($this->type !== self::TYPE_MEMBER);
    }

    /**
     * structureData - list of data providers that contains refferal hierarchy 
     *
     * @author Davit T.
     * @created at 27th day of Jan 2016
     */
    public function structureData() {
        // Array of results
        $results = array();
        // List of users ids which refferals need to get in each step
        $userIdList = array();
        // Loop start
        do {
            $refferals = self::userRefferals($userIdList);
            if (!empty($refferals)) {
                $userIdList = array_values(CHtml::listData($refferals, "id", "id"));
                $results[] = $refferals;
            }
        } while (!empty($refferals));
        return $results;
    }

    /**
     * userRefferals 
     *
     * @author Davit T.
     * @created at 27th day of Jan 2016
     * @param array $userIdList
     * @return array
     */
    public function userRefferals($userIdList = array()) {
        // If not param $userIdList given, then return 
        // refferal list of current user
        if (empty($userIdList)) {
            $userIdList = array($this->id);
        }
        $inIdCondition = implode(",", $userIdList);
        // Creating criteria object
        $criteria = new CDbCriteria();
        $criteria->addCondition("status=:user_status AND parent_id IN($inIdCondition)");
        $criteria->params = array(
            ':user_status' => User::STATUS_ACTIVE,
        );
        return self::findAll($criteria);
    }

    /**
     * markAsPartner
     *
     * @author Davit T.
     * @created at 27th day of Jan 2016
     * @param float $amount 
     * @return void
     */
    public function markAsPartner($amount) {
        $this->type = self::TYPE_PARTNER;
        if ($this->save(false)) {
            CTransaction::spreadMoney($this, $amount);
            return true;
        }
    }

    /**
     * addRefferalMoney 
     *
     * @author Davit T.
     * @created at 27th day of Jan 2016
     * @param float $userAmountPortion
     */
    public function addRefferalMoney($userAmountPortion) {
        // Update balance
        $amountPortion = CTransaction::getPortion($userAmountPortion, CTransaction::PORTION_AMOUNT);
        $amount = $this->amount + $amountPortion;
        $personalAmountPortion = CTransaction::getPortion($userAmountPortion, CTransaction::PORTION_AMOUNT_PERSONAL);
        $amountPersonal = $this->amount + $personalAmountPortion;
        $dbCommand = Yii::app()->db->createCommand("UPDATE users SET amount = $amount, "
                . " personal_amount = $amountPersonal"
                . " WHERE id = {$this->id}");
        $dbCommand->query();
        // Add transactions 
        UserTransaction::create(array(
            'sender_id' => Yii::app()->user->id,
            'receiver_id' => $this->id,
            'amount' => $amountPortion,
            'account_type' => self::ACCOUNT_TYPE_AMOUNT,
            'transaction_type' => UserTransaction::TYPE_REFFERAL
        ));
        UserTransaction::create(array(
            'sender_id' => Yii::app()->user->id,
            'receiver_id' => $this->id,
            'amount' => $personalAmountPortion,
            'account_type' => self::ACCOUNT_TYPE_PERSONAL_AMOUNT,
            'transaction_type' => UserTransaction::TYPE_REFFERAL
        ));
    }

    /**
     * Add user amount to current account type 
     *
     * @author Narek T.
     * @created at 27th day of January 2016
     * @param double $amount
     * @param string $amountType
     * @return boolean
     */
    public function addAmount($amount, $accountType) {
        $this->$accountType = $this->$accountType + $amount;
        return $this->save(false);
    }

    /**
     * canReceivMoneyFromeRefferal 
     *
     * @author Davit T.
     * @created at 28th day of Jan 2016
     * @param int $refferalLevel
     * @return bool
     */
    public function canReceivMoneyFromeRefferal($refferalLevel) {
        // Founders and co-founders ca reseive money from all refferals
        if ($this->type == self::TYPE_CO_FOUNDER || $this->type == self::TYPE_FOUNDER) {
            return true;
        }
        $refferalsCount = self::model()->countByAttributes(array(
            'parent_id' => $this->id,
            'status' => self::STATUS_ACTIVE,
        ));
        $requiredRefferalsCount = $this->requiredRefferalsCountForLevel($refferalLevel);
        return $refferalsCount >= $requiredRefferalsCount;
    }

    /**
     * requiredRefferalsCountForLevel 
     *
     * @author Davit T.
     * @created at 05th day of Feb 2016
     * @param int $refferalLevel
     * @return int
     */
    private function requiredRefferalsCountForLevel($refferalLevel) {
        // Refferal counts for each level
        $refferalLevels = array(3, 5, 7, 8);
        // get required refferals count for current level
        for ($i = 0; $i < 4; $i++) {
            if ($refferalLevel <= $refferalLevels[$i]) {
                break;
            }
        }
        return ++$i;
    }

    /**
     * Check if user have enough amount in current account
     *
     * @author Narek T.
     * @created at 31th day of January 2016
     * @param double $amount
     * @return boolean
     */
    public function isAmountEnough($amount, $accountType = self::ACCOUNT_FIELD_AMOUNT) {
        return ($this->$accountType >= $amount);
    }

    /**
     * Discount from user accunt
     *
     * @author Narek T.
     * @created at 3th day of February 2016
     * @param double $amount
     * @param string $accountField
     * @return boolean
     */
    public function discount($amount, $accountField = self::ACCOUNT_FIELD_AMOUNT) {
        $this->$accountField = $this->$accountField - $amount;
        return $this->save(false);
    }
    
    public function getAvatar() {
        return self::DEFAULT_AVATAR;    
    }
    
    /**
     * Generate 4 digit pin code for user 
     *
     * @author Narek T.
     * @created at 21th day of February 2016
     * @return boolean
     */
    public function setPin() {
        $x = 3;
        $min = pow(10,$x);
        $max = pow(10,$x+1)-1;
        $this->pin = rand($min, $max);
        return $this->save(false);
    }
	/**
     * Action isPinValid
     * is Pin Valid (user)
     *
     * @author Hovo G.
     * @created at 4th day of March 2016
     * @param $pin
     * @return boolean
     */
    public function isPinValid($pin) {
         if($this->pin == $pin){
            return true;
        }else{
            return false;
        }
    }
    
    public function getUserType($icon = true) {
        switch($this->type) {
            case self::TYPE_MEMBER: $className = 'icon-member'; $name = 'КЛИЕНТ'; break;
            case self::TYPE_PARTNER: $className = 'icon-partner'; $name = 'ПАРТНЕР'; break;
            case self::TYPE_FOUNDER: $className = 'icon-founder'; $name = 'УЧРЕДИТЕЛЬ'; break;
            case self::TYPE_CO_FOUNDER: $className = 'icon-cofounder'; $name = 'СОУЧРЕДИТЕЛЬ'; break;
        }
        return ($icon) ? $className : $name;
    }
    
    /**
     * Mark user as premium
     *
     * @author Narek T.
     * @created at 12th day of March 2016
     * @return void
     */
    public function markAsPremium() {
        $this->is_premium = self::IS_PREMIUM_YES;
        return $this->save(false);
    }

}
