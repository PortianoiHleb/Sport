<?php

class AuthSignupCest
{
    public function openSignupPage(FunctionalTester $I)
    {
        $I->amOnPage(['/auth/signup']);
        $I->see('Реєстрація');
        $I->see('Заповніть форму для створення нового облікового запису'); 
    }

    public function submitEmptyForm(FunctionalTester $I)
    {
        $I->amOnPage(['/auth/signup']);
        $I->click('Зареєструватися');

        $I->see('Поле є обов’язковим');
    }

    public function submitInvalidEmail(FunctionalTester $I)
    {
        $I->amOnPage(['/auth/signup']);
        $I->fillField('SignupForm[name]', 'Глеб');
        $I->fillField('SignupForm[email]', 'wrong-email');
        $I->fillField('SignupForm[password]', '123456');
        $I->click('Зареєструватися');

        $I->see('Некоректний email');
    }

    public function signupSuccessfully(FunctionalTester $I)
    {
        $I->amOnPage(['/auth/signup']);
        $email = 'newuser' . rand(1000, 9999) . '@example.com';

        $I->fillField('SignupForm[name]', 'New User');
        $I->fillField('SignupForm[email]', $email);
        $I->fillField('SignupForm[password]', '123456');
        $I->click('Зареєструватися');


        $I->seeInCurrentUrl('auth%2Flogin');
        $I->see('Вхід до системи');
    }
}
