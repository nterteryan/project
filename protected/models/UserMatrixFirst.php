<?php

/**
 * This is the model class for table "user_matrix_first".
 *
 * The followings are the available columns in table 'user_matrix_first':
 * @property integer $id
 * @property integer $user_id
 * @property integer $order_number
 * @property integer $close_number
 * @property string $is_closed
 * @property string $created_date
 * @property string $updated_date
 */
class UserMatrixFirst extends CActiveRecord {
    
    const IS_CLOSED_NO = 'NO';
    const IS_CLOSED_YES = 'YES';

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'user_matrix_first';
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
     * @return UserMatrixFirst the static model class
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
