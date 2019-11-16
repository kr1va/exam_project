<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comments".
 *
 * @property int $id
 * @property string $name
 * @property string $pass
 * @property string $email
 * @property string $comment
 * @property int $item_id
 */
class Comments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name',  'email', 'comment'], 'required'],
            [['item_id'], 'integer'],
            [['name', 'email'], 'string', 'max' => 25],
            [['comment'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'email' => 'Email',
            'comment' => 'Коммментарий',
            'item_id' => 'ID товара',
        ];
    }
}
