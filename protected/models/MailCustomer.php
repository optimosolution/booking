<?php

/**
 * This is the model class for table "{{mail_customer}}".
 *
 * The followings are the available columns in table '{{mail_customer}}':
 * @property string $id
 * @property integer $store_owner
 * @property integer $user_status
 * @property string $subject
 * @property string $message_body
 * @property string $attached_file
 * @property integer $created_by
 * @property string $created_on
 * @property integer $modified_by
 * @property string $modified_on
 * @property integer $customer_id
 * @property string $send_on
 * @property string $reference_mail
 * @property string $replied_customer
 * @property string $mail_status
 */
class MailCustomer extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{mail_customer}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('store_owner, subject, message_body', 'required'),
			array('store_owner, user_status, created_by, modified_by, customer_id', 'numerical', 'integerOnly'=>true),
			array('subject', 'length', 'max'=>250),
			array('modified_on,attached_file, send_on, reference_mail', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, store_owner,attached_file, user_status, subject, message_body, created_by, created_on, modified_by, modified_on, customer_id, send_on', 'safe', 'on'=>'search'),
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
			'store_owner' => 'Store Owner',
			'user_status' => 'User Status',
			'subject' => 'Subject',
			'message_body' => 'Message Body',
			'created_by' => 'Created By',
			'attached_file' => 'Attachment File',
			'created_on' => 'Created On',
			'modified_by' => 'Modified By',
			'modified_on' => 'Modified On',
			'customer_id' => 'Customer Nmae',
			'send_on' => 'Send On',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search($param = array())
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria($param);

		$criteria->compare('id',$this->id,true);
		$criteria->compare('store_owner',$this->store_owner);
		$criteria->compare('user_status',$this->user_status);
		$criteria->compare('subject',$this->subject,true);
		$criteria->compare('message_body',$this->message_body,true);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('attached_file',$this->attached_file,true);
		$criteria->compare('created_on',$this->created_on,true);
		$criteria->compare('modified_by',$this->modified_by);
		$criteria->compare('modified_on',$this->modified_on,true);
		$criteria->compare('customer_id',$this->customer_id);
		$criteria->compare('send_on',$this->send_on,true);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
			    'defaultOrder'=>'send_on DESC',
			),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MailCustomer the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}


	 public static function get_subject($id) {
        $value = MailCustomer::model()->findByAttributes(array('id' => $id));
        if (empty($value->subject)) {
            return null;
        } else {
            return $value->subject;
        }
    }
}
