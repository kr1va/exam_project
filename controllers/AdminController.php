<?php

namespace app\controllers;

use Yii;
use app\models\Item;
use app\models\itemSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


use yii\web\UploadedFile;

/**
 * AdminController implements the CRUD actions for item model.
 */
class AdminController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all item models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new itemSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $session = Yii::$app->session();
        if ( $session->get('user') == 'admin'){
            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }

    }

    /**
     * Displays a single item model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new item model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */

    public function actionCreate()
    {
        $model = new Item();

        if ($model->load(Yii::$app->request->post())) {
            $image = UploadedFile::getInstance($model, 'image');
            if ($image && $image->tempName) {
                $model->image = $image;
                if ($model->validate(['image'])) {
//                    $dir = Yii::getAlias('images'.$material_type);
                    $imageName = $model->image->baseName . '.' . $model->image->extension;
                    $model->image->saveAs('img/' . $imageName);
                    $model->img = $imageName; // без этого ошибка
                    $model->image = '/img/'.$imageName;
                   }
            }
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }


        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing item model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $current_image = $model->image;
//        $model->sections = explode(',', $model->sections);

        if ($model->load(Yii::$app->request->post())) {

            $image = UploadedFile::getInstance($model, 'image');
            if ($image && $image->tempName) {
                $model->image = $image;
                if ($model->validate(['file'])) {

                    if($model->del_img)
                    {
                        if(file_exists(Yii::getAlias('@webroot/img/'.$current_image)))
                        {
                            unlink(Yii::getAlias('@webroot/img/'.$current_image));
                            $model->image = '';
                        }
                    }

//                    $dir = Yii::getAlias('images/blog/'.$material_type);
                    $imageName = $model->image->baseName . '_' .time(). '.' . $model->image->extension;
                    $model->image->saveAs('img/'. $imageName);
                    $model->img = $imageName; // без этого ошибка
                    $model->image = '/img/'. $imageName;
                }
            }
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }

        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }


    /**
     * Deletes an existing item model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the item model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Item the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Item::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionSelect(){
        $session = Yii::$app->session();
        if ( $session->get('user') == 'admin')
        return $this->render('select');
//            return $this->render('index', [
//                'searchModel' => $searchModel,
//                'dataProvider' => $dataProvider,
//            ]
//        );
//        }

    }

//    public function actionUpload()
//    {
//        $upmodel = new UploadForm();
//
//        if (Yii::$app->request->isPost) {
//            $upmodel->imageFile = UploadedFile::getInstance($upmodel, 'imageFile');
//            if ($upmodel->upload()) {
//                // file is uploaded successfully
//                return;
//            }
//        }
//
//        return $this->render('upload', ['model' => $upmodel]);
//    }
}
