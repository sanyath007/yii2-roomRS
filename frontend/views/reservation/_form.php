<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use yii\web\JsExpression;
use kartik\widgets\DatePicker;
use kartik\widgets\TimePicker;

use common\models\ReserveStatus;
use common\models\ReserveLayout;
use common\models\Room;
use common\models\RoomEquipment;
use common\models\ActivityType;
use common\models\Department;

/* @var $this yii\web\View */
/* @var $model common\models\Reservation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reservation-form">

    <?php $form = ActiveForm::begin([
            'id' => 'reservation-form',
            /*'options' => [
                'class' => 'form-horizontal',
                'role' => 'form',
            ],*/
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
        
        <div class="row">        
            <div class="col-md-8">            
                
                <?= $form->field($model, 'reserve_room')
                         ->dropDownList(ArrayHelper::map(Room::find()->All(), 'room_id', 'room_name'),
                            [
                                'onchange' => new JsExpression('$.get(
                                    "'. Yii::$app->urlManager->createUrl(["reservation/ajaximage"]) .'", 
                                    { tbl: "Room", id: $(this).val() }, 
                                    function(data){                                        
                                        $("#img_room").html(data);
                                    }
                                )')
                            ]
                         )
                         ->label('ห้องประชุม') ?>
                
                <?= $form->field($model, 'reserve_depart')
                         ->dropDownList(ArrayHelper::map(Department::find()->All(), 'depart_id', 'depart_name'))
                         ->label('กลุ่มงาน') ?>
                
                <?= $form->field($model, 'reserve_topic')
                         ->textInput()
                         ->label('หัวข้อการประชุม') ?>
                
                <?= $form->field($model, 'reserve_activity_type')
                         ->dropDownList(ArrayHelper::map(ActivityType::find()->All(), 'activity_type_id', 'activity_type_name'))
                         ->label('ประเภทการประชุม') ?>
                
                <?= $form->field($model, 'reserve_comment')->textarea(['rows' => 6])->label('รายละเอียด') ?>

                <?= $form->field($model, 'reserve_att_num')->textInput()->label('จำนวนผู้เข้าร่วมประชุม') ?>

                <?= $form->field($model, 'reserve_layout')
                         ->dropDownList(ArrayHelper::map(ReserveLayout::find()->All(), 'reserve_layout_id', 'reserve_layout_name'),
                            [
                                'onchange' => new JsExpression('$.get(
                                    "'. Yii::$app->urlManager->createUrl(['reservation/ajaximage']) .'",
                                    { tbl: "ReserveLayout", id: $(this).val() },
                                    function(data){
                                        $("#img_reserve_layout").html(data);
                                    }
                                )')
                            ]
                        )->label('การจัดห้อง') ?>

            </div>

            <div class="col-md-4">
                
                <div class="row">
                    <div class="col-md-12">
                        <a href="#" id="img_room" class="thumbnail">
                            <img src="./uploads/rooms/<?= $roomImg ?>" alt="<?= $roomImg ?>">
                        </a>                        
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <a href="#" class="thumbnail" id="img_reserve_layout">
                            <img src="./img/layouts/BQ.jpg" alt="Banquet">
                        </a>                        
                    </div>
                </div>

            </div>
        </div><!--/.row -->

        <div class="row">
            <div class="col-md-8">                       

                <?= $form->field($model, 'reserve_sdate')->widget(
                    DatePicker::classname(), [
                        'name' => 'dpSDate',                    
                        'options' => [
                            'value' => $model->isNewRecord ? date('Y-m-d') : $model->reserve_sdate,
                            'class' => 'form-control',
                        ],
                        'pluginOptions' => [
                            'language' => 'th',
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd',
                            'todayHighlight' => true
                        ]
                    ]
                )->label('วันที่เริ่ม') ?>
                
                <?= $form->field($model, 'reserve_edate')->widget(
                    DatePicker::classname(), [
                        'name' => 'dpEDate',                    
                        'options' => [
                            'value' => $model->isNewRecord ? date('Y-m-d') : $model->reserve_edate,
                            'class' => 'form-control',
                        ],
                        'pluginOptions' => [
                            'language' => 'th',
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd',
                            'todayHighlight' => true
                        ]
                    ]
                )->label('ถึงวันที่') ?>
            </div>

            <div class="col-md-4">            

                <?= $form->field($model, 'reserve_stime')->widget(
                        TimePicker::classname(), [
                            'name' => 'tpSTime', 
                            'options' => [
                                'value' => $model->isNewRecord ? date('08:00') : $model->reserve_stime,
                            ],                             
                            'pluginOptions' => [
                                'showSeconds' => false,
                                'showMeridian' => false,
                                'minuteStep' => 1,
                                'secondStep' => 5
                            ]
                        ]
                )->label('เวลาเริ่ม') ?>

                <?= $form->field($model, 'reserve_etime')->widget(
                        TimePicker::classname(), [
                            'name' => 'tpETime',
                            'options' => [
                                'value' =>  $model->isNewRecord ? date('16:00') : $model->reserve_etime,
                            ],  
                            'pluginOptions' => [
                                'showSeconds' => false,
                                'showMeridian' => false,
                                'minuteStep' => 1,
                                'secondStep' => 5
                            ]
                        ]
                )->label('ถึงเวลา') ?>

            </div>
        </div><!--/.row -->

        <div class="row">
            <div class="col-md-8">

                <?= $form->field($model, 'reserve_remark')->textarea(['rows' => 6])->label('หมายเหตุ') ?>
                
                <?php // Set textInput options
                    $budgetOptions = ['maxlength' => true]; 
                    if ($model->isNewRecord) {
                        $budgetOptions = array_merge($budgetOptions, ['value' => '0']);
                    }
                ?>
                <?= $form->field($model, 'reserve_budget')
                        ->textInput($budgetOptions)
                        ->label('งบประมาณ') ?>
                
                <?php  // Set textInput options
                    $ratOptions = ['maxlength' => true];
                    if ($model->isNewRecord) {
                        $ratOptions = array_merge($ratOptions, ['value' => '0']);
                    }
                ?>
                <?= $form->field($model, 'reserve_pay_rate')
                        ->textInput($ratOptions)
                        ->label('อัตราค่าห้องประชุม') ?>
                
                <?php  // Set textInput options
                    $priceOptions = ['maxlength' => true]; 
                    if ($model->isNewRecord) {
                        $priceOptions = array_merge($priceOptions, ['value' => '0']);
                    }
                ?>
                <?= $form->field($model, 'reserve_pay_price')
                        ->textInput($priceOptions)
                        ->label('รวมค่าห้องประชุม') ?>
                
            </div>

            <div class="col-md-4">

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">

                                <?= $form->field($model, 'reserve_equipment')
                                        ->checkBoxList(ArrayHelper::map(
                                                RoomEquipment::find()->All(), 
                                                'equipment_id', 'equipment_name'
                                        ))
                                        ->label('อุปกรณ์') ?>
                            
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div><!--/.row -->


        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <div class="col-xs-5 col-sm-3 col-md-3"></div>
                    <div class="col-xs-7 col-sm-9 col-md-9">

                        <?= Html::submitButton(
                            $model->isNewRecord ? 'บันทึก' : 'แก้ไข', 
                            ['class' => ($model->isNewRecord ? 'btn btn-success' : 'btn btn-primary')]
                        ) ?>
                        
                    </div>
                </div>
            </div>
        </div><!--/.row --> 
        
        <?= (Yii::$app->user->identity->person_username == 'admin') ?
            $form->field($model, 'reserve_user')->textInput()->label('ผู้จอง') :
            $form->field($model, 'reserve_user')
                        ->hiddenInput(['value' => Yii::$app->user->identity->person_id])
                        ->label(false);
        ?>
        
        <?= $model->isNewRecord ? $form->field($model, 'reserve_status')
                        ->hiddenInput(['value' => '1'])
                        ->label(false) : '';
        ?>

    <?php ActiveForm::end(); ?>

</div>
