<?php

/**
 * This is the model class for table "{{directory}}".
 *
 * The followings are the available columns in table '{{directory}}':
 * @property string $id
 * @property string $title
 * @property string $organization
 * @property string $address
 * @property string $telephone
 * @property string $mobile
 * @property string $email
 * @property string $fax
 * @property string $website
 * @property string $details
 * @property integer $created_by
 * @property string $created_on
 * @property integer $modified_by
 * @property string $modified_on
 */
class Edirectory extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Edirectory the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{directory}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('title,category,district,thana', 'required'),
            array('created_by, modified_by', 'numerical', 'integerOnly' => true),
            array('title, organization', 'length', 'max' => 250),
            array('telephone, mobile, email, fax, website', 'length', 'max' => 100),
            array('address, details, created_on, modified_on,published', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, category, title, organization, address, telephone, mobile, email, fax, website, details, created_by, created_on, modified_by, modified_on,published', 'safe', 'on' => 'search'),
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
            'district' => 'District',
            'thana' => 'Thana',
            'category' => 'Category',
            'title' => 'Title',
            'organization' => 'Organization',
            'address' => 'Address',
            'telephone' => 'Telephone',
            'mobile' => 'Mobile',
            'email' => 'Email',
            'fax' => 'Fax',
            'website' => 'Website',
            'details' => 'Details',
            'created_by' => 'Created By',
            'created_on' => 'Created On',
            'modified_by' => 'Modified By',
            'modified_on' => 'Modified On',
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

        $criteria->compare('id', $this->id, true);
        $criteria->compare('district', $this->district);
        $criteria->compare('thana', $this->thana);
        $criteria->compare('category', $this->category);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('organization', $this->organization, true);
        $criteria->compare('address', $this->address, true);
        $criteria->compare('telephone', $this->telephone, true);
        $criteria->compare('mobile', $this->mobile, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('fax', $this->fax, true);
        $criteria->compare('website', $this->website, true);
        $criteria->compare('details', $this->details, true);
        $criteria->compare('created_by', $this->created_by);
        $criteria->compare('created_on', $this->created_on, true);
        $criteria->compare('modified_by', $this->modified_by);
        $criteria->compare('modified_on', $this->modified_on, true);
        $criteria->compare('published', $this->published);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => Yii::app()->params['pageSize'],
            ),
        ));
    }

    public static function getCategory() {
        $return = Yii::app()->db->createCommand()
                ->select('*')
                ->from('{{directory_category}}')
                ->where('published=1 AND (parent=0 OR  parent IS NULL)')
                ->order('title')
                ->queryAll();
        echo '<select id="Edirectory_category" name="Edirectory[category]" class="span5">';
        echo '<option value="">--select--</option>';
        foreach ($return as $key => $values) {
            echo '<option value="' . $values["id"] . '">' . $values["title"] . '</option>';
            $returns = Yii::app()->db->createCommand()
                    ->select('*')
                    ->from('{{directory_category}}')
                    ->where('published=1 AND parent=' . $values["id"])
                    ->order('title')
                    ->queryAll();
            foreach ($returns as $key => $valuess) {
                echo '<option value="' . $valuess["id"] . '">--' . $valuess["title"] . '</option>';
                $returns3 = Yii::app()->db->createCommand()
                        ->select('*')
                        ->from('{{directory_category}}')
                        ->where('published=1 AND parent=' . $valuess["id"])
                        ->order('title')
                        ->queryAll();
                foreach ($returns3 as $key => $valuess3) {
                    echo '<option value="' . $valuess3["id"] . '">---' . $valuess3["title"] . '</option>';
                }
            }
        }
        echo '</select>';
    }

    public static function getCategoryUpdate($catid) {
        $return = Yii::app()->db->createCommand()
                ->select('*')
                ->from('{{directory_category}}')
                ->where('published=1 AND (parent=0 OR  parent IS NULL)')
                ->order('title')
                ->queryAll();
        echo '<select id="Edirectory_category" name="Edirectory[category]" class="span5">';
        echo '<option value="">--select--</option>';
        foreach ($return as $key => $values) {
            if ($catid == $values["id"]) {
                echo '<option selected="selected" value="' . $values["id"] . '">' . $values["title"] . '</option>';
            } else {
                echo '<option value="' . $values["id"] . '">' . $values["title"] . '</option>';
            }
            $returns = Yii::app()->db->createCommand()
                    ->select('*')
                    ->from('{{directory_category}}')
                    ->where('published=1 AND parent=' . $values["id"])
                    ->order('title')
                    ->queryAll();
            foreach ($returns as $key => $valuess) {
                if ($catid == $valuess["id"]) {
                    echo '<option selected="selected" value="' . $valuess["id"] . '">' . $valuess["title"] . '</option>';
                } else {
                    echo '<option value="' . $valuess["id"] . '">' . $valuess["title"] . '</option>';
                }
                $returns3 = Yii::app()->db->createCommand()
                        ->select('*')
                        ->from('{{directory_category}}')
                        ->where('published=1 AND parent=' . $valuess["id"])
                        ->order('title')
                        ->queryAll();
                foreach ($returns3 as $key => $valuess3) {
                    if ($catid == $valuess3["id"]) {
                        echo '<option selected="selected" value="' . $valuess3["id"] . '">---' . $valuess3["title"] . '</option>';
                    } else {
                        echo '<option value="' . $valuess3["id"] . '">---' . $valuess3["title"] . '</option>';
                    }
                }
            }
        }
        echo '</select>';
    }

    public static function getCategoryName($id) {
        $returnValue = Yii::app()->db->createCommand()
                ->select('title')
                ->from('{{directory_category}}')
                ->where('id=:id', array(':id' => $id))
                ->queryScalar();
        if ($returnValue <= '0') {
            $returnValue = 'No parent!';
        } else {
            $returnValue = $returnValue;
        }
        return $returnValue;
    }

    public static function getCategoryID($id) {
        $returnValue = Yii::app()->db->createCommand()
                ->select('category')
                ->from('{{directory}}')
                ->where('id=:id', array(':id' => $id))
                ->queryScalar();
        return $returnValue;
    }

}