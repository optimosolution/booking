<?php

/**
 * This is the model class for table "{{shop}}".
 *
 * The followings are the available columns in table '{{shop}}':
 * @property string $id
 * @property integer $company
 * @property string $title
 * @property string $start_hour_hr, start_hour_min, start_hour, end_hour_hr, end_hour_min, end_hour, day_off
 * @property string $start_hour_min
 * @property string $start_hour
 * @property string $end_hour_hr
 * @property string $end_hour_min
 * @property string $end_hour
 * @property string $day_off
 * @property integer $country
 * @property integer $state
 * @property integer $city
 * @property string $currency
 * @property string $address
 * @property string $email
 * @property string $phone
 * @property string $fax
 * @property string $website
 * @property string $shop_picture
 * @property integer $published
 */
class Shop extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Shop the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{shop}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.  start_hour_hr, start_hour_min, start_hour, end_hour_hr, end_hour_min, end_hour, day_off
        return array(
            array('title, start_hour_hr, end_hour_hr', 'required'),
            array('company, country, state, city, published', 'numerical', 'integerOnly' => true),
            array('title, email, website', 'length', 'max' => 150),
            array('address, shop_picture', 'length', 'max' => 250),
            array('phone, fax', 'length', 'max' => 100),
            array('start_hour_hr, start_hour_min, end_hour_hr, end_hour_min, start_hour, end_hour, day_off, state, city, currency', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, company, title, start_hour_hr, start_hour_min, end_hour_hr, end_hour_min, start_hour, end_hour, country, state, city, address, email, phone, fax, website, shop_picture, published', 'safe', 'on' => 'search'),
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
            'company' => 'Company',
            'title' => 'Shop',
            'start_hour' => 'Start Hour',
            'start_hour_hr' => 'Start Hour',
            'start_hour_min' => 'Start Hour',
            'end_hour' => 'End Hour',
            'end_hour_hr' => 'End Hour',
            'end_hour_min' => 'End Hour',
            'currency' => 'Currency',
            'country' => 'Country',
            'state' => 'State',
            'city' => 'City',
            'address' => 'Address',
            'email' => 'Email',
            'phone' => 'Phone',
            'fax' => 'Fax',
            'website' => 'Website',
            'shop_picture' => 'Shop Picture',
            'published' => 'Published',
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
        $criteria->alias = 't';
        $criteria->condition = 't.company=' . Yii::app()->user->company;

        $criteria->compare('t.id', $this->id, true);
        $criteria->compare('t.company', $this->company);
        $criteria->compare('t.title', $this->title, true);
        $criteria->compare('t.start_hour', $this->start_hour, true);
        $criteria->compare('t.end_hour', $this->end_hour, true);
        $criteria->compare('t.country', $this->country);
        $criteria->compare('t.state', $this->state);
        $criteria->compare('t.city', $this->city);
        $criteria->compare('t.address', $this->address, true);
        $criteria->compare('t.email', $this->email, true);
        $criteria->compare('t.phone', $this->phone, true);
        $criteria->compare('t.fax', $this->fax, true);
        $criteria->compare('t.website', $this->website, true);
        $criteria->compare('t.shop_picture', $this->shop_picture, true);
        $criteria->compare('t.currency', $this->currency, true);
        $criteria->compare('t.published', $this->published);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => Yii::app()->params['pageSize'],
            ),
            'sort' => array('defaultOrder' => 't.title ASC')
        ));
    }

    

    /**
     * Check loged user client administrator or not
     * @return type integer value
     */

    public function checkClientAdmin() {
        $userRefID = Yii::app()->db->createCommand()
                ->select('u.id')
                ->from('{{user}} u')
                ->where('u.id=:id', array(':id' => Yii::app()->user->id))
                ->queryScalar();

        return $userRefID;
    }


    /**
     * Take client company id
     * @return type integer value
     */
    public function getClientCompanyID() {
        $getClientAdminID = $this->checkClientAdmin();

        $ClientCompanyID = Yii::app()->db->createCommand()
                ->select('id')
                ->from('{{company}}')
                ->where('owner=:owner', array(':owner' => $getClientAdminID))
                ->queryScalar();

        return $ClientCompanyID;
    }

    /*search shop id by company id */
     public static function get_shop_list() {
        $getCompanyID = $this->getClientCompanyID();
        $value = Shop::model()->findByAttributes(array('company' => $getCompanyID));
        if (empty($value->title)) {
            return null;
        } else {
            return $value->title;
        }
    }
    

    public function get_currency_id($id) {
        $value = Shop::model()->findByAttributes(array('id' => $id));
        if (empty($value->currency)) {
            return null;
        } else {
            return $value->currency;
        }
    }



    public static function get_shop($id) {

        $value = Shop::model()->findByAttributes(array('id' => $id));
        if (empty($value->title)) {
            return null;
        } else {
            return $value->title;
        }
    }

    public static function get_shop_email($id) {

        $value = Shop::model()->findByAttributes(array('id' => $id));
        if (empty($value->email)) {
            return null;
        } else {
            return $value->email;
        }
    }
    
    //get shop picture
    public static function get_shop_picture($id) {
        $value = Shop::model()->findByAttributes(array('id' => $id));
        $filePath = Yii::app()->basePath . '/../uploads/shop/' . $value->shop_picture;
        if ((is_file($filePath)) && (file_exists($filePath))) {
            return CHtml::image(Yii::app()->baseUrl . '/uploads/shop/' . $value->shop_picture, 'Shop', array('alt' => $value->title, 'class' => 'img-rounded', 'title' => $value->title, 'style' => 'width:120px;'));
        } else {
            return CHtml::image(Yii::app()->baseUrl . '/uploads/shop/shop.jpg', 'Shop', array('alt' => $value->title, 'class' => 'img-rounded', 'title' => $value->title, 'style' => 'width:120px;'));
        }
    }

}