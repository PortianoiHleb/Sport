<?php

class AuthLoginCest
{
    
    public function openLoginPage(FunctionalTester $I)
    {
        $I->amOnPage('/auth/login');
        $I->see('Вхід до системи');
    }

    public function submitEmptyForm(FunctionalTester $I)
    {
        $I->amOnPage('/auth/login');
        $I->click('Увійти');
        $I->see('Вхід до системи');
    }

   
    public function submitWrongCredentials(FunctionalTester $I)
    {
        $I->amOnPage('/auth/login');
        $I->fillField('email', 'wrong@mail.com');
        $I->fillField('password', '123456');
        $I->click('Увійти');

        $I->see('Вхід до системи');
    }


    public function loginSuccessfully(FunctionalTester $I)
    {
        Yii::$app->user->login(new \app\models\User([
            'id' => 1,
            'name' => 'Admin',
            'email' => 'admin@mail.com',
        ]));

        $I->assertFalse(Yii::$app->user->isGuest);

        $I->amOnPage('/');

        $I->dontSee('Login');
    }
}
