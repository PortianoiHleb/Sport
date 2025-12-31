<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * Модель форми логіну
 */
class LoginForm extends Model
{
    public $email;
    public $password;
    public $rememberMe = true;

    /** @var User|null */
    private $_user = null;

    /**
     * Правила валідації
     */
    public function rules()
    {
        return [
            [['email', 'password'], 'required', 'message' => 'Поле є обов’язковим'],
            ['email', 'email', 'message' => 'Некоректний email'],
            ['rememberMe', 'boolean'],
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Перевірка пароля
     */
    public function validatePassword($attribute, $params)
    {
        if ($this->hasErrors()) {
            return;
        }

        $user = $this->getUser();

        if (!$user || !$user->validatePassword($this->password)) {
            $this->addError($attribute, 'Невірний email або пароль.');
        }
    }

    /**
     * Логін користувача
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login(
                $this->getUser(),
                $this->rememberMe ? 3600 * 24 * 30 : 0
            );
        }

        return false;
    }

    /**
     * Пошук користувача по email
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = User::findByEmail($this->email);
        }
        return $this->_user;
    }
}
