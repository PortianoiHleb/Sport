<?php
/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Sport Blog';
$isGuest = Yii::$app->user->isGuest;
$isAdmin = !$isGuest && Yii::$app->user->identity->isAdmin();
?>

<div class="site-index">

    <!-- HERO -->
    <div class="jumbotron text-center bg-light p-5 rounded">
        <h1 class="display-4">Спортивний портал</h1>
        <p class="lead mt-3">
            Інформаційна система для роботи з видами спорту
        </p>

        <?php if ($isGuest): ?>
            <p class="mt-4">
                <?= Html::a('Увійти', ['/auth/login'], ['class' => 'btn btn-primary btn-lg me-2']) ?>
                <?= Html::a('Зареєструватися', ['/auth/signup'], ['class' => 'btn btn-outline-secondary btn-lg']) ?>
            </p>
        <?php endif; ?>
    </div>

    <!-- CONTENT -->
    <div class="container mt-5">
        <div class="row">

            <!-- CARD: SPORT -->
            <div class="col-md-4">
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Види спорту</h5>
                        <p class="card-text">
                            Перегляд інформації про різні види спорту.
                        </p>

                        <?php if ($isAdmin): ?>
                            <?= Html::a(
                                'Адміністрування спорту',
                                ['/sport/index'],
                                ['class' => 'btn btn-danger w-100']
                            ) ?>
                        <?php else: ?>
                            <?= Html::a(
                                'Переглянути спорт',
                                ['/sport/index'],
                                ['class' => 'btn btn-primary w-100']
                            ) ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- CARD: POSTS -->
            <div class="col-md-4">
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Публікації</h5>
                        <p class="card-text">
                            Новини та статті зі світу спорту.
                        </p>
                        <?= Html::a(
                            'Перейти до публікацій',
                            ['/post/index'],
                            ['class' => 'btn btn-outline-primary w-100']
                        ) ?>
                    </div>
                </div>
            </div>

            <!-- CARD: PROFILE -->
            <div class="col-md-4">
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Обліковий запис</h5>

                        <?php if ($isGuest): ?>
                            <p class="card-text">
                                Увійдіть або зареєструйтесь для доступу до системи.
                            </p>
                            <?= Html::a(
                                'Увійти',
                                ['/auth/login'],
                                ['class' => 'btn btn-success w-100']
                            ) ?>
                        <?php else: ?>
                            <p class="card-text">
                                Ви увійшли як: <b><?= Html::encode(Yii::$app->user->identity->email) ?></b>
                            </p>
                            <?= Html::a(
                                'Вийти',
                                ['/auth/logout'],
                                [
                                    'class' => 'btn btn-outline-danger w-100',
                                    'data-method' => 'post'
                                ]
                            ) ?>
                        <?php endif; ?>

                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
