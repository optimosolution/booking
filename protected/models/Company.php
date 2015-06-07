<?php

/**
 * This is the model class for table "{{company}}".
 *
 * The followings are the available columns in table '{{company}}':
 * @property string $id
 * @property integer $owner
 * @property string $company_name
 * @property integer $currency
 * @property string $address
 * @property string $email
 * @property string $phone
 * @property string $mobile
 * @property string $fax
 * @property string $website
 * @property integer $time_zone
 * @property string $paypal_username
 * @property string $paypal_password
 * @property string $paypal_signature
 * @property string $paypal_app_id
 * @property string $summary
 */
class Company extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Company the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{company}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('company_name', 'required'),
            array('owner, currency, time_zone, country, state, city', 'numerical', 'integerOnly' => true),
            array('company_name, email, fax, paypal_username, paypal_password, paypal_app_id', 'length', 'max' => 100),
            array('address', 'length', 'max' => 255),
            array('phone, mobile', 'length', 'max' => 250),
            array('website, paypal_signature', 'length', 'max' => 150),
            array('summary', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, owner, company_name, currency, address, email, phone, mobile, fax, website, time_zone, paypal_username, paypal_password, paypal_signature, paypal_app_id, summary, country, state, city', 'safe', 'on' => 'search'),
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
            'owner' => 'Owner',
            'company_name' => 'Company Name',
            'currency' => 'Currency',
            'country' => 'Country',
            'state' => 'State',
            'city' => 'City',
            'address' => 'Address',
            'email' => 'Email',
            'phone' => 'Phone',
            'mobile' => 'Mobile',
            'fax' => 'Fax',
            'website' => 'Website',
            'time_zone' => 'Time Zone',
            'paypal_username' => 'Paypal Username',
            'paypal_password' => 'Paypal Password',
            'paypal_signature' => 'Paypal Signature',
            'paypal_app_id' => 'Paypal App',
            'summary' => 'Summary',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id, true);
        $criteria->compare('owner', $this->owner);
        $criteria->compare('company_name', $this->company_name, true);
        $criteria->compare('currency', $this->currency);
        $criteria->compare('country', $this->country);
        $criteria->compare('state', $this->state);
        $criteria->compare('city', $this->city);
        $criteria->compare('address', $this->address, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('phone', $this->phone, true);
        $criteria->compare('mobile', $this->mobile, true);
        $criteria->compare('fax', $this->fax, true);
        $criteria->compare('website', $this->website, true);
        $criteria->compare('time_zone', $this->time_zone);
        $criteria->compare('paypal_username', $this->paypal_username, true);
        $criteria->compare('paypal_password', $this->paypal_password, true);
        $criteria->compare('paypal_signature', $this->paypal_signature, true);
        $criteria->compare('paypal_app_id', $this->paypal_app_id, true);
        $criteria->compare('summary', $this->summary, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }
    //get company name
      public static function get_company_name($id) {
        $company_name = Company::model()->findByAttributes(array('id' => $id));
        if (!empty($company_name->company_name)) {
            return $company_name->company_name;
        } else {
            return 'All';
        }
    }

    //get currency id
      public static function get_currency($id) {
        $company_name = Company::model()->findByAttributes(array('id' => $id));
        if (!empty($company_name->currency)) {
            return $company_name->currency;
        } else {
            return 'All';
        }
    }    
    //get Company Logo
    public static function get_company_logo($id) {
        $value = Company::model()->findByAttributes(array('id' => $id));
        $filePath = Yii::app()->basePath . '/../uploads/company_logo/' . $value->company_logo;
        if ((is_file($filePath)) && (file_exists($filePath))) {
            return CHtml::image(Yii::app()->baseUrl . '/uploads/company_logo/' . $value->company_logo, 'Company Logo', array('alt' => $value->company_name, 'class' => 'img-rounded', 'title' => $value->company_name, 'style' => 'width:120px;'));
        } else {
            return CHtml::image(Yii::app()->baseUrl . '/uploads/company_logo/logo.png', 'Company Logo', array('alt' => $value->company_name, 'class' => 'img-rounded', 'title' => $value->company_name, 'style' => 'width:120px;'));
        }
    }

}