<?php


namespace app\models;

use yii\db\ActiveRecord;

class OrderStatus extends ActiveRecord
{
    public static function tableName(){
        return 'order_status';
    }

    public function getStatus(){
        return OrderStatus::find()->asArray()->all();
    }
}