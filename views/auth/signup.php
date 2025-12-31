<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Реєстрація';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="auth-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Заповніть форму для створення нового облікового запису:</p>

    <?php $form = ActiveForm::begin([
        'id' => 'signup-form'
    ]); ?>

        <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>
        <?= $form->field($model, 'email')->textInput() ?>
        <?= $form->field($model, 'password')->passwordInput() ?>

        <div class="form-group">
            <?= Html::submitButton('Зареєструватися', ['class' => 'btn btn-success']) ?>
        </div>

    <?php ActiveForm::end(); ?>
</div>
