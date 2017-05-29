<?php

use yii\helpers\Html;
?>

<div class="box box-default">
	<div class="box-header with-border">
		<h3><?= Html::encode($model['room_name']); ?></h3>
	</div>
	<div class="box-body">
            <div class="row">
		<div class="col-md-9 pull-left">
			<div class="row">
			  	<div class="col-xs-6 col-md-4">
                                    
			    	<!-- Widget Gallery -->
                                    <?=dosamigos\gallery\Gallery::widget(['items' => $model->getThumbnails($model->room_id, 1)]); ?>
                                <!-- Widget Gallery --> 
			  	
                                </div>
			  	<div class="col-md-8">
				  	<p>ความจุ : <?=$model['room_capacity'];?></p>
				  	<p>ที่ตั้ง : <?=$model['room_locate'];?></p>
				  	<p>อัตราค่าบริการ : <?=$model['room_pay_rate'];?></p>
				</div>
			</div>	
	   	</div>

		<div class="col-md-3 pull-right">

			<?= Html::a(
				'<span class="glyphicon glyphicon-search" aria-hidden="true"></span>',
				['room/view', 'id' => $model['room_id']],
				['class' => 'btn btn-info']
			); ?>
			
			<?php // if(!Yii::$app->user->isGuest): ?>

				<?= Html::a(
					'<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>',
					['room/update', 'id' => $model['room_id']],
					['class' => 'btn btn-warning']
				); ?>

				<?= Html::a(
					'<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>',
					['room/delete', 'id' => $model['room_id']],
					['class' => 'btn btn-danger']
				); ?>

			<?php // endif; ?>

		</div>
            </div>
	</div>
</div>
	