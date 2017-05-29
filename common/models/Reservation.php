<?php

namespace common\models;

use Yii;
use yii\behaviors\AttributeBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "reservation".
 *
 * @property integer $reserv_id
 * @property string $reserv_topic
 * @property integer $reserv_meeting_type
 * @property integer $reserv_att_num
 * @property integer $reserv_room_style
 * @property string $reserv_sdate
 * @property string $reserv_stime
 * @property string $reserv_edate
 * @property string $reserv_etime
 * @property integer $reserv_room
 * @property integer $reserv_user
 * @property integer $reserve_status
 * @property string $reserv_comment
 * @property string $reserv_remark
 * @property string $reserv_pay_rate
 * @property string $reserv_pay_price
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
            [['reserve_topic', 'reserve_comment', 'reserve_remark'], 'string'],
            [['reserve_activity_type', 'reserve_att_num', 'reserve_layout', 'reserve_room', 'reserve_user', 'reserve_status'], 'integer'],
            [['reserve_sdate', 'reserve_stime', 'reserve_edate', 'reserve_etime', 'created_at', 'modified_at'], 'safe'],
            [['reserve_pay_rate', 'reserve_pay_price'], 'number'],
            [['reserve_equipment'], 'safe'],
            [['created_by', 'modified_by'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'reserve_id' => 'Reserv ID',
            'reserve_topic' => 'Reserv Topic',
            'reserve_activity_type' => 'Activity Type',
            'reserve_att_num' => 'Reserv Att Num',
            'reserve_layout' => 'Layout',
            'reserve_sdate' => 'Reserv Sdate',
            'reserve_stime' => 'Reserv Stime',
            'reserve_edate' => 'Reserv Edate',
            'reserve_etime' => 'Reserv Etime',
            'reserve_room' => 'Reserv Room',
            'reserve_equipment' => 'อุปกรณ์',
            'reserve_user' => 'Reserv User',
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
}