<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Room */

$this->title = 'แก้ไขห้องประชุม: ' . ' ' . $model->room_id;
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลห้องประชุม', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->room_id, 'url' => ['view', 'id' => $model->room_id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="room-update">    
    <div class="panel panel">        
        <div class="panel-body">
            
            <?= $this->render('_form', [
		'model' => $model,
		'initialPreview' => $roomImg[0],
		'initialPreviewConfig' => $roomImg[1]
            ]) ?>
		    
	</div>
    </div>
</div>
