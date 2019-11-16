<?php


namespace app\models;
use yii\db\ActiveRecord;
use Yii;
use yii\web\UploadedFile;

class Item extends ActiveRecord
{
public static function tableName()
{
    return 'items';
}

    public function rules()
    {
        return [
            [['category', 'name', 'contents', 'description', 'price',  'img', 'link_name'], 'required'],
            [['price'], 'integer'],
            [['category', 'name', 'contents', 'description', 'price',  'img', 'link_name'], 'string', 'max' => 255],
//            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
            [['image'], 'file', 'extensions' => 'png, jpg'],
            [['del_img'], 'boolean'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Имя',
            'contents' => 'Состав',
            'description' => 'Описание',
            'category' => 'Категория',
            'price' => 'Цена',
            'img' => 'Картинка',
            'image' => 'Изображение',
            'link_name' => 'Cсылка'
        ];
    }

public function getAllItems() {
    $items = Yii::$app->cache->get('items');
    if (!$items) {
        $items = Item::find()->asArray()->all();
        Yii::$app->cache->set('items', $items, 30);
    }
    return $items;
}

public function getItemCategories($id) {
    $catItems = Item::find()->where(['category' => $id])->asArray()->all();
    return $catItems;
}

public function searchResult($search) {
    $searchResult = Item::find()->where(['like', 'name', $search])->asArray()->all();
        return $searchResult;
}

public function getItem($name) {
    $item = Item::find()->where(['link_name' => $name])->asArray()->one();
     return $item;
}
    public $image;
    public $del_img;
}