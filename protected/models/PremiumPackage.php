<?php

/**
 * This is the model class for table "premium_package".
 *
 * The followings are the available columns in table 'premium_package':
 * @property integer $id
 * @property integer $price
 * @property integer $close_month
 * @property string $status
 * @property string $created_date
 * @property string $updated_date
 */
class PremiumPackage extends CActiveRecord {
    
    const STATUS_ACTIVE = 'ACTIVE';
    const STATUS_BLOCKED = 'BLOCKED';

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'premium_package';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('price, updated_date', 'required'),
            array('price, close_month', 'numerical', 'integerOnly' => true),
            array('status', 'length', 'max' => 7),
            array('created_date', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, price, close_month, status, created_date, updated_date', 'safe', 'on' => 'search'),
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
            'price' => 'Price',
            'close_month' => 'Close Month',
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
        $criteria->compare('price', $this->price);
        $criteria->compare('close_month', $this->close_month);
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
     * @return PremiumPackage the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    /**
     * Scopes
     *
     * @author Narek T. 
     * @created at 13th day of March 2015
     * @return array
     */
    public function scopes() {
        return array(
            'active' => array(
                'condition' => $this->getTableAlias(true, false) . '.`status`=:status',
                'params' => array(
                    ':status' => self::STATUS_ACTIVE,
                ),
            ),
            'blocked' => array(
                'condition' => $this->getTableAlias(true, false) . '.`status`=:status',
                'params' => array(
                    ':status' => self::STATUS_BLOCKED,
                ),
            ),
        );
    }

}
