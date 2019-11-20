<?php

namespace app\models;

use Yii;


class OrderItem extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'order_item';
    }

    public function rules()
    {
        return [
//            [['order_id', 'product_id'], 'required']
//            ,
            [['order_id', 'product_id', 'price', 'qty', 'sum'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'order_id' => 'ID заказа',
            'product_id' => 'ID продукта',
            'price' => 'Цена',
            'qty' => 'Кол-во',
            'sum' => 'Сумма',
            'name' => 'Имя'
        ];
    }

    public function addOrder($content, $time){
        foreach ($content as $item) {
            $orderItem = new OrderItem();
            $order = new Order();
//                $orderBook->order_id = $id;
            $id = $order->findDetails($time);
            $orderItem->order_id = (int)$id[0]['id'];
            $orderItem->product_id = (int)$item['id'];
            $orderItem->name = $item['name'];
            $orderItem->price = (int)$item['price'];
            $orderItem->qty = (int)$item['qty'];
            $orderItem->sum = (int)$item['price']*$item['qty'];
            $orderItem->save();
        }
    }
    



}
