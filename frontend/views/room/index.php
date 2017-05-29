<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\RoomSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ข้อมูลห้องประชุม';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="room-index">

    <div class="panel panel">
        
        <div class="panel-heading">            
            <h3><i class="fa fa-hospital-o"></i> <?= Html::encode($this->title) ?></h3>
        </div> 
        <div class="panel-body">
           
            <?= Html::a('<i class="fa fa-plus" aria-hidden="true"></i> เพิ่มข้อมูล', ['create'], ['class' => 'btn btn-success']) ?>

            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
           
            <?= ListView::widget([
                'dataProvider'  => $dataProvider,
                'options'       => [
                    'tag'       => 'div',
                    'class'     => 'list-wrapper',
                    'id'        => 'list-wrapper',
                ],
                'layout'        => "{items}\n{pager}",
                //'itemOptions'   => ['class' => 'item'],
                'itemView'      => function($model, $key, $index, $widget){
                    return $this->render('_list_item', ['model' => $model]);
                },
                'pager'         => [
                    'firstPageLabel' => 'First',
                    'lastPageLabel'  => 'Last',
                    'nextPageLabel'  => '<span class="glyphicon glyphicon-chevron-right"></span>',
                    'prevPageLabel'  => '<span class="glyphicon glyphicon-chevron-left"></span>',
                    'maxButtonCount' => 5,
                    'options'   => [
                        'class' => 'pagination col-xs-12'
                    ]
                ]
            ]); ?>

        </div>
    </div>
</div>
