<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "uploads".
 *
 * @property integer $upload_id
 * @property string $room_id
 * @property string $file_name
 * @property string $real_filename
 * @property string $create_date
 * @property integer $type
 */
class RoomUploads extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'room_uploads';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['create_date'], 'safe'],
            [['type', 'is_default'], 'integer'],
            [['room_id'], 'string', 'max' => 50],
            [['file_name', 'real_filename'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'upload_id' => 'Upload ID',
            'room_id' => 'Room ID',
            'file_name' => 'File Name',
            'real_filename' => 'Real Filename',
            'is_default'    => 'Default Img',
            'type' => 'Type',
            'create_date' => 'Create Date',
        ];
    }
}
