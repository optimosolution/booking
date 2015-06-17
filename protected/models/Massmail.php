<?php

/**
 * This is the model class for table "{{massmail}}".
 *
 * The followings are the available columns in table '{{massmail}}':
 * @property string $id
 * @property string $users
 * @property integer $mail_content_id
 * @property integer $created_by
 * @property string $created_on
 * @property integer $modified_by
 * @property string $modified_on
 * @property integer $send_by
 * @property string $send_on
 */
class Massmail extends CActiveRecord
{
    public $message_body;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Massmail the static model class
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
		return '{{massmail}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('mail_content_id', 'required'),
			array('mail_content_id, created_by, modified_by, send_by', 'numerical', 'integerOnly'=>true),
			array('users, modified_on, send_on, mail_content_id, created_on, message_body', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, users, mail_content_id, created_by, created_on, modified_by, modified_on, send_by, send_on', 'safe', 'on'=>'search'),
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
			'users' => 'Users',
			'mail_content_id' => 'Mail Content',
			'created_by' => 'Created By',
			'created_on' => 'Created On',
			'modified_by' => 'Modified By',
			'modified_on' => 'Modified On',
			'send_by' => 'Send By',
			'send_on' => 'Send On',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('users',$this->users,true);
		$criteria->compare('mail_content_id',$this->mail_content_id);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('created_on',$this->created_on,true);
		$criteria->compare('modified_by',$this->modified_by);
		$criteria->compare('modified_on',$this->modified_on,true);
		$criteria->compare('send_by',$this->send_by);
		$criteria->compare('send_on',$this->send_on,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public static function sendMail($to, $subject, $message, $fromName, $fromMail, $bccList) {
        //$headers = "MIME-Version: 1.0\r\nFrom: " . $fromName . "<" . $fromMail . "> \r\nReply-To: " . $fromMail . "\r\nContent-Type: text/html; charset=utf-8";
        $headers = "From: " . $fromName . "<" . $fromMail . "> \r\nX-Mailer: php\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        $headers .= "Bcc: $bccList\r\n";
        $to = $fromMail;
        $message = wordwrap($message, 70);
        $message = str_replace("\n.", "\n..", $message);
        return mail($to, '=?UTF-8?B?' . base64_encode($subject) . '?=', $message, $headers);
    }

    public static function get_mail_send($id) {
        $link = CHtml::link('<span class="label label-large label-pink arrowed-right"><i class="icon-envelope"></i> Send</span>', array('massmail/send', 'id' => $id), array('data-rel' => 'tooltip', 'title' => 'Send Mail', 'data-placement' => 'top'));
        return $link;
    }
}