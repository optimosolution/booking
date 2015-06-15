<?php

/**
 * This is the model class for table "{{user}}".
 *
 * The followings are the available columns in table '{{user}}':
 * @property integer $id
 * @property string $name
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $registerDate
 * @property string $lastvisitDate
 * @property string $activation
 * @property integer $group_id
 * @property string $address 
 * @property integer $country
 * @property integer $state
 * @property integer $city
 * @property string $phone
 * @property string $mobile
 * @property string $fax
 * @property string $website
 * @property string $profile_picture
 * @property integer $company
 * @property integer $shop_id
 * @property integer $storeowner
 * @property integer $user_type
 * @property integer $status
 */
class Staff extends CActiveRecord {


    /*Declearing soem variable to Entry an another model's data by the same Form
        - tried with different way but that is not working...
    */
    public $name_second_contact;
    public $email_second_contact;
    public $phone_second_contact;
    public $address_second_contact;
    public $saff_id;
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return User the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{user}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array(' shop_id, name, username, email, password', 'required'),
            array('group_id, country, state, city, user_type, status, company, shop_id,  storeowner', 'numerical', 'integerOnly' => true),
            array('name,address', 'length', 'max' => 255),
            array('username,email', 'unique'),
            array('username, website', 'length', 'max' => 150),
            array('email, password, activation, phone, mobile, fax', 'length', 'max' => 100),
            array(' registerDate, lastvisitDate, address, company,name_second_contact,email_second_contact, phone_second_contact, address_second_contact,saff_id ', 'safe'),
            array('email', 'email', 'checkMX' => true),
            array('profile_picture', 'file', 'safe'=>true, 'types' => 'jpg,jpeg,gif,png', 'allowEmpty' => true, 'minSize' => 2, 'maxSize' => 1024 * 1024 * 2, 'tooLarge' => 'The file was larger than 2MB. Please upload a smaller file.', 'wrongType' => 'File format was not supported.', 'tooSmall' => 'File size was too small or empty.'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, name, expertise, shop_id, username, email, password, registerDate, lastvisitDate, activation, group_id, country, state, city, phone, mobile, fax, website, user_type, status, storeowner', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'name' => 'Name',
            'username' => 'Username',
            'email' => 'Email',
            'password' => 'Password',
            'registerDate' => 'Joined',
            'lastvisitDate' => 'Last Online',
            'activation' => 'Activation',
            'group_id' => 'Group',
            'country' => 'Country',
            'state' => 'State',
            'city' => 'City',
            'phone' => 'Phone',
            'mobile' => 'Mobile',
            'fax' => 'Fax',
            'website' => 'Website',
            'user_type' => 'User Type',
            'status' => 'Status',
            'profile_picture' => 'Profile Picture',
            'address' => 'Address',
            'company' => 'Company',
            'storeowner' => 'Store owner',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search($param = array()) {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.
        $criteria=new CDbCriteria($param);
        //$criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('username', $this->username, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('registerDate', $this->registerDate, true);
        $criteria->compare('lastvisitDate', $this->lastvisitDate, true);
        $criteria->compare('activation', $this->activation, true);
        $criteria->compare('group_id', $this->group_id);
        $criteria->compare('country', $this->country);
        $criteria->compare('state', $this->state);
        $criteria->compare('city', $this->city);
        $criteria->compare('phone', $this->phone, true);
        $criteria->compare('mobile', $this->mobile, true);
        $criteria->compare('fax', $this->fax, true);
        $criteria->compare('website', $this->website, true);
        $criteria->compare('user_type', $this->user_type);
        $criteria->compare('status', $this->status);
        $criteria->compare('address', $this->address, true);
        $criteria->compare('company', $this->company);
        $criteria->compare('shop_id', $this->shop_id);
        $criteria->compare('storeowner', $this->storeowner);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public static function get_user_name($user_id) {
        $value = User::model()->findByAttributes(array('id' => $user_id));
        if (empty($value->name)) {
            return null;
        } else {
            return $value->name;
        }
    }

    public static function get_user_email($user_id) {
        $value = User::model()->findByAttributes(array('id' => $user_id));
        if (empty($value->email)) {
            return null;
        } else {
            return $value->email;
        }
    }

    //get profile picture for grid
    public static function get_picture_grid($id) {
        $value = User::model()->findByAttributes(array('id' => $id));
        $filePath = Yii::app()->basePath . '/../uploads/profile_picture/' . $value->profile_picture;
        if ((is_file($filePath)) && (file_exists($filePath))) {
            return CHtml::image(Yii::app()->baseUrl . '/uploads/profile_picture/' . $value->profile_picture, 'Profile Picture', array('alt' => $value->name, 'class' => 'nav-user-photo', 'title' => $value->name, 'style' => 'width:50px;'));
        } else {
            return CHtml::image(Yii::app()->baseUrl . '/uploads/profile_picture/profile.jpg', 'Profile Picture', array('alt' => $value->name, 'class' => 'nav-user-photo', 'title' => $value->name, 'style' => 'width:50px;'));
        }
    }

    //get profile picture
    public static function get_profile_picture($id) {
        $value = User::model()->findByAttributes(array('id' => $id));
        $filePath = Yii::app()->basePath . '/../uploads/profile_picture/' . $value->profile_picture;
        if ((is_file($filePath)) && (file_exists($filePath))) {
            return CHtml::image(Yii::app()->baseUrl . '/uploads/profile_picture/' . $value->profile_picture, 'Profile Picture', array('alt' => $value->name, 'class' => 'thumblin', 'title' => $value->name, 'style' => 'width:80px;'));
        } else {
            return CHtml::image(Yii::app()->baseUrl . '/uploads/profile_picture/profile.jpg', 'Profile Picture', array('alt' => $value->name, 'class' => 'thumblin', 'title' => $value->name, 'style' => 'width:80px;'));
        }
    }

    /**
     * Send mail method
     */
    public static function sendMail($to, $subject, $message, $fromName, $fromMail) {
        $headers = "From: " . $fromName . "<" . $fromMail . "> \r\nX-Mailer: php\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        $message = wordwrap($message, 70);
        $message = str_replace("\n.", "\n..", $message);
        return mail($to, '=?UTF-8?B?' . base64_encode($subject) . '?=', $message, $headers);
    }

   

}