<?php


namespace app\controllers;

use app\models\Comments;
use app\models\Info;
use app\models\Item;
use app\models\ContactForm;
//use app\models\Comments;
use Symfony\Component\CssSelector\Tests\Parser\Handler\CommentHandlerTest;
use yii\web\Controller;
use yii\filters\VerbFilter;
use Yii;

class CategoryController extends Controller
{

    public $enableCsrfValidation = false;

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

public function actionIndex() {
    $items = new Item();
    $items = $items->getAllItems();
    $infoShow = new Info();
    $infoShow = $infoShow->showInfo();
    return $this->render('index', compact('items','infoShow'));
}

public function actionView($id){
    $item = new Item();
    $item = $item->getItemCategories($id);
    return $this->render('view', compact('item'));
}

public function actionSearch(){
    $search = Yii::$app->request->get('search');
    $items = new Item();
    $items = $items->searchResult($search);
    return $this->render('search', compact('items','search'));
}

public function actionAbout(){
        $info = new Info();
        $info = $info->showInfo();
    return $this->render('about', compact('info'));
}

public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

//    public function actionComment(){
//        $name = $_POST['name'];
//        $comt = $_POST['comt'];
//        $mail = $_POST['mail'];
//
//        if ($name && $comt && $mail) {
//            $model = new Comments();
//            $model->name = $name;
//            $model->comment = $comt;
//            $model->email = $mail;
//            $model->save();
////            $comments = Comments::find()->asArray()->all();
//            unset($_POST['name']);
//            unset($_POST['comt']);
//            unset($_POST['mail']);
//
//            $return = (json_encode(Comments::find()->asArray()->all()));
//            return $return;
//        } else {
//            $return = (json_encode(Comments::find()->asArray()->all()));
//            return $return;
//        }
//    }

}