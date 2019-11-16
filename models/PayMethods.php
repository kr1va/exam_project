<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pay_methods".
 *
 * @property int $id
 * @property string $pay_method
 * @property string $browser_name
 */
class PayMethods extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pay_methods';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pay_method', 'browser_name'], 'required'],
            [['pay_method', 'browser_name'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pay_method' => 'Способ',
            'browser_name' => 'Название',
        ];
    }
    public function getMethods(){
        return Category::find()->asArray()->all();
    }
}
