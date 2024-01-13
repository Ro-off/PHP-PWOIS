<style>
    .post-card {
        margin-bottom: 20px;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
       
    }

    .post-title {
        margin-top: 0;
        margin-bottom: 10px;
    }

    .post-date {
        color: #ccc;
    }

    .post-text {
        margin-bottom: 0;
    }

    .page-header {
        margin-top: 0;
        margin-bottom: 20px;
    }

    



</style>

<?php

use yii\helpers\Html;

use yii\widgets\LinkPager;


// стилі для постів

$this->registerCssFile('@web/css/post.css');

?>

<h1 class="page-header">Пости</h1>

<?php foreach ($posts as $post) : ?>

    <div class="post-card">

        <h2 class="post-title"><?= Html::encode("{$post->title}") ?></h2>

        <p class="post-text"><?= Html::encode("{$post->content}") ?></p>

        <?php if ($post->published) : ?>

            <p class="post-date">Дата публікації: <?= $post->published_at ?></p>

        <?php endif; ?>

    </div>

<?php endforeach; ?>

<?= LinkPager::widget(['pagination' => $pagination]) ?>