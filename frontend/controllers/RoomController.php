<?php

namespace frontend\controllers;

use Yii;
use common\models\Room;
use common\models\RoomUploads;
use frontend\models\RoomSearch;
use yii\filters\VerbFilter;
use yii\helpers\BaseFileHelper;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

/**
 * RoomController implements the CRUD actions for Room model.
 */
class RoomController extends Controller
{
    public function behaviors()
    {
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
     * Lists all Room models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel    = new RoomSearch();
        $dataProvider   = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Room model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model  = $this->findModel($id);
        
        return $this->render('view', [
            'model'     => $model,
        ]);
    }

    /**
     * Creates a new Room model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Room();

        if ($model->load(Yii::$app->request->post())) {
//            $file1 = UploadedFile::getInstance($model, 'img1');
//            $file2 = UploadedFile::getInstance($model, 'img2');
//            $file3 = UploadedFile::getInstance($model, 'img3');
//            $file4 = UploadedFile::getInstance($model, 'img4');
//            $file5 = UploadedFile::getInstance($model, 'img5');
//            $file6 = UploadedFile::getInstance($model, 'img6');
//
//            if($file1){
//                $model->room_img1 = $file1->name;
//                $file1->saveAs('img/rooms/' . $file1->name);
//            }
//
//            if($file2){
//                $model->room_img2 = $file2->name;
//                $file1->saveAs('img/rooms/' . $file2->name);
//            }
//
//            if($file3){
//                $model->room_img3 = $file3->name;
//                $file1->saveAs('img/rooms/' . $file3->name);
//            }
//
//            if($file4){
//                $model->room_img4 = $file4->name;
//                $file1->saveAs('img/rooms/' . $file4->name);
//            }
//
//            if($file5){
//                $model->room_img5 = $file5->name;
//                $file1->saveAs('img/rooms/' . $file5->name);
//            }
//         
//            if($file6){
//                $model->room_img6 = $file6->name;
//                $file1->saveAs('img/rooms/' . $file6->name);
//            }

            $model->save();
            return $this->redirect(['view', 'id' => $model->room_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Room model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $roomImg = $this->getInitialPreview($model->room_id);
        
        if ($model->load(Yii::$app->request->post())) {
//            $file1 = UploadedFile::getInstance($model, 'img1');
//            $file2 = UploadedFile::getInstance($model, 'img2');
//            $file3 = UploadedFile::getInstance($model, 'img3');
//            $file4 = UploadedFile::getInstance($model, 'img4');
//            $file5 = UploadedFile::getInstance($model, 'img5');
//            $file6 = UploadedFile::getInstance($model, 'img6');
//
//            if($file1){
//                $model->room_img1 = $file1->name;
//                $file1->saveAs('img/rooms/' . $file1->name);
//            }
//
//            if($file2){
//                $model->room_img2 = $file2->name;
//                $file2->saveAs('img/rooms/' . $file2->name);
//            }
//
//            if($file3){
//                $model->room_img3 = $file3->name;
//                $file3->saveAs('img/rooms/' . $file3->name);
//            }
//
//            if($file4){
//                $model->room_img4 = $file4->name;
//                $file4->saveAs('img/rooms/' . $file4->name);
//            }
//
//            if($file5){
//                $model->room_img5 = $file5->name;
//                $file5->saveAs('img/rooms/' . $file5->name);
//            }
//         
//            if($file6){
//                $model->room_img6 = $file6->name;
//                $file6->saveAs('img/rooms/' . $file6->name);
//            }

            $model->save();
            return $this->redirect(['view', 'id' => $model->room_id]);
        } else {
            return $this->render('update', [
                'model'     => $model,
                'roomImg'   => $roomImg,
            ]);
        }
    }

    /**
     * Deletes an existing Room model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id);

        //remove upload file
        $this->removeUploadDir($model->room_id);
        RoomUploads::deleteAll(['room_id' => $model->room_id]);

        //delete record
        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Room model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Room the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Room::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionDeleteAjax()
    {
        $model = RoomUploads::findOne(Yii::$app->request->post('key'));
        
        if($model !== NULL){
            $filename = Room::getUploadPath() . $model->room_id . '/' . $model->real_filename;
            $thumbnail = Room::getUploadPath() . $model->room_id . '/thumbnail/' . $model->real_filename;

            if($model->delete()){
                @unlink($filename);
                @unlink($thumbnail);

                echo json_encode(['success' => 'true']);
            } else {
                echo json_encode(['success' => 'false']);
            }
        } else {
            echo json_encode(['success' => 'false']);
        }
    }

    public function actionUploadAjax()
    {
        $this->uploads(true);
    }

    private function uploads($isAjax=false)
    {
        if(Yii::$app->request->isPost){
            $images = UploadedFile::getInstancesByName('upload_ajax');

            if($images){
                if($isAjax===true){
                    $ref = Yii::$app->request->post('room_id');
                }else{
                    $freelance = Yii::$app->request->post('freelance');
                    $ref = $freelance['ref'];
                }

                $this->CreateDir($ref);

                foreach ($images as $file) {
                    $fileName = $file->baseName . '.' . $file->extension;
                    $realFileName = md5($file->baseName.time()) . '.' . $file->extension;
                    $savePath = Room::UPLOAD_FOLDER . '/' . $ref . '/' . $realFileName;
                    
                    if($file->saveAs($savePath)){
                        if($this->isImage($savePath)){
                            $this->createThumbnail($ref, $realFileName);
                        }

                        $model = new RoomUploads;
                        $model->room_id = $ref;
                        $model->file_name = $fileName;
                        $model->real_filename = $realFileName;
                        $model->save();

                        if($isAjax===true){
                            echo json_encode(['success' => 'true']);
                        }
                    } else {
                        if($isAjax===true){
                            echo json_encode([
                                'success' => 'false', 
                                'error' => $file->error
                            ]);
                        }
                    }
                }
            }
        }
    }

    private function getInitialPreview($ref)
    {
        $datas = RoomUploads::find()->where(['room_id' => $ref])->all();
        $initialPreview = [];
        $initialPreviewConfig = [];

        foreach ($datas as $key => $value) {
            array_push($initialPreview, $this->getTempplatePreview($value));
            array_push($initialPreviewConfig, [
                'caption' => $value->file_name,
                'width' => '120px',
                'url' => Url::to(['/room/delefile-ajax']),
                'key' => $value->upload_id
            ]);
        }

        return [$initialPreview, $initialPreviewConfig];
    }

    public function isImage($filePath)
    {
        return @is_array(getimagesize($filePath)) ? true : false;
    }

    private function getTempplatePreview(RoomUploads $model)
    {
        $filePath = Room::getUploadUrl() . $model->room_id . '/thumbnail/' . $model->real_filename;
        $isImage = $this->isImage($filePath);

        if($isImage){
            $file = Html::img($filePath, [
                'class' => 'file-preview-image', 
                'alt' => $model->file_name, 
                'title' => $model->file_name
            ]);
        } else {
            $file = "<div class='file-preview-other'> " .
                    "<h2><i class='glyphicon glyphicon-file'></i></h2>" .
                    "</div>";
        }

        return $file;
    }

    private function createThumbnail($folderName, $fileName, $width=250)
    {
        $uploadPath = Room::getUploadPath() . $folderName;
        $file = $uploadPath . '/' . $fileName;
        
        $image = Yii::$app->image->load($file);
        $image->resize($width);
        $image->save($uploadPath . '/thumbnail/' . $fileName);

        return;
    }
    
    private function CreateDir($folderName)
    {
        if($folderName != NULL){
            $basePath = Room::getUploadPath();
            if(BaseFileHelper::createDirectory($basePath . $folderName,0777)){
                BaseFileHelper::createDirectory($basePath . $folderName . '/thumbnail',0777);
            }
        }
        return;
    }
    
    private function removeUploadDir($dir)
    {
        BaseFileHelper::removeDirectory(Room::getUploadPath() . $dir);
    }
}
