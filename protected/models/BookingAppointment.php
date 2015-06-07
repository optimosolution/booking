<?php

/**
 * This is the model class for table "{{appointment}}".
 *
 * The followings are the available columns in table '{{appointment}}':
 * @property integer $id
 * @property integer $company_id
 * @property integer $shop_id
 * @property integer $customer_id
 * @property integer $staff_id
 * @property integer $service_category
 * @property integer $service_id
 * @property string $applied_date
 * @property string $appoint_date
 * @property string $change_date
 * @property string $appoint_time
 * @property string $end_time
 * @property integer $total_cost
 * @property string $token_no
 * @property integer $status
 * @property string $note
 */
class BookingAppointment extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{appointment}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('applied_date, appoint_date, change_date, appoint_time, end_time, token_no, status', 'required'),
			array('company_id, shop_id, customer_id, staff_id, service_category, service_id, total_cost, status', 'numerical', 'integerOnly'=>true),
			array('token_no', 'length', 'max'=>20),
			array('note', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, company_id, shop_id, customer_id, staff_id, service_category, service_id, applied_date, appoint_date, change_date, appoint_time, end_time, total_cost, token_no, status, note', 'safe', 'on'=>'search'),
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
			'customer_id' => 'Customer',
			'staff_id' => 'Staff',
			'service_category' => 'Service Category',
			'service_id' => 'Service',
			'applied_date' => 'Applied Date',
			'appoint_date' => 'Appoint Date',
			'change_date' => 'Change Date',
			'appoint_time' => 'Appoint Time',
			'end_time' => 'End Time',
			'total_cost' => 'Total Cost',
			'token_no' => 'Token No',
			'status' => 'Status',
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
		$criteria->compare('customer_id',$this->customer_id);
		$criteria->compare('staff_id',$this->staff_id);
		$criteria->compare('service_category',$this->service_category);
		$criteria->compare('service_id',$this->service_id);
		$criteria->compare('applied_date',$this->applied_date,true);
		$criteria->compare('appoint_date',$this->appoint_date,true);
		$criteria->compare('change_date',$this->change_date,true);
		$criteria->compare('appoint_time',$this->appoint_time,true);
		$criteria->compare('end_time',$this->end_time,true);
		$criteria->compare('total_cost',$this->total_cost);
		$criteria->compare('token_no',$this->token_no,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('note',$this->note,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return BookingAppointment the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
