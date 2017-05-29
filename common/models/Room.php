<?php

namespace common\models;

use Yii;
use yii\helpers\Url;

/**
 * This is the model class for table "room".
 *
 * @property integer $room_id
 * @property string $room_name
 * @property double $room_size
 * @property string $room_capacity
 * @property string $room_locate
 * @property string $room_contact_name
 * @property string $room_contact_tel
 * @property string $room_pay_rate
 * @property string $room_reserv_max
 * @property string $room_img1
 * @property string $room_img2
 * @property string $room_img3
 * @property string $room_img4
 * @property string $room_img5
 * @property string $room_detail
 * @property string $room_status
 */
class Room extends \yii\db\ActiveRecord
{
    public $img1;
    public $img2;
    public $img3;
    public $img4;
    public $img5;
    public $img6;

    const UPLOAD_FOLDER = 'uploads/rooms';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'room';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [           
            [['room_capacity'], 'number'],
            [['room_detail'], 'string'],
            [['room_name', 'room_size', 'room_locate', 'room_contact_name', 'room_contact_tel', 'room_pay_rate', 'room_reserv_max', 'room_img1', 'room_img2', 'room_img3', 'room_img4', 'room_img5', 'room_status'], 'string', 'max' => 255],
            [['img1'], 'file', 'skipOnEmpty' => true, 'on' => 'update', 'extensions' => 'jpg,png,gif'],
            [['img2'], 'file', 'skipOnEmpty' => true, 'on' => 'update', 'extensions' => 'jpg,png,gif'],
            [['img3'], 'file', 'skipOnEmpty' => true, 'on' => 'update', 'extensions' => 'jpg,png,gif'],
            [['img4'], 'file', 'skipOnEmpty' => true, 'on' => 'update', 'extensions' => 'jpg,png,gif'],
            [['img5'], 'file', 'skipOnEmpty' => true, 'on' => 'update', 'extensions' => 'jpg,png,gif'],
            [['img6'], 'file', 'skipOnEmpty' => true, 'on' => 'update', 'extensions' => 'jpg,png,gif']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'room_id' => 'ID',
            'room_name' => 'ชื่อห้อง',
            'room_size' => 'ขนาด',
            'room_capacity' => 'ความจุ',
            'room_locate' => 'ที่ตั้ง',
            'room_contact_name' => 'ชื่อผู้ดูแล',
            'room_contact_tel' => 'โทรศัพท์ผู้ดูแล',
            'room_pay_rate' => 'อัตราค่าบริการ',
            'room_reserv_max' => 'จำนวนวันที่ที่จ้องได้สูงสุด',
            'room_img1' => 'Room Img1',
            'room_img2' => 'Room Img2',
            'room_img3' => 'Room Img3',
            'room_img4' => 'Room Img4',
            'room_img5' => 'Room Img5',
            'room_detail' => 'รายละเอียด',
            'room_status' => 'สถานะ',
        ];
    }

    public static function getUploadPath()
    {
        return Yii::getAlias('@webroot') . '/' . self::UPLOAD_FOLDER . '/';
    }

    public static function getUploadUrl()
    {
        return Url::base(true) . '/' . self::UPLOAD_FOLDER . '/';
    }

    public function getThumbnails($room, $num=0)
    {
        if ($num > 0) {
            $uploadFiles = RoomUploads::find()->where(['room_id' => $room])->limit($num)->all();
        } else {
            $uploadFiles = RoomUploads::find()->where(['room_id' => $room])->all();
        }
        
        $preview = [];

        foreach ($uploadFiles as $file) {
            $preview[] = [
                'url' => self::getUploadUrl(true) . $room . '/' . $file->real_filename,
                'src' => self::getUploadUrl(true) . $room . '/thumbnail/' . $file->real_filename,
                'options' => ['title' => $event_name]
            ];
        }

        return $preview;
    }
}
