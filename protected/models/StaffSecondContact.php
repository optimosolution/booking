<?php

/**
 * This is the model class for table "{{staff_second_contact}}".
 *
 * The followings are the available columns in table '{{staff_second_contact}}':
 * @property integer $id
 * @property integer $staff_id
 * @property string $name_second_contact
 * @property string $phone_second_contact
 * @property string $email_second_contact
 * @property string $address_second_contact
 */
class StaffSecondContact extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{staff_second_contact}}';
	}

	 
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('', 'required'), //staff_id, name_second_contact, email_second_contact
			array('staff_id', 'numerical', 'integerOnly'=>true),
			array('name_second_contact, email_second_contact', 'length', 'max'=>100),
			array('phone_second_contact', 'length', 'max'=>30),
			array('staff_id, email_second_contact, address_second_contact, phone_second_contact', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, staff_id, name_second_contact, phone_second_contact, email_second_contact, address_second_contact', 'safe', 'on'=>'search'),
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
			'staff_id' => 'Staff',
			'name_second_contact' => 'Name Second Contact',
			'phone_second_contact' => 'Phone Second Contact',
			'email_second_contact' => 'Email Second Contact',
			'address_second_contact' => 'Address Second Contact',
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
		$criteria->compare('staff_id',$this->staff_id);
		$criteria->compare('name_second_contact',$this->name_second_contact,true);
		$criteria->compare('phone_second_contact',$this->phone_second_contact,true);
		$criteria->compare('email_second_contact',$this->email_second_contact,true);
		$criteria->compare('address_second_contact',$this->address_second_contact,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return StaffSecondContact the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
