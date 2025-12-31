<?php
use yii\helpers\Html;
?>

<h1>Результат</h1>

<p>Ви ввели:</p>

<ul>
    <li><b>Ім’я:</b> <?= Html::encode($model->name) ?></li>
    <li><b>Email:</b> <?= Html::encode($model->email) ?></li>
</ul>
