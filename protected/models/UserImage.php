<?php

/**
 * This is the model class for table "user_image".
 *
 * The followings are the available columns in table 'user_image':
 * @property integer $id
 * @property integer $user_id
 * @property string $image
 * @property string $status
 * @property string $created_date
 * @property string $updated_date
 */

class UserImage extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public $image;

	public function tableName()
	{
		return 'user_image';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, image', 'required'),
			array('user_id', 'numerical', 'integerOnly'=>true),
			// array('image', 'length', 'max'=>11),
			array('image', 'file', 'types'=>'jpg, gif, png', 'safe' => false),
			array('status', 'length', 'max'=>7),
			array('created_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, image, status, created_date, updated_date', 'safe', 'on'=>'search'),
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
			'user_id' => 'User',
			'image' => 'Image',
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
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('updated_date',$this->updated_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UserImage the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    static function getUserImages() {
        static $UserImages;
        if (!$UserImages instanceof UserImage) {
			$UserImages = UserImage::model()->findByAttributes(array(
					'user_id' =>Yii::app()->user->id,
					'status' => "ACTIVE"
					));
        }
        return $UserImages;
    }

	public function beforeSave() {
		if ($this->isNewRecord) {
			$this->created_date = new CDbExpression("now()");
		}
		return parent::beforeSave();
	}
}
