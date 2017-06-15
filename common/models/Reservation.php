<?php

namespace common\models;

use Yii;
use yii\behaviors\AttributeBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "reservation".
 *
 * @property integer $reserve_id
 * @property string $reserve_topic
 * @property integer $reserve_meeting_type
 * @property integer $reserve_att_num
 * @property integer $reserve_room_style
 * @property string $reserve_sdate
 * @property string $reserve_stime
 * @property string $reserve_edate
 * @property string $reserve_etime
 * @property integer $reserve_room
 * @property integer $reserve_depart
 * @property integer $reserve_user
 * @property integer $reserve_tel
 * @property integer $reserve_budget
 * @property integer $reserve_status
 * @property string $reserve_comment
 * @property string $reserve_remark
 * @property string $reserve_pay_rate
 * @property string $reserve_pay_price
 * @property string $created_at
 * @property string $created_by
 * @property string $modified_at
 * @property string $modified_by
 */
class Reservation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reservation';
    }
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['reserve_topic', 'reserve_tel', 'reserve_comment', 'reserve_remark', 'created_by', 'modified_by'], 'string'],
            [['reserve_activity_type', 'reserve_att_num', 'reserve_layout', 'reserve_room', 'reserve_depart', 'reserve_user', 'reserve_status'], 'integer'],
            [['reserve_budget', 'reserve_pay_rate', 'reserve_pay_price'], 'number'],
            [['reserve_topic', 'reserve_sdate', 'reserve_stime', 'reserve_edate', 'reserve_etime', 'reserve_activity_type', 'reserve_att_num', 'reserve_layout', 'reserve_room', 'reserve_equipment', 'reserve_depart', 'created_at', 'modified_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'reserve_id' => 'ID',
            'reserve_topic' => 'หัวข้อ',
            'reserve_activity_type' => 'ประเภทกิจกรรม',
            'reserve_att_num' => 'จำนวนผู้เข้าร่วม',
            'reserve_layout' => 'การจัดห้อง',
            'reserve_sdate' => 'Reserv Sdate',
            'reserve_stime' => 'Reserv Stime',
            'reserve_edate' => 'Reserv Edate',
            'reserve_etime' => 'Reserv Etime',
            'reserve_room' => 'Reserv Room',
            'reserve_equipment' => 'อุปกรณ์',
            'reserve_depart' => 'กลุ่มงาน',
            'reserve_user' => 'Reserv User',
            'reserve_tel' => 'เบอร์ติดต่อภายใน',
            'reserv_budget' => 'งบประมาณ',
            'reserve_status' => 'Reserve Status',
            'reserve_comment' => 'Reserv Comment',
            'reserve_remark' => 'Reserv Remark',
            'reserve_pay_rate' => 'Reserv Pay Rate',
            'reserve_pay_price' => 'Reserv Pay Price',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'modified_at' => 'Modified At',
            'modified_by' => 'Modified By',
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => AttributeBehavior::classname(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => 'reserve_equipment',
                    ActiveRecord::EVENT_BEFORE_UPDATE => 'reserve_equipment',
                ],
                'value' => function($e){
                    return implode(',', $this->reserve_equipment);
                },
            ],
            [
                'class' => \yii\behaviors\TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'modified_at',
                'value' => new \yii\db\Expression('NOW()'),                
            ]         
        ];
    }

    public function equipment2Array()
    {
        return $this->reserve_equipment = explode(',', $this->reserve_equipment);
    }

    public function getRoom()
    {
        return $this->hasMany(Room::classname(), ['room_id' => 'reserve_room']);
    }

    public function getRoomStyle()
    {
        return $this->hasMany(ReserveLayout::classname(), ['reserve_layout_id' => 'reserve_layout']);
    }

    public function getActivityType()
    {
        return $this->hasMany(ActivityType::classname(), ['activity_type_id' => 'reserve_activity_type']);
    }

    public function getReserveStatus()
    {
        return $this->hasMany(ReserveStatus::classname(), ['reserve_status_id' => 'reserve_status']);
    }
    
    public function getReserveUser()
    {
        return $this->hasMany(User2::classname(), ['person_id' => 'reserve_user']);
    }
    
        public function getReserveDepart()
    {
        return $this->hasMany(Department::classname(), ['depart_id' => 'reserve_depart']);
    }
}
