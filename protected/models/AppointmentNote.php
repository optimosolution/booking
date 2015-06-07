<?php

/**
 * This is the model class for table "{{appointment_note}}".
 *
 * The followings are the available columns in table '{{appointment_note}}':
 * @property integer $id
 * @property integer $appointment_id
 * @property integer $note_by
 * @property string $time
 * @property string $ip
 * @property string $note
 * @property string $file_name
 * @property integer $status
 */
class AppointmentNote extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{appointment_note}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('appointment_id, note_by, time, ip, note, status', 'required'),
			array('appointment_id, note_by, status', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('file_name', 'safe'),
			array('id, appointment_id, note_by, time, ip, note, file_name, status', 'safe', 'on'=>'search'),
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
			'appointment_id' => 'Appointment',
			'note_by' => 'Note By',
			'time' => 'Time',
			'ip' => 'Ip',
			'note' => 'Note',
			'file_name' => 'File Name',
			'status' => 'Status',
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
		$criteria->compare('appointment_id',$this->appointment_id);
		$criteria->compare('note_by',$this->note_by);
		$criteria->compare('time',$this->time,true);
		$criteria->compare('ip',$this->ip,true);
		$criteria->compare('note',$this->note,true);
		$criteria->compare('file_name',$this->file_name,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AppointmentNote the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
