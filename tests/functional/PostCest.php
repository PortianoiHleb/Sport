<?php

class PostCest
{
    public function openPostsPage(FunctionalTester $I)
    {
        $I->amOnPage(['post/index']);
        $I->see('Пости блогу');
    }

    public function seePostsFromDatabase(FunctionalTester $I)
    {
        $I->amOnPage(['post/index']);
        $I->seeElement('.card');
        $I->seeElement('.pagination');
    }
}
