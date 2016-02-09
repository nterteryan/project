<?php

/**
 * This is the model class for table "user_orders".
 *
 * The followings are the available columns in table 'user_orders':
 * @property integer $id
 * @property integer $user_id
 * @property integer $marketing_plan_id
 * @property integer $product_id
 * @property integer $amount
 * @property string $status
 * @property string $created_date
 * @property string $updated_date
 */
class UserOrder extends CActiveRecord {
    
    const STATUS_INPROGRESS = 'INPROGRESS';
    const STATUS_DECLIEND = 'DECLIEND';
    const STATUS_APPROVED = 'APPROVED';
    // Type consts
    const TYPE_CHARGE = 'CHARGE';
    const TYPE_MARKETING = 'MARKETING';
    const TYPE_PRODUCT = 'PRODUCT';
    const TYPE_PREMIUM_ACCOUNT = 'PREMIUM_ACCOUNT';
    // Scenario
    const SCENARIO_CHARGE = 'charge';

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'user_orders';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('amount', 'required', 'on' => self::SCENARIO_CHARGE),
            array('amount', 'numerical', 'integerOnly'=>true, 'min'=>5, 'tooSmall' => 'Ñóììà Ââîäà äîëæíà áûòü íå ìåíèå 5-è.', 'on' => self::SCENARIO_CHARGE),
            
            array('user_id, marketing_plan_id, product_id, amount', 'numerical', 'integerOnly' => true),
            array('status', 'length', 'max' => 10),
            array('created_date', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, user_id, marketing_plan_id, product_id, amount, status, created_date, updated_date', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'marketingPlan' => array(self::BELONGS_TO, 'MarketingPlan', 'marketing_plan_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'user_id' => 'User',
            'marketing_plan_id' => 'Marketing Plan',
            'product_id' => 'Product',
            'amount' => 'Ñóììà Ââîäà',
            'status' => 'Status',
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
        $criteria->compare('marketing_plan_id', $this->marketing_plan_id);
        $criteria->compare('product_id', $this->product_id);
        $criteria->compare('amount', $this->amount);
        $criteria->compare('status', $this->status, true);
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
     * @return UserOrder the static model class
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
     * Scopes
     *
     * @author Narek T. 
     * @created at 24th day of July 2015
     * @return array
     */
    public function scopes() {
        return array(
            'inprogress' => array(
                'condition' => $this->getTableAlias(true, false) . '.`status`=:status',
                'params' => array(
                    ':status' => self::STATUS_INPROGRESS,
                ),
            ),
            'approved' => array(
                'condition' => $this->getTableAlias(true, false) . '.`status`=:status',
                'params' => array(
                    ':status' => self::STATUS_APPROVED,
                ),
            ),
            'declined' => array(
                'condition' => $this->getTableAlias(true, false) . '.`status`=:status',
                'params' => array(
                    ':status' => self::STATUS_DECLIEND,
                ),
            ),
        );
    }
    
    /**
     * Scope by user id
     *
     * @author Narek T.
     * @created at 24th day of January 2015
     * @param integer $userId
     * @return UserOrder
     */
    public function byUserId($userId) {
        $this->getDbCriteria()->mergeWith(array(
            'condition' => 'user_id =:userId',
            'params' => array(':userId' => $userId),
        ));
        return $this;
    }
    
    /**
     * Scope by order type
     *
     * @author Narek T.
     * @created at 24th day of January 2015
     * @param string $orderType
     * @return UserOrder
     */
    public function byType($orderType) {
        $this->getDbCriteria()->mergeWith(array(
            'condition' => 'type =:orderType',
            'params' => array(':orderType' => $orderType),
        ));
        return $this;
    }
    
    /**
     * Scope by marketing plan id
     *
     * @author Narek T.
     * @created at 24th day of January 2015
     * @param integer $marketingPlanId
     * @return UserOrder
     */
    public function byMarketingPlanId($marketingPlanId) {
        $this->getDbCriteria()->mergeWith(array(
            'condition' => 'marketing_plan_id =:marketingPlanId',
            'params' => array(':marketingPlanId' => $marketingPlanId),
        ));
        return $this;
    }
    
    /**
     * Mark status as Approved
     *
     * @author Narek T.
     * @created at 26th day of January 2016
     * @return boolean
     */
    public function markAsApproved() {
        $this->status = self::STATUS_APPROVED;
        return $this->save(false);
    }
    
    /**
     * Mark status as Declined
     *
     * @author Narek T.
     * @created at 26th day of January 2016
     * @return boolean
     */
    public function markAsDecliend() {
        $this->status = self::STATUS_DECLIEND;
        return $this->save(false);
    }

}
