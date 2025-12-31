<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\LoginForm;
use app\models\SignupForm;
use app\models\User;

/**
 * Контролер для авторизації та реєстрації
 */
class AuthController extends Controller
{
    /**
     * Сторінка логіну
     */
    public function actionLogin()
    {
        // Якщо користувач вже авторизований – перенаправляємо на головну
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Вихід
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }

    /**
     * Сторінка реєстрації
     */
    public function actionSignup()
    {
        $model = new SignupForm();

        if (Yii::$app->request->isPost) {
            if ($model->load(Yii::$app->request->post()) && $user = $model->signup()) {
                // після реєстрації можна або логінити, або перенаправити на логін
                // Yii::$app->user->login($user);
                return $this->redirect(['auth/login']);
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Тестовий екшн для перевірки авторизації
     */
    public function actionTest()
    {
        if (Yii::$app->user->isGuest) {
            echo 'Користувач у гостьовому режимі.';
        } else {
            /** @var User $user */
            $user = Yii::$app->user->identity;
            echo 'Користувач авторизований: ' . htmlspecialchars($user->email, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
        }
    }
}
