<?php

namespace app\models;

use yii\db\ActiveRecord;


class Users extends ActiveRecord
{

    public static function tableName()
    {
        return 'users';
    }

    public function rules()
    {
        return [
            [['name', 'pass'], 'required'],
            [['role', 'name', 'pass', 'userpic'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'role' => 'Role',
            'name' => 'Name',
            'pass' => 'Pass',
            'userpic' => 'Userpic',
        ];
    }
    public function login($name, $pass) {
        $user = Users::find()->where(['name'=>$name, 'pass'=>md5($pass)])->asArray()->all();
       return $user;
//        return $this->re
     }
}
