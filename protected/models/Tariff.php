<?php

/**
 * This is the model class for table "tariff".
 *
 * The followings are the available columns in table 'tariff':
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $status
 * @property integer $amount
 * @property integer $percent
 * @property integer $close_month
 * @property string $created_date
 * @property string $updated_date
 */
class Tariff extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tariff';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, description', 'required'),
            array('amount, close_month', 'numerical', 'integerOnly' => true),
            array('name', 'length', 'max' => 255),
            array('status', 'length', 'max' => 7),
            array('created_date', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, name, description, status, amount, percent_founde,percent_rco_founde,percent_partner,percent_member, close_month, created_date, updated_date', 'safe', 'on' => 'search'),
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
            'name' => 'Name',
            'description' => 'Description',
            'status' => 'Status',
            'amount' => 'Amount',
            'percent_founde' => 'Percent founde',
            'percent_rco_founde' => 'Percent rco founde',
            'percent_partner' => 'Percent partner',
            'percent_member' => 'Percent member',
            'close_month' => 'Close Month',
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
        $criteria->compare('name', $this->name, true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('status', $this->status, true);
        $criteria->compare('amount', $this->amount);

        $criteria->compare('percent_founde', $this->percent_founde);
        $criteria->compare('percent_rco_founde', $this->percent_rco_founde);
        $criteria->compare('percent_partner', $this->percent_partner);
        $criteria->compare('percent_member', $this->percent_member);
        $criteria->compare('close_month', $this->close_month);
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
     * @return Tariff the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * get Tariff List, by where ( array )
     *
     * @author Hovo G.
     * @created at 2th day of March 2016
     * @return Tariff List
     */
    public static function getTariffList($where = array()) {
        if (empty($where)) {
            $tariffList = Tariff::model()->findAll();
        } else {
            $tariffList = Tariff::model()->findAllByAttributes($where);
        }
        return $tariffList;
    }
    
    /**
     * Get tariif plan persentage for current user type
     *
     * @author Narek T.
     * @created at 15th day of March 2016
     * @param string $userType
     * @return double
     */
    public function getPercentageByUserType($userType) {
        switch ($userType) {
            case User::TYPE_FOUNDER: $percent = $this->percent_founde; break;
            case User::TYPE_CO_FOUNDER: $percent = $this->percent_rco_founde; break;
            case User::TYPE_PARTNER: $percent = $this->percent_partner; break;
            case User::TYPE_MEMBER: $percent = $this->percent_member; break;
        }
        return $percent;
    }

}
