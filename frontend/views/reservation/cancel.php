<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ReservationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ยกเลิกการจองห้อง';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reservation-index">
    
    <div class="panel panel">
        <div class="panel-heading"><h3><i class="fa fa-calendar"></i> <?= Html::encode($this->title) ?></h3></div>
        <div class="panel-body">
            
            <?php echo $this->render('_search', ['model' => $searchModel]); ?>

            <div class="alert alert-info" role="alert">
                <i class="fa fa-info-circle" aria-hidden="true"></i>
                สามารถยกเลิกได้เฉพาะรายการที่อนุมัติแล้วเท่านั้น
            </div>

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

                            return Html::tag('span',
                                $model->reserveStatus[0]['reserve_status_name'],
                                ['class' => $cssClass]
                            );
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
                        'template' => '{cancel}',
                        'buttons' => [
                            'cancel'=>function ($url, $model) {
                                $t = 'index.php?r=site/view&id='.$model->reserve_id;
                                return (!Yii::$app->user->isGuest && (Yii::$app->user->identity->person_id == $model->reserve_user || Yii::$app->user->identity->person_id == '1300200009261' || Yii::$app->user->identity->person_id == '1309900221813')) ? 
                                    Html::button('ยกเลิก', [
                                        'value' => Url::to($t), 
                                        'class' => 'btn btn-danger', 
                                        'id' => 'btnCancel',
                                        'onclick' => new yii\web\JsExpression('$.get(
                                            "'. Yii::$app->urlManager->createUrl(["reservation/ajaxcancel", "id" => $model->reserve_id]) .'", 
                                            {}, 
                                            function(data){
                                                alert(data);
                                                location.reload();
                                            }
                                        )'),
                                    ]) : '';
                            }
                        ],
                    ],
                ]
            ]); ?>

        </div>
    </div>
</div>
