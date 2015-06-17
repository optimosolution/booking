<?php

/**
 * This is the model class for table "{{massmail_content}}".
 *
 * The followings are the available columns in table '{{massmail_content}}':
 * @property integer $id
 * @property string $shop_id
 * @property string $subject
 * @property string $massmail_body
 * @property string $attached_file
 * @property string $entry_date
 * @property string $update_date
 * @property string $status
 */
class MassmailContent extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{massmail_content}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('subject, massmail_body, entry_date ,shop_id', 'required'),
			array('id', 'numerical', 'integerOnly'=>true),
			array('subject', 'length', 'max'=>200),
			array('update_date,status,attached_file,shop_id', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, subject, massmail_body, entry_date, update_date', 'safe', 'on'=>'search'),
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
			'shop_id' => 'Shop Name',
			'subject' => 'Subject',
			'massmail_body' => 'Massmail Body',
			'attached_file' => 'Attached File',
			'entry_date' => 'Entry Date',
			'update_date' => 'Update Date',
			'status' => 'status',
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
		$criteria->compare('shop_id',$this->shop_id,true);
		$criteria->compare('subject',$this->subject,true);
		$criteria->compare('massmail_body',$this->massmail_body,true);
		$criteria->compare('attached_file',$this->attached_file,true);
		$criteria->compare('entry_date',$this->entry_date,true);
		$criteria->compare('update_date',$this->update_date,true);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MassmailContent the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}



	public static function get_message_body($id) {

        $value = MassmailContent::model()->findByAttributes(array('id' => $id));
        if (empty($value->massmail_body)) {
            return null;
        } else {
            return $value->massmail_body;
        }
    }

    public static function get_subject($id) {

        $value = MassmailContent::model()->findByAttributes(array('id' => $id));
        if (empty($value->subject)) {
            return null;
        } else {
            return $value->subject;
        }
    }
}
