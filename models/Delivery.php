<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "delivery".
 *
 * @property int $id
 * @property string $method
 * @property string $browser_name
 */
class Delivery extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'delivery';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['method', 'browser_name'], 'required'],
            [['method', 'browser_name'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'method' => 'Способ',
            'browser_name' => 'Название',
        ];
    }

    public function getMethods(){
        return Category::find()->asArray()->all();
    }
}
