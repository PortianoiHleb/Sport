<?php
namespace app\models;

use yii\base\Model;

class EntryForm extends Model
{
    public $name;
    public $email;

    public function rules()
    {
        return [
            [['name', 'email'], 'required', 'message' => 'Поле є обов’язковим'],
            ['email', 'email', 'message' => 'Некоректний email'],
        ];
    }
}
