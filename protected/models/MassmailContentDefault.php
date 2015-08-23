<?php

/**
 * This is the model class for table "{{massmail_content_default}}".
 *
 * The followings are the available columns in table '{{massmail_content_default}}':
 * @property integer $id
 * @property string $subject
 * @property string $massmail_body
 * @property string $entry_date
 * @property string $update_date
 * @property integer $status
 */
class MassmailContentDefault extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MassmailContentDefault the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{massmail_content_default}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('subject, massmail_body', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('subject', 'length', 'max'=>200),
			array('entry_date, update_date, status', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, subject, massmail_body, entry_date, update_date, status', 'safe', 'on'=>'search'),
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
			'subject' => 'Subject',
			'massmail_body' => 'Massmail Body',
			'entry_date' => 'Entry Date',
			'update_date' => 'Update Date',
			'status' => 'Status',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('subject',$this->subject,true);
		$criteria->compare('massmail_body',$this->massmail_body,true);
		$criteria->compare('entry_date',$this->entry_date,true);
		$criteria->compare('update_date',$this->update_date,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			 'sort' => array('defaultOrder' => 'entry_date DESC'),
		));
	}

	public static function get_email_subject($id) {
        $value = MassmailContentDefault::model()->findByAttributes(array('id' => $id));
        if (empty($value->subject)) {
            return null;
        } else {
            return $value->subject;
        }
    }

	public static function get_email_body($id) {
        $value = MassmailContentDefault::model()->findByAttributes(array('id' => $id));
        if (empty($value->massmail_body)) {
            return null;
        } else {
            return $value->massmail_body;
        }
    }
}