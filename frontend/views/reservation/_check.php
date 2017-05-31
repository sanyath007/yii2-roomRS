<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use kartik\widgets\DatePicker;
use common\models\ReserveStatus;
use common\models\Room;

/* @var $this yii\web\View */
/* @var $model frontend\models\ReservationSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reservation-checkroom">
    
    <?php $form = ActiveForm::begin([
        'action' => ['checkroom'],
        'method' => 'get',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
            'horizontalCssClasses' => [
                'label' => 'col-sm-3',
                'offset' => 'col-sm-offset-2',
                'wrapper' => 'col-sm-8',
                'error' => '',
                'hint' => '',
            ],
        ],
    ]); ?>

    <div class="panel panel-default">  
        <div class="panel-heading">ค้นหาห้องประชุมว่าง</div>      
        <div class="panel-body">

            <?php echo $form->field($model, 'reserve_room')
                            ->dropDownList(ArrayHelper::map(Room::find()->All(), 'room_id', 'room_name'), [
                                'prompt' => '-- กรุณาเลือก --'
                            ])->label('ห้องประชุม') ?>
            
            <div class="form-group">
                <div class="col-sm-3"></div>
                <div class="col-sm-9">

                    <?= Html::submitButton('<i class="fa fa-search" aria-hidden="true"></i> ค้นหา', ['class' => 'btn btn-primary']) ?>
                    <?= Html::a('ยกเลิก', ['reservation/' . $this->context->action->id], ['class' => 'btn btn-default']) ?>

                </div>
                <div class="col-sm-4"></div>
            </div>

        </div>    
    </div>

    <?php ActiveForm::end(); ?>

</div>
