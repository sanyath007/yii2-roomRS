<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "room_style".
 *
 * @property integer $room_style_id
 * @property string $room_style_name
 * @property string $room_style_img
 */
class ReserveLayout extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reserve_layout';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['reserve_layout_id'], 'required'],
            [['reserve_layout_id'], 'integer'],
            [['reserve_layout_name', 'reserve_layout_img'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'reserve_layout_id' => 'รหัสรูปแบบ',
            'reserve_layout_name' => 'รูปแบบการจัดห้อง',
            'reserve_layout_img' => 'ภาพประกอบ',
        ];
    }
}
