<?php

/**
 * This is the model class for table "{{staff_service}}".
 *
 * The followings are the available columns in table '{{staff_service}}':
 * @property integer $id
 * @property integer $company_id
 * @property integer $shop_id
 * @property integer $user_id
 * @property integer $servic_id
 * @property string $time_required
 * @property integer $price
 * @property string $note
 */
class StaffService extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{staff_service}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('company_id, shop_id, user_id, servic_id, price', 'numerical', 'integerOnly'=>true),
			array('time_required', 'length', 'max'=>50),
			array('note', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, company_id, shop_id, user_id, servic_id, time_required, price, note', 'safe', 'on'=>'search'),
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
			'company_id' => 'Company',
			'shop_id' => 'Shop',
			'user_id' => 'User',
			'servic_id' => 'Servic',
			'time_required' => 'Time Required',
			'price' => 'Price',
			'note' => 'Note',
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
		$criteria->compare('company_id',$this->company_id);
		$criteria->compare('shop_id',$this->shop_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('servic_id',$this->servic_id);
		$criteria->compare('time_required',$this->time_required,true);
		$criteria->compare('price',$this->price);
		$criteria->compare('note',$this->note,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return StaffService the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
