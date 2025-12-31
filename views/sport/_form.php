<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="sport-form">

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

<?= $form->field($model, 'name')->textInput() ?>
<?= $form->field($model, 'category')->textInput() ?>
<?= $form->field($model, 'description')->textarea(['rows' => 5]) ?>
<?= $form->field($model, 'imageFile')->fileInput() ?>
<?= $form->field($model, 'tags')->textInput(['placeholder' => 'футбол, ліга, матч']) ?>


<div class="form-group">
    <?= Html::submitButton('Зберегти', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>

</div>
