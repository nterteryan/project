<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $id
 * @property integer $parent_id
 * @property string $email
 * @property string $password
 * @property string $status
 * @property string $role
 * @property string $first_name
 * @property string $last_name
 * @property string $skype
 * @property string $phone
 * @property string $refferal_code
 * @property string $activation_code
 * @property string $created_date
 * @property string $updated_date
 */
class User extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('email, password, updated_date', 'required'),
			array('parent_id', 'numerical', 'integerOnly'=>true),
			array('email, first_name, last_name, skype, refferal_code, activation_code', 'length', 'max'=>255),
			array('password', 'length', 'max'=>100),
			array('status', 'length', 'max'=>7),
			array('role', 'length', 'max'=>11),
			array('phone', 'length', 'max'=>60),
			array('created_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, parent_id, email, password, status, role, first_name, last_name, skype, phone, refferal_code, activation_code, created_date, updated_date', 'safe', 'on'=>'search'),
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
			'parent_id' => 'Parent',
			'email' => 'Email',
			'password' => 'Password',
			'status' => 'Status',
			'role' => 'Role',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'skype' => 'Skype',
			'phone' => 'Phone',
			'refferal_code' => 'Refferal Code',
			'activation_code' => 'Activation Code',
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
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('role',$this->role,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('skype',$this->skype,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('refferal_code',$this->refferal_code,true);
		$criteria->compare('activation_code',$this->activation_code,true);
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
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
