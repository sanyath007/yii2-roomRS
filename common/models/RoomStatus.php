<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "room_status".
 *
 * @property integer $room_status_id
 * @property string $room_status_name
 */
class RoomStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'room_status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['room_status_name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'room_status_id' => 'Room Status ID',
            'room_status_name' => 'Room Status Name',
        ];
    }
}
