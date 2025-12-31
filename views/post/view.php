<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Sport Blog';
?>

<h1><?= Html::encode($post->name) ?></h1>

<?php if ($post->image): ?>
    <img src="/uploads/<?= Html::encode($post->image) ?>" class="img-fluid mb-3">
<?php endif; ?>

<p><?= nl2br(Html::encode($post->description)) ?></p>

<hr>
<h3>Коментарі</h3>

<?php foreach ($post->comments as $c): ?>
    <div class="border p-2 mb-2">
        <b><?= Html::encode($c->user_name) ?></b><br>
        <?= Html::encode($c->content) ?>

        <?php if (!Yii::$app->user->isGuest && Yii::$app->user->identity->isAdmin()): ?>
            <?= Html::a('Видалити', ['post/delete-comment', 'id'=>$c->id], ['class'=>'text-danger']) ?>
        <?php endif; ?>

        <?php foreach ($c->replies as $r): ?>
            <div class="ms-4 mt-2 text-muted">
                <b><?= Html::encode($r->user_name) ?></b>: <?= Html::encode($r->content) ?>
            </div>
        <?php endforeach; ?>

        <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($comment, 'content')->textarea(['rows'=>2])->label(false) ?>
        <?= Html::hiddenInput('parent_id', $c->id) ?>
        <?= Html::submitButton('Відповісти', ['class'=>'btn btn-sm btn-secondary']) ?>
        <?php ActiveForm::end(); ?>
    </div>
<?php endforeach; ?>

<hr>
<h4>Додати коментар</h4>

<?php $form = ActiveForm::begin(); ?>
<?= $form->field($comment, 'content')->textarea(['rows'=>3]) ?>
<?= Html::submitButton('Надіслати', ['class'=>'btn btn-success']) ?>
<?php ActiveForm::end(); ?>
