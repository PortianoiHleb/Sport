<?php

class EntryFormCest
{
    public function submitValidData(FunctionalTester $I)
    {
    $I->amOnPage(['site/entry']);

    $I->see('Форма введення даних');
    $I->see('Ваше ім’я');

    $I->fillField('EntryForm[name]', 'Глеб');
    $I->fillField('EntryForm[email]', 'test@example.com');
    $I->click('Надіслати');

    $I->see('Результат');
    $I->see('Ви ввели:');
    $I->see('Глеб');
    $I->see('test@example.com');
      }

    public function submitInvalidEmail(FunctionalTester $I)
    {
        $I->amOnPage(['site/entry']);
        $I->fillField('EntryForm[name]', 'Глеб');
        $I->fillField('EntryForm[email]', 'wrong-email');
        $I->click('Надіслати');

        $I->see('Некоректний email');
    }

    public function submitEmptyFields(FunctionalTester $I)
    {
        $I->amOnPage(['site/entry']);
        $I->fillField('EntryForm[name]', '');
        $I->fillField('EntryForm[email]', '');
        $I->click('Надіслати');

        $I->see('Поле є обов’язковим');
    }
}
