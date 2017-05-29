<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use common\models\RoomStatus;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model common\models\Room */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="room-form">

    <?php $form = ActiveForm::begin([
        'options' => [
            'enctype' => 'multipart/form-data'
        ]
    ]); ?>

    <div class="panel">
        <div class="panel-heading"><h3><i class="fa fa-pencil-square-o"></i> รายละเอียดห้อง</h3></div>
        <div class="panel-body">

            <?= $form->field($model, 'room_name')->textInput(['maxlength' => true])->label('ชื่อห้องประชุม') ?>

            <?= $form->field($model, 'room_size')->textInput()->label('ขนาด') ?>

            <?= $form->field($model, 'room_capacity')->textInput(['maxlength' => true])->label('ความจุ') ?>

            <?= $form->field($model, 'room_locate')->textInput(['maxlength' => true])->label('ที่ตั้ง') ?>

            <?= $form->field($model, 'room_contact_name')->textInput(['maxlength' => true])->label('ผู้ดูแล') ?>

            <?= $form->field($model, 'room_contact_tel')->textInput(['maxlength' => true])->label('เบอร์ติดต่อ') ?>

            <?= $form->field($model, 'room_pay_rate')->textInput(['maxlength' => true])->label('อัตราค่าบริการ') ?>

            <?= $form->field($model, 'room_reserv_max')->textInput(['maxlength' => true])->label('จำนวนวันที่ที่จ้องได้สูงสุด') ?>
            
            <?= $form->field($model, 'room_detail')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'room_status')->dropDownList(
                ArrayHelper::map(RoomStatus::find()->All(), 'room_status_id', 'room_status_name')
            ) ?>
            
            <div class="panel">
                <div class="panel-heading"><h3><i class="fa fa-picture-o"></i> ภาพประกอบ</h3></div>
                <div class="panel-body">

                    <div class="alert alert-info" role="alert">ขนาดภาพที่เหมาะสม</div>
                    
<!--                    <div class="row">
                        <div class="col-xs-6 col-md-4">
                            <a href="#" class="thumbnail">
                                <img src="/img/<?=(($model->room_img1) ? $model->room_img1 : 'default-50x50.gif') ?>" alt="<?=$model->room_img1 ?>">
                            </a>

                            <?= $form->field($model, 'img1')->fileInput(['class' => 'btn btn-default']) ?>
                        </div>

                        

                        <div class="col-xs-6 col-md-4">
                            <a href="#" class="thumbnail">
                                <img src="/img/<?=(($model->room_img2) ? $model->room_img2 : 'default-50x50.gif') ?>" alt="<?=$model->room_img1 ?>">
                            </a>

                            <?= $form->field($model, 'img2')->fileInput(['class' => 'btn btn-default']) ?>
                        </div>

                        <div class="col-xs-6 col-md-4">
                            <a href="#" class="thumbnail">
                                <img src="/img/<?=(($model->room_img3) ? $model->room_img3 : 'default-50x50.gif') ?>" alt="<?=$model->room_img1 ?>">
                            </a>

                            <?= $form->field($model, 'img3')->fileInput(['class' => 'btn btn-default']) ?>
                        </div>

                        <div class="col-xs-6 col-md-4">
                            <a href="#" class="thumbnail">
                                <img src="/img/<?=(($model->room_img4) ? $model->room_img4 : 'default-50x50.gif') ?>" alt="<?=$model->room_img1 ?>">
                            </a>

                             <?= $form->field($model, 'img4')->fileInput(['class' => 'btn btn-default']) ?>
                        </div>

                        <div class="col-xs-6 col-md-4">
                            <a href="#" class="thumbnail">
                                <img src="/img/<?=(($model->room_img5) ? $model->room_img5 : 'default-50x50.gif') ?>" alt="<?=$model->room_img1 ?>">
                            </a>

                            <?= $form->field($model, 'img5')->fileInput(['class' => 'btn btn-default']) ?>
                        </div>

                        <div class="col-xs-6 col-md-4">
                            <a href="#" class="thumbnail">
                                <img src="/img/<?=(($model->room_img6) ? $model->room_img6 : 'default-50x50.gif') ?>" alt="<?=$model->room_img1 ?>">
                            </a>

                            <?= $form->field($model, 'img6')->fileInput(['class' => 'btn btn-default']) ?>
                        </div>-->
                        
                        <div class="form-group">
                            <label class="control-label" for="upload_files[]">รูป</label>
                            <div>
                                <?= FileInput::widget([
                                    'name' => 'upload_ajax[]',
                                    'options' => ['multiple' => true, 'accept' => 'image/*'],
                                    'pluginOptions' => [
                                        'overwriteInitial' => false,
                                        'initialPreviewShowDelete' => true,
                                        'initialPreview' => $initialPreview,
                                        'initialPreviewConfig' => $initialPreviewConfig,
                                        'uploadUrl' => Url::to(['/room/upload-ajax']),
                                        'uploadExtraData' => [
                                            'room_id' => $model->room_id
                                        ],
                                        'maxFileCount' => 100
                                    ],
                                ]); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'เพิ่ม' : 'แก้ไข', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

        </div>   
    </div>

    <?php ActiveForm::end(); ?>

</div>
