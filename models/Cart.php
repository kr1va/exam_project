<?php


namespace app\models;

use yii\db\ActiveRecord;

class Cart extends ActiveRecord
{
public function addToCart($item){

if (isset($_SESSION['cart'][$item['id']])) {
    $_SESSION['cart'][$item['id']]['qty'] +=1;
} else {
    $_SESSION['cart'][$item['id']] = [
        'id'=>$item['id'],
        'qty' => 1,
        'name'=> $item['name'],
        'price'=>$item['price'],
        'img'=>$item['img']
];

}
    $_SESSION['cart.totalQty'] = isset($_SESSION['cart.totalQty']) ? $_SESSION['cart.totalQty'] +1 : 1;
    $_SESSION['cart.totalSum'] = isset($_SESSION['cart.totalSum']) ? $_SESSION['cart.totalSum'] +$item['price'] : $item['price'];
}

public function delFromCart($id) {
    $qty = $_SESSION['cart'][$id]['qty'];
//    $price = $_SESSION['cart'][$id]['price'];
    $totalPrice = $_SESSION['cart'][$id]['qty']*$_SESSION['cart'][$id]['price'];
//    if (count($_SESSION['cart']) == '1' ) {
//        unset($_SESSION['cart']);
//        unset($_SESSION['cart.totalSum']);
//        unset($_SESSION['cart.totalQty']);
////        $_SESSION['cart']->remove($id);
////        $session->remove('cart');
////        $_SESSION->remove('cart.totalQty');
////        $_SESSION->remove('cart.totalSum');
//    } else {
//        unset($_SESSION['cart'][$id]);
//        $_SESSION['cart.totalQty'] -= $qty;
//        $_SESSION['cart.totalSum'] -= $totalPrice;
//
//
//    }
    $_SESSION['cart.totalQty'] -= $qty;
    $_SESSION['cart.totalSum'] -= $totalPrice;
    unset($_SESSION['cart'][$id]);
}

}