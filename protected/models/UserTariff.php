<?php

/**
 * This is the model class for table "user_tariff".
 *
 * The followings are the available columns in table 'user_tariff':
 * @property integer $id
 * @property integer $user_id
 * @property integer $tariff_id
 * @property string $created_date
 * @property string $updated_date
 * @property float $amount
 * @property float $percent
 * @property float $amount_percent
 * @property float $status
 * @property integer $close_month
 */
class UserTariff extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user_tariff';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, tariff_id, amount, percent, close_month', 'required'),
			array('user_id, tariff_id, amount, percent, amount_percent, close_month', 'numerical', 'integerOnly'=>true),
			array('created_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, tariff_id, created_date, updated_date, amount, percent, amount_percent, status, close_month', 'safe', 'on'=>'search'),
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
			'tariff_id' => 'Tariff',
			'created_date' => 'Created Date',
			'updated_date' => 'Updated Date',
			'amount' => 'Amount',
			'percent' => 'Percent',
			'status' => 'Status',
			'close_month' => 'Close month',
			'amount_percent' => 'amount percent',
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
		$criteria->compare('tariff_id',$this->tariff_id);
		$criteria->compare('amount',$this->amount);
		$criteria->compare('percent',$this->percent);
		$criteria->compare('status',$this->status);
		$criteria->compare('close_month',$this->close_month);
		$criteria->compare('amount_percent',$this->amount_percent);
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
	 * @return UserTariff the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	public function beforeSave() {
		if ($this->isNewRecord) {
			$this->created_date = new CDbExpression("now()");
		}
		return parent::beforeSave();
	}
	public static function getUserTariffList($where = array() ) {
		if(!empty($where)){
			$tariffList = UserTariff::model()->findAll();
		}else{
			$tariffList = UserTariff::model()->findAllByAttributes($where);
		}
		return $tariffList;
	}
}
