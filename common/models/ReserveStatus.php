<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "reserve_status".
 *
 * @property integer $reserve_status_id
 * @property string $reserve_status_name
 */
class ReserveStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reserve_status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['reserve_status_id'], 'required'],
            [['reserve_status_id'], 'integer'],
            [['reserve_status_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'reserve_status_id' => 'Reserve Status ID',
            'reserve_status_name' => 'Reserve Status Name',
        ];
    }
}
