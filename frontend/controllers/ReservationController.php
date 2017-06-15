<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Room;
use common\models\RoomUploads;
use common\models\ReserveLayout;
use common\models\Reservation;
use common\models\Department;
use frontend\models\ReservationSearch;

/**
 * ReservationController implements the CRUD actions for Reservation model.
 */
class ReservationController extends Controller {

    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Reservation models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new ReservationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->setSort([
            'defaultOrder' => ['reserve_sdate' => SORT_DESC]
        ]);
        $dataProvider->pagination->pageSize = 5;
        
        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionCheckroom() {
        $searchModel = new ReservationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->setSort([
            'defaultOrder' => ['reserve_sdate' => SORT_DESC]
        ]);
        $dataProvider->pagination->pageSize = 5;
        
        // Generate calendar event data
        $reservations = $dataProvider->models;
        if ($reservations) {
            foreach ($reservations as $reserve) {
                $Event = new \yii2fullcalendar\models\Event();
                $Event->id = $reserve->reserve_id;
                $Event->title = $reserve->reserve_topic;
                $Event->start = $reserve->reserve_sdate . ' ' . $reserve->reserve_stime;
                $Event->end = $reserve->reserve_edate . ' ' . $reserve->reserve_etime;
                $Event->description = '<b>หัวข้อประชุม : </b>' . $reserve->reserve_topic . '<br>';
                $Event->description .= '<b>เริ่ม : </b>' . $reserve->reserve_stime . '<br>';
                $Event->description .= '<b>สิ้นสุด : </b>' . $reserve->reserve_etime . '<br>';
                $Event->description .= '<b>จำนวนผู้ประชุม : </b>' . $reserve->reserve_att_num . '<br>';
                $Event->description .= '<b>ห้องประชุม : </b>' . $reserve->room[0]['room_name'] . '<br>';
                $Event->description .= '<b>ผู้จอง : </b>' . $reserve->reserveUser[0]['person_firstname'] . '  ' . $reserve->reserveUser[0]['person_lastname'];
                $Event->color = $reserve->room[0]['room_color'];
                $events[] = $Event;
            }
        }
        
        return $this->render('checkroom', [
                'searchModel'   => $searchModel,
                'dataProvider'  => $dataProvider,
                'events'        => $events,
        ]);
    }

    public function actionCancel() {
        $searchModel = new ReservationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        if (!Yii::$app->request->queryParams['ReservationSearch']) {
            $dataProvider->query->where(['reserve_status' => '3']);
        }
        
        $dataProvider->pagination->pageSize = 5;
        
        return $this->render('cancel', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionAjaxupstatus($id, $status) {
        if (!empty($id || $status)) {
            $model = $this->findModel($id);
            $model->equipment2Array();            
            $model->reserve_status = $status;
            if ($model->save()) {
                return 'Successfully';
            }   
        } else {
            return 'Fail';
        }
    }
    
    public function actionAjaxcancel($id) {
        if (!empty($id)) {
            $model = $this->findModel($id);
            $model->equipment2Array();            
            $model->reserve_status = '6';
            if ($model->save()) {
                return 'Successfully';
            }   
        } else {
            return 'Fail';
        }
    }

    /**
     * Displays a single Reservation model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Reservation model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Reservation();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->reserve_id]);
        } else {
            $roomImg = RoomUploads::find()->where(['room_id' => '1','is_default' => '1'])->all();
            return $this->render('create', [
                        'model' => $model,
                        'roomImg'  => '1/thumbnail/' . $roomImg[0]['real_filename'],
            ]);
        }
    }

    /**
     * Updates an existing Reservation model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $model->equipment2Array();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->reserve_id]);
        } else {
            $roomImg = RoomUploads::find()->where(['room_id' => $model['reserve_room'],'is_default' => '1'])->all();
            return $this->render('update', [
                        'model' => $model,
                        'roomImg'  => $model['reserve_room'] . '/thumbnail/' . $roomImg[0]['real_filename'],
            ]);
        }
    }

    /**
     * Deletes an existing Reservation model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    
//    public function actionPrint($id) {
//        return $this->redirect('print', [
//            'model' => $this->findModel($id),
//        ]);
//    }
    
    /**
     * Finds the Reservation model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Reservation the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Reservation::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionAjaximage($tbl, $id) {
        if ($tbl == 'Room') {
            $room   = Room::findOne($id);
            $roomImg = RoomUploads::find()->where(['room_id' => $room['room_id'],'is_default' => '1'])->all();            
            return '<img src="./uploads/rooms/' . $room['room_id'] . '/thumbnail/' . $roomImg[0]['real_filename']. '" alt="' . $roomImg[0]['real_filename'] . '">';
        } else if ($tbl == 'ReserveLayout') {
            $layout = ReserveLayout::findOne($id);
            return '<img src="./img/layouts/' . $layout->reserve_layout_img . '" alt="' . $img . '">';
        }
    }

    public function actionAjaxjsoncalendar($start = NULL, $end = NULL, $_ = NULL) {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $reservations = Reservation::find()
                //->joinWith('room')
                ->where(['between', 'reserve_sdate', $start, $end])
                ->andWhere(['<>', 'reserve_status', '6'])
                ->all();

        if ($reservations) {
            foreach ($reservations as $reserve) {
                $Event = new \yii2fullcalendar\models\Event();
                $Event->id = $reserve->reserve_id;
                $Event->title = $reserve->reserve_topic;
                $Event->start = $reserve->reserve_sdate . ' ' . $reserve->reserve_stime;
                $Event->end = $reserve->reserve_edate . ' ' . $reserve->reserve_etime;
                $Event->description = '<b>หัวข้อประชุม : </b>' . $reserve->reserve_topic . '<br>';
                $Event->description .= '<b>เริ่ม : </b>' . $reserve->reserve_stime . '<br>';
                $Event->description .= '<b>สิ้นสุด : </b>' . $reserve->reserve_etime . '<br>';
                $Event->description .= '<b>จำนวนผู้ประชุม : </b>' . $reserve->reserve_att_num . '<br>';
                $Event->description .= '<b>ห้องประชุม : </b>' . $reserve->room[0]['room_name'] . '<br>';
                $Event->description .= '<b>ผู้จอง : </b>' . $reserve->reserveUser[0]['person_firstname'] . '  ' . $reserve->reserveUser[0]['person_lastname'];
                $Event->color = $reserve->room[0]['room_color'];
                $events[] = $Event;
            }
        }

        return $events;
    }
    
    public function actionAjaxdepart($faction)
    {
        if (Yii::$app->request->isAjax) {
            $departments = Department::find()->where(['faction_id' => $faction])->all();  
            
            $html = '<option value="">--- กรุณาเลือก ---</option>';
            foreach($departments as $dept)
            {
                $html .= '<option value="' . $dept->depart_id . '">' . $dept->depart_name . '</option>';
            }
        
            return $html;
        }
    }
    
    public function actionAjaxchkroom($room, $sdate, $stime, $edate, $etime)
    {
        if (Yii::$app->request->isAjax) {
            $model = Reservation::find()
                        ->where(['reserve_room' => $room])  
                        ->andWhere(['between', 'reserve_sdate', $sdate, $edate])
                        ->andWhere(['between', 'reserve_stime', $stime, $etime])->all();
//            print_r($model);
            return (!$model) ? '1' : '0';
//            [
//                'status' => '1',
//                'msg'   => 'Successfully'
//            ] : [
//                'status' => '0',
//                'msg'   => 'Room not empty'
//            ];
        }
    }
    
}
