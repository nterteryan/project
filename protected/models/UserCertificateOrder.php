<?php

/**
 * This is the model class for table "user_certificate_orders".
 *
 * The followings are the available columns in table 'user_certificate_orders':
 * @property integer $id
 * @property integer $buyer_id
 * @property integer $seller_id
 * @property integer $certificate_id
 * @property integer $user_transaction_id
 * @property double $count
 * @property string $created_date
 * @property string $updated_date
 */
class UserCertificateOrder extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'user_certificate_orders';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('updated_date', 'required'),
            array('buyer_id, seller_id, certificate_id, user_transaction_id', 'numerical', 'integerOnly' => true),
            array('count', 'numerical'),
            array('created_date', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, buyer_id, seller_id, certificate_id, user_transaction_id, count, created_date, updated_date', 'safe', 'on' => 'search'),
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
            'buyer_id' => 'Buyer',
            'seller_id' => 'Seller',
            'certificate_id' => 'Certificate',
            'user_transaction_id' => 'User Transaction',
            'count' => 'Count',
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
        $criteria->compare('buyer_id', $this->buyer_id);
        $criteria->compare('seller_id', $this->seller_id);
        $criteria->compare('certificate_id', $this->certificate_id);
        $criteria->compare('user_transaction_id', $this->user_transaction_id);
        $criteria->compare('count', $this->count);
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
     * @return UserCertificateOrder the static model class
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
