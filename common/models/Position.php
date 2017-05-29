<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "room_status".
 *
 * @property integer $room_status_id
 * @property string $room_status_name
 */
class Position extends \yii\db\ActiveRecord
{
    //Set database from db2
    public static function getDb() 
    {
        return Yii::$app->db2;
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'position';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['position_name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'position_id' => 'รหัส',
            'position_name' => 'ตำแหน่ง',
        ];
    }
}
