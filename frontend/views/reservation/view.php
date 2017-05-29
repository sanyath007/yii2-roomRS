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
                <?= Html::a('Update', ['update', 'id' => $model->reserve_id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Delete', ['delete', 'id' => $model->reserve_id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
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
