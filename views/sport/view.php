<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Sport */

$isAdmin = !Yii::$app->user->isGuest && Yii::$app->user->identity->isAdmin();

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Види спорту', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="sport-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if ($isAdmin): ?>
        <p>
            <?= Html::a('✏️ Редагувати', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('🗑 Видалити', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Ви впевнені?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>
    <?php endif; ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'category',
            'description:ntext',
            'image',
            'created_at',
        ],
    ]) ?>

</div>
