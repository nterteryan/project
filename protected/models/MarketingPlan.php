<?php

/**
 * This is the model class for table "marketing_plans".
 *
 * The followings are the available columns in table 'marketing_plans':
 * @property integer $id
 * @property string $name
 * @property string $slug
 * @property integer $join_amount
 * @property string $created_date
 * @property string $updated_date
 */
class MarketingPlan extends CActiveRecord {
    
    const SLUG_MATRIX_1 = 'matrix1';
    const SLUG_MATRIX_2 = 'matrix2';
    const SLUG_PARTNER = 'partner';

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'marketing_plans';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('updated_date', 'required'),
            array('join_amount', 'numerical', 'integerOnly' => true),
            array('name, slug', 'length', 'max' => 255),
            array('created_date', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, name, slug, join_amount, created_date, updated_date', 'safe', 'on' => 'search'),
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
            'slug' => 'Slug',
            'join_amount' => 'Join Amount',
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
        $criteria->compare('slug', $this->slug, true);
        $criteria->compare('join_amount', $this->join_amount);
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
     * @return MarketingPlan the static model class
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
     * Scope by user id
     *
     * @author Narek T.
     * @created at 25th day of January 2015
     * @param string $slug
     * @return UserMatrixFirst
     */
    public function bySlug($slug) {
        $this->getDbCriteria()->mergeWith(array(
            'condition' => 'slug =:slug',
            'params' => array(':slug' => $slug),
        ));
        return $this;
    }
    
    public function insertUserToMarketing($userId) {
        switch ($this->slug) {
            case self::SLUG_MATRIX_1 :
                // Add user to first matrix
                $userMatrixFirst = new UserMatrixFirst;
                $userMatrixFirst->order_number = $userMatrixFirst->getNextOrderNumber();
                $userMatrixFirst->close_number = $userMatrixFirst->getCloseNumber($userMatrixFirst->order_number);
                $userMatrixFirst->user_id = $userId;
                return $userMatrixFirst->save(false);
            break;
            case self::SLUG_MATRIX_2 :
                // Add user to seconde matrix
                $userMatrixSeconde = new UserMatrixSeconde;
                $userMatrixSeconde->order_number = $userMatrixSeconde->getNextOrderNumber();
                $userMatrixSeconde->close_number = $userMatrixSeconde->getCloseNumber($userMatrixSeconde->order_number);
                $userMatrixSeconde->user_id = $userId;
                return $userMatrixSeconde->save(false);
            break;
            case self::SLUG_PARTNER :
                // mark user as a partner
                // 45$ to company
                // 65$ to marketing
                $user = User::getCurrentUser();
                $user->markAsPartner($this->join_amount);
            break;
        }
    }

}
