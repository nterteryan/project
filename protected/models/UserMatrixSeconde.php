<?php

/**
 * This is the model class for table "user_matrix_seconde".
 *
 * The followings are the available columns in table 'user_matrix_seconde':
 * @property integer $id
 * @property integer $user_id
 * @property integer $order_number
 * @property integer $close_number
 * @property string $is_closed
 * @property string $created_date
 * @property string $updated_date
 */
class UserMatrixSeconde extends MatrixActivaRecord {
    
    const MATRIX_CLOSED_AMOUNT = 75;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'user_matrix_seconde';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('updated_date', 'required'),
            array('user_id, order_number, close_number', 'numerical', 'integerOnly' => true),
            array('is_closed', 'length', 'max' => 3),
            array('created_date', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, user_id, order_number, close_number, is_closed, created_date, updated_date', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'user' => array(self::BELONGS_TO, 'User', 'user_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'user_id' => 'User',
            'order_number' => 'Order Number',
            'close_number' => 'Close Number',
            'is_closed' => 'Is Closed',
            'created_date' => 'Created Date',
            'updated_date' => 'Updated Date',
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
        $criteria->compare('user_id', $this->user_id);
        $criteria->compare('order_number', $this->order_number);
        $criteria->compare('close_number', $this->close_number);
        $criteria->compare('is_closed', $this->is_closed, true);
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
     * @return UserMatrixSeconde the static model class
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
        }
        $this->updated_date = new CDbExpression("now()");

        return true;
    }
    
    /**
     * AfterSave
     * For check isNewRecord, set created date or updated date
     * 
     * @author Narek T.
     * @created at 23th day of January 2016
     * @return bool
     */
    public function afterSave() {
        // Check if some user close matrix
        $userMatrixSecondeClosed = $this->checkIfUserClose($this->order_number);
        if (!is_null($userMatrixSecondeClosed)) {
            $userMatrixSecondeClosed->markAsClosed();
            // Add closed matrix payment to user
            $userClosedMatrix = $userMatrixSecondeClosed->user;
            $personalAccauntAmountPortion = CTransaction::SECONDE_MATRIX_CLOSED_PERSONAL_AMOUNT;
            // Check if user closed matrix already partner
            if (!$userClosedMatrix->isPartner()) {
                $accauntAmountPortion = self::MATRIX_CLOSED_AMOUNT;
                // Mark as partner and set payment for all partners
                $userClosedMatrix->markAsPartner(CTransaction::PARTNER_AMOUNT);
                // After seconde matrix closed once 75$ to amount
                $userClosedMatrix->addAmount($accauntAmountPortion, User::ACCOUNT_FIELD_AMOUNT);
                $userClosedMatrix->addAmount($personalAccauntAmountPortion, User::ACCOUNT_FIELD_PERSONAL_AMOUNT);
                CompanyTransaction::createAfterMatrixClosed($this->user_id);
            } else {
                $accauntAmountPortion = self::MATRIX_CLOSED_AMOUNT + 100;
                $userClosedMatrix->addAmount($accauntAmountPortion, User::ACCOUNT_FIELD_AMOUNT);
                $userClosedMatrix->addAmount($personalAccauntAmountPortion, User::ACCOUNT_FIELD_PERSONAL_AMOUNT);
                // raspredelit na kompaniyu
                CompanyTransaction::createAfterMatrixClosed($this->user_id, false);
            }
            // Add user transactions
            UserTransaction::create(array(
                'sender_id' => $this->user_id,
                'receiver_id' => $userClosedMatrix->id,
                'amount' => $accauntAmountPortion,
                'account_type' => User::ACCOUNT_TYPE_AMOUNT,
                'transaction_type' => UserTransaction::TYPE_SECONDE_MATRIX
            ));
            UserTransaction::create(array(
                'sender_id' => $this->user_id,
                'receiver_id' => $userClosedMatrix->id,
                'amount' => $personalAccauntAmountPortion,
                'account_type' => User::ACCOUNT_TYPE_PERSONAL_AMOUNT,
                'transaction_type' => UserTransaction::TYPE_SECONDE_MATRIX
            ));
        }
        return true;
    }
    
    /**
     * Generate next matrix number
     *
     * @author Narek T.
     * @created at 26th day of January 2016
     * @return integer
     */
    public function getNextOrderNumber() {
        $sql = Yii::app()->db->createCommand('SELECT MAX(order_number) AS orderNumber FROM user_matrix_seconde');
        $result = $sql->queryRow();
        $maxOrderNumber = $result['orderNumber'];
        return (!is_null($maxOrderNumber)) ? $maxOrderNumber + 1 : 1;
    }
    
    /**
     * Add user to seconde matrix
     *
     * @author Narek T.
     * @created at 27th day of January 2016
     * @param integer $userId
     * @return boolean
     */
    public static function addUser($userId) {
        $userMatrixSeconde = new UserMatrixSeconde;
        $userMatrixSeconde->order_number = $userMatrixSeconde->getNextOrderNumber();
        $userMatrixSeconde->close_number = $userMatrixSeconde->getCloseNumber($userMatrixSeconde->order_number);
        $userMatrixSeconde->user_id = $userId;
        return $userMatrixSeconde->save(false);
    }
    
    /**
     * Check if some user close seconde matrix
     *
     * @author Narek T.
     * @created at 27th day of January 2016
     * @param integer $closeNumber
     * @return UserMatrixSeconde | null
     */
    public function checkIfUserClose($closeNumber) {
        $userMatrixSeconde = UserMatrixSeconde::model()->byCloseNumber($closeNumber)->find();
        return $userMatrixSeconde;
    }

}
