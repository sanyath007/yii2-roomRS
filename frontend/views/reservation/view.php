<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Reservation */

$this->title = $model->reserve_id;
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลการจองห้อง', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reservation-view">

   <div class="panel panel">
        <div class="panel-heading"><h3><i class="fa fa-calendar"></i> <?= Html::encode($this->title) ?></h3></div>
        <div class="panel-body">
            
            <p>
                <?php $chkStatus = in_array($model->reserve_status, ['3', '4', '5', '6']); ?>
                <?php if (!Yii::$app->user->isGuest && $chkStatus == '' && (Yii::$app->user->identity->person_id == $model->reserve_user || Yii::$app->user->identity->person_id == '1300200009261' || Yii::$app->user->identity->person_id == '1309900221813')) : ?>
                    <?= Html::a('<i class="fa fa-pencil-square-o" aria-hidden="true"></i> แก้ไข', [
                            'update', 
                            'id' => $model->reserve_id
                        ], [
                            'class' => 'btn btn-primary'
                        ]
                    ) ?>
                    <?= Html::a('<i class="fa fa-times" aria-hidden="true"></i> ลบ', [
                            'delete', 
                            'id' => $model->reserve_id
                        ], [
                            'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => 'Are you sure you want to delete this item?',
                                'method' => 'post',
                            ],
                        ]
                    ) ?>

                    <a href="print/print.php?id=<?=$model->reserve_id ?>" class="btn btn-warning" target="_blank">
                        <i class="fa fa-print" aria-hidden="true"></i> พิมพ์
                    </a>
                <?php endif; ?>
            </p>

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    [
                        'label' => 'รหัส',
                        'value' => $model->reserve_id,            
                        'contentOptions' => ['class' => 'bg-red'],     // HTML attributes to customize value tag
                        'captionOptions' => ['tooltip' => 'Tooltip'],  // HTML attributes to customize label tag
                    ],
                    [
                        'label' => 'วันที่จอง',
                        'value' => $model->created_at,            
                        'contentOptions' => ['class' => 'bg-red'],     // HTML attributes to customize value tag
                        'captionOptions' => ['tooltip' => 'Tooltip'],  // HTML attributes to customize label tag
                    ],
                    [
                        'label' => 'หัวข้อการประชุม',
                        'value' => $model->reserve_topic,            
                        'contentOptions' => ['class' => 'bg-red'],     // HTML attributes to customize value tag
                        'captionOptions' => ['tooltip' => 'Tooltip'],  // HTML attributes to customize label tag
                    ],
                    [
                        'label' => 'ประเภทการประชุม',
                        'value' => $model->activityType[0]['activity_type_name'],            
                        'contentOptions' => ['class' => 'bg-red'],     // HTML attributes to customize value tag
                        'captionOptions' => ['tooltip' => 'Tooltip'],  // HTML attributes to customize label tag
                    ], 
                    [
                        'label' => 'จำนวนผู้เข้าร่วมประชุม',
                        'value' => $model->reserve_att_num,            
                        'contentOptions' => ['class' => 'bg-red'],     // HTML attributes to customize value tag
                        'captionOptions' => ['tooltip' => 'Tooltip'],  // HTML attributes to customize label tag
                    ],  
                    [
                        'label' => 'วันที่เริ่ม',
                        'value' => $model->reserve_sdate . ' ' . $model->reserve_stime,            
                        'contentOptions' => ['class' => 'bg-red'],     // HTML attributes to customize value tag
                        'captionOptions' => ['tooltip' => 'Tooltip'],  // HTML attributes to customize label tag
                    ],
                    [
                        'label' => 'ถึงวันที่',
                        'value' => $model->reserve_edate . ' ' . $model->reserve_etime,            
                        'contentOptions' => ['class' => 'bg-red'],     // HTML attributes to customize value tag
                        'captionOptions' => ['tooltip' => 'Tooltip'],  // HTML attributes to customize label tag
                    ],
                    [
                        'label' => 'ห้องประชุม',
                        'value' => $model->room[0]['room_name'],            
                        'contentOptions' => ['class' => 'bg-red'],     // HTML attributes to customize value tag
                        'captionOptions' => ['tooltip' => 'Tooltip'],  // HTML attributes to customize label tag
                    ],
                    [
                        'label' => 'ผู้จอง',
                        'value' => 'คุณ' . $model->reserveUser[0]['person_firstname'] . '  ' . $model->reserveUser[0]['person_lastname'],            
                        'contentOptions' => ['class' => 'bg-red'],     // HTML attributes to customize value tag
                        'captionOptions' => ['tooltip' => 'Tooltip'],  // HTML attributes to customize label tag
                    ],
                    [
                        'label' => 'กลุ่มงาน',
                        'value' => $model->reserveDepart[0]['depart_name'],            
                        'contentOptions' => ['class' => 'bg-red'],     // HTML attributes to customize value tag
                        'captionOptions' => ['tooltip' => 'Tooltip'],  // HTML attributes to customize label tag
                    ],
                    [
                        'attribute' => 'reserve_status',
                        'format'    => 'raw',
                        'label' => 'สถานะการจอง',
                        'value' => viewStatus($model),          
//                        'contentOptions' => ['class' => 'bg-red'],     // HTML attributes to customize value tag
//                        'captionOptions' => ['tooltip' => 'Tooltip'],  // HTML attributes to customize label tag
                    ],
//                    'reserve_comment:ntext',
//                    'reserve_remark:ntext',
//                    'reserve_pay_rate',
//                    'reserve_pay_price',
//                    'reserve_layout',
                ],
            ]) ?>

        </div>
    </div>
</div>

<?php 
function viewStatus($model)
{
    if($model->reserve_status=='1'){
        $cssClass = 'btn btn-primary';
    } else if ($model->reserve_status == '2') {
        $cssClass = 'btn btn-info';
    } else if ($model->reserve_status == '3') {
        $cssClass = 'btn btn-success';
    } else {
        $cssClass = 'btn btn-danger';
    }

    return Html::button($model->reserveStatus[0]['reserve_status_name'], [
        'class' => $cssClass,
    ]);
}
?>
