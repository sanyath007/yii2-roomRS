<?php

namespace common\models;

use Yii;
use yii\helpers\Url;

/**
 * This is the model class for table "depart".
 *
 * @property integer $depart_id
 * @property string $depart_name
 * @property double $faction_id
 */
class Department extends \yii\db\ActiveRecord
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
        return 'depart';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['depart_id', 'faction_id'], 'integer'],
            [['depart_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'depart_id' => 'ID',
            'depart_name' => 'ชื่อกลุ่มงาน',
            'faction_id' => 'กลุ่มภารกิจ',
        ];
    }
}
