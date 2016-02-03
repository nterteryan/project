<?php

/**
 * This is the model class for table "certificates".
 *
 * The followings are the available columns in table 'certificates':
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property double $count
 * @property double $start_price
 * @property double $current_price
 * @property string $created_date
 * @property string $updated_date
 */
class Certificate extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'certificates';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('updated_date', 'required'),
            array('count, start_price, current_price', 'numerical'),
            array('name, description', 'length', 'max' => 255),
            array('created_date', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, name, description, count, start_price, current_price, created_date, updated_date', 'safe', 'on' => 'search'),
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
            'count' => 'Count',
            'start_price' => 'Start Price',
            'current_price' => 'Current Price',
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
        $criteria->compare('count', $this->count);
        $criteria->compare('start_price', $this->start_price);
        $criteria->compare('current_price', $this->current_price);
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
     * @return Certificate the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    /**
     * Discount from certificate counts
     *
     * @author Narek T.
     * @created at 3th day of February 2016
     * @param integer $count
     * @return boolean
     */
    public function discount($count) {
        $this->count = $this->count - $count;
        return $this->save(false);
    }

}
