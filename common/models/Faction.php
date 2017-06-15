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
class Faction extends \yii\db\ActiveRecord
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
        return 'faction';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['faction_id', 'faction_id'], 'integer'],
            [['faction_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'faction_id' => 'ID',
            'faction_name' => 'ชื่อกลุ่มภารกิจ',
        ];
    }
}
