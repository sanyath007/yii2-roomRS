<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\RoomSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="room-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'room_id') ?>

    <?= $form->field($model, 'room_name') ?>

    <?= $form->field($model, 'room_size') ?>

    <?= $form->field($model, 'room_capacity') ?>

    <?= $form->field($model, 'room_locate') ?>

    <?php // echo $form->field($model, 'room_contact_name') ?>

    <?php // echo $form->field($model, 'room_contact_tel') ?>

    <?php // echo $form->field($model, 'room_pay_rate') ?>

    <?php // echo $form->field($model, 'room_reserv_max') ?>

    <?php // echo $form->field($model, 'room_img1') ?>

    <?php // echo $form->field($model, 'room_img2') ?>

    <?php // echo $form->field($model, 'room_img3') ?>

    <?php // echo $form->field($model, 'room_img4') ?>

    <?php // echo $form->field($model, 'room_img5') ?>

    <?php // echo $form->field($model, 'room_detail') ?>

    <?php // echo $form->field($model, 'room_status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
