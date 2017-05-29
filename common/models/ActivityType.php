<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "meeting_type".
 *
 * @property integer $meeting_type_id
 * @property string $meeting_type_name
 */
class ActivityType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reserve_activity';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['activity_type_name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'activity_type_id' => 'รหัสประเภท',
            'activity_type_name' => 'ประเภทกิจกรรม',
        ];
    }
}
