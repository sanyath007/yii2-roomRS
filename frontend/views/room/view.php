<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Room */

$this->title = $model->room_id;
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลห้องประชุม', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="room-view">

    <div class="panel panel">
        
        <div class="panel-heading">            
            <h3><i class="fa fa-hospital-o"></i> ข้อมูลห้องประชุม (<?= Html::encode($this->title) ?>)</h3>
        </div> 
        <div class="panel-body">

            <p>
                <?= Html::a('Update', ['update', 'id' => $model->room_id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Delete', ['delete', 'id' => $model->room_id], [
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
                    'room_id',
                    'room_name',
                    'room_size',
                    'room_capacity',
                    'room_locate',
                    'room_contact_name',
                    'room_contact_tel',
                    'room_pay_rate',
                    'room_reserv_max',            
                    'room_detail:ntext',
                    'room_status',
                ],
            ]) ?>

            <div class="panel">
                <div class="panel-heading"><h3><i class="fa fa-picture-o"></i> ภาพประกอบ</h3></div>
                <div class="panel-body">

                    <!-- Widget Gallery -->
                    <?=dosamigos\gallery\Gallery::widget(['items' => $model->getThumbnails($model->room_id)]); ?>
                    <!-- Widget Gallery --> 

                    <!-- <div class="row">
                        <div class="col-xs-6 col-md-4">
                            <a href="#" class="thumbnail">
                                <img src="./img/<?=(($model->room_img1) ? $model->room_img1 : 'default-50x50.gif') ?>" alt="<?=$model->room_img1 ?>">
                            </a>

                            <?= $model->room_img1 ?>
                        </div>                        

                        <div class="col-xs-6 col-md-4">
                            <a href="#" class="thumbnail">
                                <img src="./img/<?=(($model->room_img2) ? $model->room_img2 : 'default-50x50.gif') ?>" alt="<?=$model->room_img1 ?>">
                            </a>

                            <?= $model->room_img1 ?>
                        </div>

                        <div class="col-xs-6 col-md-4">
                            <a href="#" class="thumbnail">
                                <img src="./img/<?=(($model->room_img3) ? $model->room_img3 : 'default-50x50.gif') ?>" alt="<?=$model->room_img1 ?>">
                            </a>

                            <?= $model->room_img1 ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-6 col-md-4">
                            <a href="#" class="thumbnail">
                                <img src="./img/<?=(($model->room_img4) ? $model->room_img4 : 'default-50x50.gif') ?>" alt="<?=$model->room_img1 ?>">
                            </a>

                            <?= $model->room_img1 ?>
                        </div>

                        <div class="col-xs-6 col-md-4">
                            <a href="#" class="thumbnail">
                                <img src="./img/<?=(($model->room_img5) ? $model->room_img5 : 'default-50x50.gif') ?>" alt="<?=$model->room_img1 ?>">
                            </a>

                            <?= $model->room_img1 ?>
                        </div>

                        <div class="col-xs-6 col-md-4">
                            <a href="#" class="thumbnail">
                                <img src="/img/<?=(($model->room_img6) ? $model->room_img6 : 'default-50x50.gif') ?>" alt="<?=$model->room_img1 ?>">
                            </a>

                            <?= $model->room_img1 ?>
                        </div>

                    </div> -->
                </div>
            </div>

        </div>
    </div>

</div>
