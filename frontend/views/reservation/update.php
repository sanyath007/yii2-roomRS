<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Reservation */

$this->title = 'แก้ไขข้อมูลการจองใช้ห้อง: ' . ' ' . $model->reserve_id;
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลการจองห้อง', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->reserve_id, 'url' => ['view', 'id' => $model->reserve_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="reservation-update">

	<div class="panel panel">
        <div class="panel-heading"><h3><i class="fa fa-calendar"></i> <?= Html::encode($this->title) ?></h3></div>
        <div class="panel-body">

		    <?= $this->render('_form', [
		        'model' => $model,
                        'roomImg' => $roomImg,
		    ]) ?>

    	</div>
    </div>
</div>
