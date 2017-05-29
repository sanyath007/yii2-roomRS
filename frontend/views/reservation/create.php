<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Reservation */

$this->title = 'จองใช้ห้อง';
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลการจองห้อง', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reservation-create">

    <div class="panel panel">
        <div class="panel-heading"><h3><i class="fa fa-cart-plus"></i> <?= Html::encode($this->title) ?></h3></div>
        <div class="panel-body">

		    <?= $this->render('_form', [
		        'model' => $model,
                        'roomImg' => $roomImg,
		    ]) ?>
    
    	 </div>
    </div>
</div>
