<?php


namespace app\models;
use yii\db\ActiveRecord;
use Yii;
use yii\web\UploadedFile;

class Book extends ActiveRecord
{
public static function tableName()
{
    return 'books';
}

    public function rules()
    {
        return [
            [['category', 'name', 'author', 'description', 'price',  'img', 'link_name'], 'required'],
            [['price'], 'integer'],
            [['category', 'name', 'author', 'description', 'price',  'img', 'link_name'], 'string', 'max' => 255],
//            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
            [['image'], 'file', 'extensions' => 'png, jpg'],
            [['del_img'], 'boolean'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Имя',
            'author' => 'Автор',
            'description' => 'Описание',
            'category' => 'Категория',
            'price' => 'Цена',
            'img' => 'Картинка',
            'image' => 'Изображение',
            'link_name' => 'Cсылка'
        ];
    }

public function getAllBooks() {
    $items = Yii::$app->cache->get('items');
    if (!$items) {
        $items = Book::find()->asArray()->all();
        Yii::$app->cache->set('items', $items, 30);
    }
    return $items;
}

public function getBookCategories($id) {
    $catItems = Book::find()->where(['category' => $id])->asArray()->all();
    return $catItems;
}

public function searchResult($search) {
    $searchResult = Book::find()->where(['like', 'name', $search])->asArray()->all();
        return $searchResult;
}

public function getBook($name) {
    $item = Book::find()->where(['link_name' => $name])->asArray()->one();
     return $item;
}
    public $image;
    public $del_img;
}