<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * Модель реєстрації користувача
 */
class SignupForm extends Model
{
    public $name;
    public $email;
    public $password;

    /**
     * Правила валідації
     */
    public function rules()
    {
        return [
            [['name', 'email', 'password'], 'required', 'message' => 'Поле є обов’язковим'],
            ['email', 'email', 'message' => 'Некоректний email'],
            [
                'email',
                'unique',
                'targetClass' => User::class,
                'targetAttribute' => 'email',
                'message' => 'Користувач з таким email вже існує.'
            ],
            ['password', 'string', 'min' => 6, 'tooShort' => 'Мінімальна довжина пароля 6 символів.'],
        ];
    }

    /**
     * Реєстрація користувача
     */
    public function signup()
    {
        if (!$this->validate()) {
            return false;
        }

        $user = new User();
        $user->name = $this->name;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();

        if ($user->save()) {
            return $user;
        }

        return false;
    }
}
