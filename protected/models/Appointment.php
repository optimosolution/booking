<?php

/**
 * This is the model class for table "{{appointment}}".
 *
 * The followings are the available columns in table '{{appointment}}':
 * @property integer $id
 * @property integer $company_id
 * @property integer $shop_id
 * @property integer $customer_id
 * @property integer $staff_id
 * @property integer $service_category
 * @property integer $service_id
 * @property string $appoint_time
 * @property string $end_time
 * @property integer $total_cost
 * @property string $note
 */
class Appointment extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{appointment}}';
    }

    public $email;
    public $total_amount;
    
    public $appointment_count; //how many times a customer take appointments from a shop
    public $number_of_visit;
    public $from_date;
    public $to_date;

    public $cost_range_from;
    public $cost_range_to;
    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('appoint_date, appoint_time, service_category , service_id, customer_id', 'required'),
            array('company_id, shop_id, customer_id, staff_id, service_category, service_id, total_cost', 'numerical', 'integerOnly' => true),
            array('end_time,appoint_time,applied_date,appointment_count, note, email,date_first,date_last,from_date, to_date,cost_range_from,cost_range_to, change_date', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, company_id,applied_date,appointment_count,appoint_date, from_date, to_date, date_first,date_last,email, shop_id, customer_id, staff_id, service_category, service_id, appoint_time, end_time, total_cost, note, status', 'safe', 'on' => 'search'),
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
            'company_id' => 'Company',
            'shop_id' => 'Shop',
            'customer_id' => 'Customer',
            'staff_id' => 'Staff',
            'service_category' => 'Service Category',
            'service_id' => 'Service',
            'applied_date,' => 'Applied Date for Booking',
            'appoint_date' => 'Appointment Date',
             'change_date' => 'Change Date',
             'appoint_time' => 'Appoint Time',
            'end_time' => 'Ent Time',
            'total_cost' => 'Total Cost',
            'note' => 'Note',
            'email' => 'Email',
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
    public function search_filter_customer($param = array()) {
        // @todo Please modify the following code to remove attributes that should not be searched.
        $criteria = new CDbCriteria($param);

        if (!empty($this->from_date) && empty($this->to_date)) {
            $criteria->condition = "appoint_date >= '$this->from_date'";  // date is database date column field
        } elseif (!empty($this->to_date) && empty($this->from_date)) {
            $criteria->condition = "appoint_date <= '$this->to_date'";
        } elseif (!empty($this->to_date) && !empty($this->from_date)) {
            $criteria->condition = "appoint_date  >= '$this->from_date' and appoint_date <= '$this->to_date'";
        }



        if (!empty($this->cost_range_from) && empty($this->cost_range_to)) {
            $criteria->condition = "total_amount >= '$this->cost_range_from'";  // date is database date column field
        } elseif (!empty($this->cost_range_to) && empty($this->cost_range_from)) {
            $criteria->condition = "total_amount <= '$this->cost_range_to'";
        } elseif (!empty($this->cost_range_to) && !empty($this->cost_range_from)) {
            $criteria->condition = "total_amount  >= '$this->cost_range_from' and total_amount <= '$this->cost_range_to'";
        }

        
        $criteria->group = ('customer_id');
        $criteria->order = 'total_amount DESC';
        $criteria->addCondition('appoint_date <= DATE(NOW())');
        $criteria->select = array(
            '*' => new CDbExpression('customer_id, shop_id, SUM(total_cost) AS total_amount, COUNT(customer_id) AS number_of_visit'),
        );

        //$criteria->condition='your_condition';
        //$user = User::model()->find($criteria);
        $criteria->limit = 100;
        $criteria->compare('id', $this->id);
        $criteria->compare('company_id', $this->company_id);
        $criteria->compare('shop_id', $this->shop_id);
        $criteria->compare('customer_id', $this->customer_id);
        $criteria->compare('staff_id', $this->staff_id);
        $criteria->compare('service_category', $this->service_category);
        $criteria->compare('service_id', $this->service_id);
        $criteria->compare('appoint_date', $this->appoint_date, true);
        $criteria->compare('applied_date,', $this->applied_date, true);
        $criteria->compare('appoint_time', $this->appoint_time, true);
        $criteria->compare('end_time', $this->end_time, true);
        //$criteria->compare('total_cost',$this->total_cost);
        $criteria->compare('note', $this->note, true);
        $criteria->compare('status', $this->status);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function search($param = array()) {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria($param);

        $criteria->compare('id', $this->id);
        $criteria->compare('company_id', $this->company_id);
        $criteria->compare('shop_id', $this->shop_id);
        $criteria->compare('customer_id', $this->customer_id);
        $criteria->compare('staff_id', $this->staff_id);
        $criteria->compare('service_category', $this->service_category);
        $criteria->compare('service_id', $this->service_id);
        $criteria->compare('appoint_date', $this->appoint_date, true);
        $criteria->compare('applied_date,', $this->applied_date, true);
        $criteria->compare('appoint_time', $this->appoint_time, true);
        $criteria->compare('end_time', $this->end_time, true);
        $criteria->compare('total_cost', $this->total_cost);
        $criteria->compare('note', $this->note, true);
        $criteria->compare('status', $this->status);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function search_appointment($param = array()) {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $company = Yii::app()->user->company;
        $shop_id = Yii::app()->user->shop_id;
        $storeowner = Yii::app()->user->storeowner;
        $user_id = Yii::app()->user->id;
        $group_id = Yii::app()->user->group_id;

        $criteria = new CDbCriteria($param);


        $criteria->alias = 't';
        if ((Yii::app()->user->group_id) == 1) {
            //Need to put condition as NONE
            $criteria->condition = 't.company_id=' . $company;
        } else if ((Yii::app()->user->group_id) == 2) {
            $criteria->condition = 't.company_id=' . $company;
        } else if ((Yii::app()->user->group_id) == 6) {
            $criteria->condition = 't.company_id=' . $company and 't.shop_id=' . $shop_id;
        } else if ((Yii::app()->user->group_id) == 7) {
            $criteria->condition = 't.company_id=' . $company and 't.shop_id=' . $shop_id;
        } else if ((Yii::app()->user->group_id) == 8) {
            $criteria->condition = 't.company_id=' . $company and 't.shop_id=' . $shop_id and 't.customer_id=' . $user_id;
        }


        //$criteria->condition = 't.company_id=' .$company;
        $criteria->compare('t.id', $this->id);
        $criteria->compare('t.company_id', $this->company_id);
        $criteria->compare('t.shop_id', $this->shop_id);
        $criteria->compare('t.customer_id', $this->customer_id);
        $criteria->compare('t.staff_id', $this->staff_id);
        $criteria->compare('t.service_category', $this->service_category);
        $criteria->compare('t.service_id', $this->service_id);
        $criteria->compare('t.status', $this->status);
        $criteria->compare('t.appoint_date', $this->appoint_date, true);
        $criteria->compare('t.applied_date,', $this->applied_date, true);
        $criteria->compare('t.appoint_time', $this->appoint_time, true);
        $criteria->compare('t.end_time', $this->end_time, true);
        $criteria->compare('t.total_cost', $this->total_cost);
        $criteria->compare('t.note', $this->note, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => Yii::app()->params['pageSize'],
            ),
            'sort' => array('defaultOrder' => 'appoint_date DESC')
        ));
    }

    public static function get_time_series() {

        $shop_id = Yii::app()->user->shop_id;

        $array = Yii::app()->db->createCommand()
                ->select('start_hour, end_hour')
                ->from('{{shop}}')
                ->where('id=' . $shop_id)
                ->queryAll();

        foreach ($array as $key => $values) {
            $start_hour = $values['start_hour'];
            $end_hour = $values['end_hour'];

            $startTime = strtotime($start_hour);
            //$getDate = date('Y-m-d', $time);
            $getStartHour = date('H', $startTime);
            //$getMinute = date('i', $time);

            $endTime = strtotime($end_hour);
            $getEndHour = date('H', $endTime);
            $oneHourBack = $getEndHour - 1;
        }
        echo '<select id="Appointment_appoint_time" name="Appointment[appoint_time]" class="span5 marginBot10px">';
        echo '<option value="">--select Time--</option>';

        function echo_datelist($i, $j) {
            $time = str_pad($i, 2, '0', STR_PAD_LEFT) . ':' . str_pad($j, 2, '0', STR_PAD_LEFT);
            $date = strtotime("$time:00");
            //$sql = mysql_query("select b.room_type, c.name from bookings as b, customers as c where b.the_date='$date' and b.id_customer=c.id");

            echo '<option value="' . $time . '" >' . $time . '</option>';
        }

        for ($i = $getStartHour; $i <= $oneHourBack; $i++) {
            for ($j = 0; $j <= 45; $j+=15) {
                //inside the inner loop
                echo_datelist($i, $j);
            }
            //inside the outer loop
        }
        //outside the outer loop
        echo_datelist($getEndHour, 0);
        echo '</select>';
    }

    //Function to find out the total number of visit time of the customer
    public static function get_visited_amount() {
        return $this->_statement->columnCount();
    }

    public static function getCity($id) {
        $value = City::model()->findByAttributes(array('id' => $id));
        if (empty($value->city_name)) {
            return null;
        } else {
            return $value->city_name;
        }
    }

    public static function get_city_new($controller, $field) {
        $rValue = Yii::app()->db->createCommand()
                ->select('id,state_id,city_name')
                ->from('{{city}}')
                ->where('published=1')
                ->order('city_name')
                ->queryAll();
        echo '<select id="' . $controller . '_' . $field . '" name="' . $controller . '[' . $field . ']" class="span12 input-large">';
        echo '<option value="">--select state--</option>';
        foreach ($rValue as $key => $values) {
            echo '<option value="' . $values["id"] . '" class="' . $values["state_id"] . '">' . $values["city_name"] . '</option>';
        }
        echo '</select>';
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Appointment the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    

    public static function buttonColor($val,$appointmentid, $appmnt_date, $appmnt_time) {  
        $today= date("Y-m-d");//new CDbExpression('NOW()');//"YYYY-MM-DD HH:MM:SS"
        $current_time= date("H:m:s");
        if ($val==0 && $appmnt_date>=$today) {   
            return '<p style="font-weight:bold !important; color: #1c9f1c!important; margin:0;">UPCOMING</p>';
            //.' '.CHtml::link(' Cancel', array('appointment/appointmentStatusCheck','id'=>$appointmentid, 'status'=>'3'), array('class'=>'btn btn-danger btn-xs glyphicon glyphicon-remove', 'style'=>'background:#FF0000 !important; border:#c72424 !important; color:#FFF;  '))
        } elseif($val==0 && $appmnt_date<=$today && $current_time>$appmnt_time){//
           return CHtml::link(' Done',array('appointment/appointmentStatusCheck','id'=>$appointmentid, 'status'=>'1'), array('class'=>'btn btn-success btn-xs fa fa-check')).' '.CHtml::link(' Incomplete',array('appointment/appointmentStatusCheck','id'=>$appointmentid, 'status'=>'2'), array('class'=>'btn btn-danger btn-xs glyphicon glyphicon-remove'));
        } elseif($val==2){
            return '<p style="font-weight:bold !important; color: #FF0000!important;">Incomplete</p>';
        }elseif($val==1){
            return '<p style="font-weight:bold !important; color: #008000!important;">Completed</p>';
        }//
    }

   

     public static function getIdentifyCyrency($shop_id) {  
        //$shop_id=Yii::app()->user->shop_id;
        $currency_sym=Currency::get_currency_symbol(Shop::get_currency_id($shop_id));
        return $currency_sym;
        
    }
}
