<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ReservationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ข้อมูลการจองห้อง';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reservation-index">
    
    <div class="panel panel">
        <div class="panel-heading"><h3><i class="fa fa-calendar"></i> <?= Html::encode($this->title) ?></h3></div>
        <div class="panel-body">
            
            <?php echo $this->render('_search', ['model' => $searchModel]); ?>

            <p>
                <?= Html::a('<i class="fa fa-plus" aria-hidden="true"></i> จองใช้ห้อง', ['create'], ['class' => 'btn btn-success']) ?>
            </p>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                //'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    [
                        'format' => 'raw',
                        'label' => 'สถานะ',
                        'value' => function($model){
                            if($model->reserve_status=='1'){
                                $cssClass = 'btn btn-primary';
                            } else if($model->reserve_status=='2'){
                                $cssClass = 'btn btn-info';
                            } else if($model->reserve_status=='3'){
                                 $cssClass = 'btn btn-success';
                            } else {
                                $cssClass = 'btn btn-danger';
                            }

                            return '<div class="btn-group">' . 
                                        Html::button(
                                            $model->reserveStatus[0]['reserve_status_name'],
                                            ['class' => $cssClass]
                                        ). 
                                        '<button type="button" class="' . $cssClass . ' dropdown-toggle" data-toggle="dropdown">
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li>                                                
                                                <a href="#">
                                                    <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                                                    อนุมัติ
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-thumbs-o-down" aria-hidden="true"></i>
                                                    ไม่อนุมัติ
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-hand-paper-o" aria-hidden="true"></i>
                                                    ยกเลิก
                                                </a>
                                            </li>
                                        </ul>
                                    </div>';
                        },
                        'contentOptions' => ['style' => 'text-align: center;']
                    ],
                    [
                        'label' => 'เลขที่จอง',
                        'value' => function($model){
                            return $model->reserve_id;
                        },                                
                    ],
                    [
                        'label' => 'วันที่ใช้ห้อง',
                        'format' => 'html',
                        'value' => function($model){
                            return "จาก " .Yii::$app->thaiFormatter->asDate($model->reserve_sdate, 'short'). ' ' . 
                                            '('.Yii::$app->thaiFormatter->asTime($model->reserve_stime, 'short'). ")<br>" .
                                    "ถึง " .Yii::$app->thaiFormatter->asDate($model->reserve_edate, 'short'). ' ' . 
                                            '('.Yii::$app->thaiFormatter->asTime($model->reserve_etime, 'short'). ')';
                        },
                    ],
                    [  
                        'label' => 'ห้องประชุม / หัวข้อการประชุม / จำนวนผู้เข้าประชุม',
                        'format' => 'html',
                        'value' => function($model){
                            return "<b>" .$model->room[0]['room_name']. "</b><br>" .
                                    "<b>หัวข้อการประชุม :</b> " .$model->reserve_topic. "<br>" .
                                    "<b>จำนวนผู้เข้าประชุม :</b> " .$model->reserve_att_num. ' ราย';
                        },
                    ],
                    [  
                        'label' => 'ผู้จอง',
                        'value' => function($model){
                            return 'คุณ' . $model->reserveUser[0]['person_firstname'];
                        }
                    ],
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'contentOptions' => ['style' => 'width: 8.7%'],
                        'visible' => Yii::$app->user->isGuest ? false : true,
                        'template' => '{view}',
                        'buttons' => [
                            'view'=>function ($url, $model) {
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
            ]); ?>

        </div>
    </div>
</div>
