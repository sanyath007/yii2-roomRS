<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Room */

$this->title = 'เพิ่มห้องประชุม';
$this->params['breadcrumbs'][] = ['label' => 'Rooms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="room-create">

	<div class="panel panel">
         
        <div class="panel-body">
        	
		    <?= $this->render('_form', [
		        'model' => $model,
		        'initialPreview' => [],
		        'initialPreviewConfig' => []
		    ]) ?>

    	</div>
    </div>
</div>
