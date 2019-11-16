<?php


namespace app\controllers;
use app\models\Item;
use app\models\Cart;
use app\models\Order;
use app\models\OrderItem;
use http\Params;
use Yii;
use yii\web\Controller;

class CartController extends Controller
{
public function actionOpen() {
    $session = Yii::$app->session;
    $session->open();
    return $this->renderPartial('cart', compact('session'));
}

public function actionAdd($name){
    $item = new Item();
    $item = $item->getItem($name);
    $session = Yii::$app->session;
    $session->open();
    $cart = new Cart();
    $cart->addToCart($item);
    return $this->renderPartial('cart', compact('item','session'));
//    return $this->renderPartial('cart', compact('bookAdd'));
}

public function actionDelete($id){
    $session = Yii::$app->session;
    $session->open();
    $cart = new Cart();
    $cart->delFromCart($id);
    return $this->renderPartial('cart', compact('session'));
}

public function actionClear() {
    $session = Yii::$app->session;
    $session->open();
    $session->remove('cart');
    $session->remove('cart.totalQty');
    $session->remove('cart.totalSum');
    return $this->renderPartial('cart', compact('session'));
}

public function actionOrder(){
    $session = Yii::$app->session;
    $session->open();
    $order = new Order();
    $orderItem = new OrderItem();

    if  ($order->load(Yii::$app->request->post())) {
    $order->date = date('Y-m-d H:i:s');
    $order->sum = $session['cart.totalSum'];
        if ($order->save()){
            $orderItem->addOrder($session['cart'], $order->date);
            $orderDetails = $order->findDetails($order->date);
            $orderItem = $orderItem->find()->andWhere(['order_id' => $orderDetails[0]['id']])->asArray()->all();
            $session->remove('cart');
            $session->remove('cart.totalSum');
            $session->remove('cart.totalQty');
            return $this->render('success',compact('session', 'orderDetails', 'orderItem'));
        }
    }
    $this->layout = 'empty';
    return $this->render('order', compact('session','order'));
}

}