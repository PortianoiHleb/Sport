<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SportSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Види спорту';
$this->params['breadcrumbs'][] = $this->title;

$isAdmin = !Yii::$app->user->isGuest && Yii::$app->user->identity->isAdmin();
?>

<div class="sport-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if ($isAdmin): ?>
        <p>
            <?= Html::a('➕ Додати вид спорту', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    <?php endif; ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            'category',
            'description:ntext',

            [
                'class' => 'yii\grid\ActionColumn',
                'visibleButtons' => [
                    'update' => $isAdmin,
                    'delete' => $isAdmin,
                ],
            ],
        ],
    ]); ?>

</div>
