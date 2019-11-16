<?php


namespace app\controllers;
use app\models\Users;
use Yii;
use yii\web\Controller;
use yii\helpers\Url;

class UsersController extends Controller
{
public function actionIndex() {
    $user = new Users();
    return $this->renderPartial('login' , ['model'=>$user]);
}

public function actionLogin() {
    $name = $_POST['name'];
    $pass = $_POST['pass'];
    $user = new Users();
    $user = $user->login($name, $pass);

    if ($user) {
        $_SESSION['user'] = $name;
        return Yii::$app->response->redirect(Yii::$app->defaultRoute);
//        return $this->renderPartial('wellcome', compact('user'));
//        Yii::$app->response->redirect(Url::to(['/']));
    } else {
        return $this->renderPartial('error' , ['user'=>$name]);
    }
}

public function actionReg() {
    $user = new Users();
    return $this->renderPartial('register');
}

public function actionLogout($user){
    if( $_SESSION['user'] == $user &&  isset($_SESSION['user'])){
        unset($_SESSION['user']);
          return  Yii::$app->response->redirect(Url::to(['/']));
//        return Yii::$app->response->redirect('category/index');
    }
}
}