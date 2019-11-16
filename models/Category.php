<?php


namespace app\models;

use yii\db\ActiveRecord;

class Category extends ActiveRecord
{
    public static function tableName(){
        return 'category';
}

    public function rules()
    {
        return [
            [['cat_name', 'browser_name'], 'required'],
//            [['price'], 'integer'],
            [['cat_name', 'browser_name'], 'string', 'max' => 255],

        ];
    }
    public function attributeLabels()
    {
        return [
            'cat_name' => 'Имя категории',
            'browser_name' => 'Отображается как',

        ];
    }

    public function getCategories(){
        return Category::find()->asArray()->all();
}
}