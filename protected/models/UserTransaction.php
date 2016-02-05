<?php

/**
 * This is the model class for table "user_transactions".
 *
 * The followings are the available columns in table 'user_transactions':
 * @property integer $id
 * @property integer $receiver_id
 * @property integer $sender_id
 * @property double $amount
 * @property string $transaction_type
 * @property string $account_type
 * @property string $created_date
 * @property string $updated_date
 */
class UserTransaction extends CActiveRecord {

    const TYPE_GRANDED_BY_ADMIN = 'GRANDED_BY_ADMIN';
    const TYPE_FIRST_MATRIX = 'FIRST_MATRIX';
    const TYPE_SECONDE_MATRIX = 'SECONDE_MATRIX';
    const TYPE_BUY = 'BUY';
    const TYPE_TRANSFER = 'TRANSFER';
    const TYPE_CHARGE = 'CHARGE';
    const TYPE_REFFERAL = 'REFFERAL';

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'user_transactions';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('updated_date', 'required'),
            array('receiver_id, sender_id', 'numerical', 'integerOnly' => true),
            array('amount', 'numerical'),
            array('transaction_type', 'length', 'max' => 16),
            array('account_type', 'length', 'max' => 15),
            array('created_date', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, receiver_id, sender_id, amount, transaction_type, account_type, created_date, updated_date', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'receiver_id' => 'Receiver',
            'sender_id' => 'Sender',
            'amount' => 'Amount',
            'transaction_type' => 'Transaction Type',
            'account_type' => 'Account Type',
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
        $criteria->compare('receiver_id', $this->receiver_id);
        $criteria->compare('sender_id', $this->sender_id);
        $criteria->compare('amount', $this->amount);
        $criteria->compare('transaction_type', $this->transaction_type, true);
        $criteria->compare('account_type', $this->account_type, true);
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
     * @return UserTransaction the static model class
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
        return true;
    }

    /**
     * beforeValidate
     * 
     * @author Dvit T.
     * @created at 05th day of Deb 2016
     * @return bool
     */
    public function beforeValidate() {
        $this->updated_date = new CDbExpression("now()");
        return true;
    }

    /**
     * create
     * 
     * @param array $data
     * @author Davit T.
     * @created at 05th day of Feb 2016
     */
    public function create($data) {
        $model = new UserTransaction();
        $model->attributes = $data;
        $model->save();
    }

}
