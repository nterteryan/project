<?php

/**
 * This is the model class for table "category".
 *
 * The followings are the available columns in table 'category':
 * @property integer $id
 * @property integer $marketplace_id
 * @property integer $parent_id
 * @property string $title
 * @property string $icone
 * @property string $created_date
 * @property string $updated_date
 */
class Category extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'category';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('marketplace_id, title, icone', 'required'),
			array('marketplace_id, parent_id', 'numerical', 'integerOnly'=>true),
			array('title, icone', 'length', 'max'=>255),
			array('created_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, marketplace_id, parent_id, title, icone, created_date, updated_date', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'marketplace_id' => 'Marketplace',
			'parent_id' => 'Parent',
			'title' => 'Title',
			'icone' => 'Icone',
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
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('marketplace_id',$this->marketplace_id);
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('icone',$this->icone,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('updated_date',$this->updated_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
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
	 * getMarketplaceCategoryList
	 * get Category List (Category)
	 *
	 * @author Hovo G.
	 * @created at 7th day of March 2016
	 * @param array
	 * @return object
	 */
	public static function getMarketplaceCategoryList($marketplaceId) {
	    $criteria = new CDbCriteria;
	    $criteria->condition = 'marketplace_id=:marketplace_id ';
	    $criteria->params = array(':marketplace_id' => $marketplaceId);
	    $tariffList = Category::model()->findAll($criteria);
	    return $tariffList;
	}
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Category the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
