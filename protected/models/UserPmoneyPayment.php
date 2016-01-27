<?php

/**
 * This is the model class for table "user_pmoney_payments".
 *
 * The followings are the available columns in table 'user_pmoney_payments':
 * @property integer $id
 * @property integer $order_num
 * @property string $payee_account
 * @property double $payment_amount
 * @property string $payer_account
 * @property string $payment_units
 * @property string $payment_batch_num
 * @property string $payment_id
 * @property string $suggested_memo
 * @property string $v2_hash
 * @property string $timestamp_gmt
 * @property integer $customer_number
 * @property string $key_code
 * @property string $created_date
 * @property string $updated_date
 */
class UserPmoneyPayment extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'user_pmoney_payments';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('updated_date', 'required'),
            array('order_num, customer_number', 'numerical', 'integerOnly' => true),
            array('payment_amount', 'numerical'),
            array('payee_account, payer_account, payment_units, payment_batch_num, payment_id, suggested_memo', 'length', 'max' => 20),
            array('v2_hash, timestamp_gmt', 'length', 'max' => 50),
            array('key_code', 'length', 'max' => 255),
            array('created_date', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, order_num, payee_account, payment_amount, payer_account, payment_units, payment_batch_num, payment_id, suggested_memo, v2_hash, timestamp_gmt, customer_number, key_code, created_date, updated_date', 'safe', 'on' => 'search'),
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
            'order_num' => 'Order Num',
            'payee_account' => 'Payee Account',
            'payment_amount' => 'Payment Amount',
            'payer_account' => 'Payer Account',
            'payment_units' => 'Payment Units',
            'payment_batch_num' => 'Payment Batch Num',
            'payment_id' => 'Payment',
            'suggested_memo' => 'Suggested Memo',
            'v2_hash' => 'V2 Hash',
            'timestamp_gmt' => 'Timestamp Gmt',
            'customer_number' => 'Customer Number',
            'key_code' => 'Key Code',
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
        $criteria->compare('order_num', $this->order_num);
        $criteria->compare('payee_account', $this->payee_account, true);
        $criteria->compare('payment_amount', $this->payment_amount);
        $criteria->compare('payer_account', $this->payer_account, true);
        $criteria->compare('payment_units', $this->payment_units, true);
        $criteria->compare('payment_batch_num', $this->payment_batch_num, true);
        $criteria->compare('payment_id', $this->payment_id, true);
        $criteria->compare('suggested_memo', $this->suggested_memo, true);
        $criteria->compare('v2_hash', $this->v2_hash, true);
        $criteria->compare('timestamp_gmt', $this->timestamp_gmt, true);
        $criteria->compare('customer_number', $this->customer_number);
        $criteria->compare('key_code', $this->key_code, true);
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
     * @return UserPmoneyPayment the static model class
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

}
