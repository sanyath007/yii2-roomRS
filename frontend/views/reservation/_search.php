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

<div class="reservation-search">
    
    <?php $form = ActiveForm::begin([
        'action' => ($this->context->action->id != 'cancel') ? ['index'] : ['cancel'],
        'method' => 'get',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
            'horizontalCssClasses' => [
                'label' => 'col-sm-3',
                'offset' => 'col-sm-offset-2',
                'wrapper' => 'col-sm-9',
                'error' => '',
                'hint' => '',
            ],
        ],
    ]); ?>

    <div class="panel panel-default">  
        <div class="panel-heading">ค้นหาข้อมูลการจองห้องประชุม</div>      
        <div class="panel-body">    
            <div class="col-md-7">

                <?php echo $form->field($model, 'reserve_topic')
                                ->textInput(['placeholder' => 'ระบุหัวข้อการประชุมที่ต้องการค้นหา...'])
                                ->label('หัวข้อการประชุม ') ?> 

                <?php echo $form->field($model, 'reserve_room')
                                ->dropDownList(
                                    ArrayHelper::map(Room::find()->All(), 'room_id', 'room_name'),
                                    ['prompt' => '-- ทุกห้อง --']
                                )->label('ห้องประชุม') ?>

            </div>
            <div class="col-md-5">

                <?php if($this->context->action->id != 'cancel') : ?>
                    <?php echo $form->field($model, 'reserve_status')
                                    ->dropDownList(
                                        ArrayHelper::map(ReserveStatus::find()->All(), 'reserve_status_id', 'reserve_status_name'),
                                        [
                                            'prompt' => '-- ทุกสถานะ --',
                                        ]
                                    )->label('สถานะห้อง') ?>
                <?php else : ?>

                    <?php echo $form->field($model, 'reserve_status')
                                    ->dropDownList(
                                        ArrayHelper::map(ReserveStatus::find()->where(['reserve_status_id' => '3'])->All(), 'reserve_status_id', 'reserve_status_name'),
                                        [
                                            'readonly' => 'readonly',
                                            //'options' => ['3' => ['Selected' => 'selected']],                                            
                                        ]
                                    )->label('สถานะห้อง') ?>

                <?php endif; ?>

                <?php echo $form->field($model, 'reserve_sdate')->widget(
                        DatePicker::classname(), [
                            'name' => 'dpSDate',                    
                            'options' => [
                                //'value' => $model->isNewRecord ? date('Y-m-d') : $model->reserve_edate,
                                'class' => 'form-control',
                            ],
                            'pluginOptions' => [
                                'language' => 'th',
                                'autoclose' => true,
                                'format' => 'yyyy-mm-dd',
                                'todayHighlight' => true
                            ]
                        ]
                )->label('วันที่ใช้ ') ?>

            </div>

            <div class="form-group">
                <div class="col-sm-4"></div>
                <div class="col-sm-4" style="text-align: center;">

                    <?= Html::submitButton('<i class="fa fa-search" aria-hidden="true"></i> ค้นหา', ['class' => 'btn btn-primary']) ?>
                    <?= Html::a('ยกเลิก', ['reservation/' . $this->context->action->id], ['class' => 'btn btn-default']) ?>

                </div>
                <div class="col-sm-4"></div>
            </div>

        </div>    
    </div>

    <?php ActiveForm::end(); ?>

</div>
