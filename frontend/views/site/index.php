<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\JsExpression;

$this->title = 'ปฎิทินการใช้ห้อง';
$this->params['breadcrumbs'][] = ['label' => 'หน้าหลัก', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-index">

    <div class="panel panel">
        <div class="panel-heading"><h3><i class="fa fa-calendar"></i> <?= Html::encode($this->title) ?></h3></div>
        <div class="panel-body">
            
            <?= \yii2fullcalendar\yii2fullcalendar::widget([
                'options' => [
                    'lang' => 'th'
                ],
                //'events' => $events, /** Inject events array into event data */
                'ajaxEvents' => Url::to(['/reservation/ajaxjsoncalendar']), /** Use and inject events source into event data */
                'clientOptions' => [
                    'eventClick' => new JsExpression('function(eventObj, jsEvent, view) {
                        alert(JSON.stringify(eventObj));
                        if(eventObj.url){
                            window.open(eventObj.url);
                            return false;
                        }
                    }'),
                    'eventMouseover' => new JsExpression('function(eventObj, jsEvent, view){                        
                        /** Set the value and open the JQuery Modal */
                        //$("#eventInfo").html(eventObj.description);
                        //$("#eventLink").attr("href", eventObj.url);
                        //$("#eventContent").dialog({ modal: true, title: eventObj.title });

                        /** Set the value and open the Bootstrap Modal */
                        //$("#modalTitle").html(eventObj.title);
                        $("#modalBody").html(eventObj.description);
                        //$("#eventUrl").attr("href", eventObj.url);
                        $("#fullCalModal").modal();
                    }')
                ]
            ]); ?>

        </div>
    </div>

    <!-- Modal -->
    <!-- <div id="eventContent" title="Event Details">
        <div id="eventInfo"></div>
        <p><strong><a id="eventLink" target="_blank">Read More</a></strong></p>
    </div> -->

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
