<?php

namespace app\models;
use Yii;


class Order extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'order';
    }

    public function rules()
    {
        return [
            [['name', 'email', 'phone', 'adress','delivery','pay_method'], 'required'],
            [['email'], 'email'],
            [['sum'], 'integer'],
            [['name', 'email', 'phone', 'adress', 'status'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Имя',
            'date' => 'Дата',
            'email' => 'E-mail',
            'phone' => 'Телефон',
            'adress' => 'Адрес',
            'sum' => 'Сумма',
            'status' => 'Статус',
            'delivery' => 'Доставка',
            'pay_method' => 'Оплата'
        ];
    }

    public function findDetails($time){
        return Order::find()->where(['like', 'date', $time])->asArray()->all();
    }

    public function findOrder($id){
        return OrderItem::find()->where(['order_id' => $id])->asArray()->all();
    }

    public function removeItem($orderId, $itemId) {
        $remover = OrderItem::findOne(['order_id' => $orderId, 'product_id' => $itemId]);
        $remover->delete();
    }
}
