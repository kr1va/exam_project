<?php

namespace app\models;

use Yii;

class Info extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'info';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['year'], 'integer'],
            [['name', 'site', 'mail', 'other', 'logo'], 'string', 'max' => 255],
            [['city'], 'string', 'max' => 20],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Name',
            'site' => 'Site',
            'mail' => 'Mail',
            'other' => 'Other',
            'logo' => 'Logo',
            'city' => 'City',
            'year' => 'Year',
        ];
    }

    public function showInfo(){
        $info = $catItems = Info::find()->asArray()->one();
        return $info;
    }
}
