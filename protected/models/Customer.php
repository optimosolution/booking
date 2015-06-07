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
class Customer extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{user}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, username, email, password, shop_id', 'required'),
			array('group_id, country, state, city, company, shop_id, storeowner, user_type, status', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>255),
			array('username, website', 'length', 'max'=>150),
			array('email, password, activation, phone, mobile, fax', 'length', 'max'=>100),
			array('address, profile_picture', 'length', 'max'=>250),
			array('registerDate, lastvisitDate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, username, email, password, registerDate, lastvisitDate, activation, group_id, address, country, state, city, phone, mobile, fax, website, profile_picture, company, shop_id, storeowner, user_type, status', 'safe', 'on'=>'search'),
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
			'name' => 'Name',
			'username' => 'Username',
			'email' => 'Email',
			'password' => 'Password',
			'registerDate' => 'Register Date',
			'lastvisitDate' => 'Lastvisit Date',
			'activation' => 'Activation',
			'group_id' => 'Group',
			'address' => 'Address',
			'country' => 'Country',
			'state' => 'State',
			'city' => 'City',
			'phone' => 'Phone',
			'mobile' => 'Mobile',
			'fax' => 'Fax',
			'website' => 'Website',
			'profile_picture' => 'Profile Picture',
			'company' => 'Company',
			'shop_id' => 'Shop',
			'storeowner' => 'Storeowner',
			'user_type' => 'User Type',
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
	 
	public function search($param = array())
	{
	  $criteria=new CDbCriteria($param);
		// @todo Please modify the following code to remove attributes that should not be searched.

		//$criteria=new CDbCriteria;
	  /*
	  	 if(!empty($this->time_up_from) && !empty($this->time_up_to)){
		      $criteria->condition="time_up BETWEEN UNIX_TIMESTAMP('$this->time_up_from') AND UNIX_TIMESTAMP('$this->time_up_to')";
		   }
		  */ 
		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('registerDate',$this->registerDate,true);
		$criteria->compare('lastvisitDate',$this->lastvisitDate,true);
		$criteria->compare('activation',$this->activation,true);
		$criteria->compare('group_id',$this->group_id);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('country',$this->country);
		$criteria->compare('state',$this->state);
		$criteria->compare('city',$this->city);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('mobile',$this->mobile,true);
		$criteria->compare('fax',$this->fax,true);
		$criteria->compare('website',$this->website,true);
		$criteria->compare('profile_picture',$this->profile_picture,true);
		$criteria->compare('company',$this->company);
		$criteria->compare('shop_id',$this->shop_id);
		$criteria->compare('storeowner',$this->storeowner);
		$criteria->compare('user_type',$this->user_type);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Customer the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
