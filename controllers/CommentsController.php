<?php

namespace app\controllers;

use app\models\OrderItemSearch;
use Yii;
use app\models\Comments;
//use app\models\comments;
use app\models\commentsSearch;
use yii\debug\models\search\Mail;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
//use
/**
 * CommentsController implements the CRUD actions for comments model.
 */
class CommentsController extends Controller
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
     * Lists all comments models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new commentsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

//        $searchModel = new Mail();
//        $mails = Mail::find()->asArray()->all();
//
//        return $this->render('view', [
//            'model' => $this->findModel($id),
//            'mails' =>$mails
//        ]);


        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single comments model.
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
     * Creates a new comments model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new comments();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing comments model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing comments model.
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
     * Finds the comments model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return comments the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = comments::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionComment(){
        $name = $_POST['name'];
        $comt = $_POST['comt'];
        $mail = $_POST['mail'];

        if ($name && $comt && $mail) {
            $model = new Comments();
            $model->name = $name;
            $model->comment = $comt;
            $model->email = $mail;
            $model->save();
//            $comments = Comments::find()->asArray()->all();
            unset($_POST['name']);
            unset($_POST['comt']);
            unset($_POST['mail']);

            $return = (json_encode(Comments::find()->asArray()->all()));
            return $return;
        } else {
            $return = (json_encode(Comments::find()->asArray()->all()));
            return $return;
        }
    }

}
