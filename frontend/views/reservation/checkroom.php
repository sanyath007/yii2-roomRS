<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\web\JsExpression;
use yii2fullcalendar\yii2fullcalendar;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ReservationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ตรวจสอบห้องว่าง';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reservation-index">

    <div class="panel panel">
        <div class="panel-heading"><h3><i class="fa fa-calendar"></i> <?= Html::encode($this->title) ?></h3></div>
        <div class="panel-body">

            <?php echo $this->render('_check', ['model' => $searchModel]); ?>
            
            <div class="row">
                <div class="col-md-12">
                    <?= yii2fullcalendar::widget([
                        'options' => [
                            'lang' => 'th'
                        ],
                        'events' => $events, /** Inject events array into event data */
                        'clientOptions' => [
                            'eventClick' => new JsExpression('function(eventObj, jsEvent, view) {
                                if(eventObj.url){
                                    window.open(eventObj.url);
                                    return false;
                                }
                            }'),
                            'eventMouseover' => new JsExpression('function(eventObj, jsEvent, view){
                                /** Set the value and open the Bootstrap Modal */
                                $("#modalBody").html(eventObj.description);
                                $("#fullCalModal").modal();
                            }')
                        ]                        
                    ]); ?>

                </div>
            </div><br>

            <?=
            GridView::widget([
                'dataProvider' => $dataProvider,
                //'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        'format' => 'raw',
                        'label' => 'สถานะ',
                        'value' => function($model) {
                            if ($model->reserve_status == '1') {
                                $cssClass = 'btn btn-primary';
                            } else if ($model->reserve_status == '2') {
                                $cssClass = 'btn btn-info';
                            } else if ($model->reserve_status == '3') {
                                $cssClass = 'btn btn-success';
                            } else {
                                $cssClass = 'btn btn-danger';
                            }

                            return Html::button($model->reserveStatus[0]['reserve_status_name'], [
                                'class' => $cssClass
                            ]);
                        },
                                'contentOptions' => ['style' => 'text-align: center;']
                            ],
                            [
                                'label' => 'เลขที่จอง',
                                'value' => function($model) {
                                    return $model->reserve_id;
                                },
                            ],
                            [
                                'label' => 'วันที่ใช้ห้อง',
                                'format' => 'html',
                                'value' => function($model) {
                                    return "จาก " . Yii::$app->thaiFormatter->asDate($model->reserve_sdate, 'short') . ' ' .
                                            '(' . Yii::$app->thaiFormatter->asTime($model->reserve_stime, 'short') . ")<br>" .
                                            "ถึง " . Yii::$app->thaiFormatter->asDate($model->reserve_edate, 'short') . ' ' .
                                            '(' . Yii::$app->thaiFormatter->asTime($model->reserve_etime, 'short') . ')';
                                },
                            ],
                            [
                                'label' => 'ห้องประชุม / หัวข้อการประชุม / จำนวนผู้เข้าประชุม',
                                'format' => 'html',
                                'value' => function($model) {
                                    return "<b>" . $model->room[0]['room_name'] . "</b><br>" .
                                            "<b>หัวข้อการประชุม :</b> " . $model->reserve_topic . "<br>" .
                                            "<b>จำนวนผู้เข้าประชุม :</b> " . $model->reserve_att_num . ' ราย';
                                },
                            ],
                            [
                                'label' => 'ผู้จอง',
                                'value' => function($model) {
                                    return 'คุณ' . $model->reserveUser[0]['person_firstname'];
                                }
                            ],
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'contentOptions' => ['style' => 'width: 8.7%'],
                                'visible' => Yii::$app->user->isGuest ? false : true,
                                'template' => '{view}',
                                'buttons' => [
                                    'view' => function ($url, $model) {
                                        $t = ["reservation/view", "id" => $model->reserve_id];
                                        return Html::a('<i class="fa fa-search" aria-hidden="true"></i>', Url::to($t), [
                                                    'class' => 'btn btn-info',
                                                    'id' => 'btnCancel',
                                        ]);
                                    }
                                        ],
                                        'contentOptions' => ['style' => 'text-align: center;']
                                    ],
                                ],
                            ]);
                            ?>

        </div>
    </div>
    
    <div id="fullCalModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">×</span> 
                        <span class="sr-only">close</span>
                    </button>
                    <h4 id="modalTitle" class="modal-title">รายละเอียดกิจกรรม</h4>
                </div>
                <div id="modalBody" class="modal-body"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <!-- <button class="btn btn-primary"><a id="eventUrl" target="_blank">Event Page</a></button> -->
                </div>
            </div>
        </div>
    </div>
</div>
