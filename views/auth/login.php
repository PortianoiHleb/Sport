<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Вхід до системи';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="auth-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Будь ласка, заповніть поля для входу:</p>

    <?php $form = ActiveForm::begin([
        'id' => 'login-form'
    ]); ?>

        <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>
        <?= $form->field($model, 'password')->passwordInput() ?>

        <div class="form-group">
            <?= Html::submitButton('Увійти', ['class' => 'btn btn-primary']) ?>
        </div>

    <?php ActiveForm::end(); ?>
</div>
