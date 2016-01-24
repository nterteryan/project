<?php

/**
 * This is the model class for table "company_transactions".
 *
 * The followings are the available columns in table 'company_transactions':
 * @property integer $id
 * @property double $amount
 * @property string $amount_type
 * @property string $description
 * @property string $type
 * @property string $created_date
 * @property string $updated_date
 */
class CompanyTransaction extends CActiveRecord {
    
    const TYPE_COMPANY = 'COMPANY';
    const TYPE_CHARITY = 'CHARITY';
    const TYPE_TOTAL = 'TOTAL';
    const TYPE_ROTATION = 'ROTATION';
    
    const AMOUNT_TYPE_INCOME = 'INCOME';
    const AMOUNT_TYPE_OUTCOME = 'OUTCOME';
    
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'company_transactions';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('updated_date', 'required'),
            array('amount', 'numerical'),
            array('amount_type', 'length', 'max' => 7),
            array('description', 'length', 'max' => 500),
            array('type', 'length', 'max' => 8),
            array('created_date', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, amount, amount_type, description, type, created_date, updated_date', 'safe', 'on' => 'search'),
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
            'amount' => 'Amount',
            'amount_type' => 'Amount Type',
            'description' => 'Description',
            'type' => 'Type',
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
        $criteria->compare('amount', $this->amount);
        $criteria->compare('amount_type', $this->amount_type, true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('type', $this->type, true);
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
     * @return CompanyTransaction the static model class
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
