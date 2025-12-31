<?php
use yii\helpers\Html;

$this->title = 'Sport Blog';
?>

<h1>Пости</h1>

<div class="row">
<?php foreach ($posts as $post): ?>
    <div class="col-md-4 mb-4">
        <div class="card h-100 shadow">

            <?php if ($post->image): ?>
                <img src="/uploads/<?= Html::encode($post->image) ?>"
                     class="card-img-top"
                     style="height:200px;object-fit:cover;">
            <?php endif; ?>

            <div class="card-body">
                <h5><?= Html::encode($post->name) ?></h5>

                <p><?= mb_substr(strip_tags($post->description), 0, 120) ?>...</p>

                <p><small>Категорія:
                    <?= Html::a(
                        Html::encode($post->category),
                        ['post/index', 'category' => $post->category]
                    ) ?>
                </small></p>

                <?php if ($post->tags): ?>
                    <p>
                        <?php foreach (explode(',', $post->tags) as $tag): ?>
                            <?= Html::a(
                                trim($tag),
                                ['post/index', 'tag' => trim($tag)],
                                ['class' => 'badge bg-secondary']
                            ) ?>
                        <?php endforeach; ?>
                    </p>
                <?php endif; ?>

                <?= Html::a('Читати', ['post/view', 'id' => $post->id], ['class'=>'btn btn-primary btn-sm']) ?>
            </div>
        </div>
    </div>
<?php endforeach; ?>
</div>


