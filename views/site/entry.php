<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<h1>Форма введення даних</h1>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'name')->label('Ваше ім’я') ?>

<?= $form->field($model, 'email')->label('E-mail') ?>

<div class="form-group">
    <?= Html::submitButton('Надіслати', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>
