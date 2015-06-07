<?php

/**
 * This is the model class for table "{{service}}".
 *
 * The followings are the available columns in table '{{service}}':
 * @property integer $id
 * @property integer $company
 * @property integer $owner
 * @property integer $shop
 * @property integer $category
 * @property string $title
 * @property string $details
 * @property double $cost
 * @property string $required_time
 * @property string $model_photo
 * @property string $barber
 * @property integer $published
 */
class Service extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Service the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{service}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('shop, company, owner, category, title, cost, required_time', 'required'),
            array('company, owner, shop, category, published', 'numerical', 'integerOnly' => true),
            array('cost', 'numerical'),
            array('title', 'length', 'max' => 200),
            array('required_time', 'length', 'max' => 50),
            array('model_photo', 'length', 'max' => 250),
            array('barber', 'length', 'max' => 100),
            array('details', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, company, owner, shop, category, title, details, cost, required_time, model_photo, barber, published', 'safe', 'on' => 'search'),
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
            'owner' => 'Owner',
            'shop' => 'Shop',
            'category' => 'Category',
            'title' => 'Service',
            'details' => 'Details',
            'cost' => 'Cost',
            'required_time' => 'Required Time',
            'model_photo' => 'Model Photo',
            'barber' => 'Barber',
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
        $criteria->condition = 't.shop=' . Yii::app()->user->shop_id;

        $criteria->compare('id', $this->id);
        $criteria->compare('company', $this->company);
        $criteria->compare('owner', $this->owner);
        $criteria->compare('shop', $this->shop);
        $criteria->compare('category', $this->category);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('details', $this->details, true);
        $criteria->compare('cost', $this->cost);
        $criteria->compare('required_time', $this->required_time, true);
        $criteria->compare('model_photo', $this->model_photo, true);
        $criteria->compare('barber', $this->barber, true);
        $criteria->compare('published', $this->published);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => Yii::app()->params['pageSize'],
            ),
            'sort' => array('defaultOrder' => 't.title ASC')
        ));
    }

    //Get service Title
    public static function get_service_name($id) {
        $value = Service::model()->findByAttributes(array('id' => $id));
        if (empty($value->title)) {
            return null;
        } else {
            return $value->title;
        }
    }

    public static function get_service_cost($id) {
        $value = Service::model()->findByAttributes(array('id' => $id));
        if (empty($value->cost)) {
            return null;
        } else {
            return $value->cost;
        }
    }

    public static function get_service_reqTime($id) {
        $value = Service::model()->findByAttributes(array('id' => $id));
        if (empty($value->required_time)) {
            return null;
        } else {
            return $value->required_time;
        }
    }

    public static function get_cost($id) {
        $value = Service::model()->findByAttributes(array('id' => $id));
        if (empty($value->cost)) {
            return null;
        } else {
            return $value->cost;
        }
    }
    //
    public static function get_service_list($controller, $field) {
        $rValue = Yii::app()->db->createCommand()
                ->select('id,category,title')
                ->from('{{service}}')
                 ->order('title')
                ->queryAll();
        echo '<select id="' . $controller . '_' . $field . '" name="' . $controller . '[' . $field . ']" class="span5 marginBot10px">';
        echo '<option value="">--select Service--</option>';
        foreach ($rValue as $key => $values) {
                echo '<option value="' . $values["id"] . '" class="' . $values["category"] . '">' . $values["title"] . '</option>';
         }
        echo '</select>';
    }
    
    public static function get_select_service_cost($controller, $field) {
        $rValue = Yii::app()->db->createCommand()
                ->select('id,cost')
                ->from('{{service}}')
                 ->queryAll();
        
        foreach ($rValue as $key => $values) {
                echo '<input type="text" id="' . $controller . '_' . $field . '" name="' . $controller . '[' . $field . ']"  value="' . $values["cost"] .'"/>';
         }
     }
    
    public function get_selected_service_cost($id) {
        $returnValue = Yii::app()->db->createCommand()
                ->select('id,cost')
                ->from('{{service}}')
                ->where('id=:id', array(':id' => $id))
                ->queryScalar();
        return $returnValue;
    }

    //get service picture
    public static function get_service_picture($id) {
        $value = Service::model()->findByAttributes(array('id' => $id));
        $filePath = Yii::app()->basePath . '/../uploads/service/' . $value->model_photo;
        if ((is_file($filePath)) && (file_exists($filePath))) {
            return CHtml::image(Yii::app()->baseUrl . '/uploads/service/' . $value->model_photo, 'service', array('alt' => $value->title, 'class' => 'img-rounded', 'title' => $value->title, 'style' => 'width:120px;'));
        } else {
            return CHtml::image(Yii::app()->baseUrl . '/uploads/service/profile.jpg', 'service', array('alt' => $value->title, 'class' => 'img-rounded', 'title' => $value->title, 'style' => 'width:120px;'));
        }
    }

}