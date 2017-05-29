<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "room_equipment".
 *
 * @property integer $equipment_id
 * @property string $equipment_name
 * @property string $equipment_description
 * @property string $equipment_img
 */
class RoomEquipment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reserve_equipment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['equipment_name', 'equipment_description', 'equipment_img'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'equipment_id' => 'Equipment ID',
            'equipment_name' => 'Equipment Name',
            'equipment_description' => 'Equipment Description',
            'equipment_img' => 'Equipment Img',
        ];
    }
}
